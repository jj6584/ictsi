<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

            public function index(){

                $this -> login();
            }

          

              public function approvereq(){
                                    $this -> load ->model('model_admin');
                                       $this -> load ->model('model_users');
              $this->load->view('admin/approverequest.php');
              }

              public function manpower_req(){
              $this -> load ->model('model_admin');
              $this->load->view('admin/see_all_manpower_request');
              }
            public function profile(){
              $this -> load ->model('model_admin');
              $this->load->view('admin/admin_profile');
            }


            public function edit_profile(){
                $this -> load ->model('model_admin');
              $this->load->view('admin/admin_editprofile');
            }

            public function deleteuser(){

                $this -> load ->model('model_admin');
                if($this->model_admin->deleteemp($_POST['empid'])){
                    redirect("admin/manageEmp");
                }else{
                  redirect("admin/manageEmp");
                }


            }

            public function searcheemp(){
              echo $_POST['tobesearch'];
               $this -> load ->model('model_admin');

              $this -> load -> library('form_validation');
              $this->form_validation->set_rules('tobesearch', 'Search bar', 'required|trim');


                if($this->form_validation->run()){

                              $data['fetch'] = $this -> model_admin -> getsearchresults($_POST['tobesearch']);

                              $this -> load -> view('admin/hr_manage_empRecord', $data);


                  }else{
      $this->session->set_flashdata("searchempty", "<div class='alert alert-danger' role='alert'><font size='2px'>Searchbox is empty.</font></div>");
                      $this -> load -> view('admin/hr_manage_empRecord');

                  }


            }

	    public function activitylist(){

              $this -> load ->model('model_admin');

              $this->load->view('admin/hr_asst');

            }


            public function update_default(){

              $this -> load ->model('model_admin');
              $this->load->view('admin/update_default');

            }

            public function removeeval(){

              $this -> load ->model('model_admin');

              $id = $this->uri->segment(3);

                    if($this->model_admin->REMOVEEVAL($id)){
                            redirect('admin/viewEvaluated');
                    }else{
                                       $this->session->set_flashdata("wentwrong", "<div class='alert alert-danger' role='alert'><font size='2px'>Something went wrong!</font></div>");

                    }
            }


            public function searchevaluated(){

              $this -> load ->model('model_admin');
              $this -> load -> library('form_validation');
              $this->form_validation->set_rules('srch', 'Search bar', 'required|trim');

              if($this->form_validation->run()){
                    $data['fetch'] = $this->model_admin->searchevaluated($_POST['srch']);

                          $this -> load -> view('admin/viewevaluated', $data);


              }else{
                 $this->session->set_flashdata("empty", "<div class='alert alert-danger' role='alert'><font size='2px'>Search box is empty</font></div>");

                  redirect('admin/viewEvaluated');
              }

            }


            public function viewsummary(){
              $appid = $this->uri->segment(3);

                 $this -> load -> model('model_admin');



               //$this->model_admin->viewquestionandans($appid);

                          $this -> load -> view('admin/viewsummary');








            }


            public function viewEvaluated(){

              $this -> load -> model('model_admin');
              $this -> load -> view('admin/viewevaluated');

            }

            public function checkpick(){
              $this -> load ->library('form_validation');
              $this->load->model('model_admin');

                $this->form_validation->set_rules('pick', 'Evaluation', 'required');

              if($this->form_validation->run()){
                            if($_POST['pick'] == 1){


                                  $this->session->set_flashdata("custom", "");

                                  redirect("admin/send_PEF");



                            }else{


                                  $this->session->set_flashdata("standard", "");

                                  redirect("admin/send_PEF");

                            }

                      }else{

                 $this->session->set_flashdata("empty", "<div class='alert alert-danger' role='alert'><font size='2px'>Please choose type of evaluation</font></div>");

                          $this->load->view('admin/hr_send_PEF');
                      }

            }


            public function login(){

                $this -> load -> view('admin/admin');
            }



			  public function changeweight(){
    // echo $_POST['skills'];
    // echo $_POST['degree'];
    // echo $_POST['salary'];
    // echo $_POST['workexp'];
    $this -> load ->library('form_validation');
    $this -> load -> model('model_admin');
    $this -> form_validation -> set_rules('skills', 'skills', 'required');
    $this -> form_validation -> set_rules('degree', 'degree', 'required');
    $this -> form_validation -> set_rules('salary', 'salary', 'required');
    $this -> form_validation -> set_rules('workexp', 'workexp', 'required');

    if($this->form_validation->run()){
      $total = $_POST['skills'] + $_POST['degree'] + $_POST['salary'] +$_POST['workexp'];
        if($total == 100){
            $this -> model_admin -> updatepercentageweight();
          $this->session->set_flashdata("changesuccu", "<div class='alert alert-success' role='alert'><font size='2px' align='center'>Successfully updated.</font></div>");
          redirect('admin/job_management#weightpercentage');
        }else{
          $this->session->set_flashdata("not100", "<div class='alert alert-warning' role='alert'><font size='2px' align='center'>New percent is $total%, It must be a total of 100%.</font></div>");
          redirect('admin/job_management#weightpercentage');
        }
    }else{
      $this->session->set_flashdata("fillupfields", "<div class='alert alert-danger' role='alert'><font size='2px' align='center'>Some fields are empty.</font></div>");
      redirect('admin/job_management#weightpercentage');
    }


  }



                public function manage_hpcontent(){
              $this->load->model('model_admin');
              $data['contents']= $this->model_admin->get_hpcontent($id=1);
              $this->load->view('admin/manage_hpcontent',$data);
            }

            public function job_management(){
              $this -> load -> model('model_users');
              $this -> load -> model('model_admin');

                    $this -> load -> view('admin/job_management');
            }

            public function manage_footer($id=1){

              $this->load->model('model_admin');
              $data['posts']= $this->model_admin->get_footer($id);
              $this->load->view('admin/Manage_Footer', $data);
            }

            public function manage_carousel(){
              $this->load->model('model_admin');
              $data['photo']= $this->model_admin->get_carousel();
                $this->session->set_flashdata('asd', "<div class='alert alert-success' role='alert'><center><font size='2px'>You have successfully uploaded a new image</font></center></div>");

            $this->load->view('admin/carousel',$data ,array('error' => ' ' ));
              //  $this ->load ->view('admin/carousel');
            }

            public function send_PEF(){

              $this -> load -> model('model_admin');
              $this -> load ->view('admin/hr_send_PEF');
            }


            public function changelevel(){

              $this->load->model('model_admin');
              $this ->load->library('form_validation');

               $this->form_validation->set_rules('levelid', 'Level', 'required');
               if($this->form_validation->run()){

                    if($this->model_admin->changerolelevel($_POST['appID'], $_POST['jobname'])){
                          redirect('admin/hr_dashboard');
                    }
               }else{


               }


            }


            public function fromto(){
                $this->load->library('form_validation');
                $this->load->model('model_admin');
                 $this->form_validation->set_rules('datefrom', 'Date from', 'required');
                $this->form_validation->set_rules('dateto', 'Date to', 'required');

             if($this->form_validation->run()){

                  if($this->model_admin->excel($_POST['datefrom'], $_POST['dateto'])){
                    $this->session->set_flashdata("nodate", "<div class='alert alert-success' role='alert'><font size='2px'>Report Generated successfully!</font></div>");

                    redirect('admin/hr_dashboard#generateReport');
                  }else{


                  }


              }else{

                    $this->session->set_flashdata("nodate", "<div class='alert alert-info' role='alert'><font size='2px'>Please select date</font></div>");
                     redirect('admin/hr_dashboard#generateReport');


              }





            }









            public function specificdate(){
              $this->load->model('model_admin');
              $this->load->library('form_validation');
                 $this->form_validation->set_rules('specific', 'Date from', 'required');
                  if($this->form_validation->run()){

                            if($this->model_admin->excel2($_POST['specific'])){
                                   redirect('admin/hr_dashboard#generateReport');

                            }

                    }else{

                             $this->session->set_flashdata("nodate", "<div class='alert alert-info' role='alert'><font size='2px'>Please select date</font></div>");
                                      redirect('admin/hr_dashboard#generateReport');


                    }

            }


            public function generateReps(){
                $empid= $this->uri->segment(3);
                $this->load->model('model_admin');

                $emp = $this -> model_admin ->getreports($empid);

                echo "<pre>";
                print_r($emp);
                echo "</pre>";

                foreach ($emp as $var) {
                    $this -> model_admin -> generateperformancereport($var['perf_type'], $var['evaluated']);
                }


            }





            public function validate_skills(){

                $this->load->model('model_admin');
                $this->load->library('form_validation');
                 $this->form_validation->set_rules('skills[]', 'Skills', 'required|trim');

             if($this->form_validation->run()){

                     if($this ->model_admin -> addskils($this -> input ->post('skills[]'))){
                                $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'><font size='2px'>Skills has been added!</font></div>");
                                redirect('admin/job_management#addskills');
                             }

                   }else{
                                $this->load->model('model_users');
                                $this->session->set_flashdata("error", "<?php validation_errors(); ?>");
                           redirect('admin/job_management#addskills');
                    }

            }



            public function admin_validation(){

                 $this->load->library('form_validation');
                 $this->form_validation->set_rules('adminuser', 'Username', 'required|trim|callback_validate_admin');
                 $this->form_validation->set_rules('adminpass', 'Password', 'required|trim|sha1');

                 if($this->form_validation->run()){

                      $d = $this -> model_admin -> getDetails($this->input->post('adminuser'));

                      foreach ($d as $details) {
                        $data = array(

                          'admin_fname' => $details->admin_fname,
                          'admin_mname' => $details->admin_mname,
                          'admin_lname' => $details->admin_lname,
                          'admin_level' => $details->admin_level,
                          'admin_id' => $details->admin_id,
                          'is_logged_in' => 1

                          );
                      }

                      $this -> session -> set_userdata($data);

                        if($_SESSION['admin_level'] == 32 || $_SESSION['admin_level'] == 31){
                        redirect('admin/hr_dashboard');
                      }else{
                        redirect('admin/manage_banner');
                      }


                      redirect('admin/dashboard');


                 }else{

                    $this -> load -> view('admin/admin');
                 }


            }



              public function updateadmin(){
                 $this -> load -> library("form_validation");
                       $this -> load -> model('model_admin');
                   $this -> form_validation -> set_rules('fname', "First Name", "required|callback_validate_space");
                      $this -> form_validation -> set_rules('mname', "Middle Name", "required|callback_validate_space");
                      $this -> form_validation -> set_rules('lname', "Last Name", "required|callback_validate_space");

                      if($this->form_validation->run()){
                                $data = array(
                                    'admin_fname' => $_POST['fname'],
                                    'admin_mname' => $_POST['mname'],
                                    'admin_lname' => $_POST['lname']
                                  );
                              if($this->model_admin->updateAdmin($data)){
                                  $this->session->set_flashdata("adminupdated", "<div class='alert alert-success' role='alert'><font size='2px'>Successfully Updated.</font></div>");

                                    $this->load->view('admin/admin_editprofile');

                              }else{

                              }

                      }else{
                          $this->load->view('admin/admin_editprofile');
                      }




              }

              public function validate_space($text){

                  if (preg_match("/^[a-zA-Z ]*$/",$text)) {
                    return true;
                }else{
                     $this->form_validation->set_message('validate_space', 'Only letters and white space allowed');
                     return false;
                }

              }



              // public function create(){

              //     $foldername = sha1(3);
              //     mkdir("C:/xampp/htdocs/ictsi/adminusers/$foldername", 0755);
              // }

              public function upload_admindp(){
                 $this->load->model('model_admin');

                       $foldername = sha1($_SESSION['admin_id']);
        $config['upload_path']          = "./adminusers/$foldername";
        $config['allowed_types']     = 'gif|jpg|png';
        $config['max_size']          = 10000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

           if($this->upload->do_upload('uploaddp')){


              $data = array('upload_data' => $this->upload->data());
              $img = $data['upload_data']['file_name'];

              $this->model_admin->adminuploadDP($img);
              //$this->session->set_flashdata('asd','You have successfully uploaded a new image');
              $this->session->set_flashdata('uploadedsuccess', "<div class='alert alert-success' role='alert'><center><font size='2px'>You have successfully uploaded a new image</font></center></div>");
                redirect('admin/edit_profile');
               //$this->load->view('uploadfiles', $data);
           }else{

                $this->session->set_flashdata('uploadedfailed', "<div class='alert alert-danger' role='alert'><center><font size='2px'>We only accept PNG JPG and GIF type of image</font></center></div>");
                redirect('admin/edit_profile');


           }


              }


              public function adminchangepass(){
                      $this -> load -> library("form_validation");
                       $this -> load -> model('model_admin');
                          $this -> form_validation -> set_rules('oldpass', "Old password", "required|callback_validate_oldpass");
                          $this -> form_validation -> set_rules('newpass', "New password", "required|trim");
                          $this -> form_validation -> set_rules('cpass', "Confirm password", "required|trim|matches[newpass]");

                      if($this->form_validation->run()){

                              if($this->model_admin->updateadminpassword($_POST['newpass'])){

                $this->session->set_flashdata("succpassword", "<div class='alert alert-success' role='alert'><font size='2px'>Successfully password changed.</font></div>");

                                    $this->load->view('admin/admin_editprofile');

                              }


                      }else{
                        $this -> load -> view('admin/admin_editprofile');
                      }



              }

              public function validate_oldpass($oldpass){

                    $encryptedpass = sha1($oldpass);

                      if($this->model_admin->checkoldpass($encryptedpass)){
                            return true;
                      }else{

                            $this->form_validation->set_message('validate_oldpass', 'Old password did not match');
                            return false;

                      }


              }




            public function add_FAQ(){
                $this -> load -> view('admin/add_FAQ');
            }
            public function dashboard(){
                $this->load->model('model_admin');
                $this -> load -> view('admin/banner');
            }

            // public function manage_footer(){

            //     $this -> load -> view('admin/Manage_Footer');
            // }

            public function manage_FAQ(){
                 $this->load->model('model_admin');

              $data['faq'] = $this->model_admin -> get_faqs();

                $this -> load -> view('admin/Manage_FAQ', $data);

            }

            public function manage_banner(){
              $this->load->model('model_admin');
              $data['photos']= $this->model_admin->get_banner($id=1);
            $this->load->view('admin/banner',$data ,array('error' => ' ' ));
              //  $this ->load ->view('admin/carousel');
            }

            public function add_user(){
              $this->load->view('admin/create_user');
            }

               public function add_users(){
              $this -> load -> library("form_validation");
                       $this -> load -> model('model_admin');
                      $this -> form_validation -> set_rules('usertype', "User Type", "required");
                      $this -> form_validation -> set_rules('fname', "First Name", "required");
                      $this -> form_validation -> set_rules('mname', "Middle Name", "required");
                      $this -> form_validation -> set_rules('lname', "Last Name", "required");
                      $this -> form_validation -> set_rules('empno', "Username", "required");


              if($this->form_validation->run()){


                 //defaultpass for sys and HR : letmein
                $password = sha1('letmein');
                      $username = $_POST['empno'];
                  if($_POST['usertype'] == 2){
                      $username = "sys_".$_POST['empno'];
                  }


                 $data = array(
                  'admin_fname' => $this->input->post('fname'),
                   'admin_mname'=> $this->input->post('mname'),
                   'admin_lname'=> $this->input->post('lname'),
                   'admin_username'=> $username,
                   'admin_password'=> $password,
                   'admin_level' => $this->input->post('usertype')
                   );

                 $sql =  $this->model_admin->add_user($data, $username);
                if($sql){
                     $this->session->set_flashdata("adminsucc", "<div class='alert alert-success' role='alert'><font size='2px'>Successfully created.</font></div>");

                    redirect(base_url() . "admin/add_user");

                }


            }else{

              $this -> load -> view('admin/create_user');
            }
            }


            public function validateapprove(){
                   $this -> load ->library('form_validation');
                $this -> form_validation -> set_rules('job_title', 'Job Title', 'required');
                $this -> form_validation -> set_rules('req_id', 'Requisition ID', 'required');
                $this -> form_validation -> set_rules('job_desc', 'Job Description', 'required');
                 $this -> form_validation -> set_rules('ha', 'Attainment', 'required');
                $this -> form_validation -> set_rules('skills[]', 'Skills', 'required');
                $this -> form_validation -> set_rules('program', 'Program', 'required');
                $this -> form_validation -> set_rules('number', 'Number', 'required');
                $this -> form_validation -> set_rules('year/month', 'Year and month', 'required');
                $this -> form_validation -> set_rules('emp_type', 'Employment type', 'required');
				      $this -> form_validation -> set_rules('jobslots', 'job slots', 'required');






                $this -> load -> model('model_admin');
                  if($this->form_validation->run()){



                      if($this->model_admin->addjob2($this->input->post('skills[]'))){
                        $this -> load -> model('model_admin');
                        $this -> load -> model('model_users');

                      redirect('admin/job_management#mp2');

                       }


                  }else{
                    $this -> load -> model('model_users');
                    $this -> load -> view('admin/hr_manage_jobs');
                  }

            }



            public function validateinsert(){

                $this -> load ->library('form_validation');
                $this -> form_validation -> set_rules('job_title', 'Job Title', 'required');
                $this -> form_validation -> set_rules('req_id', 'Requisition ID', 'required|callback_check_req');
                $this -> form_validation -> set_rules('job_desc', 'Job Description', 'required');
                 $this -> form_validation -> set_rules('ha', 'Attainment', 'required');
                $this -> form_validation -> set_rules('skills[]', 'Skills', 'required');
                $this -> form_validation -> set_rules('program', 'Program', 'required');
                $this -> form_validation -> set_rules('number', 'Number', 'required');
                $this -> form_validation -> set_rules('year/month', 'Year and month', 'required');
                $this -> form_validation -> set_rules('emp_type', 'Employment type', 'required');
				 $this -> form_validation -> set_rules('job_slots', 'Job Slots', 'required|numeric');




                $this -> load -> model('model_admin');
                  if($this->form_validation->run()){


                      if($this->model_admin->addjob($this->input->post('skills[]'))){
                        $this -> load -> model('model_admin');
                        $this -> load -> model('model_users');

                      redirect('admin/managejobs');

                       }


                  }else{
                    $this -> load -> model('model_users');
                    $this -> load -> view('admin/hr_manage_jobs');
                  }

            }

          public function check_req($data){
                  $this->load->model('model_admin');

                if($this->model_admin->checkreq($data)){
                         return true;
                }else{
                    $this->form_validation->set_message('check_req', 'Duplicated requestion id');
                      return false;

                }
          }


            public function validate_admin(){

                    $this->load->model('model_admin');

                  if($this->model_admin->admin_log_in()){
                           return true;
                  }else{
                      $this->form_validation->set_message('validate_admin', 'Incorrect username or password');
                        return false;

                  }

            }


            public function logout(){

                  $this -> session ->sess_destroy();
                  redirect(base_url() . "admin");
            }

                    public function add_faqs(){

                      $this -> load -> library("form_validation");
                       $this -> load -> model('model_admin');
                      $this -> form_validation -> set_rules('question', "Question", "required");
                      $this -> form_validation -> set_rules('answer', "Answer", "required");

              if($this->form_validation->run()){



                 $data = array(
                  'question' => $this->input->post('question'),
                   'answer'=> $this->input->post('answer')
                   );

                 $this->model_admin->insert_faqs($data);
              redirect(base_url() . "admin/manage_FAQ/");

            }else{

              $this -> load -> view('admin/add_FAQ');
            }
}

         function view_update_FAQ($id){
              //$postid = $this->uri->segment(3);
             // $this->load->view('admin/update_FAQ');
        $this->load->model('model_admin');
              $data['post']= $this->model_admin->get_faqss($id);
              //print_r($data['post']);
            $this->load->view('admin/update_FAQ', $data);

            }

            public function edit_evaluation(){
                $this -> load -> model('model_admin');


                 $this->load->view('admin/edit_evaluation');

            }

            public function doupdateEval(){
              $this->load->model('model_admin');
              $this -> load ->library('form_validation');
               $this -> form_validation -> set_rules('eval', "Evaluation", "required");
               $theid = $_POST['hidden_id'];
               if($this->form_validation->run()){

                    if($this->model_admin->updateEval($_POST['eval'], $theid)){

                         $this->session->set_flashdata("succ", "<div class='alert alert-success' role='alert'><font size='2px'>Successfully Updated.</font></div>");

                        redirect("admin/edit_evaluation/".$theid);
                    }
               }else{
                    $this->session->set_flashdata("empty", "<div class='alert alert-danger' role='alert'><font size='2px'>The text box is empty</font></div>");

                  redirect("admin/edit_evaluation/".$theid);
               }

            }



            public function deleteEval(){
              $id = $this->uri->segment(3);
              $this->load->model('model_admin');

                if($this->model_admin->deleteEVALL($id)){
                    $this->session->set_flashdata("succ", "<div class='alert alert-success' role='alert'><font size='2px'>Successfully Deleted.</font></div>");
                      redirect('admin/manage_evaluation');
                }else{
                    $this->session->set_flashdata("wentwrong", "<div class='alert alert-danger' role='alert'><font size='2px'>Something went wrong!</font></div>");
                    redirect('admin/manage_evaluation');
                }


            }

            public function addnewEval(){
               $this->load->model('model_admin');
               $this -> load ->library('form_validation');
               $this -> form_validation -> set_rules('addeval', "Evaluation", "required");

               if($this->form_validation->run()){

                      $newvar = strip_tags($_POST['addeval']);

                    if($this->model_admin->addnewEVALUATION($newvar)){
                      $this->session->set_flashdata("succ_added", "<div class='alert alert-success' role='alert'><font size='2px'>Successfully Added.</font></div>");
                      redirect('admin/manage_evaluation');

                    }else{
                      $this->session->set_flashdata("wentwrong", "<div class='alert alert-danger' role='alert'><font size='2px'>Something went wrong!</font></div>");
                      redirect('admin/manage_evaluation');
                    }



               }else{

                  $this->session->set_flashdata("boxisempty", "<div class='alert alert-danger' role='alert'><font size='2px'>Evaluation Box is empty!</font></div>");
                      redirect('admin/manage_evaluation');

               }

            }




            function update_FAQ($id){
      // $data['success'] = 0;
               $this->load->model('model_admin');
            if($_POST){
              $data = array('question'=>$_POST['question'],
                            'answer'=>$_POST['answer']
                            );
               $this->model_admin->update_FAQ($id, $data);
               redirect(base_url() . "admin/manage_FAQ/");
              // $data['success'] = 1;
            }
   // $data['post']= $this->model_admin->get_post($postid);
    //print_r($data['post']);
   // $this->load->view('edit_post_view', $data);

  }



  function delete_FAQS($id){
    $this->load->model('model_admin');
    $this->model_admin->delete_faq($id);
            redirect(base_url() . "admin/manage_FAQ/");
  }


            public function get_faqs(){
              $this -> load -> model('model_admin');

            }







//uploading
  function do_upload()
  {
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '2048000';
    $config['max_width']  = '1500';
    $config['max_height']  = '700';

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload())
    {
      $error = array('error' => $this->upload->display_errors());
      $this->load->view('upload_form', $error);
    }
    else
    {
      $data = array('upload_data' => $this->upload->data());
      $this->load->view('upload_success', $data);
    }
  }


public function upload_carousel1(){
              $this->load->model('model_admin');
              $data['photoo']= $this->model_admin->get_carousel();
              $this->load->view('admin/upload_carousels',$data);
            }




public function sendperformance(){

  $this -> load -> library('form_validation');
  $this -> load -> model('model_admin');
  $this -> form_validation -> set_rules('empName[]', 'Employees', 'required');
  $this -> form_validation -> set_rules('coempName', 'Co-Employees', 'required');
  $this -> form_validation -> set_rules('evals[]', 'Evaluations', 'required');
  $this -> form_validation -> set_rules('date', 'Date', 'required');


    if($this->form_validation->run()){

            $val = $_POST['empName'];
            $eval = $_POST['evals'];

            if($this->model_admin->sendtocoemp($val, $_POST['coempName'], $eval, $_POST['date'])){
              $this->session->set_flashdata("succ", "<div class='alert alert-success' role='alert'><font size='2px'>Successfully sent!</font></div>");

                $this->load->view('admin/hr_send_PEF');

            }else{

            }

    }else{

           $this->load->view('admin/hr_send_PEF');
    }

}//end




public function sendperformance2(){

  $this -> load -> library('form_validation');
  $this -> load -> model('model_admin');
  $this -> form_validation -> set_rules('empName[]', 'Employees', 'required');
  $this -> form_validation -> set_rules('coempName', 'Co-Employees', 'required');

$this -> form_validation -> set_rules('date', 'Date', 'required');




    if($this->form_validation->run()){

            $val = $_POST['empName'];

            if($this->model_admin->sendtocoempdefault($val, $_POST['coempName'],$_POST['date'])){
               $this->session->set_flashdata("succ", "<div class='alert alert-success' role='alert'><font size='2px'>Successfully sent!</font></div>");

               $this->load->view('admin/hr_send_PEF');
            }else{

            }

    }else{

           $this->load->view('admin/hr_send_PEF');
    }

}









//HR ADMIN GOALS

public function hr_dashboard(){

  $this -> load -> model('model_admin');


    $this -> load -> view('admin/hr_dashboard');
}


public function addinterview(){

    $this -> load -> library('form_validation');
    $this -> load ->model('model_admin');
    $this -> form_validation -> set_rules('date', 'Date', 'required');
    $this -> form_validation -> set_rules('time', 'Time', 'required');
        $this -> form_validation -> set_rules('rmk', 'Requirement/comments', 'required');

        if($this->form_validation->run()){
                if($this->model_admin->inserintev()){
                    redirect('admin/hr_dashboard');
                }



          }else{


            $this -> load -> view('admin/hr_interviewSched');
          }

}



public function interview_sched(){
  $this ->load->model('model_admin');
    $this->load->view('admin/hr_interviewSched');
  }

public function trck_applicants(){
  $this -> load -> library('form_validation');
  $this-> load ->model('model_admin');
  $this -> form_validation -> set_rules('trkjob', 'Job', 'required');
      if($this->form_validation->run()){
             $postid = $_POST['trkjob'];
             $data['tracksapp'] = $this->model_admin->trackapplicant($postid);
             $this->load->view('admin/hr_dashboard', $data);
      }else{

          $this->session->set_flashdata("error", "<div class='alert alert-danger' role='alert'><font size='2px'>Please select a job</font></div>");

          redirect('admin/hr_dashboard');
      }


}

function get_applicants()
{

  $this -> load -> library('form_validation');
  $this-> load ->model('model_admin');
  $this -> form_validation -> set_rules('thejob', 'Job', 'required');
      if($this->form_validation->run()){

                   $postid = $_POST['thejob'];
                   $data['datas'] = $this->model_admin->getAllapply($postid);
                     $this->load->view('admin/hr_dashboard', $data);
}else{
    $this->session->set_flashdata("noapplied", "<div class='alert alert-danger' role='alert'><font size='2px'>Please select a job</font></div>");

          redirect('admin/hr_dashboard');
}

}

public function workflow(){
    $this -> load -> view('admin/hr_work_flow');
}

public function managejobs(){
  $this -> load -> model('model_users');
  $this -> load -> model('model_admin');
    $this -> load -> view('admin/hr_manage_jobs');
}

public function manageEmp(){
  $this -> load -> model('model_users');
  $this -> load -> model('model_admin');
  $this -> load -> view('admin/hr_manage_empRecord');
}

public function interviewsched(){
    $this -> load -> view('admin/hr_interviewSched');
}


public function getsearch(){

$this->load->model('model_admin');
    $this -> load -> library('form_validation');

    $this -> form_validation -> set_rules('find', 'Search name', 'required');
      if($this->form_validation->run()){

        $data['result'] = $this -> model_admin ->search($this->input->post('find'));

        $this->load->view('admin/hr_manage_empRecord', $data);

      }else{

          $this->session->set_flashdata("error", "<div class='alert alert-danger' role='alert'><font size='2px'>Search box is empty!</font></div>");


           redirect("admin/manageEmp");
      }

}


public function changestat(){


  $this->load->model('model_admin');

    $this -> load -> library('form_validation');

    $this -> form_validation -> set_rules('status', 'status', 'required');
      if($this->form_validation->run()){

          // if($this->model_admin->checkstatus($_POST['hiddenID'], $_POST['hiddenJobID'], $_POST['status'])){


                if($this -> model_admin ->changestatus($this->input->post('status'), $this->input->post('hiddenID'), $this->input->post('hiddenJobID'))){
                              $this -> model_admin ->appchangestatus($this->input->post('status'), $this->input->post('hiddenID'));

                              $date = date("Y")."/".date('m')."/".date('d');

                                if($_POST['status'] ==3){
                                    $this -> model_admin ->updatehiredate($this->input->post('hiddenID'), $date);

                                }else if($_POST['status'] == 2){

                                      $this -> model_admin->updatestatus($this->input->post('hiddenID'), $_POST['status']);

                                            $this -> model_admin->deleteinterv($this->input->post('hiddenID'),$_POST['hiddenJobID']);
                                            $this -> model_admin -> insertsuccessnotif($this->input->post('hiddenID'));
											  $getappname = $this -> model_admin -> getappname($this->input->post('hiddenID'));

                                            $jobD = $this -> model_admin -> getjobname($_POST['hiddenJobID']);
                                            $fullname = "";
                                            $email = "";
                                            $jobname = "";
                                            foreach ($getappname as $var) {
                                              $fullname = $var['fname']." ".$var['mname']." ".$var['lname'];
                                              $email = $var['email'];

                                            }//end of foreach
                                            foreach ($jobD as $jobkey) {
                                              $jobname = $jobkey['job_title'];
                                            }

                                            $this->load->library('email');
                                            $config['charset'] = 'iso-8859-1';
                                            $config['wordwrap'] = TRUE;
                                            $config['mailtype'] = 'html';
                                             $this->email->initialize($config);
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

                                    <p><b>Congratulations!</b> Your status has been changed in <strong>$jobname</strong>. Your current status now is,</p>
                                            <h2><font color='red'>FOR HIRING</font></h2>
                                             <p><b>Congratulations!</b> You made it, Here's the list of your pre-employment checklist</p><br><br>



                              <p>Pre-employment checklist:</p>
                              <ul>
                                <li>Birth Certificate</li>
                                <li>Police Clearance</li>
                                <li>NBI Clearance</li>
								 <li>SSS ID</li>
								 <li>PAGIBIG ID</li>

                              </ul>
                              <br>
                              <p>You may uplaod your requirements using your account.
                                <a href='http://www.ugmeme.com/ictsi/main/login_page'>Click here to login</a></p>


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



                                          if($this->model_admin->checksent($_POST['hiddenID'], $_SESSION['admin_id'])){
                                                    if($this -> model_admin -> readyprogress($this->input->post('hiddenID'), $_SESSION['admin_id'], $this->input->post('hiddenJobID'))){




                                                           $this->session->set_flashdata("deploy", "<div class='alert alert-info' role='alert'>Requirements to be uploaded has been sent to the applicant<font size='2px'></font></div>");

                                                    }
                                                    // end of readyprogress

                                              }
                                              // end of checksent



                                }else if($_POST['status'] == 4){

                                      $this -> model_admin->updatestatus($this->input->post('hiddenID'), $_POST['status']);

                                      $this -> model_admin->updatestatus($this->input->post('hiddenID'), $_POST['status']);
                                      $getappname = $this -> model_admin -> getappname($this->input->post('hiddenID'));

                                      $jobD = $this -> model_admin -> getjobname($_POST['hiddenJobID']);
                                      $fullname = "";
                                      $email = "";
                                      $jobname = "";
                                      foreach ($getappname as $var) {
                                        $fullname = $var['fname']." ".$var['mname']." ".$var['lname'];
                                        $email = $var['email'];

                                      }//end of foreach
                                      foreach ($jobD as $jobkey) {
                                        $jobname = $jobkey['job_title'];
                                      }


                                      $this->load->library('email');
                                      $config['charset'] = 'iso-8859-1';
                                      $config['wordwrap'] = TRUE;
                                      $config['mailtype'] = 'html';
                                       $this->email->initialize($config);
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
                              <h4>Good day! ".$fullname.",</h4>
                              <br>



                                                <p>Sorry, your application did not qualified for <strong>$jobname</strong>.
                                                 Your status has been changed. Your current status is</p>

                                                <h2><font color='red'>NOT QUALIFIED</font></h2>
                        <br>




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


                                }else if($_POST['status'] == 0){

                                      $this -> model_admin->updatestatus($this->input->post('hiddenID'), $_POST['status']);

                                }

                            $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'><font size='2px'>Status has been changed</font></div>");
                          redirect('admin/manageEmp');

                }


            // }
            // end of check status


      }



}

function update_footer($id=1){
  $this->load->model('model_admin');
  if($_POST){
    $data = array('copyright'=>$_POST['copyright'],
                  'fblink'=>$_POST['fb'],
                  'twitterlink' => $_POST['twitter']
                  );
    $this->model_admin->update_footer($id, $data);
    redirect(base_url() . "admin/manage_footer/");
  }

}



public function view_calendar(){

 $this->load->model('model_users');
  $this->load->model('model_admin');
  $this->load->view('admin/view_calendar');
}



public function create_task(){

  $this->load->model('model_admin');

    $this -> load -> library('form_validation');

    $this -> form_validation -> set_rules('title', 'Title', 'required');
    $this -> form_validation -> set_rules('date', 'Date', 'required');
    $this -> form_validation -> set_rules('time', 'Start time', 'required');
    $this -> form_validation -> set_rules('end_time', 'End time', 'required');
        if($this->form_validation->run()){

          if($this->model_admin->checktask($_POST['date'],$_POST['time'],$_POST['end_time'])){


                if($this->model_admin->insert_todo($_SESSION['admin_id'])){
                    redirect('admin/created_task');
                }

          }else{
            $this->session->set_flashdata("not", "<div class='alert alert-warning' role='alert'><font size='2px'>you picked a person have an activity on that date and time.</font></div>");

     redirect('admin/create_task');
          }

          }else{

            $this -> load -> view('admin/create_task');
          }

}
public function created_task(){
 // $this->load->view('admin/created_task');
$this->load->model('model_admin');
    $data['details']= $this->model_admin->get_todo();
      $this->load->view('admin/created_task', $data);



}

public function activitymarkasdone($id){
  $this->load->model('model_admin');
    $data = array(
                    'status' => 1
                    );
      if($this->model_admin->update_task_status($id,$data)){
        $this->session->set_flashdata("markdone", "<div class='alert alert-info' role='alert'><font size='2px'> Successfully marked as done.</font></div>");

        redirect('admin/activitylist');
      }

}
  public function hiredspec(){
              $this->load->model('model_admin');
              $this->load->library('form_validation');
                 $this->form_validation->set_rules('specifichired', 'Date from', 'required');
                       if($this->form_validation->run()){
                                   if($this->model_admin->excel2hired($_POST['specifichired'])){
                                                        redirect('admin/hr_dashboard#generateReport');

                                                 }

                       }else{
                            $this->session->set_flashdata("nodate", "<div class='alert alert-info' role='alert'><font size='2px'>Please select date</font></div>");
                                                   redirect('admin/hr_dashboard#generateReport');


                       }
            }


            public function fromtohired(){
              echo $_POST['datefromhired'];
              echo "<br>";
              echo $_POST['datetohired'];
              $this->load->model('model_admin');
              $this->load->library('form_validation');
                 $this->form_validation->set_rules('datefromhired', 'Date from', 'required');
                 $this->form_validation->set_rules('datetohired', 'Date to', 'required');
                  if($this->form_validation->run()){

                        if($this->model_admin->excel2hired2($_POST['datefromhired'],$_POST['datetohired'])){
                                         redirect('admin/hr_dashboard#generateReport');

                                  }
                      // $a =  $this->model_admin->generatereporthired2($_POST['datefromhired'],$_POST['datetohired']);
                      // echo "<pre>";
                      // print_r($a);
                      // echo "</pre>";
                  }

            }

public function manage_evaluation(){

    $this->load->model('model_admin');
    $this ->load ->view('admin/manage_evaluation');
}





public function old_created_task($id){
  $this->load->model('model_admin');

  $data['details']= $this->model_admin->old_get_todo($id);
  $this->load->view('admin/old_created_task',$data);
}

public function edit_task($id){
  $this->load->model('model_admin');
  $this -> load -> library('form_validation');
  $this -> form_validation -> set_rules('title', 'Title', 'required');
  $this -> form_validation -> set_rules('details', 'Details');
  $this -> form_validation -> set_rules('date', 'Date', 'required');
  $this -> form_validation -> set_rules('time', 'Time', 'required');

  if($this->form_validation->run()==FALSE){
      redirect('admin/create_task');

  }else{


     $data = array(
                    'title' => $this->input->post('title'),
                    'details' => $this->input->post('details'),
                    'date' => $this->input->post('date'),
                    'time' => $this->input->post('time')

                );

    $_SESSION['title'] = $this->input->post('title');
     $this->model_admin->edit_task($data,$id);
     $data['details']= $this->model_admin->get_todo();

      redirect('admin/create_task');


    }


}

public function delete_task($id){
  $this->load->model('model_admin');
 if($this->model_admin->delete_task($id)){
  $this->session->set_flashdata('success', "You have successfully delete the task");
   redirect('admin/create_task');
 }else{
  $this->session->set_flashdata('success', "");
   redirect('admin/create_task');
 }

}


public function update_task_status($id,$stat=1){

  $this->load->model('model_admin');
    $data = array(
                    'status' => 1
                    );
 if( $this->model_admin->update_task_status($id,$data)){
     $this->session->set_flashdata('success1', "You have successfully updated the task");

  redirect('admin/old_created_task/'.$id);
 }

}





public function updated_task_status($id,$stat=0){

  $this->load->model('model_admin');
    $data = array(
                    'status' => 0
                    );
 if( $this->model_admin->update_task_status($id,$data)){
     $this->session->set_flashdata('success2', "You have successfully updated the task");

  redirect('admin/old_created_task/'.$id);
 }

}










public function close_job($id){
  $this->load->model('model_admin');

 $data = array(

                    'job_status' => 0

                    );
$this->model_admin->close_job($data,$id);

$this->session->set_flashdata('success','you have successfully close the job');
  redirect('admin/hr_editjob#closejobs');


 }

public function hr_editjob(){

    $this->load->model('model_admin');
    $this->load->model('model_users');





    $this->load->view('admin/hr_openclose_job');


  }

public function hr_editjob1($job_id){
    $this->load->model('model_admin');
    $this->load->model('model_users');
    $data['jobdesc'] = $this->model_admin->get_job_desc($job_id);
    $this->load->view('admin/hr_edit_job', $data);
  }

public function open_job($id){

  $this->load->model('model_admin');

 $data = array(

                    'job_status' => 1

                    );
$this->model_admin->open_job($data,$id);

$this->session->set_flashdata('success','you have successfully opened the job');
  redirect('admin/hr_editjob#closejobs');


 }


public function hr_openclose_job(){
  $this->load->model('model_users');
  $this->load->model('model_admin');
  $this->load->view('admin/hr_openclose_job');
}



 public function update_job($id){

$this->load->model('model_users');
  $this->load->model('model_admin');

$this -> load ->library('form_validation');
                $this -> form_validation -> set_rules('job_title', 'Job Title', 'required');
                $this -> form_validation -> set_rules('req_id', 'Requisition ID', 'required');
                $this -> form_validation -> set_rules('job_desc', 'Job Description', 'required');
                $this -> form_validation -> set_rules('ha', 'Attainment', 'required');
                $this -> form_validation -> set_rules('skills', 'Skills', 'required');
                $this -> form_validation -> set_rules('program', 'Program', 'required');
                $this -> form_validation -> set_rules('number', 'Number', 'required');
                $this -> form_validation -> set_rules('year/month', 'Year and month', 'required');
                $this -> form_validation -> set_rules('emp_type', 'Employment type', 'required');
                $this -> form_validation -> set_rules('job_slots', 'Job Slots', 'required|numeric');



                  if($this->form_validation->run()){
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

                      $this->model_admin->edit_job($id,$data);


                      $this->load->view('admin/hr_openclose_job');




                    }else{
                      $this -> load -> view('admin/hr_openclose_job');

                  }






 }





  public function viewfiles(){
    $this->load->helper('download');
      $this -> load ->model("model_admin");
      $this -> load -> view('admin/hr_validate_sentFiles');


  }


  public function changepcstatus(){

      $this -> load ->library('form_validation');
      $this -> load -> model('model_admin');
      $this -> form_validation -> set_rules('stat', 'stat', 'required');

      if($this->form_validation->run()){

              if($this->model_admin->changepcstat($_POST['stat'], $_POST['hiddenID'])){

                redirect('admin/viewfiles/'. $_POST['hiddenID']);

              }else{

                echo $_POST['stat'];
                echo $_POST['hiddenID'];
              }

      }


  }


  public function changebc(){


      $this -> load ->library('form_validation');
      $this -> load -> model('model_admin');
      $this -> form_validation -> set_rules('stat2', 'stat2', 'required');

      if($this->form_validation->run()){

              if($this->model_admin->changebcstat($_POST['stat2'], $_POST['applicantID'])){

                redirect('admin/viewfiles/'. $_POST['applicantID']);

              }else{


              }

      }


  }

public function changenbi(){


      $this -> load ->library('form_validation');
      $this -> load -> model('model_admin');
      $this -> form_validation -> set_rules('stat5', 'stat5', 'required');

      if($this->form_validation->run()){

              if($this->model_admin->changenbistat($_POST['stat5'], $_POST['applicantID'])){

                redirect('admin/viewfiles/'. $_POST['applicantID']);

              }else{


              }

      }


  }

public function changepagbig(){


      $this -> load ->library('form_validation');
      $this -> load -> model('model_admin');
      $this -> form_validation -> set_rules('stat4', 'stat4', 'required');

      if($this->form_validation->run()){



              if($this->model_admin->changespagibig($_POST['stat4'], $_POST['applicantID'])){

                redirect('admin/viewfiles/'. $_POST['applicantID']);

              }else{


              }

      }


  }





  public function changesss(){


      $this -> load ->library('form_validation');
      $this -> load -> model('model_admin');
      $this -> form_validation -> set_rules('stat3', 'stat3', 'required');

      if($this->form_validation->run()){

              if($this->model_admin->changesssstat($_POST['stat3'], $_POST['applicantID'])){

                redirect('admin/viewfiles/'. $_POST['applicantID']);

              }else{


              }

      }


  }









  public function makeithired(){
      $this->load->model('model_admin');
      $numberofjobslots = $this -> model_admin->getJobslotnumber($_POST['jobid']);
      $numberofslots = 0;

      foreach ($numberofjobslots as $keyjobslots) {
        $numberofslots = $keyjobslots['job_slots'];

      }


    if($numberofslots > 0){

          if($this->model_admin->makehired($_POST['hide'], $_POST['jobid'])){
            $newnumofslots = $numberofslots - 1;
            if($newnumofslots == 0){
              $thejobname = $this -> model_admin ->getjobname($_POST['jobid']);
              $THEJOBNAME = "";
              foreach ($thejobname as $keyjobname) {
                $THEJOBNAME = $keyjobname['job_title'];
              }
              $this->session->set_flashdata("jobclosed", "<div class='alert alert-info' role='alert'><font size='2px'> $THEJOBNAME is now set to close.</font></div>");
              $this -> model_admin ->automaticClosejob($_POST['jobid']);
            }

            $this -> model_admin -> updatejobslots($_POST['jobid'], $newnumofslots);

                 $this->session->set_flashdata("hired", "<div class='alert alert-success' role='alert'><font size='2px'>Successfully set status to hired.</font></div>");
					 $getappname = $this -> model_admin -> getappname($_POST['hide']);

                 $jobD = $this -> model_admin -> getjobname($_POST['jobid']);
                 $fullname = "";
                                     $email = "";
                                     $jobname = "";
                                     foreach ($getappname as $var) {
                                       $fullname = $var['fname']." ".$var['mname']." ".$var['lname'];
                                       $email = $var['email'];

                                     }//end of foreach
                                     foreach ($jobD as $jobkey) {
                                       $jobname = $jobkey['job_title'];
                                     }


                                     $this->load->library('email');
                                     $config['charset'] = 'iso-8859-1';
                                     $config['wordwrap'] = TRUE;
                                     $config['mailtype'] = 'html';
                                      $this->email->initialize($config);
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
                             <h4>Good day! ".$fullname.",</h4>
                             <br>



                                       <p><b>Congratulations! </b> Welcome to the ICTSI Family.
                                        You are now hired in $jobname, Your current status now is,</p>

                                       <h2><font color='red'>HIRED</font></h2>
                       <br>




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
                  redirect('admin/job_management#employment');
          }else{

          }

        }

  }




  public function updatedefaulteval(){
    $this->load->model('model_admin');
    $this -> load ->library('form_validation');
    $this -> form_validation -> set_rules('evals[]', 'Evaluations', 'required');

     if($this->form_validation->run()){

          $d = $_POST['evals'];

          $var = "";

            foreach ($d as $key) {
              $var .= $key. ",";
            }

              $length = mb_strlen($var)-1;
                  $data =  mb_substr($var,0,$length);


        if($this->model_admin->updatedefaultEVAL($data)){

           $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'><font size='2px'>Successfully Updated!</font></div>");

            redirect('admin/update_default');
        }

      }else{

               $this->session->set_flashdata("empty", "<div class='alert alert-danger' role='alert'><font size='2px'>Evaluation is Empty please select atlease one</font></div>");
                redirect('admin/update_default');
      }


  }



  public function generatereport(){
        $this->load->model('model_admin');
      if($this->model_admin->generatereps()){

      }else{

      }
  }


  public function archived(){

        $this->load->model('model_admin');

        if($this->model_admin->archivedjob($_POST['jobid'], $_POST['jobname'])){
            redirect("admin/job_management");
        }else{
          echo "NGANGA";
        }


  }






  public function view_interview_sched(){
    $this->load->model('model_admin');
    $this->load->view('admin/view_interview_sched');
  }

  public function skype_notification(){
    $this->load->model('model_admin');
    $this->load->view('admin/skype_notification');
  }

  public function personal_notification(){
    $this->load->model('model_admin');
    $this->load->view('admin/personal_interview');
  }

  public function manpower_notification(){
    $this->load->model('model_admin');
    $this->load->view('admin/manpower_notification');
  }

  public function refferal_notification(){
    $this->load->model('model_admin');
    $this->load->view('admin/referral_notification');
  }

  public function see_all_alerts(){
    $this->load->model('model_admin');
    $this->load->view('admin/see_all_alerts');
  }


public function view_interview_summary(){

    $this->load->model('model_admin');
    $this->load->view('admin/view_interview_summary');


}

public function addworkflow(){
    $this -> load -> model("model_admin");
    $this -> load -> library("form_validation");

    $this->form_validation->set_rules('work1', '1st process', 'required|trim');

    $this->form_validation->set_rules('work2', '2nd process', 'required|trim');


    $this->form_validation->set_rules('work3', '3rd process', 'required|trim');


    $this->form_validation->set_rules('work4', '4th process', 'required|trim');


    $this->form_validation->set_rules('work5', '5th process', 'required|trim');


    $this->form_validation->set_rules('effectivedate', 'Date', 'required');
        $this->form_validation->set_rules('workflowname', 'Workflow name', 'required');


                if($this->form_validation->run()){



                      if($this->model_admin->insertworkflow($_POST['effectivedate'])){

                        $date =$_POST['effectivedate'];
                            $this->session->set_flashdata("suc", "<div class='alert alert-success' role='alert'><font size='2px'>Successfully added a work, this workflow will be implemented on $date</font></div>");
                    redirect("admin/hr_dashboard#workflow");
                      }else{

                      }

                }else{
                   $this->session->set_flashdata("emptyfields", "<div class='alert alert-danger' role='alert'><font size='2px'>Some of the fields are empty.</font></div>");
                    redirect("admin/hr_dashboard#workflow");
                }
}



		 public function view_application_info(){
			$this -> load ->model("model_admin");
			  $this -> load -> view("admin/hr_view_app_info");
		  }

		 public function manage_announcement(){
			$this->load->model('model_admin');
			$data['announcement'] = $this-> model_admin -> get_announcement();
			$this->load->view('admin/manage_announcement', $data);
		  }

		 public function create_announcement(){
    $this->load->model('model_admin');
    $this->load->view('admin/create_announcement');
  }

  public function create_announcements(){

                      $this -> load -> library("form_validation");
                       $this -> load -> model('model_admin');
                        $this -> form_validation -> set_rules('title', "Announcement Title", "required");
                      $this -> form_validation -> set_rules('announcement', "Announcement Content", "required");

              if($this->form_validation->run()){



                 $data = array(
                   'announcement_title' => $this->input->post('title'),
                   'announcement_desc'=> $this->input->post('announcement')
                   );

                 $this->model_admin->insert_announcement($data);
              redirect(base_url() . "admin/manage_announcement/");

            }else{

              $this -> load -> view('admin/create_announcement');
            }
}

            function update_announcement($id){
               $this->load->model('model_admin');
                  if($_POST){
                    $data = array('announcement_title'=>$_POST['title'],
                                  'announcement_desc'=>$_POST['announcement']
                                  );
                     $this->model_admin->update_announcement($id, $data);
                     redirect(base_url() . "admin/manage_announcement/");

                  }
                }
            function view_update_announcement($id){
              $this->load->model('model_admin');
              $data['datas'] = $this->model_admin->get_announcements($id);
              $this->load->view('admin/update_announcement', $data);

            }
	 public function view_archived_applicants(){
			$this -> load ->model("model_admin");

			  $this -> load -> view("admin/archive_applicant");

		  }



  function delete_announcement($id){
	  $this->load->model('model_admin');
	  $this->model_admin->delete_announcement($id);
	redirect(base_url()."admin/manage_announcement");
  }

	function delete_ref($id){
	  $this->load->model('model_admin');
	  $this->model_admin->delete_ref($id);
	redirect(base_url()."admin/job_management");
  }


}
