<?php



/**
*
*/
class Model_admin extends CI_Model
{


    public function admin_log_in()
    {
        $this ->db->where('admin_username', $this->input->post('adminuser'));
        $this ->db->where('admin_password', sha1($this->input->post('adminpass')));

        $query = $this->db->get('admin');

        if($query->num_rows() == 1){
            return true;
        }else{
            return false;
        }
    }

    public function checkreq($data){
        $this -> db -> where('job_requisition_id', $data);
        $query = $this->db->get('jobs');

        if($query->num_rows() == 1){
            return false;
        }else{
            return true;
        }
    }

public function getworkflow(){

      $sql = $this -> db -> query("SELECT * FROM `workflow` WHERE SYSDATE() > effective_date ORDER by effective_date desc limit 1");
       // $this -> db -> select("*");
       // $this -> db -> from('workflow');
       // $this -> db -> where('SYSDATE() <', "effective_date");
       // $this -> db ->order_by('effective_date');
       //  $this -> db ->limit(1);

       // $sql = $this -> db ->get();
        return  $sql ->result_array();




}


public function updatepercentageweight(){
    $data = array(
    'skills' => $_POST['skills'],
    'degree' => $_POST['degree'],
    'salary' => $_POST['salary'],
    'workexp' => $_POST['workexp']
  );

  $this -> db ->where('id', 1);
  $this -> db -> update('percentageweight', $data);

}

public function getweightpercentage(){

    $this -> db -> select('*');
    $this -> db -> from('percentageweight');
    $this -> db -> where('id', 1);
    $query = $this->db->get();
    return $query->result_array();

}

public function insertworkflow($edate){

             $data = array(
                              'workflow_name' => $_POST['workflowname'],
                              '1st' => $_POST['work1'],
                               '2nd' => $_POST['work2'],
                                '3rd' => $_POST['work3'],
                                 '4th' => $_POST['work4'],
                                  '5th' => $_POST['work5'],
                                  'effective_date' =>$edate
                                  );

                // echo "<pre>";
                // print_r($data);
                // echo "</pre>";

        $sql = $this -> db ->insert('workflow', $data);
        if($sql){

        return true;
        }
}




public function get_admin(){
    $this->db->select('*');
    $this->db->where('admin_level',31);
    $query = $this->db->get('admin');

   // return $query->result();

             return $query->result_array();
}

public function get_todo4($id){


    $this->db->select("todo_list.*,admin.*");
      $this -> db -> from('todo_list');
      $this -> db -> join("admin", "admin.admin_id = todo_list.owner");



      $this ->db->where("todo_list.id",$id);

       $query = $this->db->get();

             return $query->result_array();
}



public function get_owner($id){


    $this->db->select("todo_list.*,admin.*");
      $this -> db -> from('todo_list');
      $this -> db -> join("admin", "admin.admin_id = todo_list.owner");

      $this ->db->where("admin.admin_id",$id);
       $query = $this->db->get();

             return $query->result_array();
}

public function getappname($id){
  $this -> db ->select('*');
  $this -> db ->from('applicants');

    $this -> db -> where('applicants.id', $id);


      $query = $this->db->get();
       return $query->result_array();
}


public function insertsuccessnotif($appid){
        $data = array(
                'type_id' =>11,
                'sender_id' => $appid,
                'receiver_id' => $_SESSION['admin_id']
            );
        $this -> db -> insert('notifications', $data);
}




public function get_todo3($id){


    $this->db->select("todo_list.*");
      $this -> db -> from('todo_list');
      //$this -> db -> join("admin", "admin.admin_id = todo_list.assigned_to");



      $this ->db->like("assigned_to",$id, "both");
      //$this->db->or_where("owner",$id);
       $query = $this->db->get();

             return $query->result_array();
}

public function get_todo33($id){
  $this->db->select("todo_list.*");
    $this -> db -> from('todo_list');
      $this->db->where("owner",$id);
      $query = $this->db->get();

            return $query->result_array();
}



public function checktask($date,$start,$end){

    $assigned = "";
    $counter = 0;
    foreach ($this->input->post('assigned[]') as $value){

            $assigned .= $value . ",";
    }


                 $length = mb_strlen($assigned)-1;
               $new =  mb_substr($assigned,0,$length);
               $dr = explode(",",$new);
               foreach ($dr as $key) {
                 $sql = $this -> db -> query("SELECT * FROM `todo_list` WHERE start_time >= '$start' and start_time <= '$end' and date = '$date' and assigned_to LIKE '%$key%' ");
                  if($sql->num_rows() > 0){
                  $counter++;
                  }
               }

            $val = count($dr);
                if($val == $counter){
                       return false;
               }else{
                   return true;
               }

}




    public function getDetails($user){

             $this -> db -> select('*');
             $this -> db -> from('admin');
             $this -> db -> where('admin_username', $user);
             $query = $this->db->get();

             return $query->result();

        }

		public function updateAdmin($data){

        $this -> db ->where('admin_id', $_SESSION['admin_id']);
        $sql = $this -> db -> update('admin', $data);

        if($sql){
                return true;
        }else{
            return false;
        }

}




public function checkoldpass($pass){
            $this->db->select('admin_password');
            $this->db->from('admin');
            $this->db->where('admin_password', $pass);
            $this->db->where('admin_id', $_SESSION['admin_id']);

             $query = $this->db->get();

             if($query->num_rows() == 1){
                    return true;
            }else{
                return false;
            }



}



public function updateadminpassword($newpass){
        $encryptedpass = sha1($newpass);
        $data = array(
            'admin_password' => $encryptedpass
            );
        $this -> db -> where('admin_id', $_SESSION['admin_id']);
        $sql = $this -> db -> update('admin', $data);

        if($sql){
            return true;
        }else{
            return false;
        }
}


public function adminuploadDP($img){

    $updated = array('profile_pic' => $img);
    $this->db->select('profile_pic');
        $this->db->where('admin_id', $this->session->userdata('admin_id'));

     $this->db->update('admin', $updated);

}

public function getadmindp($id){
    $this->db->select('profile_pic');
    $this->db->from('admin');
    $this->db->where('admin_id', $id);
             $query = $this->db->get();

             return $query->result_array();

}


    public function getDetailsadmin(){

             $this -> db -> select('*');
             $this -> db -> from('admin');
             $this -> db -> where('admin_id', $_SESSION['admin_id']);
             $query = $this->db->get();

             return $query->result_array();

        }


		  public function countmanpower(){

    //           $this -> db ->select('notifications.*,c_emp.*, admin.*, type_notifications.*, mp_request.*');
    // //                 $this -> db ->from('notifications');
    // //          $this -> db -> join('c_emp', 'c_emp.c_emp_id = notifications.sender_id');
    // //        $this -> db -> join('admin', 'admin.admin_id = notifications.receiver_id');
    // //       $this -> db -> join('type_notifications', 'type_notifications.t_notification_id = notifications.type_id');
    // //      $this -> db -> join('mp_request', 'mp_request.emp_id = notifications.receiver_id');
    // //  //   $this -> db -> join('c_emp', 'c_emp.c_emp_id = notifications.sender_id');
    //  //
    // //             $this -> db -> where('seen', 0);
    // //         $this ->db -> where('receiver_id', $_SESSION['admin_id']);
    // //         $this -> db -> where('admin_level', 32);

    $this -> db -> select('notifications.*,c_emp.*, type_notifications.*');
     $this -> db ->from('notifications');
     $this -> db ->join('c_emp', 'c_emp.c_emp_id = notifications.sender_id');
     $this -> db ->join('type_notifications', 'type_notifications.t_notification_id = notifications.type_id');
     $this -> db -> where('seen', 0);
     $this -> db -> or_where('type_id', 8);

     $this -> db -> or_where('type_id', 9);
            $this -> db -> order_by('date_added', "desc");
                   $query = $this->db->get();

            return $query->num_rows();

    }




    public function getcname($id){
        $this -> db -> select("*");
        $this -> db -> from('c_emp');
        $this->db->where('c_emp_id', $id);
         $query = $this->db->get();
            return $query->result_array();
    }



     public function seeallalerts(){

       $this -> db ->select('notifications.*,applicants.*, type_notifications.*');
             $this -> db ->from('notifications');
      $this -> db -> join('applicants', 'applicants.id = notifications.receiver_id');
     //$this -> db -> join('admin', 'admin.admin_id = notifications.receiver_id');
   $this -> db -> join('type_notifications', 'type_notifications.t_notification_id = notifications.type_id');
 // $this -> db -> join('mp_request', 'mp_request.emp_id = notifications.receiver_id');
 // $this -> db -> join('c_emp', 'c_emp.c_emp_id = notifications.sender_id');

         $this -> db -> where('seen', 0);
     $this ->db -> where('sender_id', $_SESSION['admin_id']);
   //  $this -> db -> where('admin_level', 31);
     $this -> db -> order_by('date_added', "desc");
     $query = $this->db->get();
            return $query->result_array();

    }


    public function getallnotifs(){
      $this -> db ->select('notifications.*,applicants.*, type_notifications.*');
            $this -> db ->from('notifications');
     $this -> db -> join('applicants', 'applicants.id = notifications.receiver_id');
    //$this -> db -> join('admin', 'admin.admin_id = notifications.receiver_id');
  $this -> db -> join('type_notifications', 'type_notifications.t_notification_id = notifications.type_id');
// $this -> db -> join('mp_request', 'mp_request.emp_id = notifications.receiver_id');
// $this -> db -> join('c_emp', 'c_emp.c_emp_id = notifications.sender_id');

        $this -> db -> where('seen', 0);
    $this ->db -> where('sender_id', $_SESSION['admin_id']);
  //  $this -> db -> where('admin_level', 31);
    $this -> db -> order_by('date_added', "desc");
    $query = $this->db->get();
    //return $query->result_array();
            return $query->num_rows();

    }


    public function getallmanpower(){


        $this -> db -> select('notifications.*,c_emp.*, type_notifications.*');
         $this -> db ->from('notifications');
         $this -> db ->join('c_emp', 'c_emp.c_emp_id = notifications.sender_id');
         $this -> db ->join('type_notifications', 'type_notifications.t_notification_id = notifications.type_id');
         $this -> db -> where('seen', 0);
         $this -> db -> or_where('type_id', 8);

         $this -> db -> or_where('type_id', 9);
                $this -> db -> order_by('date_added', "desc");
                       $query = $this->db->get();


            return $query->result_array();


    }




    public function getadminnotifs(){

              $this -> db ->select('notifications.*,applicants.*, type_notifications.*');
                    $this -> db ->from('notifications');
             $this -> db -> join('applicants', 'applicants.id = notifications.receiver_id');
            //$this -> db -> join('admin', 'admin.admin_id = notifications.receiver_id');
          $this -> db -> join('type_notifications', 'type_notifications.t_notification_id = notifications.type_id');
        // $this -> db -> join('mp_request', 'mp_request.emp_id = notifications.receiver_id');
       // $this -> db -> join('c_emp', 'c_emp.c_emp_id = notifications.sender_id');

                $this -> db -> where('seen', 0);
            $this ->db -> where('sender_id', $_SESSION['admin_id']);
          //  $this -> db -> where('admin_level', 31);
            $this -> db -> order_by('date_added', "desc");
            $query = $this->db->get();
            return $query->result_array();

    }



        public function get_interviewsched_email($appid){

        $this -> db ->select('interview_sched.*,applicants.*,jobs.*');
        $this -> db ->from('interview_sched');
        $this -> db -> join('applicants', 'applicants.id = interview_sched.int_user_id');
         $this -> db -> join('jobs', 'jobs.job_id = interview_sched.int_job_id');
          $this -> db -> where('applicants.id', $appid);
            $query = $this->db->get();
             return $query->result_array();



    }


	    public function humanTiming ($time){
                                            $time = time() - $time; // to get the time since that moment
                                            $time = ($time<1)? 1 : $time;
                                            $tokens = array (
                                                31536000 => 'year',
                                                2592000 => 'month',
                                                604800 => 'week',
                                                86400 => 'day',
                                                3600 => 'hour',
                                                60 => 'minute',
                                                1 => 'second'
                                            );

                                            foreach ($tokens as $unit => $text) {
                                                if ($time < $unit) continue;
                                                $numberOfUnits = floor($time / $unit);
                                                return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
                                            }

         }



    public function insert_faqs($data)
    {
         $this->db->insert('faqs', $data);

    }

    public function get_faqs()
    {
             $this -> db -> select('*');
             $this -> db -> from('faqs');

             $query = $this->db->get();

             return $query->result_array();
    }


    function get_faqss($id){
        $this->db->select('*');
        $this->db->from('faqs');
        $this->db->where(array('id'=>$id));
         $query =  $this->db->get();
         return $query->first_row('array');
        }
      function update_faq($id,$data){
           $this->db->where('id', $id);
           $this->db->update('faqs', $data);
       }




    function delete_faq($id){
        $this->db->where('id',$id);
       $this->db->delete('faqs');
    }

	    function delete_announcement($id){
        $this->db->where('announcement_id',$id);
       $this->db->delete('announcements');
    }


   function delete_ref($id){
        $this->db->where('id',$id);
       $this->db->delete('referral_form');
    }


    function update_footer($id,$data){
           $this->db->where('id', $id);
           $this->db->update('cms', $data);
       }
           function get_footer($id=1){
        $this->db->select('*');
        $this->db->from('cms');
        $this->db->where(array('id'=>$id));
         $query =  $this->db->get();
         return $query->first_row('array');
        }


            function update_banner($img){
        $id = 1;

    $updated = array('banner' => $img);
    $this->db->select('banner');
        $this->db->where('id', $id);
     $this->db->update('cms', $updated);


    }

    function get_banner($id=1){
        $this->db->select('banner');
        $this->db->from('cms');
        $this->db->where(array('id'=>$id));
         $query =  $this->db->get();
         return $query->first_row('array');
        }



        public function getalleval(){


              $this->db->select('*');
              $this->db->from('evaluation');
              $q = $this->db->get();

              return $q->result_array();

        }


        public function getallevalDESC(){
                $this->db->select('*');
              $this->db->from('evaluation');
              $this->db->order_by('eval_id','desc');
              $q = $this->db->get();

              return $q->result_array();
        }








            function update_carousel1($img){
        $id = 1;

    $updated = array('c1' => $img);
    $this->db->select('c1');
        $this->db->where('id', $id);
     $this->db->update('cms', $updated);


    }

            function update_carousel2($img){
        $id = 1;

    $updated = array('c2' => $img);
    $this->db->select('c2');
        $this->db->where('id', $id);
     $this->db->update('cms', $updated);


    }

            function update_carousel3($img){
        $id = 1;

    $updated = array('c3' => $img);
    $this->db->select('c3');
        $this->db->where('id', $id);
     $this->db->update('cms', $updated);


    }

  function update_carousel4($img){
        $id = 1;

    $updated = array('c4' => $img);
    $this->db->select('c4');
        $this->db->where('id', $id);
     $this->db->update('cms', $updated);


    }
      function update_carousel5($img){
        $id = 1;

    $updated = array('c5' => $img);
    $this->db->select('c5');
        $this->db->where('id', $id);
     $this->db->update('cms', $updated);


    }
      function update_carousel6($img){
        $id = 1;

    $updated = array('c6' => $img);
    $this->db->select('c6');
        $this->db->where('id', $id);
     $this->db->update('cms', $updated);


    }





////////////////////////////////////////////////////////////////
        function update_hpcontent($id,$data){
            $this->db->select('title','content');
           $this->db->where('id', $id);
           $this->db->update('cms', $data);
       }
           function get_hpcontent($id=1){
        $this->db->select('*');
        $this->db->from('cms');
        $this->db->where(array('id'=>$id));
         $query =  $this->db->get();
         return $query->first_row('array');
        }

         function get_carousel(){
        $this->db->select('*');
        $this->db->from('cms');
        $this->db->where('id', 1);
         $query =  $this->db->get();

             return $query->first_row('array');
        }

		function get_carousel123(){
        $this->db->select('*');
        $this->db->from('cms');
        $this->db->where('id', 1);
         $query =  $this->db->get();

             return $query->result_array();
        }




        public function inserintev(){
				  $date = $this->input->post('date');
                    $day = date('l', strtotime($date)); // note: first arg to date() is lower-case L

            $data = array(
                    'int_date' => $this->input->post('date'),
                    'time' => $this->input->post('time'),
                    'day' => $day,
                    'req_cmt' => $this->input->post('rmk'),
                    'int_user_id' =>$this->input->post('uid'),
                    'int_job_id' =>$this->input->post('jid'),
                    'int_hr_id' =>$_SESSION['admin_id']


                );

            $sql = $this -> db -> insert('interview_sched', $data);

            if($sql){

				 $sendviaEmail = $this -> model_admin -> get_interviewsched_email($this->input->post('uid'));

                        foreach ($sendviaEmail as $var) {
                                             $email = $var['email'];
                                             $gender = $var['gender'];
                                                if($gender == "Male"){
                                                        $gender = "Mr.";
                                                }else{
                                                    $gender = "Ms.";
                                                }

                                             $surename = $var['lname'];
                                                $this->load->library('email');
                                                $config['charset'] = 'iso-8859-1';
                                                $config['wordwrap'] = TRUE;
                                                $config['mailtype'] = 'html';
                                                 $this->email->initialize($config);
                                                $this->email->from('ictsi@ugmeme.com', "ICTSI Interview Schedule");
                                                $this->email->to($email);
                                                $this->email->subject("Schudule.");
                                                $message = "<!DOCTYPE html>
<html><head>
    <!-- Latest compiled and minified CSS -->
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' integrity='sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==' crossorigin='anonymous'>

<!-- Optional theme -->
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css' integrity='sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX' crossorigin='anonymous'>

<!-- Latest compiled and minified JavaScript -->
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js' integrity='sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==' crossorigin='anonymous'></script>

</head>


<style type='text/css'>

.verifButton {
    background-color:transparent;
    height: 35px;
    width: 100px;
    border-radius: 3px;
    border: 0.5px solid #428bca;
    cursor:pointer;
    color:#000000;
    font-family:Arial;
    font-size:17px;
    text-decoration:none;
}

</style>


<div style='
            width: 40%;
            margin: auto;
            margin-top: 5%;

'>


<div class='panel panel-primary'>
  <div class='panel-body'>
    <h4>Greetings! ".$gender." ".$surename.",</h4>
    <br>


          <p><b>Congratulations!</b> Your status has been changed. Your current status now is,</p>
          <h2><font color='red'>FOR INTERVIEW</font></h2>
 <p>Here's your Interview Schedule details:</p>
          <p><b>Time: </b> $var[time]</p>
          <p><b>Date: </b> $var[int_date]</p>
          <p>Remarks/Requirements: $var[req_cmt]</p><br>

          <br><br>

          <p><b>Company Address: </b> South Access Road, Ports of Manila</p>


          <p>For inquiries, please call <b>9057929641</b> or <b>752-09-59</b></p>
          <br>
          <p>Goodluck!</p>


    <hr>
    <br>
 <img src='http://3.bp.blogspot.com/_FGYg8MzvWqQ/TUVxttfdb3I/AAAAAAAAAGc/1bVQc4K4K8M/s250/345px-ICTSI_Logo.svg.png' style='margin-top: 10%''>
                    <br>
                    <strong>HR Administrator, ICTSI</strong>



    <br>
    <br>


  </div>
</div>



</div></html>";
                            $this->email->message($message);
                                $this->email->send();



                        }//end of foreachsendviaEmail





                return true;
            }else{
                return false;
            }



        }



public function getemploymentprogress(){

      $this -> db -> select("file_applicant_transact.*,applicants.*,jobs.*,admin.*");
    $this -> db -> from('file_applicant_transact');
    $this -> db -> join("applicants", "applicants.id = file_applicant_transact.app_id");
    $this -> db -> join("jobs", "jobs.job_id = file_applicant_transact.job_id");
    $this -> db -> join("admin", "admin.admin_id = file_applicant_transact.hr_id");
    $this -> db -> where("admin.admin_id", $_SESSION['admin_id']);
	    $this -> db -> where('file_applicant_transact.file_status', 0);
    $query = $this->db->get();
    return $query->result_array();

}

public function getallfinaleval(){

    $this -> db -> select("performance_transact.*,applicants.*");
    $this -> db -> from('performance_transact');
    $this -> db -> join("applicants", "applicants.id = performance_transact.emp_id");
   // $this -> db -> join("admin", "admin.admin_id = performance_transact.coemp_id");
    $this->db->order_by('performance_transact.id','desc');
    $this -> db -> limit(5);
    //$this -> db -> where("admin.admin_id", $_SESSION['admin_id']);
    $query = $this->db->get();
    return $query->result_array();
}

public function getallfinal(){

         $this -> db -> select("applicants.fname,applicants.mname,applicants.lname,performance_transact.finalresult");
         $this -> db -> from('performance_transact');
    $this -> db -> join("applicants", "applicants.id = performance_transact.emp_id");
    $this -> db -> join("admin", "admin.admin_id = performance_transact.coemp_id");
    $this->db->order_by('performance_transact.id','desc');
    // $this -> db -> limit(5);
    //$this -> db -> where("admin.admin_id", $_SESSION['admin_id']);
    $query = $this->db->get();
    return $query->result_array();

}



public function searchevaluated($name){

    $this -> db -> select("performance_transact.*,applicants.*,admin.*");
    $this -> db -> from('performance_transact');
    $this -> db -> join("applicants", "applicants.id = performance_transact.emp_id");
    $this -> db -> join("admin", "admin.admin_id = performance_transact.coemp_id");
    $this -> db -> like("applicants.lname", $name);
    $query = $this->db->get();

    if($query->num_rows() > 0){

           return $query->result_array();
           return true;
    }else{
         $this->session->set_flashdata("noresults", "<div class='alert alert-info' role='alert'><font size='2px'>No results found.</font></div>");

            redirect('admin/viewEvaluated');


    }

}




public function getemp(){
      $this -> db -> select("job_applicant_transact.*,applicants.*,jobs.*");
    $this -> db -> from('job_applicant_transact');
    $this -> db -> join("applicants", "applicants.id = job_applicant_transact.applicant_id_tr");
    $this -> db -> join("jobs", "jobs.job_id = job_applicant_transact.job_id_tr");
    $this -> db -> where("applicants.status",3);
    $query = $this->db->get();
    return $query->result_array();
}



public function changerolelevel($appid, $jobname){
    $data =  array(
            'level' => 2,
            'position_name' => $jobname
        );
    $this -> db -> where('id', $appid);
    $sql =   $this->db->update('applicants', $data);
    if($sql){
        return true;
    }else{
        return false;
    }

}


public function getCOEMP(){
        $this ->db -> select('*');
        $this -> db -> from('c_emp');
        $query = $this->db->get();
    return $query->result_array();

}

public function sendtocoemp($empid, $coempid, $eval, $date){


        $data2 = "";

          foreach ($eval as $neweval) {
             $data2.= $neweval .",";
          }
           $length = mb_strlen($data2)-1;
           $evaluation =  mb_substr($data2,0,$length);



        foreach ($empid as $newempid) {

                $data = array(
                        'coemp_id' => $coempid,
                        'emp_id' => $newempid,
                        'perf_type' => $evaluation,
						'period' => $date

                    );
             $sql = $this -> db ->insert('performance_transact', $data);
        }

        if($sql){

                foreach ($empid as $key) {
                         $newdata = array(
                            'performance_status' => 1
                        );
                         $this ->db->where('id', $key);
                         $this->db->update('applicants', $newdata);
                     }

                               $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'><font size='2px'>successfully sent</font></div>");

            return true;
        }else{
            return false;
        }


}//end


public function getdef(){

           $this -> db -> select('*');
             $this -> db -> from('default_evalution');
             $this -> db -> where('d_eval_id', 1);
              $query = $this->db->get();
             return  $query->result_array();
}
public function getdefdate(){
       $this -> db -> select('*');
             $this -> db -> from('default_evalution');
             $this -> db -> where('d_eval_id', 1);
              $query = $this->db->get();
              return $query->result_array();



}

public function getupdateddefaulteval(){

      $var  = $this -> model_admin ->getdef();
      foreach ($var as $key) {
          $var2 = $key['default_eval'];
      }
      $slice = explode(',', $var2);
      $this->db->select('*');
      $this->db->from('evaluation');
      foreach ($slice as $key) {
         $this -> db -> or_where('eval_id', $key);
      }
      $query = $this->db->get();
    return  $query->result_array();

}






public function sendtocoempdefault($empid, $coempid, $date){



        $eval = $this -> model_admin -> getdef();





              foreach ($eval as $key) {
                  $eval2 = $key['default_eval'];


              }
              echo $eval2;


        foreach ($empid as $newempid) {

                $data = array(
                        'coemp_id' => $coempid,
                        'emp_id' => $newempid,
                        'perf_type' => $eval2,
						'period' => $date

                    );

             $sql = $this -> db ->insert('performance_transact', $data);
        }

        if($sql){

                foreach ($empid as $key) {
                         $newdata = array(
                            'performance_status' => 1
                        );
                         $this ->db->where('id', $key);
                         $this->db->update('applicants', $newdata);
                     }

                               $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'><font size='2px'>successfully sent</font></div>");

            return true;
        }else{
            return false;
        }


}


public function getallemps(){

        $this -> db ->select('*');
        $this -> db -> where('level', 2);
        $this -> db -> where('performance_status', 0);
        $this -> db -> from('applicants');
        $query = $this->db->get();
    return $query->result_array();



}


public function updatedefaultEVAL($value){
    $t=time();
    $timestamp = date("Y-m-d",$t);
    $data = array(
            'default_eval' => $value,
            'last_update' => $timestamp

        );

    $this -> db -> where('d_eval_id', 1);
    $sql = $this->db->update('default_evalution', $data);

        if($sql){
            return true;
        }else{
            return false;
        }

}





public function getappfiles(){

 $this -> db -> select("file_applicant_transact.*,applicants.*,jobs.*,admin.*");
    $this -> db -> from('file_applicant_transact');
    $this -> db -> join("applicants", "applicants.id = file_applicant_transact.app_id");
    $this -> db -> join("jobs", "jobs.job_id = file_applicant_transact.job_id");
    $this -> db -> join("admin", "admin.admin_id = file_applicant_transact.hr_id");
    $this -> db -> where("applicants.id", $this->uri->segment(3));
    $query = $this->db->get();
    return $query->result_array();



}

public function getadminid($username){
    $this-> db -> select('admin_id');
    $this -> db -> from('admin');
    $this -> db -> where('admin_username', $username);
        $query = $this->db->get();
    return $query->result_array();

}


 public function add_user($data, $username)
    {
			 $sql =  $this->db->insert('admin', $data);
                if($sql){
					   $getid = $this ->model_admin -> getadminid($username);
                        $theid = "";
                        foreach ($getid as $key) {
                            $theid = $key['admin_id'];
                        }

                                        $foldername = sha1($theid);
                                    // mkdir("C:/xampp/htdocs/ictsi/users/$foldername", 0755);
                                    $path = "/home/ugmeme/public_html/ictsi/adminusers/$foldername";
                        if(!file_exists($path)){
                                          mkdir("/home/ugmeme/public_html/ictsi/adminusers/$foldername", 0755);
                        }


                    return true;
                }else{
                    return false;
                }
    }


public function gettobeupdated($id){
    $this -> db -> select('*');
    $this -> db -> from('evaluation');
    $this -> db -> where('eval_id', $id);
      $query = $this->db->get();
    return $query->result_array();
}

public function updateEval($eval, $id){
    $data = array(
        'eval_question' => $eval
        );
    $this ->db->where('eval_id', $id);
     $sql = $this->db->update('evaluation', $data);
      if($sql){
                return true;
        }else{
            return false;
        }


}

public function getQUESTIONS($var){
        $value  = explode(",", $var);

        $this -> db -> select('*');
        $this -> db -> from('evaluation');

        foreach ($value as $key) {

                      $this -> db -> or_where('eval_id', $key);


                    }
              $q = $this -> db ->get();
                     return $q->result_array();



}



public function deleteEVALL($id){
     $this->db->where('eval_id',$id);
     $sql = $this->db->delete('evaluation');
       if($sql){
                return true;
            }else{
                return false;
            }
}


public function addnewEVALUATION($var){
    $data = array(
            'eval_question' => $var

        );

         $query = $this -> db -> insert('evaluation', $data);
        if($query){
                return true;
        }else{
            return false;
        }



}

public function changepcstat($status, $appid){

    $data = array(

                    'file_pc_status' => $status
                );
    $this -> db ->where('app_id', $appid);
    $this -> db ->where('hr_id', $_SESSION['admin_id']);
            $sql =   $this->db->update('file_applicant_transact', $data);

        if($sql){
                return true;
        }else{
            return false;
        }






}


public function changebcstat($status, $appid){

    $data = array(

            'file_birth_status' =>$status

        );
     $this -> db ->where('app_id', $appid);
    $this -> db ->where('hr_id', $_SESSION['admin_id']);
            $sql =   $this->db->update('file_applicant_transact', $data);
             if($sql){
                return true;
        }else{
            return false;
        }

}


public function changenbistat($status, $appid){

    $data = array(

            'file_nbi_status' =>$status

        );
     $this -> db ->where('app_id', $appid);
    $this -> db ->where('hr_id', $_SESSION['admin_id']);
            $sql =   $this->db->update('file_applicant_transact', $data);
             if($sql){
                return true;
        }else{
            return false;
        }

}



public function changespagibig($status, $appid){

    $data = array(

            'file_pagibig_status' =>$status

        );


     $this -> db ->where('app_id', $appid);
    $this -> db ->where('hr_id', $_SESSION['admin_id']);
            $sql =   $this->db->update('file_applicant_transact', $data);
             if($sql){
                return true;
        }else{
            return false;
        }

}







public function changesssstat($status, $appid){

    $data = array(

            'file_sss_status' =>$status

        );


     $this -> db ->where('app_id', $appid);
    $this -> db ->where('hr_id', $_SESSION['admin_id']);
            $sql =   $this->db->update('file_applicant_transact', $data);
             if($sql){
                return true;
        }else{
            return false;
        }

}








public function makehired($id, $jobid){
$date = date("Y")."/".date('m')."/".date('d');
    $data = array(

            'status' =>3,
            'date_hired' => $date

        );
    $this ->db->where('id', $id);
     $sql =   $this->db->update('applicants', $data);


     $d2 = array(
        'app_status' => 3
        );
      $this ->db->where('applicant_id_tr', $id);
      $this -> db->where('job_id_tr', $jobid);
     $sql =   $this->db->update('job_applicant_transact', $d2);


     $d3  = array(
            'file_status' => 1
        );
     $this -> db -> where('app_id', $id);
    $this -> db -> where('hr_id', $_SESSION['admin_id']);
    $this->db->update('file_applicant_transact', $d3);


       if($sql){
                return true;
        }else{
            return false;
        }
}


public function getUserdetails($id){

             $this -> db -> select('*');
             $this -> db -> from('applicants');
             $this -> db -> where('id', $id);
             $query = $this->db->get();

             return $query->result_array();

        }


     public function addjob($val){

        $work = $_REQUEST['number'] . " ". $_REQUEST['year/month'];
		$data = "";
            foreach ($val as $key) {
                    $data .= $key . ",";
                }
        $length = mb_strlen($data)-1;
        $removecomma =  mb_substr($data,0,$length);
        //$newData = explode(",", $removecomma);


        $data = array(

                'job_title' => $this->input->post('job_title'),
                'job_desc' => $this->input->post('job_desc'),

                'job_skills' => $removecomma,
                'work_area' => $this->input->post('program'),
                'work_exp' => $work,
                'highest_att' => $this->input->post('ha'),
                'exp_salary' => $this->input->post('salary'),
                'employment_type' => $this->input->post('emp_type'),

                'job_requisition_id' => $this->input->post('req_id'),
				'job_slots' => $this->input->post('job_slots'),

            );


        $query = $this -> db -> insert('jobs', $data);
        if($query){
			$this->session->set_flashdata("jobcreated", "<div class='alert alert-success' role='alert'><font size='2px'>Job Created successfully</font></div>");

                return true;
        }else{
            return false;
        }
    }


function getAllapply($jobid)
{
    $this -> db -> select("job_applicant_transact.*,applicants.*,jobs.*");
    $this -> db -> from('job_applicant_transact');
    $this -> db -> join("applicants", "applicants.id = job_applicant_transact.applicant_id_tr");
    $this -> db -> join("jobs", "jobs.job_id = job_applicant_transact.job_id_tr");
    $this -> db -> where("jobs.job_id",$jobid);
    $query = $this->db->get();

       if($query->num_rows() > 0){

                return $query->result_array();

        }else{

               $this->session->set_flashdata("noapplicants", "<div class='alert alert-info' role='alert'><font size='2px'>No applicant's applied in this job</font></div>");
               redirect("admin/hr_dashboard");

        }

}


public function checksent($app_id, $hr_id){

    $this -> db -> select('*');
    $this -> db -> from('file_applicant_transact');
    $this -> db -> where('app_id', $app_id);
    $this -> db -> where('hr_id', $hr_id);
    $query = $this->db->get();

           if($query->num_rows() > 0){
                    return false;
           }else{

                    return true;
           }

}





public function trackapplicant($jobid){
      $this -> db -> select("job_applicant_transact.*,applicants.*,jobs.*");
    $this -> db -> from('job_applicant_transact');
    $this -> db -> join("applicants", "applicants.id = job_applicant_transact.applicant_id_tr");
    $this -> db -> join("jobs", "jobs.job_id = job_applicant_transact.job_id_tr");
    $this -> db -> where("jobs.job_id",$jobid);
    $query = $this->db->get();



            if($query->num_rows() > 0){

                return $query->result_array();

        }else{

                $this->session->set_flashdata("trck", "<div class='alert alert-info' role='alert'><font size='2px'>No Results found</font></div>");
               redirect("admin/hr_dashboard");

        }



}

public function readyprogress($appid, $hr_id, $jobid){

        $data = array(

            'app_id' => $appid,
            'hr_id' => $hr_id,
            'job_id' => $jobid

            );

        $sql = $this -> db -> insert('file_applicant_transact', $data);


            if($sql){
                    return true;
            }else{

                return false;
            }



}

public function getJobslotnumber($jobid){
  $this -> db -> select('job_slots');
  $this -> db -> from('jobs');
  $this -> db -> where('job_id', $jobid);
  $query = $this->db->get();
  return $query->result_array();


}



public function changestatus($status, $id, $jobid){

            $data = array(

                    'app_status' => $status
                );
            $this->db->where('applicant_id_tr', $id);
            $this->db->where('job_id_tr', $jobid);
        $sql =   $this->db->update('job_applicant_transact', $data);

        if($sql){
                return true;
        }else{
            return false;
        }

}


public function appchangestatus($status,$id){

                $data = array(

                    'status' => $status
                );

            $this->db->where('id', $id);
        $sql =   $this->db->update('applicants', $data);


}



public function updatehiredate($id,$date){

    $data = array(
            'date_hired' => $date,
            'status' => $_POST['status']
        );
        $this->db->where('id', $id);
        $this->db->update('applicants', $data);
}


public function updatestatus($id, $status){
            $data =array(
                    'status' => $status,
                    'under_id' => $_SESSION['admin_id']
                );
        $this -> db -> where('id', $id);
        $this->db->update('applicants', $data);




}

public function deleteinterv($appid,$jobid){
        $this -> db -> where('int_user_id', $appid);
        $this -> db -> where('int_job_id', $jobid);
        $this -> db -> where('int_hr_id', $_SESSION['admin_id']);

     $sql = $this->db->delete('interview_sched');
     if($sql){
            return true;
     }else{
            return false;
     }
}



public function checkstatus($id, $jobid, $status){

    // $this -> db -> select('app_status');
    // $this -> db -> from('job_applicant_transact');
    // $this->db->where('job_id_tr', $jobid);
    // $this->db->where('applicant_id_tr', $id);


$sql =  $this -> db -> query("select app_status from job_applicant_transact where job_id_tr = $jobid and applicant_id_tr = $id");
     //$query = $this->db->get();



     if($sql == 0){
        $val = "UNDER REVIEW";
     }else if($sql == 1){
        $val = "FOR INTERVIEW";
     } else if($sql == 2){
        $val = "FOR HIRING";
    }else if($sql == 3){
        $val =  "HIRED";
     } else if($sql == 4){
        $val = "NOT QULIFIED";
     }


     if($status == $sql){


                $this->session->set_flashdata("error", "<div class='alert alert-warning' role='alert'><font size='2px'>Status is currently <b>$val</b></font></div>");

              // redirect("admin/manageEmp");

     }else{
        //return true;
     }


}




public function search($value){


    $this -> db -> select("job_applicant_transact.*,applicants.*,jobs.*");
    $this -> db -> from('job_applicant_transact');
    $this -> db -> join("applicants", "applicants.id = job_applicant_transact.applicant_id_tr");
    $this -> db -> join("jobs", "jobs.job_id = job_applicant_transact.job_id_tr");
    $this -> db -> or_like("applicants.lname", $value, 'after');
    $this -> db -> or_like("applicants.fname", $value, 'after');


     $query = $this->db->get();


            if($query->num_rows() > 0){

                return $query->result_array();

        }else{

               $this->session->set_flashdata("error", "<div class='alert alert-info' role='alert'><font size='2px'>No result's found!</font></div>");
               redirect("admin/manageEmp");

        }








}



public function getmanpower(){

        $this -> db -> select('*');
        $this -> db -> from('mp_request');
        $this -> db -> where('status', 0);
           $query = $this -> db -> get();

       return $query -> result_array();
}



     public function addjob2($val){

      //  $work = $_REQUEST['number'] . " ". $_REQUEST['year/month'];
        $data = "";
            foreach ($val as $key) {
                    $data .= $key . ",";
                }
        $length = mb_strlen($data)-1;
        $removecomma =  mb_substr($data,0,$length);
        //$newData = explode(",", $removecomma);


        $data = array(

                'job_title' => $this->input->post('job_title'),
                'job_desc' => $this->input->post('job_desc'),

                'job_skills' => $removecomma,
                'work_area' => $this->input->post('program'),
                'work_exp' => $this->input->post('number'),
                'highest_att' => $this->input->post('ha'),
                'exp_salary' => $this->input->post('salary'),
                'employment_type' => $this->input->post('emp_type'),

                'job_requisition_id' => $this->input->post('req_id'),
				  'job_slots' => $this->input->post('jobslots')
            );


        $query = $this -> db -> insert('jobs', $data);
        if($query){

                $bat = array(
                    'status' => 1
                    );
                $this ->db -> where('mp_id', $_POST['hideid']);
                $datv = $this -> db -> update('mp_request', $bat);

            $this->session->set_flashdata("jobcreated", "<div class='alert alert-success' role='alert'><font size='2px'>Job Created successfully</font></div>");

                return true;
        }else{
            return false;
        }
    }



public function getmanpower1($id){
    $this -> db -> select("*");
    $this -> db -> from('mp_request');
    $this -> db -> where('mp_id', $id);
        $query = $this->db->get();
        return $query->result_array();
}



public function getapplicants($id){
    $this -> db -> select('*');
    $this -> db -> from('applicants');
    $this -> db -> where('id', $id);
    $query = $this->db->get();

    return $query->result_array();

}



public function jobOpen(){

    $this -> db -> select('*');
    $this -> db -> from('jobs');
    $this -> db -> where('job_status', 1);
    $query = $this->db->get();

             return $query->result_array();
}




public function get_assigned($data){

    $removed = explode(",", $data);

    $this -> db -> select("*");
    $this -> db ->from("admin");


    foreach ($removed as $key) {
        $this->db->or_where("admin_id", $key);
    }


       $query = $this->db->get();

    return $query->result_array();







}


public function get_todo2(){
    $this->db->select('*');
    $this->db->from('todo_list');
    $this->db->where('status',0);
    $query = $this->db->get();
      return $query->result_array();
}



public function get_todo5($id){


    $this->db->select("todo_list.*,admin.*");
      $this -> db -> from('todo_list');
      $this -> db -> join("admin", "admin.admin_id = todo_list.assigned_to");



      $this ->db->where("todo_list.id",$id);

       $query = $this->db->get();

             return $query->result_array();
}


public function REMOVEEVAL($id){
      $this->db->where('emp_id',$id);
  //    $this->db->where('coemp_id',$_SESSION['admin_id']);
     $sql = $this->db->delete('performance_transact');
       if($sql){
                    $data = array(

                            'performance_status' => 0
                        );
                    $this->db->where('applicants.id', $id);
                  $mm =  $this->db->update('applicants', $data);
                    if($mm){
                               $this->session->set_flashdata("succ", "<div class='alert alert-success' role='alert'><font size='2px'>Successfully removed.</font></div>");
                               return true;
                    }

            }else{
                return false;
            }

}





 public function insert_todo($admin_id){





		$assigned = "";


   foreach ($this->input->post('assigned[]') as $value){

           $assigned .= $value . ",";
   }


                $length = mb_strlen($assigned)-1;
              $new =  mb_substr($assigned,0,$length);

  $data = array(
                    'title' => $this->input->post('title'),
                    'date' => $this->input->post('date'),
                    'start_time' => $this->input->post('time'),
                    'end_time' => $this->input->post('end_time'),
                    'details' => $this->input->post('details'),
                     'assigned_to' => $new,
                     'owner' => $admin_id

                );


            $sql = $this -> db -> insert('todo_list', $data);




            if($sql){
                return true;
            }else{
                return false;
            }


}

public function get_todo(){
    $this->db->order_by('id','desc');
    $this->db->limit(1);
    $query = $this->db->get('todo_list');
        return $query->first_row('array');
}

public function addskils($val){

		$data = "";
    foreach ($val as $key) {
                    $data .= $key . ",";
                }
  $length = mb_strlen($data)-1;
  $removecomma =  mb_substr($data,0,$length);
$newData = explode(",", $removecomma);

    foreach ($newData as $skills) {

                    $value = array('skill_name' =>$skills);

        $sql = $this -> db -> insert('skills', $value);

    }

                if($sql){
                return true;
            }else{
                return false;
            }


}

public function checkskills($value){

    $this ->db->where('skill_name', $value);
        $query = $this->db->get('skills');

        if($query->num_rows() == 1){
            return false;
        }else{
            return true;
        }
}



public function getappintev($var){

              $this -> db ->select('interview_sched.*,applicants.*,jobs.*');
        $this -> db ->from('interview_sched');
        $this -> db -> join('applicants', 'applicants.id = interview_sched.int_user_id');
         $this -> db -> join('jobs', 'jobs.job_id = interview_sched.int_job_id');
          $this -> db -> where('interview_sched.int_id', $var);
          $this -> db -> where('interview_sched.status', 1);
            $query = $this->db->get();
             return $query->result_array();



    }





	public function get_interviewsched(){


 $this -> db ->select('interview_sched.*,applicants.*,jobs.*');
        $this -> db ->from('interview_sched');
        $this -> db -> join('applicants', 'applicants.id = interview_sched.int_user_id');
         $this -> db -> join('jobs', 'jobs.job_id = interview_sched.int_job_id');
          // $this -> db -> where('admin.admin_id', $this->session->userdata('admin_id'));
          $this -> db -> where('interview_sched.status', 1);
            $query = $this->db->get();
             return $query->result_array();


}










public function jobOpen1(){

    $this -> db -> select('*');
    $this -> db -> from('jobs');
    //$this ->db-> limit(4,0);
    $query = $this->db->get();

             return $query->result_array();
}

public function getjobscount(){

            $this->db->select('job_id')->from('jobs');
            $query = $this->db->get();
            return $query->num_rows();
          }






public function old_get_todo($id){
    $this->db->select('*');
    $this->db->where('id',$id);

    $query = $this->db->get('todo_list');
    return $query->first_row('array');
}

public function edit_task($data,$id){
    $this->db->where('id',$id);
    $this->db->update('todo_list',$data);
}

public function delete_task($id){
        $this->db->where('id',$id);
     $sql = $this->db->delete('todo_list');
       if($sql){
                return true;
            }else{
                return false;
            }

}




public function get_todo1(){
    $this->db->select('*');
    $this->db->from('todo_list');
    $query = $this->db->get();
      return $query->result_array();
}


public function update_task_status($id,$data){
    $this->db->where('id',$id);
   $sql= $this->db->update('todo_list',$data);
      if($sql){
                return true;
            }else{
                return false;
            }

}
// END CREATE TO DO







public function close_job($data,$id){
 $data = array(
                    'job_status' => 0,
                    'archived_status' => 1
                    );

    $this->db->where('job_id',$id);
   $sql= $this->db->update('jobs',$data);
}


public function automaticClosejob($id){

  $data = array(
                     'job_status' => 0,
                     'archived_status' => 1
                     );

     $this->db->where('job_id',$id);
    $sql= $this->db->update('jobs',$data);

}

public function getjobname($id){
  $this -> db -> select('job_title');
  $this -> db -> from('jobs');
  $this -> db -> where('job_id', $id);
  $query = $this->db->get();
    return $query->result_array();


}

public function updatejobslots($id, $slot){
    $data = array(
        'job_slots' => $slot

    );
    $this -> db -> where('job_id', $id);
    $this -> db -> update('jobs', $data);

}



public function getjobskills($id){
        $this->db->select('*');
        $this->db->from('jobs');
        $this->db->where('job_id', $id);
        $query = $this->db->get();
        return $query->result_array();

}


public function sendopenedjobviaEmail($keyword){
        $this->db->select("*");
        $this->db->from('applicants');
        $this->db->like('skills', $keyword, 'both');
        $query = $this->db->get();
        return $query->result_array();


}



public function open_job($data,$id){
 $data = array(
                    'job_status' => 1,
                    'archived_status' => 0
                    );

    $this->db->where('job_id',$id);
   $sql= $this->db->update('jobs',$data);


   if($sql){
                $skill = "";
                $jobname ="";
                $jobdesc = "";

            $tempskill = $this -> model_admin -> getjobskills($id);
                foreach ($tempskill as $skillsvar) {
                        $skill = $skillsvar['job_skills'];
                        $jobname = $skillsvar['job_title'];
                        $jobdesc = $skillsvar['job_desc'];
                }

                $explodedSkills = explode(",", $skill);

                foreach ($explodedSkills as $SKILSVAR) {

                            $sendopenedjob = $this->model_admin->sendopenedjobviaEmail($SKILSVAR);

                                    foreach ($sendopenedjob as $details) {
                                                    $email = $details['email'];
                                                $this->load->library('email');
                                                $config['charset'] = 'iso-8859-1';
                                                $config['wordwrap'] = TRUE;
                                                $config['mailtype'] = 'html';
                                                 $this->email->initialize($config);
                                                $this->email->from('ictsi@ugmeme.com', "ICTSI New Opened Job");
                                                $this->email->to($email);
                                                $this->email->subject("New Opened Job.");

                                      $message = "<!DOCTYPE html>
                                                <html><head><title>New Opened Job.</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'
    integrity='sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7' crossorigin='anonymous'>


    <style>
    table, th, td {
        border-collapse: collapse;
    }
    th, td {
        padding: 10px;
    }

    </style>

    <style type='text/css'>

    .emailjob{
      top: 15%;
      position: absolute;
      left: 24.5%;
    }

    .emailjobBTN{
      background-color: transparent;
      font-family: bebas;
      letter-spacing: 2px;
      border-radius: 3px;
      border: 1px solid #428bca;
      text-transform: uppercase;
      text-align: center;
      cursor:pointer;
      color:#428bca;
      font-size: 15px;
    }

    </style>

</head>
";
$message .= "<body>

    <div class='emailjob col-md-5'>

                    <p>Good Day! $details[fname] &nbsp; $details[lname] &nbsp; Here's the  job that matches your application form:</p>

                    <table border='1' class='col-md-12' style='border: 1px solid gray; border-collapse: collapse;' rules='groups'>
                        <thead>
                            <tr>
                                <th bgcolor='black'><font color='white'>Job Description</font></th>
                                <th bgcolor='black'><font color='white'></font></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td width='90%''><font color='red'><h4><strong>$jobname</h4></strong></font>
                                    <p><font color='gray' size='2em'>$jobdesc
                                        </font>
                                    </p>

                                    <p><font color='gray' size='2em'><strong>Skills:</strong>$skill</font></p>
                                </td>
                                <td width='10%'><a href='".base_url()."main/apply'><button class='emailjobBTN col-md-12'>Apply</button></a></td>

                            </tr>


                        </tbody>
                    </table>

                    <img src='http://3.bp.blogspot.com/_FGYg8MzvWqQ/TUVxttfdb3I/AAAAAAAAAGc/1bVQc4K4K8M/s250/345px-ICTSI_Logo.svg.png' style='margin-top: 10%''>
                    <br>
                    <strong>HR Administrator, ICTSI</strong>

        </div>

</body>
</html>";
                            $this->email->message($message);
                          $this->email->send();


                                    } //end of foreach sendopenedjob



                }//end of foreach exploadedskills





    }



}



public function get_job_desc($job_id){
    $this->db->select('*');

    $this->db->where('job_id', $job_id);
    $query = $this->db->get('jobs');

   // return $query->result();
     return $query->first_row('array');
}


  public function edit_job($id,$data){
$work = $_REQUEST['number'] . " ". $_REQUEST['year/month'];


          $data = array(

                 'job_title' => $this->input->post('job_title'),
                'job_desc' => $this->input->post('job_desc'),
                'job_skills' => $this->input->post('skills'),
                'work_area' => $this->input->post('program'),
                'work_exp' =>  $this->input->post('number'),
                'highest_att' => $this->input->post('ha'),
                'exp_salary' => $this->input->post('salary'),
                'employment_type' => $this->input->post('emp_type'),
                'job_requisition_id' => $this->input->post('req_id'),
				'job_slots' => $this->input->post('job_slots')
            );
   $this->db->where('job_id',$id);
   $this->db->update('jobs',$data);
    }


    public function generatereport($date){

            $this -> db -> select("applicants.fname,applicants.mname,applicants.lname,jobs.job_title,job_applicant_transact.date_applied");
     $this -> db -> from('job_applicant_transact');
     $this -> db -> join("applicants", "applicants.id = job_applicant_transact.applicant_id_tr");
     $this -> db -> join("jobs", "jobs.job_id = job_applicant_transact.job_id_tr");
     $this -> db -> where("date_applied", $date);


       $query = $this->db->get();

    if($query->num_rows() > 0){

             $this->session->set_flashdata("generate", "<div class='alert alert-succes' role='alert'><font size='2px'> $date Reports successfully generated!</font></div>");
             return $query->result_array();
             return true;


         }else{
             return false;
         }

    }



    public function viewquestionandans($id){

            $this -> db -> select('*');
            $this -> db -> from('performance_transact');
            $this -> db -> where('emp_id', $id);
            $query = $this->db->get();
            return $query->result_array();


            if($query){
                return true;
            }else{
                return false;
            }


    }


public function getfromtodate($from, $to){

       $this -> db -> select("applicants.fname,applicants.mname,applicants.lname,jobs.job_title,job_applicant_transact.date_applied");
    $this -> db -> from('job_applicant_transact');
     $this -> db -> join("applicants", "applicants.id = job_applicant_transact.applicant_id_tr");
     $this -> db -> join("jobs", "jobs.job_id = job_applicant_transact.job_id_tr");
     $this -> db -> where("date_applied >=", $from);
      $this -> db -> where("date_applied <=", $to);


    $query = $this->db->get();

    if($query->num_rows() > 0){

            return $query->result_array();
              return true;
         }else{

             return false;

         }

}




public function getallemployees(){
    $this -> db -> select('*');
    $this -> db -> from('applicants');
    $this -> db -> where('level', 2);
    $this -> db -> limit(5);
    $query = $this->db->get();
    return $query->result_array();


}

public function deleteemp($id){
        $this -> db -> where('id', $id);
        $query = $this->db->delete('applicants');

        $this ->db ->where('app_id', $id);
         $file = $this->db->delete('file_applicant_transact');

         $this -> db -> where('int_user_id', $id);
            $interview = $this->db->delete('interview_sched');

            $this -> db -> where('applicant_id_tr', $id);
            $apply = $this->db->delete('job_applicant_transact');

              $this -> db -> where('emp_id', $id);
            $eval = $this->db->delete('performance_transact');


              $this -> db -> where('sj_app_id', $id);
            $savejobs = $this->db->delete('savejobs');

              $this -> db -> where('app_id', $id);
            $savejobs = $this->db->delete('notifications');



        if($query){
                 $this->session->set_flashdata("succDel", "<div class='alert alert-info' role='alert'><font size='2px'>Successfully deleted</font></div>");
               return true;
        }else{
             $this->session->set_flashdata("del", "<div class='alert alert-info' role='alert'><font size='2px'>something went wrong, unable to delete</font></div>");
               return false;
        }


}

public function getsearchresults($keyword){
    $this -> db -> select('*');
    $this -> db -> from('applicants');
    $this -> db -> where('level', 2);

    $this -> db -> like('lname', $keyword, "both");

    $query = $this->db->get();

    if($query->num_rows() > 0){
        return $query->result_array();
        return true;
    }else{
              $this->session->set_flashdata("nresults", "<div class='alert alert-info' role='alert'><font size='2px'>No results found.</font></div>");

        return false;
    }

}



public function getclosedjobs(){

    $this -> db -> select('*');
    $this -> db -> from('jobs');
    $this -> db -> where('job_status', 0);
    $this -> db -> where('archived_status', 0);
    $query = $this->db->get();
    return $query->result_array();
}


public function getclosedjobs2(){

    $this -> db -> select('*');
    $this -> db -> from('jobs');
    $this -> db -> where('job_status', 0);
    $this -> db -> where('archived_status', 1);
    $query = $this->db->get();
    return $query->result_array();
}










public function excel($from, $to)
    {
           $this->load->library('excel');
                $this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('reports');
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A1', 'Reports');

                $this->excel->getActiveSheet()->setCellValue('A4', 'First Name.');
                $this->excel->getActiveSheet()->setCellValue('B4', 'Middle Name');
                $this->excel->getActiveSheet()->setCellValue('C4', 'Last Name');
                $this->excel->getActiveSheet()->setCellValue('D4', 'Job Applied');
                $this->excel->getActiveSheet()->setCellValue('E4', 'Applied date');
                $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
                $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
                $this->excel->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


                //merge cell A1 until C1
                $this->excel->getActiveSheet()->mergeCells('A1:E1');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
                $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');
       for($col = ord('A'); $col <= ord('C'); $col++){
                //set column dimension
                $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                 //change the font size
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);

                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
                //retrive contries table data
              if($rs = $this->model_admin->getfromtodate($from, $to)){

               $exceldata="";
        foreach ($rs as $row){
                $exceldata[] = $row;
        }
                //Fill data
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A5');

                $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getProtection()->setSheet(true);
                $this->excel->getActiveSheet()->getProtection()->setInsertRows(true);
                $this->excel->getActiveSheet()->getProtection()->setFormatCells(true);
                $this->excel->getActiveSheet()->getProtection()->setPassword("ugmeme");
                $this->excel->getSecurity()->setLockStructure(true);
                $this->excel->getSecurity()->setLockWindows(true);

                $filename="$from-$to"."."."xlsx";//save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache

                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');

            }else{

                $this->session->set_flashdata("nodate", "<div class='alert alert-info' role='alert'><font size='2px'>No applicant's applied on $from to $to</font></div>");
                redirect('admin/hr_dashboard#generateReport');

            }

    }




    public function excel2($date)
    {


           $this->load->library('excel');
                $this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('reports');
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A1', 'Reports');
                $this->excel->getActiveSheet()->setCellValue('A4', 'First Name.');
                $this->excel->getActiveSheet()->setCellValue('B4', 'Middle Name');
                $this->excel->getActiveSheet()->setCellValue('C4', 'Last Name');
                $this->excel->getActiveSheet()->setCellValue('D4', 'Job Applied');
                $this->excel->getActiveSheet()->setCellValue('E4', 'Applied date');
                $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
                $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
                $this->excel->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                //merge cell A1 until C1
                $this->excel->getActiveSheet()->mergeCells('A1:C1');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
                $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');
       for($col = ord('A'); $col <= ord('C'); $col++){
                //set column dimension
                $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                 //change the font size
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);

                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
                //retrive contries table data
              if($rs = $this->model_admin->generatereport($date)){

               $exceldata="";
        foreach ($rs as $row){
                $exceldata[] = $row;
        }
                //Fill data
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A5');

                $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getProtection()->setSheet(true);
                $this->excel->getActiveSheet()->getProtection()->setInsertRows(true);
                $this->excel->getActiveSheet()->getProtection()->setFormatCells(true);
                $this->excel->getActiveSheet()->getProtection()->setPassword("ugmeme");
                $this->excel->getSecurity()->setLockStructure(true);
                $this->excel->getSecurity()->setLockWindows(true);

                $filename="$date"."."."xlsx";//save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache

                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');


            }else{

                $this->session->set_flashdata("nodate", "<div class='alert alert-info' role='alert'><font size='2px'>No applicant's applied on $date</font></div>");
                redirect('admin/hr_dashboard#generateReport');

            }



    }








public function generatereps(){

              $this->load->library('excel');
                $this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('reports');
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A1', 'Reports');
                $this->excel->getActiveSheet()->setCellValue('B8', 'First Name.');
                $this->excel->getActiveSheet()->setCellValue('C8', 'Middle Name');
                $this->excel->getActiveSheet()->setCellValue('D8', 'Last Name');
                $this->excel->getActiveSheet()->setCellValue('E8', 'Rating ( /5)');
                $this->excel->getActiveSheet()->setCellValue('B3', '5 - Outstanding');
                $this->excel->getActiveSheet()->setCellValue('D3', '4 - Above Average');
                $this->excel->getActiveSheet()->setCellValue('F3', '3 - Average');
                $this->excel->getActiveSheet()->setCellValue('B5', '2 - Below Average');
                $this->excel->getActiveSheet()->setCellValue('D5', '1 - Poor');

                // $this->excel->getActiveSheet()->setCellValue('E4', 'Applied date');
                $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
                $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);

                $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(40);
                $this->excel->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                //merge cell A1 until C1
                $this->excel->getActiveSheet()->mergeCells('A1:G1');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
                $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');
       for($col = ord('A'); $col <= ord('C'); $col++){
                //set column dimension
                $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                 //change the font size
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);

                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
                //retrive contries table data
              if($rs = $this->model_admin->getallfinal()){

               $exceldata="";
        foreach ($rs as $row){
                $exceldata[] = $row;
        }
                //Fill data



                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'B9');

                $this->excel->getActiveSheet()->getStyle('B8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('E8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $this->excel->getActiveSheet()->getProtection()->setSheet(true);
                $this->excel->getActiveSheet()->getProtection()->setInsertRows(true);
                $this->excel->getActiveSheet()->getProtection()->setFormatCells(true);
                $this->excel->getActiveSheet()->getProtection()->setPassword("ugmeme");
                $this->excel->getSecurity()->setLockStructure(true);
                $this->excel->getSecurity()->setLockWindows(true);

                $filename="reports"."."."xlsx";//save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache

                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');


            }else{

                $this->session->set_flashdata("noresults", "<div class='alert alert-info' role='alert'><font size='2px'>Cannot generate file report is empty.</font></div>");
                redirect('admin/viewEvaluated');

            }


}






        public function archivedjob($jobid, $jobname){
               $date =  date("Y/m/d");

                $sql = $this ->db -> query("INSERT INTO archived_jobs (a_job_id, a_job_app, a_video_link, date_archived, a_job_name)
SELECT job_id_tr, applicant_id_tr, video_link, '$date', '$jobname'  FROM job_applicant_transact WHERE job_applicant_transact.job_id_tr = $jobid ");
                        $this -> db -> select('*');
                        $this -> db -> from("job_applicant_transact");
                        $this -> db -> where('job_id_tr', $jobid);
                        $q = $this -> db ->get();





                    if($sql){

                            $stat = array(
                                    'archived_status' => 1
                                );
                            $this -> db -> where('job_id', $jobid);
                            $this -> db -> update('jobs', $stat);
                            if($q->num_rows() > 0){
                              $this->session->set_flashdata("archived", "<div class='alert alert-success' role='alert'><font size='2px'>  $jobname successfully archived.</font></div>");
                            }else{
                                $this->session->set_flashdata("archived", "<div class='alert alert-warning' role='alert'><font size='2px'>  $jobname is empty, cannot be archived.</font></div>");

                            }


                            return true;

                    }else{
                        return false;
                    }

        }






       public function insert_announcement($data){
         $this->db->insert('announcements', $data);
        }

        public function get_announcement(){
             $this -> db -> select('*');
             $this -> db -> from('announcements');

             $query = $this->db->get();

             return $query->result_array();
            }


            function update_announcement($id, $data){
                $this->db->where('announcement_id', $id);
                $this->db->update('announcements', $data);
            }

            function get_announcements($id){
                $this->db->select('*');
                $this->db->from('announcements');
                $this->db->where(array('announcement_id'=>$id));

                $query =  $this->db->get();
                 return $query->first_row('array');
        }


		public function generatereporthired($date){

                 $this -> db -> select('fname,mname,lname,position_name,date_hired');
        		 $this -> db -> from('applicants');
        		 $this -> db -> where('status', 3);
        		 $this -> db -> where('date_hired', $date);


               $query = $this->db->get();

            if($query->num_rows() > 0){

                     $this->session->set_flashdata("generate", "<div class='alert alert-succes' role='alert'><font size='2px'> $date Reports successfully generated!</font></div>");
                     return $query->result_array();
                     return true;


                 }else{
                     return false;
                 }

            }



      public function excel2hired($date)
        {


               $this->load->library('excel');
                    $this->excel->setActiveSheetIndex(0);
                    //name the worksheet
                    $this->excel->getActiveSheet()->setTitle('Hired reports');
                    //set cell A1 content with some text
                    $this->excel->getActiveSheet()->setCellValue('A1', 'Hired Reports');
                    $this->excel->getActiveSheet()->setCellValue('A4', 'First Name.');
                    $this->excel->getActiveSheet()->setCellValue('B4', 'Middle Name');
                    $this->excel->getActiveSheet()->setCellValue('C4', 'Last Name');
                    $this->excel->getActiveSheet()->setCellValue('D4', 'Position name');
                    $this->excel->getActiveSheet()->setCellValue('E4', 'Date Hired');

                    $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
                    $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
                    $this->excel->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle('E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle('D4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                    //merge cell A1 until C1
                    $this->excel->getActiveSheet()->mergeCells('A1:C1');
                    //set aligment to center for that merged cell (A1 to C1)
                    $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    //make the font become bold
                    $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
                    $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
                    $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');
           for($col = ord('A'); $col <= ord('C'); $col++){
                    //set column dimension
                    $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                     //change the font size
                    $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);

                    $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            }
                    //retrive contries table data
                  if($rs = $this->model_admin->generatereporthired($date)){

                   $exceldata="";
            foreach ($rs as $row){
                    $exceldata[] = $row;
            }
                    //Fill data
                    $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A5');

                    $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getProtection()->setSheet(true);
                    $this->excel->getActiveSheet()->getProtection()->setInsertRows(true);
                    $this->excel->getActiveSheet()->getProtection()->setFormatCells(true);
                    $this->excel->getActiveSheet()->getProtection()->setPassword("ugmeme");
                    $this->excel->getSecurity()->setLockStructure(true);
                    $this->excel->getSecurity()->setLockWindows(true);

                    $filename="$date"."."."xlsx";//save our workbook as this file name
                    header('Content-Type: application/vnd.ms-excel'); //mime type
                    header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                    header('Cache-Control: max-age=0'); //no cache

                    //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                    //if you want to save it as .XLSX Excel 2007 format
                    $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
                    //force user to download the Excel file without writing it to server's HD
                    $objWriter->save('php://output');


                }else{

                    $this->session->set_flashdata("nodate", "<div class='alert alert-info' role='alert'><font size='2px'>No applicant's applied on $date</font></div>");
                    redirect('admin/hr_dashboard#generateReport');

                }

        }


	  public function generatereporthired2($from,$to){
           $this -> db -> select('fname,mname,lname,position_name,date_hired');
           $this -> db -> from('applicants');
           $this -> db -> where("date_hired >=", $from);
            $this -> db -> where("date_hired <=", $to);
                $this -> db -> where("status", 3);

        //  $query = $this -> db ->query("select fname,mname,lname,position_name,date_hired from applicants where date_hired between '$from' and '$to' and status=3");
            $query = $this->db->get();

            if($query->num_rows() > 0){

                    return $query->result_array();
                      return true;
                 }else{

                     return false;

                 }

        }


       public function excel2hired2($from, $to)
            {
 $this->load->library('excel');
                    $this->excel->setActiveSheetIndex(0);
                    //name the worksheet
                    $this->excel->getActiveSheet()->setTitle('Hired reports');
                    //set cell A1 content with some text
                    $this->excel->getActiveSheet()->setCellValue('A1', 'Hired Reports');
                    $this->excel->getActiveSheet()->setCellValue('A4', 'First Name.');
                    $this->excel->getActiveSheet()->setCellValue('B4', 'Middle Name');
                    $this->excel->getActiveSheet()->setCellValue('C4', 'Last Name');
                    $this->excel->getActiveSheet()->setCellValue('D4', 'Position name');
                    $this->excel->getActiveSheet()->setCellValue('E4', 'Date Hired');

                    $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
                    $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
                    $this->excel->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle('E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle('D4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                    //merge cell A1 until C1
                    $this->excel->getActiveSheet()->mergeCells('A1:C1');
                    //set aligment to center for that merged cell (A1 to C1)
                    $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    //make the font become bold
                    $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
                    $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
                    $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');
           for($col = ord('A'); $col <= ord('C'); $col++){
                    //set column dimension
                    $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                     //change the font size
                    $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);

                    $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            }
                    //retrive contries table data
                  if($rs = $this->model_admin->generatereporthired2($from,$to)){

                   $exceldata="";
            foreach ($rs as $row){
                    $exceldata[] = $row;
            }
                    //Fill data
                    $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A5');

                    $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getProtection()->setSheet(true);
                    $this->excel->getActiveSheet()->getProtection()->setInsertRows(true);
                    $this->excel->getActiveSheet()->getProtection()->setFormatCells(true);
                    $this->excel->getActiveSheet()->getProtection()->setPassword("ugmeme");
                    $this->excel->getSecurity()->setLockStructure(true);
                    $this->excel->getSecurity()->setLockWindows(true);

                    $filename="reports"."."."xlsx";//save our workbook as this file name
                    header('Content-Type: application/vnd.ms-excel'); //mime type
                    header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                    header('Cache-Control: max-age=0'); //no cache

                    //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                    //if you want to save it as .XLSX Excel 2007 format
                    $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
                    //force user to download the Excel file without writing it to server's HD
                    $objWriter->save('php://output');


                }else{

                    $this->session->set_flashdata("nodate", "<div class='alert alert-info' role='alert'><font size='2px'>No applicant's applied on $date</font></div>");
                    redirect('admin/hr_dashboard#generateReport');

                }

            }





public function get_archived_applications($id){

        $this -> db ->select('archived_jobs.*,applicants.*,jobs.*');
        $this -> db ->from('archived_jobs');
        $this -> db -> join('applicants', 'applicants.id = archived_jobs.a_job_app');
        $this -> db -> join('jobs', 'jobs.job_id = archived_jobs.a_job_id');
        $this -> db -> where('jobs.job_id', $id);
        $query = $this->db->get();
        return $query->result_array();


    }

	public function get_referral(){

        $this -> db ->select('*');
        $this -> db ->from('referral_form');

        $query = $this->db->get();
        return $query->result_array();


    }

public function getcoempname($id){
  $this -> db -> select('c_e_name,c_e_lname');
  $this -> db -> from('c_emp');
  $this -> db -> where('c_emp_id', $id);
      $query = $this->db->get();

      return $query->result_array();

}






}
