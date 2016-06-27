<?php



/**
*
*/
class Model_users extends CI_Model
{



//MOBILE MODEL


public function verify_email_mobile($email){
    $code = md5(uniqid());
 $this->load->library('email');
             $config['charset'] = 'iso-8859-1';
           $config['wordwrap'] = TRUE;
         $config['mailtype'] = 'html';
                            $this -> load -> library('email');
                            $this->email->initialize($config);
                    $this->email->from('autoresponder@ugmeme.com', "ICTSI Email verification");
            $this->email->to($email);
            $this->email->subject("Verify your email address.");

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
 <img src='http://3.bp.blogspot.com/_FGYg8MzvWqQ/TUVxttfdb3I/AAAAAAAAAGc/1bVQc4K4K8M/s250/345px-ICTSI_Logo.svg.png'>

<div class='panel panel-primary'>
  <div class='panel-body'>
    <h4>Welcome ".$name.",</h4>
    <br>

    <p>Thank you for signing up to the ICTSI.</p>
    <p>Once you verify your email address, you may use it to sign in in our website. You will also receive an email if the HR Administrator
    opens job that matches your skills.</p>


    <p>Please click the button below to verify your email. Thank you!</p>

    <div class='verifButton'>
        <div class='panel panel-primary'>
            <a href='".base_url()."main/verify/$code'><button class='verifButton'><font face='Nexa Light'>Click here</font></button></a>
        </div>
    </div>
    <hr>
    <br>


    <br>
    <br>


  </div>
</div>



</div></html>";

            $this->email->message($message);
            $this->email->send();



}

//END MOBILE

     public function can_log_in()
    {
        $this ->db->where('email', $this->input->post('email'));
        $this ->db->where('password', sha1($this->input->post('password')));

        $query = $this->db->get('applicants');

        $query -> result_array();

        if($query->num_rows() == 1){


            return true;

        }else{

            return false;
        }
    }
	
	


    public function disable($job,$applicant){
        $this -> db -> select("*");
        $this -> db -> from("job_applicant_transact");
        $this -> db -> where("job_id_tr", $job);
        $this -> db -> where("applicant_id_tr", $applicant);
        $query = $this -> db -> get();

        $query -> result_array();

        if($query->num_rows() == 1){
            return true;
        }else{
            return false;
        }


    }


    public function get_interviewsched(){

        $this -> db ->select('interview_sched.*,applicants.*,jobs.*');
        $this -> db ->from('interview_sched');
        $this -> db -> join('applicants', 'applicants.id = interview_sched.int_user_id');
         $this -> db -> join('jobs', 'jobs.job_id = interview_sched.int_job_id');
          $this -> db -> where('applicants.id', $this->session->userdata('applicant_id'));
		    $this -> db -> where('interview_sched.status', 0);
		  
            $query = $this->db->get();
             return $query->result_array();


    }
	
	
	public function updatepassword($password, $code){
            $encryptedpassword = sha1($password);

            $data  = array(
                    'password' => $encryptedpassword,
                    'reset_pass' => ""
                );
            $this -> db ->where('reset_pass', $code);
            $sql = $this->db->update('applicants', $data);




            if($sql){
                return true;
            }else{
                return false;
            }

}


public function insertTempPass($temp_pass, $email){
                $data = array(
                        'reset_pass' => $temp_pass
                    );
                $this->db->where('email', $email);
                $sql = $this->db->update('applicants', $data);

                if($sql){
                        return true;
                }else{
                    return false;
                }
}


public function is_temp_pass_valid($temp_pass){
                    $this->db->where('reset_pass', $temp_pass);
                    $query = $this->db->get('applicants');
                    if($query->num_rows() == 1){
                        return true;
                    }else{
                        return false;
                    }

}



    public function savedisable($job_id){

        $this -> db -> select("*");
        $this -> db -> from("savejobs");
        $this -> db ->where('sj_job_id', $job_id);
        $this -> db ->where('sj_app_id', $this->session->userdata('applicant_id'));
         $query = $this -> db -> get();

        $query -> result_array();

        if($query->num_rows() == 1){
            return true;
        }else{
            return false;
        }


    }
	
	
	    public function checkfilestatus($id){
            $this -> db -> select('*');
            $this -> db -> from('file_applicant_transact');
            $this -> db -> where('app_id', $id);
             $query = $this->db->get();

             return $query->result_array();
    }

	
	
	
		    public function verified(){
            $this ->db->where('email', $this->input->post('email'));
        $this ->db->where('verified', 1);

        $query = $this->db->get('applicants');

        $query -> result_array();

        if($query->num_rows() == 1){


            return true;

        }else{

            return false;
        }
    }



        public function getDetails($email){

             $this -> db -> select('*');
             $this -> db -> from('applicants');
             $this -> db -> where('email', $email);
             $query = $this->db->get();

             return $query->result();

        }
		
		   public function logout($id){
                $data = array(
                            'online' => 0
                    );

                $this->db->where('id', $id);
                $this -> db -> update('applicants', $data);
        }
		
		
		
		
		
		
		public function is_code_valid($code){
                 $this->db->where('verified', $code);
                    $query = $this->db->get('applicants');
                    if($query->num_rows() == 1){
                                $data = array(
                                    'verified' => 1
                                    );
                                $this -> db ->where('verified', $code);
                            $sql = $this->db->update('applicants', $data);

                        return true;
                    }else{
                        return false;
                    }
        }







        public function insert_into_jobstransaction($data){
       if($this -> db -> insert('job_applicant_transact', $data)){
               redirect(base_url() . "main/dashboard");
            }else{
               return false;
         }

    }


  public function insertSJ($data){
        if($this -> db -> insert('savejobs', $data)){
            $this->session->set_flashdata('insertsucc', "<div class='alert alert-success' role='alert'><center><font size='2px'>Job successfully saved.</font></center></div>");

               redirect(base_url() . "main/dashboard");
            }else{

               return false;
         }

    }


public function get_job_desc($job_id){
    $this->db->select('*');
    $this->db->from('jobs');
    $this->db->where('job_id', $job_id);
    $query = $this->db->get();

   // return $query->result();
     return $query->row_array();
}

        public function add_applicant(){


        $birthday = $this->session->userdata('bdayy') ."-". $this->session->userdata('bdaym') ."-". $this->session->userdata('bdayd');
            $code = md5(uniqid());
            $fullname = $_SESSION['fname']." ".$_SESSION['lname'];



        $data = array(

                    'fname' => $_SESSION['fname'],
                    'mname' => $_SESSION['mname'],
                    'lname' => $_SESSION['lname'],
                    'state' => $_SESSION['state'],
                    'email' => $_SESSION['email'],
                    'password' => sha1($_SESSION['password']),
                    'contact' => $_SESSION['contact'],
                    'citizenship' => $_SESSION['citizenship'],
                    'religion' => $_SESSION['religion'],

                    'city_add' => $_SESSION['city'],
                    'state' => $_SESSION['state'],
                    'birthday' => $birthday,
                    'poschoice1' => $_SESSION['poschoice1'],
                    'poschoice2' => $_SESSION['poschoice2'],
                    'skills' => $_SESSION['skills'],
                    'salary' => $_SESSION['salary'],
                    'date_ava' => $_SESSION['date_ava'],
                    'reference' => $_SESSION['ref'],
                    'collegeprog' => $_SESSION['collegeprog'],
                    'verified' => $code,
                    //'sss_no' => $this->input->post('sss'),
                   // 'tin_no' => $this->input->post('tin'),
                    //'elementary' => $this->input->post('elem'),
                    //'elem_de' => $this->input->post('deelem'),
                    //'elem_inc' => $this->input->post('inclusiveelem'),
                    //'highschool' => $this->input->post('hs'),
                    //'hs_de' => $this->input->post('dehs'),
                    //'hs_inc' => $this->input->post('inclusivehs'),
                    'college' => $_SESSION['college'],
                    'college_de' => $_SESSION['college_de'],
                    'college_inc' => $_SESSION['college_inc'],

                    //'technical_courses' => $this->input->post('techcourse'),
                    //'tech_de' => $this->input->post('detechcourse'),
                    //'tech_inc' => $this->input->post('inclusivetech'),
                    //'graduate_stud' => $this->input->post('cstudies'),
                    //'graduate_de' => $this->input->post('decstudies'),
                    //'graduate_inc' => $this->input->post('inclusivecstudies'),
                    //'post_graduate' => $this->input->post('postgrad'),
                    //'post_de' => $this->input->post('depostgrad'),
                    //'post_inc' => $this->input->post('inclusivepostgrad'),
                    //'licensure_exam' => $this->input->post('license'),
                    //'date_taken' => $this->input->post('datelicense'),
                    //'rating' => $this->input->post('rating'),
                    'level' => 1


            );

   $query = $this -> db -> insert('applicants', $data);
        if($query){
             $this->load->library('email');
             $config['charset'] = 'iso-8859-1';
           $config['wordwrap'] = TRUE;
         $config['mailtype'] = 'html';
                            $this -> load -> library('email');
                            $this->email->initialize($config);
                    $this->email->from('autoresponder@ugmeme.com', "ICTSI Email verification");
            $this->email->to($_SESSION['email']);
            $this->email->subject("Verify your email address.");

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
 <img src='http://3.bp.blogspot.com/_FGYg8MzvWqQ/TUVxttfdb3I/AAAAAAAAAGc/1bVQc4K4K8M/s250/345px-ICTSI_Logo.svg.png'>

<div class='panel panel-primary'>
  <div class='panel-body'>
    <h4>Welcome ".$fullname.",</h4>
    <br>

    <p>Thank you for signing up to the ICTSI.</p>
    <p>Once you verify your email address, you may use it to sign in in our website. You will also receive an email if the HR Administrator
    opens job that matches your skills.</p>


    <p>Please click the button below to verify your email. Thank you!</p>

    <div class='verifButton'>
        <div class='panel panel-primary'>
            <a href='".base_url()."main/verify/$code'><button class='verifButton'><font face='Nexa Light'>Click here</font></button></a>
        </div>
    </div>
    <hr>
    <br>


    <br>
    <br>


  </div>
</div>



</div></html>";

            $this->email->message($message);
            $this->email->send();








                return true;
        }else{
            return false;
        }

    }



    public function getid($email){
            $this->db->select('id');
            $this->db->from('applicants');
            $this->db->where('email', $email);
            $query = $this->db->get();

             return $query->result_array();


    }
	
	 public function getonline($email){
        $this -> db -> select('online');
        $this -> db -> where('email', $email);
        $query = $this->db->get('applicants');



             return $query->result_array();
}

  public function makeitonline($email){

    $data = array(
            'online' => 1
        );

        $this -> db -> where('email', $email);

        $query = $this->db->update('applicants', $data);

}

	
	
	
	 public function skypeuser($id){
            $this -> db -> select('skypeuser');
            $this -> db -> from('applicants');
            $this -> db -> where('id', $id);
               $query = $this->db->get();

             return $query->result_array();
    }

    public function insertskype($skypeuser){
            $data = array(
                    'skypeuser' => $skypeuser
                );
            $this -> db -> where('id', $_SESSION['applicant_id']);
            $sql  = $this -> db -> update('applicants', $data);

            if($sql){
                    return true;
                }else{
                    return false;
                }


    }
	
	
	
	
	
	
	
	
	
	
	
	

    public function cancelApplication($appid,$jobid){


        $this -> db -> where("applicant_id_tr", $appid);
        $this -> db -> where("job_id_tr", $jobid);
        if($this -> db -> delete("job_applicant_transact")){
                redirect(base_url() . "main");
        }else{
            return false;
        }


    }

    public function get_jobs(){

            $this -> db ->select('*');
            $this -> db -> from('jobs');
            $this -> db -> where('job_status', 1);
            $this->db->order_by('date_added', 'DESC');
            $this->db->limit(10, 0);

             $query = $this->db->get();

             return $query->result_array();

        }


        public function getjobscount(){

            $this->db->select('job_id')->from('jobs')->where('job_status', 1);
            $query = $this->db->get();
            return $query->num_rows();
        }
		
		
		
		public function doMatch2($appid){
 $applicantresult = $this -> model_users -> getappDetails($appid);
        $applicantskill = "";
        $degree = "";
        $workingexp = "";
        $numberofskils = 0;
        $jobidss= "";
        $jobskills="";
        $pskills = "";
        $pdegree = "";
        $pworkexp = "";
        $psalary = "";

        $appdata = array();
            foreach ($applicantresult as $appdetails) {

                    $appdata  = array(
                            'applicantskill' => $appdetails['skills'],
                            'degree' => $appdetails['collegeprog'],
                            'appsal' => $appdetails['salary'],
                            'workexp' => $appdetails['working_years']

                        );
                    // $applicantskill = $appdetails['skills'];
                    // $degree = $appdetails['collegeprog'];

            }

            $theweightpercentage = $this -> model_admin ->getweightpercentage();

            foreach ($theweightpercentage as $keyweight) {
              $pskills = "0.".$keyweight['skills'];
              $pdegree = $keyweight['degree'];
              $pworkexp = "0.".$keyweight['workexp'];

              $pworkexp2 = $keyweight['workexp'];
              $psalary = "0.".$keyweight['salary'];
              $psalary2 = $keyweight['salary'];
            }



        //degree 20%
        //skills 30 %
        // expectedsalary 10%
        //working exp 40%


        $counter = 0;
         $jobskills = explode(",", $appdata['applicantskill']);
        // Skills matching
        $this -> db -> select('*');
        $this -> db -> from('jobs');

        foreach ($jobskills as $newPattern) {
             $this -> db -> or_like('job_skills', $newPattern);
             $this -> db -> where('job_slots !=', 0);
               $this -> db -> where('job_status', 1);
        }

        $sql = $this->db->get();
        $theskills = $sql -> result_array(); //eto na yung dati matching nten na mkikita na yung mga tumama skills




        foreach ($theskills as $var) {
                $cleanedskills  = explode(",",$var['job_skills']);

    // $getjobsforcollegedegree = $this -> db -> query("SELECT highest_att from jobs where job_id = $var[job_id] ");
                    $jobskillzz[] = $var['job_skills'];

                $skillsmatches = array_intersect($jobskills, $cleanedskills); //applicants and jobs skills matches

        //              echo "<pre>";
        // print_r($skillsmatches);
        // echo "</pre>";
        $numberofskils = count($cleanedskills);
        $numberofskillsmatches = count($skillsmatches);

        // echo "Skills"." ".$numberofskillsmatches."/".$numberofskils."<br>";
            $skillspercent = $numberofskillsmatches / $numberofskils*100*$pskills;
            $skills[] =$skillspercent;
            $job_title[] = $var['job_title'];
            $date_added[] = $var['date_added'];

                $jobidss .= $var['job_id'].",";




        }

        //end of skills matching

                             $length = mb_strlen($jobidss)-1;
                            $newjobids =  mb_substr($jobidss,0,$length);

                            $rjobids = explode(',', $newjobids);
                               $this ->db -> select('work_area');
                            $this -> db -> from('jobs');

                            foreach ($rjobids as $key2) {

                                $this -> db -> or_where('job_id', $key2);
                                $this -> db -> where('job_slots !=', 0);
                                  $this -> db -> where('job_status', 1);
                            }





                            $sql1 = $this->db->get();

                            foreach ($rjobids as $key34 ) {
                                $jobids[] = $key34;
                            }

                 $fe = $sql1 -> result_array(); //eto na yung dati matching nten na mkikita na yung mga tumama skills
                        $seperate = explode(',',$appdata['degree']);

                    foreach ($fe as $key123) {
                          //  $degreepercent = 0;
                        // if($seperate[1] == $key123['work_area']){
                        //     $degreepercent = $pdegree;
                        //
                        // }else{
                        //     $degreepercent = 0;
                        // }
                        if (strpos($key123['work_area'], $seperate[1]) !== false) {
                              $degreepercent = $pdegree;
                        }else{
                          $degreepercent = 0;
                        }

                                              $dpercent[] = $degreepercent;

                    }//end of dgree


                        $salaryjobids = explode(',', $newjobids);
                               $this ->db -> select('exp_salary');
                            $this -> db -> from('jobs');

                            foreach ($salaryjobids as $key2) {

                                $this -> db -> or_where('job_id', $key2);
                                $this -> db -> where('job_slots !=', 0);
                                  $this -> db -> where('job_status', 1);
                            }



                            $sql44 = $this->db->get();
                        $sal =  $sql44 -> result_array();

                        foreach ($sal as $salkey){

                                $rmvcomm = explode(",", $salkey["exp_salary"]);

                                        // foreach ($rmvcomm as $keyssss) {
                                        //     echo $keyssss[0];
                                        //     echo $keyssss[1];
                                        //     echo "<br>";
                                        // }
                                    $salarypercent = 0;
                                        // if($rmvcomm[0] <= $appdata['appsal'] && $rmvcomm[1] >= $appdata['appsal'] ){
                                        //     $salarypercent = 10;
                                        // }
                                        if($appdata['appsal'] >=  $rmvcomm[1] ){
                                            $salarypercent = $psalary2;
                                        }else{
                                            $salarypercent = $appdata['appsal'] / $rmvcomm[1]*100*$psalary;
                                        }

                                        $sallpercent[] = $salarypercent;

            //                        echo "<pre>";
            // print_r($rmvcomm);
            // echo "</pre>";
                        }


                          $workingjobids = explode(',', $newjobids);
                               $this ->db -> select('work_exp');
                            $this -> db -> from('jobs');

                            foreach ($workingjobids as $key45) {

                                $this -> db -> or_where('job_id', $key45);
                                $this -> db -> where('job_slots !=', 0);
                                $this -> db -> where('job_status', 1);
                            }


                            $sql54 = $this->db->get();
                        $workexpp =  $sql54 -> result_array();
                        $workpercent = 0;
                            foreach ($workexpp as $workey) {

                                    if($appdata['workexp'] >= $workey['work_exp']){
                                            $workpercent = $pworkexp2;
                                    }else{
                                        $workpercent = $appdata['workexp'] / $workey['work_exp']*100*$pworkexp;
                                    }

                                        $workfinalpercent[] = $workpercent;
                            }





            $datas = array(
                     $skills,
                     $dpercent,
                     $sallpercent,
                     $workfinalpercent,
                   $job_title,
                    $date_added,


                );

$c = array_map(function () {
    return array_sum(func_get_args());
}, $datas[0], $datas[1]);

$d = array_map(function () {
    return array_sum(func_get_args());
}, $datas[2], $datas[3]);

$finalpercentage = array_map(function () {
    return array_sum(func_get_args());
}, $d, $c);


   // echo "<pre>";
   //          print_r($finalpercentage);
   //          echo "</pre>";
         //   $theskills['percentage'] = $finalpercentage;
 $asd[] = $finalpercentage;
// $array = array(
//         $theskills
//     );

 $finalarray = array(
            $jobids,
            $job_title,
            $jobskillzz,
            $date_added,
            $finalpercentage



    );
            // echo "<pre>";
            // print_r($finalarray);
            // echo "</pre>";
    // foreach ($final['percent'] as $key ) {
    //     echo $key."<br>";
    // }



         
       return $theskills;
	   
	   
	
	   
    }
		
		
		
		
		

      public function doMatch($appid){

         $applicantresult = $this -> model_users -> getappDetails($appid);
        $applicantskill = "";
        $degree = "";
        $workingexp = "";
        $numberofskils = 0;
        $jobidss= "";
        $jobskills="";
        $pskills = "";
        $pdegree = "";
        $pworkexp = "";
        $psalary = "";

        $appdata = array();
            foreach ($applicantresult as $appdetails) {

                    $appdata  = array(
                            'applicantskill' => $appdetails['skills'],
                            'degree' => $appdetails['collegeprog'],
                            'appsal' => $appdetails['salary'],
                            'workexp' => $appdetails['working_years']

                        );
                    // $applicantskill = $appdetails['skills'];
                    // $degree = $appdetails['collegeprog'];

            }

            $theweightpercentage = $this -> model_admin ->getweightpercentage();

            foreach ($theweightpercentage as $keyweight) {
              $pskills = "0.".$keyweight['skills'];
              $pdegree = $keyweight['degree'];
              $pworkexp = "0.".$keyweight['workexp'];

              $pworkexp2 = $keyweight['workexp'];
              $psalary = "0.".$keyweight['salary'];
              $psalary2 = $keyweight['salary'];
            }



        //degree 20%
        //skills 30 %
        // expectedsalary 10%
        //working exp 40%


        $counter = 0;
         $jobskills = explode(",", $appdata['applicantskill']);
        // Skills matching
        $this -> db -> select('*');
        $this -> db -> from('jobs');

        foreach ($jobskills as $newPattern) {
             $this -> db -> or_like('job_skills', $newPattern);
             $this -> db -> where('job_slots !=', 0);
               $this -> db -> where('job_status', 1);
        }

        $sql = $this->db->get();
        $theskills = $sql -> result_array(); //eto na yung dati matching nten na mkikita na yung mga tumama skills




        foreach ($theskills as $var) {
                $cleanedskills  = explode(",",$var['job_skills']);

    // $getjobsforcollegedegree = $this -> db -> query("SELECT highest_att from jobs where job_id = $var[job_id] ");
                    $jobskillzz[] = $var['job_skills'];

                $skillsmatches = array_intersect($jobskills, $cleanedskills); //applicants and jobs skills matches

        //              echo "<pre>";
        // print_r($skillsmatches);
        // echo "</pre>";
        $numberofskils = count($cleanedskills);
        $numberofskillsmatches = count($skillsmatches);

        // echo "Skills"." ".$numberofskillsmatches."/".$numberofskils."<br>";
            $skillspercent = $numberofskillsmatches / $numberofskils*100*$pskills;
            $skills[] =$skillspercent;
            $job_title[] = $var['job_title'];
            $date_added[] = $var['date_added'];

                $jobidss .= $var['job_id'].",";




        }

        //end of skills matching

                             $length = mb_strlen($jobidss)-1;
                            $newjobids =  mb_substr($jobidss,0,$length);

                            $rjobids = explode(',', $newjobids);
                               $this ->db -> select('work_area');
                            $this -> db -> from('jobs');

                            foreach ($rjobids as $key2) {

                                $this -> db -> or_where('job_id', $key2);
                                $this -> db -> where('job_slots !=', 0);
                                  $this -> db -> where('job_status', 1);
                            }





                            $sql1 = $this->db->get();

                            foreach ($rjobids as $key34 ) {
                                $jobids[] = $key34;
                            }

                 $fe = $sql1 -> result_array(); //eto na yung dati matching nten na mkikita na yung mga tumama skills
                        $seperate = explode(',',$appdata['degree']);

                    foreach ($fe as $key123) {
                          //  $degreepercent = 0;
                        // if($seperate[1] == $key123['work_area']){
                        //     $degreepercent = $pdegree;
                        //
                        // }else{
                        //     $degreepercent = 0;
                        // }
                        if (strpos($key123['work_area'], $seperate[1]) !== false) {
                              $degreepercent = $pdegree;
                        }else{
                          $degreepercent = 0;
                        }

                                              $dpercent[] = $degreepercent;

                    }//end of dgree


                        $salaryjobids = explode(',', $newjobids);
                               $this ->db -> select('exp_salary');
                            $this -> db -> from('jobs');

                            foreach ($salaryjobids as $key2) {

                                $this -> db -> or_where('job_id', $key2);
                                $this -> db -> where('job_slots !=', 0);
                                  $this -> db -> where('job_status', 1);
                            }



                            $sql44 = $this->db->get();
                        $sal =  $sql44 -> result_array();

                        foreach ($sal as $salkey){

                                $rmvcomm = explode(",", $salkey["exp_salary"]);

                                        // foreach ($rmvcomm as $keyssss) {
                                        //     echo $keyssss[0];
                                        //     echo $keyssss[1];
                                        //     echo "<br>";
                                        // }
                                    $salarypercent = 0;
                                        // if($rmvcomm[0] <= $appdata['appsal'] && $rmvcomm[1] >= $appdata['appsal'] ){
                                        //     $salarypercent = 10;
                                        // }
                                        if($appdata['appsal'] >=  $rmvcomm[1] ){
                                            $salarypercent = $psalary2;
                                        }else{
                                            $salarypercent = $appdata['appsal'] / $rmvcomm[1]*100*$psalary;
                                        }

                                        $sallpercent[] = $salarypercent;

            //                        echo "<pre>";
            // print_r($rmvcomm);
            // echo "</pre>";
                        }


                          $workingjobids = explode(',', $newjobids);
                               $this ->db -> select('work_exp');
                            $this -> db -> from('jobs');

                            foreach ($workingjobids as $key45) {

                                $this -> db -> or_where('job_id', $key45);
                                $this -> db -> where('job_slots !=', 0);
                                $this -> db -> where('job_status', 1);
                            }


                            $sql54 = $this->db->get();
                        $workexpp =  $sql54 -> result_array();
                        $workpercent = 0;
                            foreach ($workexpp as $workey) {

                                    if($appdata['workexp'] >= $workey['work_exp']){
                                            $workpercent = $pworkexp2;
                                    }else{
                                        $workpercent = $appdata['workexp'] / $workey['work_exp']*100*$pworkexp;
                                    }

                                        $workfinalpercent[] = $workpercent;
                            }



            $datas = array(
                     $skills,
                     $dpercent,
                     $sallpercent,
                     $workfinalpercent,
                   $job_title,
                    $date_added,


                );
               

$c = array_map(function () {
    return array_sum(func_get_args());
}, $datas[0], $datas[1]);

$d = array_map(function () {
    return array_sum(func_get_args());
}, $datas[2], $datas[3]);

$finalpercentage = array_map(function () {
    return array_sum(func_get_args());
}, $d, $c);



   // echo "<pre>";
   //          print_r($finalpercentage);
   //          echo "</pre>";
         //   $theskills['percentage'] = $finalpercentage;
 $asd[] = $finalpercentage;
// $array = array(
//         $theskills
//     );

//echo "<pre>";
//print_r($finalpercentage);
//echo "</pre>";
//echo "<br>";
//echo "<pre>";
//print_r($appdata);
//echo "</pre>";
//echo "<br>";
//echo "<pre>";
//print_r($theskills);
//echo "</pre>";

 $finalarray = array(
            $jobids,
            $job_title,
            $jobskillzz,
            $date_added,
            $finalpercentage



    );
            // echo "<pre>";
            // print_r($finalarray);
            // echo "</pre>";
    // foreach ($final['percent'] as $key ) {
    //     echo $key."<br>";
    // }



          return $asd;
       return $theskills;
    }



    public function getappDetails($Id){
        $this -> db -> select('*');
        $this -> db -> from('applicants');
        $this -> db -> where('id', $Id);
        $query = $this->db->get();

             return $query->result_array();

    }

    public function doskills($id){
         $applicantresult = $this -> model_users -> getappDetails($id);
               $appdata = array();

               foreach ($applicantresult as $appdetails) {
               $appdata  = array(
                            'applicantskill' => $appdetails['skills']

                        );
             }

                  $jobskills = explode(",", $appdata['applicantskill']);
        // Skills matching
        $this -> db -> select('*');
        $this -> db -> from('jobs');
        foreach ($jobskills as $newPattern) {
             $this -> db -> or_like('job_skills', $newPattern);
			$this -> db -> where('job_slots !=', 0);
			 $this -> db -> where('job_status', 1);
        }


        $sql = $this->db->get();
        return $sql -> result_array(); //eto na yung dati matching nten na mkikita na yung mga tumama skills




    }


    public function getSkills(){
        $this -> db -> select('*');
        $this -> db -> from('skills');
        $sql = $this -> db ->get();
        return $sql ->result_array();

    }


    public function search_jobs($job){

        $this->db->select('*');
        $this->db->from('jobs');
        $this->db->like('job_title',$job,'both');
        $query = $this->db->get();
        if($query->num_rows()!=0){
                return $query->result_array();
                return true;
        }else{
            return false;
        }
    }


    public function getPosition(){


        $this -> db -> select('job_title');
        $this -> db -> from('jobs');
        $sql = $this ->db->get();
        return $sql ->result_array();
    }


    public function checklostemail(){


        $this ->db->where('email', $this->input->post('femail'));
         $query = $this->db->get('applicants');

        $query -> result_array();

        if($query->num_rows() == 1){


            return true;

        }else{

            return false;
        }


    }



public function get_states(){
        $this->db->select('*');
        $this->db->from('tbl_state');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_city($id){
        $this->db->select('*');
        $this->db->from('tbl_city');
        $this->db->where('state_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }





        public function get_FAQS(){

            $this -> db -> select('*');
            $this -> db -> from('faqs');
            $this->db->order_by('date_posted', 'DESC');

            $sql = $this -> db ->get();

            return $sql->result_array();

        }












                public function convert_datetime($str) {

                          list($date, $time) = explode(' ', $str);
                         list($year, $month, $day) = explode('-', $date);
                         list($hour, $minute, $second) = explode(':', $time);
                          $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
                         return $timestamp;
                     }


                    public function makeAgo($timestamp){

                            $difference = time() - $timestamp;
                            $periods = array("sec", "min", "hr", "day", "week", "month", "year", "decade");
                            $lengths = array("60","60","24","7","4.35","12","10");
                            for($j = 0; $difference >= $lengths[$j]; $j++)
                                $difference /= $lengths[$j];
                                $difference = round($difference);
                            if($difference != 1) $periods[$j].= "s";
                                $text = "$difference $periods[$j] ago";
                                return $text;
                     }
					 
					 
					 
			 
		  public function getuserintervandemail($appid){
      $this -> db ->select('interview_sched.*,applicants.*,jobs.*');
      $this -> db ->from('interview_sched');
      $this -> db -> join('applicants', 'applicants.id = interview_sched.int_user_id');
       $this -> db -> join('jobs', 'jobs.job_id = interview_sched.int_job_id');
        $this -> db -> where('applicants.id', $appid);

          $query = $this->db->get();
           return $query->result_array();
    }
	
	
	public function getappname($id){
        $this -> db -> select('*');
        $this -> db-> from('applicants');
        $this -> db -> where('id', $id);
        $sql = $this -> db ->get();

        return $sql->result_array();
    }

    public function getjobname($id){
        $this -> db -> select('*');
        $this -> db -> from('jobs');
        $this -> db -> where('job_id', $id);
        $sql = $this -> db ->get();

        return $sql->result_array();

    }

	
	
	public function getskypeid($id){
            $this -> db -> select('skypeuser');
            $this -> db -> from('applicants');
            $this -> db -> where('id', $id);
            $sql = $this -> db ->get();

            return $sql->result_array();

    }

public function response($jobid){
    if($_POST['respond'] == 1){
        $data = array(

            'app_status' => $this->input->post('respond')
        );

    $this -> db -> where('job_id_tr', $jobid);
    $this -> db -> where('applicant_id_tr', $this->session->userdata('applicant_id'));

    if($this -> db -> update('job_applicant_transact', $data)){

            $data2 = array(
                    'status' => 1,
                    'response' => 1
                );
            // $this -> db -> where('int_job_id', $jobid);
            // $this -> db -> where('int_user_id', $_SESSION['applicant_id']);
            $this -> db -> where('int_id', $_POST['intevID']);
            $this -> db -> update('interview_sched', $data2);

                     $datainsertnotifss = array(

                            'receiver_id' => $_SESSION['applicant_id'],
                            'type_id' => 1,
                            'sender_id' => $_POST['hrid']
                        );
                    $j = $this -> db ->insert('notifications', $datainsertnotifss);


                    $getuserdetails = $this -> model_users ->getuserintervandemail($_SESSION['applicant_id']);
                    foreach ($getuserdetails as $var) {

                      $email = $var['email'];
                      $gender = $var['gender'];
                         if($gender == "Male"){
                                 $gender = "Mr.";
                         }else{
                             $gender = "Ms.";
                         }

                      $surename = $var['lname'];
					    $fullname = $var['fname']." ".$var['mname']." ".$var['lname'];

                      
                         $this->load->library('email');
                         $config['charset'] = 'iso-8859-1';
                         $config['wordwrap'] = TRUE;
                         $config['mailtype'] = 'html';
                          $this->email->initialize($config);
                         $this->email->from('ictsi@ugmeme.com', "ICTSI Interview Schedule");
                         $this->email->to($email);
                         $this->email->subject("Interview Schudule confirmation.");
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
              <h4>Greetings! ".$gender." ".$surename.", </h4>
              <br>

              <p>Your Interview Schedule for the job <strong>$var[job_title]</strong> is now set.</p><br>
              <p>Date: $var[int_date]</p><br>
              <p>Time: $var[time]</p><br>
			  <p>Day: $var[day]</p><br>
              <p>Remarks/Requirements: $var[req_cmt]</p><br>


               <p>Goodluck!</p><br>
			   
			   
			  <p>For inquiries, please call <b>9057929641</b> or <b>752-09-59</b></p>
				<br>
       
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
		 
		 
		 
		 
         $this->email->from('ictsi@ugmeme.com', "ICTSI Application");
         $this->email->to($email);
         $this->email->subject("Job Application");
         $message1 = "<!DOCTYPE html>
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
<h4>Greetings! ".$fullname.",</h4>
<br>

<p><b>Congratulations!</b> Your status has been changed in <strong>$var[job_title]</strong>. Your current status now is,</p>
         <h2><font color='red'>FOR INTERVIEW</font></h2>



         <p><b>Company Address: </b> South Access Road, Ports of Manila</p>


                   <p>For inquiries, please call <b>9057929641</b> or <b>752-09-59</b></p>
                   <br>


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


$this->email->message($message1);
    $this->email->send();







                    }//end of foreach

                        redirect('main/interviewsched');
          }else{
                       return false;
    }


    }//end of if pag 1

    if($_POST['respond'] == 5){

                $data3 = array(

                            'status' => 1,
                            'response' => $_POST['respond']
                    );
            //   $this -> db -> where('int_job_id', $jobid);
            // $this -> db -> where('int_user_id', $_SESSION['applicant_id']);
                $this -> db -> where('int_id', $_POST['intevID']);
            $dd = $this -> db -> update('interview_sched', $data3);



            if($dd){

                    $datainsertnotifs = array(

                            'receiver_id' => $_POST['hrid'],
                            'type_id' => 2,
                            'sender_id' => $_SESSION['applicant_id']
                        );
                    $j = $this -> db ->insert('notifications', $datainsertnotifs);
                        if($j){
                            redirect('main/interviewsched');
                        }

            }


    }




}
	
	public function getskillsz(){
		$this -> db -> select('skills');
		$this -> db -> from('applicants');
		$this -> db -> where('id', $_SESSION['applicant_id']);
		  $query = $this->db->get();
		   return $query->result_array();
	}	

// UPDATE PROFILE //
public function update_skills($skills){
    $data = array (
        'skills'=>$skills);
    
     $this->db->where('id',$_SESSION['applicant_id']);
    $this->db->update('applicants',$data);

}

public function appSkills(){

    $id = $_SESSION['applicant_id'];

    // $this -> db -> select('skills_applicant_transact.*,applicants.email,skills.*');
    // $this -> db -> from('skills_applicant_transact');
    // $this -> db -> join('applicants', 'applicants.id = skills_applicant_transact.applicant_id_tr');
    // $this -> db -> join('skills', 'skills.skill_id = skills_applicant_transact.skills_id_tr');
    // $this -> db -> where('applicants.id', $id);
    // $query = $this->db->get();
    // return $query->result_array();


     $this -> db -> select('skills');
     $this -> db -> from('applicants');
     $this -> db -> where('id', $id);
    $query = $this->db->get();


    if($query->num_rows() == 1){

        return $query->result_array();

            return true;

        }else{

            return false;
        }







}

public function update_education($data,$email){
    $data = array(

    'highest_att' => $this->input->post('ha'),
    'college' => $this->input->post('college'),
    'college_de' => $this->input->post('college_de'),
    'college_inc' => $this->input->post('college_inc'),
    'collegeprog' => $this->input->post('collegeprog')

    );
   $this->db->from('applicants');
   $this->db->where('email',$email);
   $this->db->update('applicants',$data);
}
public function get_education($a_id){
    $this->db->select('*');
    $this->db->from('applicants');
    $this->db->where('id',$a_id);
    $query = $this->db->get();
    return $query->result_array();
}

public function update_addinfo($data,$email){
    $data = array(

    'salary' => $this->input->post('salary')

        );
     $this->db->from('applicants');
   $this->db->where('email',$email);
   $this->db->update('applicants',$data);
}
public function update_aboutme($data,$email){

        $bday = $_POST['bdayy']. "-". $_POST['bdaym']. "-". $_POST['bdayd'];
        $data = array(

            'fname' => $this->input->post('fname'),
            'mname' => $this->input->post('mname'),
            'lname' => $this->input->post('lname'),
            'gender' => $this->input->post('gender'),
            'citizenship' => $this->input->post('citizenship'),
            'religion' => $this->input->post('religion'),
            'height' => $this->input->post('height'),
            'weight' => $this->input->post('weight'),
            'city_add' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'contact' => $this->input->post('contact'),
            'email' => $this->input->post('email'),
            'password' => sha1($this->input->post('password')),
            'birthday' => $bday
         );

    $this->db->from('applicants');
   $this->db->where('email',$email);
   $this->db->update('applicants',$data);
}


public function insertupload($img){


    $updated = array('file_pc' => $img);
    $this->db->select('file_pc');
        $this->db->where('app_id', $this->session->userdata('applicant_id'));
       $this->db->where('hr_id', $this->session->userdata('under_id'));

     $this->db->update('file_applicant_transact', $updated);


}


public function insertupload1($img){


    $updated = array('file_birth' => $img);
    $this->db->select('file_birth');
        $this->db->where('app_id', $this->session->userdata('applicant_id'));
       $this->db->where('hr_id', $this->session->userdata('under_id'));

     $this->db->update('file_applicant_transact', $updated);


}


public function insertsss($img){


    $updated = array('file_sss' => $img);
    $this->db->select('file_sss');
        $this->db->where('app_id', $this->session->userdata('applicant_id'));
       $this->db->where('hr_id', $this->session->userdata('under_id'));

     $this->db->update('file_applicant_transact', $updated);


}


public function insertpagibig($img){


    $updated = array('file_pagibig' => $img);
    $this->db->select('file_pagibig');
        $this->db->where('app_id', $this->session->userdata('applicant_id'));
       $this->db->where('hr_id', $this->session->userdata('under_id'));

     $this->db->update('file_applicant_transact', $updated);


}


public function insertnbi($img){


    $updated = array('file_nbi' => $img);
    $this->db->select('file_nbi');
        $this->db->where('app_id', $this->session->userdata('applicant_id'));
       $this->db->where('hr_id', $this->session->userdata('under_id'));

     $this->db->update('file_applicant_transact', $updated);


}





public function getpic(){
    $this->db->select('profilepic');
    $this->db->from('applicants');
    $this->db->where('id', $_SESSION['applicant_id']);
    $query =  $this->db->get();
    return $query->result_array();
}

 public function addSSS($state, $city){

            $stateData = array(
                    'state_name' => $state
                );
            $this -> db -> insert('tbl_state', $stateData);



            $arrayofcity = explode(',', $city);

            foreach ($arrayofcity as $newcity) {

                $cityData = array(
                    'state_id' => $state,
                    'city_name' => $newcity
                );

                $sql = $this->db->insert('tbl_city', $cityData);
            }

        if($sql){
                return true;
        }else{
            return false;
        }

    }






    function update_profpic($img){
        $foldername = sha1($_SESSION['applicant_id']);

        $this -> load -> helper('file');
        $image = "";
        $vardmp = $this -> model_users ->getpic();
        foreach ($vardmp as $key23) {
            $image = $key23['profilepic'];
        }



    
    //delete_files("images/profilepic/".$query->profilepic);

    //////////////////////
    $updated = array('profilepic' => $img);
    $this->db->select('profilepic');
    $this->db->where('id', $_SESSION['applicant_id']);
    $this->db->update('applicants', $updated);




    }



    function get_profpic($id){
        $this->db->select('profilepic');
        $this->db->from('applicants');
        $this->db->where(array('id'=>$id));
         $query =  $this->db->get();
         return $query->first_row('array');
    }



    public function getInterviewNotif(){

            $this -> db ->select('int_user_id');
            $this ->db -> from('interview_sched');
            $this -> db -> where('int_user_id', $this->session->userdata('applicant_id'));
            $query = $this->db->get();
            return $query->num_rows();


    }

    public function getSavejobs(){

               $this -> db -> select('savejobs.*,applicants.*,jobs.*');
               $this -> db -> from('savejobs');
               $this -> db -> join('applicants', 'applicants.id = savejobs.sj_app_id');
               $this -> db -> join('jobs', 'jobs.job_id = savejobs.sj_job_id');
               $this -> db -> where('applicants.id', $this->session->userdata('applicant_id'));
               $this -> db -> where('jobs.job_status', 1);
               $query = $this->db->get();
                return $query->result_array();

    }


    public function get_applicant_details($id){
        $this->db->select('*');
        $this->db->from('applicants');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->first_row('array');
    }



    public function get_applications(){

        $this -> db ->select('job_applicant_transact.*,applicants.*,jobs.*');
        $this -> db ->from('job_applicant_transact');
        $this -> db -> join('applicants', 'applicants.id = job_applicant_transact.applicant_Id_tr');
         $this -> db -> join('jobs', 'jobs.job_id = job_applicant_transact.job_id_tr');
          $this -> db -> where('applicants.id', $this->session->userdata('applicant_id'));
    $query = $this->db->get();
    return $query->result_array();


    }


    public function delete_sjobs($id){
        $this->db->select('savejobs_id');
        $this->db->from('savejobs');
        $this->db->where('sj_job_id',$id);
        $this->db->where('sj_app_id',$this->session->userdata('applicant_id'));

       $this->db->delete('savejobs');
    }
	
	
	
	
	public function getWork_area($value){
            $this -> db -> select('*');
            $this -> db -> from('jobs');
            $this -> db ->or_like('work_area', $value, 'front');
             $query = $this->db->get();
             return $query->result_array();


    }

    public function getjobstobesent($id){
            $this -> db -> select('*');
            $this -> db -> from('jobs');
            $this -> db -> where('job_id', $id);
                 $query = $this->db->get();
             return $query->result_array();
    }


        public function sendmail($jobid,$emails,$fname,$lname){

            $var = $this->model_users->getjobstobesent($jobid);

            foreach ($var as $details) {

                foreach ($emails as $key) {

                            $email = $key;
                                                $this->load->library('email');
                                                $config['charset'] = 'iso-8859-1';
                                                $config['wordwrap'] = TRUE;
                                                $config['mailtype'] = 'html';
                                                 $this->email->initialize($config);
                                                $this->email->from('ictsi@ugmeme.com', "Shared job details");
                                                $this->email->to($email);
                                                $this->email->subject("ICTSI Job.");

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

                           <p>Good Day! $key:</p>

                    <p>$fname $lname shared this job to your email:</p>

                    <li>
      <p class='Management' />

      <h3><font color='red'>$details[job_title]</font></h3>
      <p>Category:  $details[work_area]</p>
      <p>$details[exp_salary]</p>
        <p>Working experience: $details[work_exp]</p>
      <p>Employment type: $details[employment_type]</p>
      <p>Date added: $details[date_added]</p>
      <br>
         $details[job_desc];

      ?>
      <p><a href='".base_url()."main/apply'> role='button'>Apply</a>   <br>

      </li>

                    <img src='http://3.bp.blogspot.com/_FGYg8MzvWqQ/TUVxttfdb3I/AAAAAAAAAGc/1bVQc4K4K8M/s250/345px-ICTSI_Logo.svg.png' style='margin-top: 10%''>
                    <br>
                    <strong>HR Administrator, ICTSI</strong>

        </div>

</body>
</html>";
                            $this->email->message($message);
                          $this->email->send();

                      }

            }

    }
	
	

	
	
	
	
	
	
	 public function get_announcement(){
             $this -> db -> select('*');
             $this -> db -> from('announcements');

             $query = $this->db->get();

             return $query->result_array();
            }

	
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

