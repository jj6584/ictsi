<?php



/**
*
*/
class Model_emp extends CI_Model
{

        public function emp_log_in(){
             $this ->db->where('c_e_id', $this->input->post('empid'));
             $this ->db->where('c_e_password', sha1($this->input->post('emppass')));

        $query = $this->db->get('c_emp');

        if($query->num_rows() == 1){
            return true;
        }else{
            return false;
        }
        }


        public function getDetails($user){
            $this -> db -> select('*');
             $this -> db -> from('c_emp');
             $this -> db -> where('c_e_id', $user);
             $query = $this->db->get();

             return $query->result();

        }

        public function insertreferralnotif($data){
           $this->db->insert('notifications', $data);
        }

        public function geteval(){
            $this -> db -> select('performance_transact.*, applicants.*,c_emp.*');
             $this -> db -> from('performance_transact');
             $this -> db -> join("applicants", "applicants.id = performance_transact.emp_id");
             $this -> db -> join("c_emp", "c_emp.c_emp_id = performance_transact.coemp_id");
             $this -> db -> where('performance_transact.coemp_id', $_SESSION['emp_id']);
             $this -> db -> where('performance_transact.perf_status', 0);

             $query = $this->db->get();

             return $query->result_array();

        }


        public function getquestions($empid){

                    $this -> db -> select('performance_transact.*, applicants.*,c_emp.*');
             $this -> db -> from('performance_transact');
             $this -> db -> join("applicants", "applicants.id = performance_transact.emp_id");
             $this -> db -> join("c_emp", "c_emp.c_emp_id = performance_transact.coemp_id");
             $this -> db -> where('performance_transact.emp_id', $empid);
             $query = $this->db->get();

             return $query->result_array();
        }


        public function getALLQUES($evalquesID){
            $finaleval = 0;
            $counter = 0;
            $evals = explode(",", $evalquesID);

              $this -> db -> select('*');
            $this -> db -> from('evaluation');
            foreach ($evals as $key) {

                      $this -> db -> or_where('eval_id', $key);


                    }
  $q = $this -> db ->get();
                     return $q->result_array();




        }



        public function inserteval($evals, $empid, $ave){
                $var = "";

                foreach ($evals as $key) {
                    $var .= $key.",";
                }
                $length = mb_strlen($var)-1;
                $newvar = mb_substr($var,0,$length);

                $data = array(

                        'evaluated' => $newvar,
                        'finalresult' => $ave,
                        'perf_status' => 1

                    );

                $this -> db->select('*');
                $this -> db -> where('emp_id', $empid);
                $this -> db->where('coemp_id', $_SESSION['emp_id']);
                     $q =$this->db->update('performance_transact', $data);

                     if($q){
                            return true;
                         }else{
                            return false;
                         }



        }


        public function insertmanpowernotif($data){

              $this -> db ->insert('notifications', $data);

        }

		public function insert_request($data){
                $this->db->insert('mp_request', $data);
        }
        public function insert_referral($data){
                $this->db->insert('referral_form', $data);
        }

		public function getSkills(){
			 $this -> db -> select('*');
        $this -> db -> from('skills');
        $sql = $this -> db ->get();
        return $sql ->result_array();
		}

		public function getDetailsemp(){

             $this -> db -> select('*');
             $this -> db -> from('c_emp');
             $this -> db -> where('c_emp_id', $_SESSION['emp_id']);
             $query = $this->db->get();

             return $query->result_array();

        }



// UPDATE PROFILE //
public function update_skills($email,$skills){
    $data = array (
        'skills'=>$skills);
    $this->db->from('applicants');
     $this->db->where('email',$email);
    $this->db->update('skills',$data);

}


}
