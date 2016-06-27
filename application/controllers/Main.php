<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {



	public function index()
	{

		$this -> login();
	}


    public function asd(){
                $this -> load -> library('form_validation');
                $this->load->library('parser');
        $this -> load -> model('model_users');
           $this->form_validation->set_rules('state', 'Skills', 'required');
            $this->form_validation->set_rules('citynames', 'Skills', 'required');



           if($this -> form_validation -> run()){

              if($this->model_users->addSSS($_POST['state'], $_POST['citynames'])){
                 $this->session->set_flashdata('addedskill', "<div class='alert alert-success' role='alert'><center><font size='2px'>You have successfully uploaded a new image</font></center></div>");

                   $this->load->view('test');
              }else{

              }

        }else{

            $this->load->view('test');

        }




    }


    public function forgotpassword(){

          $this->load->model('model_users');
           $this->load->view('forgotpassword');


    }





	public function login()
	{
		$this->load->model('model_admin');
		$data['contents']= $this->model_admin->get_hpcontent($id=1);
		$data['posts']= $this->model_admin->get_footer($id=1);
		$data['photo']= $this->model_admin->get_banner($id=1);
		if($this->session->userdata('is_logged_in')){
			$this -> load -> model('model_users');
			$data['datas']	= $this -> model_users -> get_jobs();
			$this -> load -> view('applicant_page', $data);
		}else{
			$this -> load -> view('login', $data);
		}


	}

    public function checklist(){
        $this -> load -> model('model_users');
        $this->load->view('uploadfiles');
    }

    public function search(){
  $this->load->model('model_users');
  $this->load->view('search');
}



public function livesearch(){

    $search=  $this->input->post('search');
    $query = $this->EmployeeModel->getWork_area($search);
    echo json_encode ($query);
}



//     public function search_job(){
//     $this->load->model('model_users');

//     $this->load->library('form_validation');

//     $this -> form_validation -> set_rules('job', 'Job','required');

//     $job = $this->input->post('job');


// if($this->model_users->search_jobs($job)){
// $data['searched'] = $this->model_users->search_jobs($job);
// $this->load->view('job_list',$data);
// }else{
//     $this->session->set_flashdata('pol','no results found');
//     redirect('main/joblist');
// }
// }



    function update_carousel(){
     $config['upload_path']          = './images/';
        $config['allowed_types']     = 'gif|jpg|png';
        $config['max_size']          = 10000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('userfile')) {
            $data = array('upload_data' => $this->upload->data());

           $img = $data['upload_data']['file_name'];
           $this->load->model('model_admin');
           $this->model_admin->update_banner($img);

            $this->load->view('admin/upload_success');
        }
        else {
          $error = array('error' => $this->upload->display_errors());
         $this->load->view('admin/upload_failed',$error);
        }
  }

function update_banner(){
     $config['upload_path']          = './images/';
        $config['allowed_types']     = 'gif|jpg|png';
        $config['max_size']          = 10000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('userfile')) {
            $data = array('upload_data' => $this->upload->data());

           $img = $data['upload_data']['file_name'];
           $this->load->model('model_admin');
           $this->model_admin->update_banner($img);

            $this->session->set_flashdata('asd','You have successfully uploaded a new image');
            redirect('admin/manage_banner');
        }
        else {
          $error = array('error' => $this->upload->display_errors());
         $this->load->view('admin/upload_failed',$error);

            $this->session->set_flashdata('fail','Uploading of new banner failed!');
            redirect('admin/manage_banner');
        }
  }


  public function upload_files(){

          $foldername = sha1($this->session->userdata('applicant_id'));
        $config['upload_path']          = "./users/$foldername";
        $config['allowed_types']     = 'gif|jpg|png';
        $config['max_size']          = 10000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

           if($this->upload->do_upload('userfile')){


              $data = array('upload_data' => $this->upload->data());
              $img = $data['upload_data']['file_name'];
              $this->load->model('model_users');

              $this->model_users->insertupload($img);
              //$this->session->set_flashdata('asd','You have successfully uploaded a new image');
              $this->session->set_flashdata('uploadedsuccess', "<div class='alert alert-success' role='alert'><center><font size='2px'>You have successfully uploaded a new image</font></center></div>");
                redirect('main/checklist');
               //$this->load->view('uploadfiles', $data);
           }else{

                $this->session->set_flashdata('uploadedfailed', "<div class='alert alert-danger' role='alert'><center><font size='2px'>We only accept PNG JPG and GIF type of image</font></center></div>");
                redirect('main/checklist');


           }

  }



   public function upload_files1(){

          $foldername = sha1($this->session->userdata('applicant_id'));
        $config['upload_path']          = "./users/$foldername";
        $config['allowed_types']     = 'gif|jpg|png';
        $config['max_size']          = 10000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

           if($this->upload->do_upload('uploadbirth')){


              $data = array('upload_data' => $this->upload->data());
              $img = $data['upload_data']['file_name'];
              $this->load->model('model_users');

              $this->model_users->insertupload1($img);
              //$this->session->set_flashdata('asd','You have successfully uploaded a new image');
              $this->session->set_flashdata('uploadedsuccess', "<div class='alert alert-success' role='alert'><center><font size='2px'>You have successfully uploaded a new image</font></center></div>");
                redirect('main/checklist');

           }else{

                $this->session->set_flashdata('uploadedfailed', "<div class='alert alert-danger' role='alert'><center><font size='2px'>We only accept PNG JPG and GIF type of image</font></center></div>");
                redirect('main/checklist');


           }

  }


  public function upload_sss(){

          $foldername = sha1($this->session->userdata('applicant_id'));
        $config['upload_path']          = "./users/$foldername";
        $config['allowed_types']     = 'gif|jpg|png';
        $config['max_size']          = 10000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

           if($this->upload->do_upload('uploadsss')){


              $data = array('upload_data' => $this->upload->data());
              $img = $data['upload_data']['file_name'];
              $this->load->model('model_users');

              $this->model_users->insertsss($img);
              //$this->session->set_flashdata('asd','You have successfully uploaded a new image');
              $this->session->set_flashdata('uploadedsuccess', "<div class='alert alert-success' role='alert'><center><font size='2px'>You have successfully uploaded a new image</font></center></div>");
                redirect('main/checklist');

           }else{

                $this->session->set_flashdata('uploadedfailed', "<div class='alert alert-danger' role='alert'><center><font size='2px'>We only accept PNG JPG and GIF type of image</font></center></div>");
                redirect('main/checklist');


           }

  }


  public function upload_pagibig(){

          $foldername = sha1($this->session->userdata('applicant_id'));
        $config['upload_path']          = "./users/$foldername";
        $config['allowed_types']     = 'gif|jpg|png';
        $config['max_size']          = 10000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

           if($this->upload->do_upload('uploadpagibig')){


              $data = array('upload_data' => $this->upload->data());
              $img = $data['upload_data']['file_name'];
              $this->load->model('model_users');

              $this->model_users->insertpagibig($img);
              //$this->session->set_flashdata('asd','You have successfully uploaded a new image');
              $this->session->set_flashdata('uploadedsuccess', "<div class='alert alert-success' role='alert'><center><font size='2px'>You have successfully uploaded a new image</font></center></div>");
                redirect('main/checklist');

           }else{

                $this->session->set_flashdata('uploadedfailed', "<div class='alert alert-danger' role='alert'><center><font size='2px'>We only accept PNG JPG and GIF type of image</font></center></div>");
                redirect('main/checklist');


           }

  }


  public function upload_nbi(){

          $foldername = sha1($this->session->userdata('applicant_id'));
        $config['upload_path']          = "./users/$foldername";
        $config['allowed_types']     = 'gif|jpg|png';
        $config['max_size']          = 10000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

           if($this->upload->do_upload('uploadnbi')){


              $data = array('upload_data' => $this->upload->data());
              $img = $data['upload_data']['file_name'];
              $this->load->model('model_users');

              $this->model_users->insertnbi($img);
              //$this->session->set_flashdata('asd','You have successfully uploaded a new image');
              $this->session->set_flashdata('uploadedsuccess', "<div class='alert alert-success' role='alert'><center><font size='2px'>You have successfully uploaded a new image</font></center></div>");
                redirect('main/checklist');

           }else{

                $this->session->set_flashdata('uploadedfailed', "<div class='alert alert-danger' role='alert'><center><font size='2px'>We only accept PNG JPG and GIF type of image</font></center></div>");
                redirect('main/checklist');


           }

  }








public function upload_carousel1($id){

    $config['upload_path']          = './images/';
        $config['allowed_types']     = 'gif|jpg|png';
        $config['max_size']          = 10000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('userfile')) {
            $data = array('upload_data' => $this->upload->data());

           $img = $data['upload_data']['file_name'];
           $this->load->model('model_admin');
           if($id==1){
           $this->model_admin->update_carousel1($img);

            }
            if($id==2){
            $this->model_admin->update_carousel2($img);
            }
            if($id==3){
            $this->model_admin->update_carousel3($img);
            }
            if($id==4){
            $this->model_admin->update_carousel4($img);
            }
            if($id==5){
            $this->model_admin->update_carousel5($img);
            }
            if($id==6){
            $this->model_admin->update_carousel6($img);
            }


           $this->session->set_flashdata('asd', "<div class='alert alert-success' role='alert'><center><font size='2px'>You have successfully uploaded a new image</font></center></div>");
               redirect('admin/manage_carousel');
        }
        else {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('fail', "<div class='alert alert-success' role='alert'><center><font size='2px'>You have successfully uploaded a new image</font></center></div>");

        redirect('admin/manage_carousel');
        }



}




function upload_carousel2(){

    $config['upload_path']          = './images/';
        $config['allowed_types']     = 'gif|jpg|png';
        $config['max_size']          = 10000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('userfile')) {
            $data = array('upload_data' => $this->upload->data());

           $img = $data['upload_data']['file_name'];
           $this->load->model('model_admin');
           $this->model_admin->update_carousel2($img);

            $this->load->view('admin/upload_success');
        }
        else {
          $error = array('error' => $this->upload->display_errors());
         $this->load->view('admin/upload_failed',$error);
        }



}


function upload_carousel3(){

    $config['upload_path']          = './images/';
        $config['allowed_types']     = 'gif|jpg|png';
        $config['max_size']          = 10000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('userfile')) {
            $data = array('upload_data' => $this->upload->data());

           $img = $data['upload_data']['file_name'];
           $this->load->model('model_admin');
           $this->model_admin->update_carousel3($img);

            $this->load->view('admin/upload_success');
        }
        else {
          $error = array('error' => $this->upload->display_errors());
         $this->load->view('admin/upload_failed',$error);
        }



}




        public function lostpassword(){


        $this -> load -> library('form_validation');
        $this -> load -> model('model_users');

        $this->form_validation->set_rules('femail', 'Email', 'required|valid_email|trim|callback_validate_lostemail');

        if($this -> form_validation -> run()){
                //$them_pass is the varible to be sent to the user's email
                $temp_pass = md5(uniqid());
                $insertcode = $this->model_users->insertTempPass($temp_pass, $_POST['femail']);




                          $this->load->library('email');
                            $config['charset'] = 'iso-8859-1';
                            $config['wordwrap'] = TRUE;
                            $config['mailtype'] = 'html';
                            $this -> load -> library('email');
                               $this->email->initialize($config);
          $this->email->from('autoresponder@ugmeme.com', "support");
            $this->email->to($this->input->post('femail'));
            $this->email->subject("Reset your Password");





            $message = "<p>This email has been sent as a request to reset our password</p>";
            $message .= "<p><a href='".base_url()."main/reset_password/$temp_pass'>Click here </a>if you want to reset your password,
                        if not, then ignore</p>";
            $this->email->message($message);

             if($this->email->send()){
                     $this->session->set_flashdata('emailsent', "<div class='alert alert-success' role='alert'><center><font size='2px'>Check your email for instructions, thank you</font></center></div>");
                      $this->load->view('forgotpassword');
             }


        }else{

            $this->load->view('forgotpassword');
        }

    }


    public function accountverified(){
         $this->load->view('verified');
    }


    public function verify($code){
        $this -> load -> model('model_users');
            if($this->model_users->is_code_valid($code)){

           //redirect(base_url()."main/changepassword/$temp_pass");
              redirect(base_url()."main/login_page");
        }else{
            echo "the key is not valid";
        }
    }



    public function reset_password($temp_pass){
    $this -> load -> model('model_users');
    if($this->model_users->is_temp_pass_valid($temp_pass)){

       redirect(base_url()."main/changepassword/$temp_pass");

    }else{
        echo "the key is not valid";
    }

}

public function changepassword(){
  $this ->load -> model('model_users');
  $this->load->view('changepassword');
}

public function changepass(){
  $this->load->model('model_users');
   $this -> load -> library('form_validation');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');
    $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
          $vcode = $_POST['encrypt'];
              if($this -> form_validation -> run()){
                      if($this->model_users->updatepassword($_POST['password'], $_POST['encrypt'])){
                          $this -> load -> view('loginpage');
                      }else{
                          redirect(base_url()."main/changepassword/$vcode");
                      }


              }else{
                redirect(base_url()."main/changepassword/$vcode");

              }

}

    public function validate_lostemail(){

            $this->load->model('model_users');

        if($this->model_users->checklostemail()){
            return true;
        }else{
            $this->form_validation->set_message('validate_lostemail', 'Sorry!, ICTSI cant recognized that email');
            return false;
        }



    }



            public function savejobs(){

                $this -> load -> model('model_users');


                        if($this->session->userdata('is_logged_in')){


                        $this -> load -> view('applicant_page_sj');
                        }else{
                            redirect('main');
                        }

            }


            public function insertsavejobs($job_id){

                $this ->load->model('model_users');

                if(!$this->model_users->savedisable($job_id)){
                    $data = array(
                  'sj_job_id' => $job_id,
                  'sj_app_id' => $this->session->userdata('applicant_id')
                  );

                if($this -> model_users->insertSJ($data)){

                    redirect('main/dashboard');
                }



                }else{

                    $this->session->set_flashdata('existingsavejob', "<div class='alert alert-warning' role='alert'><center><font size='2px'>This job is already saved.</font></center></div>");

                    redirect('main/dashboard');
                }



            }



            public function interviewsched(){

                $this ->load -> model('model_users');
                $this -> load -> view('interview_schedule');
            }




		public function job_description($job_id){
		$this->load->model('model_users');
		$data['jobdesc'] = $this->model_users->get_job_desc($job_id);
		$this->load->view('job_description', $data);
	}


	public function joblist(){
		$this -> load -> model('model_users');
                    $this->load->library('pagination');

		$data['datas'] = $this -> model_users -> get_jobs();


                     $config['base_url'] = base_url().'main/joblist/';
                     $config['total_rows']= $this->model_users->getjobscount();

                     $config['per_page'] = 10;
                     $config['full_tag_open'] = '<ul class="pagination">';
                     $config['full_tag_close'] = '</ul>';
                     $config['prev_link'] = '&laquo;';
                     $config['prev_tag_open'] = '<li>';
                     $config['prev_tag_close'] = '</li>';
                     $config['next_tag_open'] = '<li>';
                     $config['next_tag_close'] = '</li>';
                     $config['cur_tag_open'] = '<li class="active"><a href="#">';
                     $config['cur_tag_close'] = '</a></li>';
                     $config['num_tag_open'] = '<li>';
                     $config['num_tag_close'] = '</li>';
                     $config['uri_segment'] = 3;

                        $this->pagination->initialize($config);
                         $data['links'] = $this->pagination->create_links();

            		$this -> load -> view('job_list', $data);

	}


	public function FAQs(){
		$this -> load -> model('model_users');
		$data['datas'] = $this -> model_users -> get_FAQS();
		$this -> load -> view('FAQ', $data);
	}


    public function search_job(){
    $this->load->model('model_users');

    $this->load->library('form_validation');

    $this -> form_validation -> set_rules('job', 'Job','required');

    $job = $this->input->post('job');


if($this->model_users->search_jobs($job)){
$data['searched'] = $this->model_users->search_jobs($job);
$this->load->view('job_list',$data);
}else{
    $this->session->set_flashdata('pol','no results found');
    redirect('main/joblist');
}
}




	public function test(){
                    $this -> load -> model('model_users');
                    $this -> load -> model('model_admin');
		$this ->load->view('test');
	}


  public function login_page(){
  $this->load->model('model_users');
  $this->load->view('loginpage');
}



	public function login_validation()
	{

		$this -> load -> library('form_validation');
		$this -> load -> model('model_users');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|callback_validate_credentials|callback_check_verify');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|sha1');


		if($this -> form_validation -> run()){

              $online  = $this ->model_users->getonline($this->input->post('email'));

                  foreach ($online as $nvar) {

                $ONLINE = $nvar['online'];

                if($ONLINE == 0){



			$d = $this -> model_users -> getDetails($this->input->post('email'));



			 $data = array();
			foreach ($d as $details ) {




				$data = array(

					'fname' => $details->fname,
					'mname' => $details->mname,
					'lname' => $details->lname,
					'college' => $details->college,
					'college_de' => $details->college_de,
					'college_inc' => $details->college_inc,
					'collegeprog' => $details->collegeprog,
                                'salary' => $details->salary,

					'skills' => $details->skills,
					'applicant_id' => $details->id,
					'email' => $details->email,
                          'level' => $details->level,
                          'status' => $details->status,
                          'under_id' => $details->under_id,
                          'province' => $details->state,
                          'city' => $details->city_add,
					'is_logged_in' => 1,
                                'skypeuser' => $details->skypeuser,
                                'applicant_id' => $details->id,
                                'app_logged_in' => TRUE

					);


			}

                  $this -> model_users -> makeitonline($_POST['email']);
			//$match = $this -> model_users ->doMatch($this->session->userdata('skills'));
			$this -> session -> set_userdata($data);

			redirect('main/dashboard');

          }else{
                  $this->session->set_flashdata('acctopened', "<div class='alert alert-danger' role='alert'><center><font size='2px'>Your account is currently opened to another device.</font></center></div>");

                    $this -> load -> model('model_admin');
      $data['contents']= $this->model_admin->get_hpcontent($id=1);
    $data['posts']= $this->model_admin->get_footer($id=1);
    $data['photo']= $this->model_admin->get_banner($id=1);
      $this -> load ->view('loginpage', $data);

          }

    }//end of foreach

		}else{
			$this -> load -> model('model_admin');
			$data['contents']= $this->model_admin->get_hpcontent($id=1);
		$data['posts']= $this->model_admin->get_footer($id=1);
		$data['photo']= $this->model_admin->get_banner($id=1);
			$this -> load ->view('loginpage', $data);


		}



	}



  public function addskype(){
      $this -> load -> library('form_validation');
      $this -> load -> model('model_users');
      $this -> form_validation -> set_rules('skypeuser', 'Skype', 'required');
         if($this->form_validation->run()){
                  if($this->model_users->insertskype($_POST['skypeuser'])){

                         redirect("main/dashboard");
                  }else{

                  }
         }else{
              redirect("main/dashboard");
         }
  }



	 public function resume_validation(){
    $this -> load -> library('form_validation');
    $this -> load -> model('model_users');
    $this -> form_validation -> set_rules('ha', 'Highest Attainment');
    $this -> form_validation -> set_rules('college', 'College', 'required');
    $this -> form_validation -> set_rules('college_de', 'Degree Earned', 'required');
    $this -> form_validation -> set_rules('collegeprog', 'College Program', 'required');
    $this -> form_validation -> set_rules('college_inc', 'College year graduated', 'required');



    if($this->form_validation->run()){

      $_SESSION['ha'] = $this->input->post('ha');
      $_SESSION['college'] = $this->input->post('college');
      $_SESSION['college_de'] = $this->input->post('college_de');
      $_SESSION['college_inc'] = $this->input->post('college_inc');
      $_SESSION['collegeprog'] = $this->input->post('collegeprog');

      $this -> load -> view('reg_next');

    }else{

      $this -> load -> view('registration2');
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







	public function validate_registration(){

		$this -> load -> library('form_validation');
		$this -> form_validation -> set_rules('fname', 'First Name', 'required|trim|max_length[30]|callback_validate_space');
		$this -> form_validation -> set_rules('mname', 'Middle Name', 'required|trim|max_length[30]|callback_validate_space');
		$this -> form_validation -> set_rules('lname', 'Last Name', 'required|trim|max_length[30]|callback_validate_space');
		$this -> form_validation -> set_rules('gender', 'Gender', 'required');
		$this -> form_validation -> set_rules('citizenship', 'Citizenship', 'required|trim|alpha|max_length[30]');
		$this -> form_validation -> set_rules('religion', 'Religion', 'required|trim|alpha');
		//$this -> form_validation -> set_rules('height', 'Height', 'required|trim|numeric|callback_negativenum_h');
		//$this -> form_validation -> set_rules('weight', 'Weight', 'required|trim|numeric|callback_negativenum_w');
		$this -> form_validation -> set_rules('city', 'City ', 'required');
		$this -> form_validation -> set_rules('state', 'State', 'required');
		$this -> form_validation -> set_rules('contact', 'Contact', 'required|trim|numeric|exact_length[11]');
		$this -> form_validation -> set_rules('email', 'Email', 'required|valid_email|trim|is_unique[applicants.email]');
		$this -> form_validation -> set_rules('password', 'Password', 'required|trim|min_length[8]');
		$this -> form_validation -> set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
		$this -> form_validation -> set_rules('bdaym', 'Birthday Month', 'required');
		$this -> form_validation -> set_rules('bdayy', 'Birthday Year', 'required');
		$this -> form_validation -> set_rules('bdayd', 'Birthday Day', 'required');
		$this -> form_validation -> set_rules('sss', 'SSS No.', 'trim|numeric');
		$this -> form_validation -> set_rules('tin', 'TIN No.', 'trim|alpha_numeric');


		$this->form_validation->set_message('is_unique', 'That email address is already taken.');

		$this->load->model('model_users');

		if($this->form_validation->run()){
			// if($this->model_users->add_applicant()){
				$data = array(

				'fname' => $this->input->post('fname'),
				'mname' => $this->input->post('mname'),
				'lname' => $this->input->post('lname'),
				'gender' => $this->input->post('gender'),
				'citizenship' => $this->input->post('citizenship'),
				'religion' => $this->input->post('religion'),
				'height' => $this->input->post('height'),
				'weight' => $this->input->post('weight'),
				'city' => $this->input->post('city'),
				'state' => $this->input->post('state'),
				'contact' => $this->input->post('contact'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'bdayd' => $this->input->post('bdayd'),
				'bdaym' => $this->input->post('bdaym'),
				'bdayy' => $this->input->post('bdayy'),
				'sss' => $this->input->post('sss'),
				'tin' => $this->input->post('tin'),
				'college' => "",
				'college_de' => "",
				'collegeprog' => "",
				'college_inc' => 0,
				'salary' => 0,
				'poschoice1' => "",
				'poschoice2' => "",
				'skills' => "",
				'date_ava' => "",
				'ref' => ""







				);

			$this->session->set_userdata($data);


			// }

			$this -> load -> view('registration2');
		}else{
			$this -> load -> view('registration');
		}





	}
	

public function jobmatchmobile($id){

	$this->load->model('model_users');
	$this->load->model('model_admin');
	$skills = $this->model_users->doMatch2($id);
	$response1["jobmatches"] = array();
//	array_push($response1["jobmatches"], $skills);
echo json_encode(array('jobmatches'=>$skills));
	//echo json_encode($response1);
}
  
  public function insert_applicant(){

    $this -> load -> model('model_users');

    $applicant_id = $_POST['hidden_applicant_id'];

    $job_id = $_POST['hidden_job_id'];
    $date = date("Y")."/".date('m')."/".date('d');

	
if(empty($_POST['vlink'])){
	$data = array(
							'job_id_tr' => $job_id,
							'applicant_id_tr' => $applicant_id,
																'date_applied' => $date

							);
}else{
	$data = array(
							'job_id_tr' => $job_id,
							'applicant_id_tr' => $applicant_id,
																'date_applied' => $date,
																'video_link' => $_POST['vlink']

							);
}

     
			$fullname = "";
			$email ="";
			$userdetails = $this -> model_users ->getappname($applicant_id);
			$jobdetails = $this -> model_users ->getjobname($job_id);
			foreach ($userdetails as $keyuser) {
				$fullname = $keyuser['fname']." ".$keyuser['mname']." ".$keyuser['lname'];
				$email = $keyuser['email'];

			}
			foreach ($jobdetails as $jobdesc) {
				$this->load->library('email');
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				 $this->email->initialize($config);
				$this->email->from('ictsi@ugmeme.com', "ICTSI Application");
				$this->email->to($email);
				$this->email->subject("Job Application");
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
<h4>Greetings! ".$fullname.", we receive your application in this job</h4>
<br>


<h4> $jobdesc[job_title]</h4>
<strong>Date: </strong>$jobdesc[date_added]</br>
<strong>Skills: </strong> $jobdesc[job_skills]<br/>
<strong>Work Experience </strong> at least $jobdesc[work_exp]<br/>
<strong>Highest Attainment: </strong>$jobdesc[highest_att]<br/>
<strong>Expected Salary: </strong> $jobdesc[exp_salary]<br/>
<strong>Employment Type: </strong> $jobdesc[employment_type]<br/>


<p>Your application status is under review.</p><br>
<p> Thank you!</p>

<p>For inquiries, please call <b>9057929641</b> or <b>752-09-59</b></p>
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

	


			}
		 $this -> model_users ->insert_into_jobstransaction($data);
			


  }


  public function cancelApp(){
  	$this -> load ->model('model_users');

  	$applicant_id = $_POST['hidden_applicant_id'];

    	$job_id = $_POST['hidden_job_id'];
    	   $this -> model_users ->cancelApplication($applicant_id, $job_id);

  }






	public function negativenum_h($data){

		$this -> load ->model('model_users');

		if($data >1){


			return true;
		}else{
			$this -> form_validation -> set_message('negativenum_h', 'Height Must be positive number');
			return false;
		}



	}



	public function negativenum_w($data){

		$this -> load ->model('model_users');

		if($data >1){


			return true;
		}else{
			$this -> form_validation -> set_message('negativenum_w', 'Weight Must be positive number');
			return false;
		}



	}






	public function validate_credentials(){

		$this->load->model('model_users');

		if($this->model_users->can_log_in()){
			return true;
		}else{
			$this->form_validation->set_message('validate_credentials', 'Incorrect username or password');
			return false;
		}
	}

public function check_verify(){
    $this->load->model('model_users');

    if($this->model_users->verified()){
          return true;
    }else{
      $this->form_validation->set_message('check_verify', 'This account is not yet verified, please check your email.');

       $this->session->set_flashdata("notvery", "<div class='alert alert-info' role='alert'><font size='2px'>This account is not yet verified, please check your email.</font></div>");

        return false;
    }

}


  public function check_online(){

    $this->load->model('model_users');

    if($this->model_users->is_log_in()){
      return true;
    }else{
      $this->form_validation->set_message('check_online', 'Your account is currently opened in another device.');
      return false;
    }
  }




 public function last_validation(){
    $this -> load -> library('form_validation');
    $this -> load -> model('model_users');
    $this -> form_validation -> set_rules('firstc', 'First Choice', 'required');
    $this -> form_validation -> set_rules('secondc', 'Second Choice', 'required');
    $this -> form_validation -> set_rules('salary', 'Salary', 'required');
     $this -> form_validation -> set_rules('ava', 'Date Available', 'required');
    $this -> form_validation -> set_rules('skills[]', 'Skills', 'required');


    if($this->form_validation->run()){


           $arrayskills = $this ->input->post('skills[]');
              $newskills = "";
                            foreach ($arrayskills as $val) {
                                $newskills .= $val .",";
                            }
                             $length = mb_strlen($newskills)-1;
                            $removecomma =  mb_substr($newskills,0,$length);


     $_SESSION['poschoice1'] = $this->input->post('firstc');
     $_SESSION['poschoice2'] = $this->input->post('secondc');
     $_SESSION['salary'] = $this->input->post('salary');
     $_SESSION['skills'] = $removecomma;
     $_SESSION['date_ava'] = $this->input->post('ava');
     $_SESSION['ref'] = $this->input->post('ref');


      $this -> load -> view('final_registration');
      // $this->model_users->add_applicant();

    }else{

      $this -> load -> view('reg_next');
    }

  }






	public function apply(){
        $this -> load -> model('model_users');
		$this -> load -> view('registration');
	}

	public function jobdesc(){

		$this -> load -> view("job_description");
	}

	public function last(){

		$this -> load -> model('model_users');

		$this -> load -> view('reg_next');
	}

	public function next(){
		$this -> load -> view('registration2');
	}

	public function dashboard(){
		$this -> load -> model('model_users');
		$this -> load -> model('model_admin');

                        $prefs = array(
                        'start_day'    => 'sunday',
                        'month_type'   => 'long',
                        'show_next_prev'  => TRUE,
                        'next_prev_url'   => 'http://localhost/ictsi/main/dashboard/',

                        'day_type'     => 'short'
                );

                    $this->load->library('calendar', $prefs);

		if($this->session->userdata('is_logged_in')){


		$this -> load -> view('applicant_page');
		}else{
			redirect('main');
		}
	}


public function interview_respond($jobid){

        $this -> load ->model('model_users');

        $this ->model_users -> response($jobid);



}







  // function update_carousel(){
  //  	 $config['upload_path']          = './images/';
  //       $config['allowed_types']     = 'gif|jpg|png';
  //       $config['max_size']          = 10000;

  //       $this->load->library('upload', $config);
  //       $this->upload->initialize($config);
  //       if ($this->upload->do_upload('userfile')) {
  //           $data = array('upload_data' => $this->upload->data());

  //          $img = $data['upload_data']['file_name'];
  //          $this->load->model('model_admin');
  //          $this->model_admin->update_banner($img);

  //           $this->load->view('admin/upload_success');
  //       }
  //       else {
  //         $error = array('error' => $this->upload->display_errors());
  //        $this->load->view('admin/upload_failed',$error);
  //       }
  // }

  public function view_update_banner($id=1){
    $this->load->model('model_admin');
    $data['photo']= $this->model_admin->get_banner($id);
    $this->load->view('login', $data);
  }


  public function getcity($id){
  $this->load->model('model_users');
 $data['city'] = $this->model_users->get_city($id);
  $this->load->view('getcity',$data);
}


  // EDIT PROFILE
  public function edit_profile(){
  	$this->load->view('edit_profile');
  }

  public function edit_skills(){
  	$this ->load->model('model_users');
  //	$skills = $this->model_users->getSkills();
  	$this -> load -> library('form_validation');
	$this -> form_validation -> set_rules('skills[]', 'Skills', 'required');


	if($this->form_validation->run()==FALSE){


  	$this->load->view('edit_skills');
  	}else{
  	$email = $_SESSION['email'];
  	$skills = $this->input->post('skills');
	$ndata = "";
	  foreach ($skills as $key) {
			$ndata .= $key.",";
        }
		$length = mb_strlen($ndata)-1;
  $removecomma =  mb_substr($ndata,0,$length);

  	$this->model_users->update_skills($removecomma);
  	$this->load->view('applicant_page');
  	}
  }
  public function edit_education(){
  	$this->load->model('model_users');
  	$this->load->library('form_validation');
  	$this -> form_validation -> set_rules('ha', 'Highest Attainment','required');
	$this -> form_validation -> set_rules('college', 'College','required');
	$this -> form_validation -> set_rules('college_de', 'Degree Earned','required');
	$this -> form_validation -> set_rules('collegeprog', 'College Program','required');
	$this -> form_validation -> set_rules('college_inc', 'College year graduated','required');



	$email = $_SESSION['email'];
	if($this->form_validation->run()==FALSE){
		$this->session->set_flashdata('result', '');
		$this->load->view('edit_education');

	}else{
	$data = array(

	'ha' => $this->input->post('ha'),
	'college' => $this->input->post('college'),
	'college_de' => $this->input->post('college_de'),
	'college_inc' => $this->input->post('college_inc'),
	'collegeprog' => $this->input->post('collegeprog')

		);
	$this->model_users->update_education($data,$email);
	$this->session->set_flashdata('result', 'Updated Succesfully!');
	redirect('main/edit_education');
  	}
  }

  public function edit_aboutme(){
  	$this->load->model('model_users');
  	$this->load->library('form_validation');
  	$this -> form_validation -> set_rules('fname', 'First Name', 'required|trim|alpha|max_length[30]');
	$this -> form_validation -> set_rules('mname', 'Middle Name', 'required|trim|max_length[30]');
	$this -> form_validation -> set_rules('lname', 'Last Name', 'required|trim|max_length[30]');
	$this -> form_validation -> set_rules('gender', 'Gender', 'required');
	$this -> form_validation -> set_rules('citizenship', 'Citizenship', 'required|trim|alpha|max_length[30]');
	$this -> form_validation -> set_rules('religion', 'Religion', 'required|trim|alpha');
	$this -> form_validation -> set_rules('height', 'Height', 'required|trim|numeric|callback_negativenum_h');
	$this -> form_validation -> set_rules('weight', 'Weight', 'required|trim|numeric|callback_negativenum_w');
	$this -> form_validation -> set_rules('city', 'City ', 'required');
	$this -> form_validation -> set_rules('state', 'State', 'required');
	$this -> form_validation -> set_rules('contact', 'Contact', 'required|trim|numeric');
	$this -> form_validation -> set_rules('email', 'Email', 'required|valid_email|trim|is_unique[applicants.email]');
	$this -> form_validation -> set_rules('password', 'Password', 'required|trim');
	$this -> form_validation -> set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
	$this -> form_validation -> set_rules('bdaym', 'Birthday Month', 'required');
	$this -> form_validation -> set_rules('bdayy', 'Birthday Year', 'required');
	$this -> form_validation -> set_rules('bdayd', 'Birthday Day', 'required');
	$email = $_SESSION['email'];
	if($this->form_validation->run()==FALSE){
		$this->load->view('edit_aboutme');
			$this->session->set_flashdata('result', '');

	}else{

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
				'city' => $this->input->post('city'),
				'state' => $this->input->post('state'),
				'contact' => $this->input->post('contact'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'bday' => $bday
				);
  	$this->model_users->update_aboutme($data,$email);
	$this->session->set_flashdata('result', 'Updated Succesfully!');
  	redirect('main/edit_aboutme');
  	}
  }

  public function add_addinfo(){
  	$this->load->model('model_users');
  	$this->load->library('form_validation');

  	$this -> form_validation -> set_rules('salary', 'Salary','required');
	$this -> form_validation -> set_rules('years', 'Years');
	$this -> form_validation -> set_rules('position', 'Position');

	if($this->form_validation->run()){
   echo  $_POST['years'];
        $data =array(
            'working_years' => $_POST['years'],
            'working_position' => $_POST['position'],
            'salary' => $_POST['salary']
          );
        if($this->model_users->update_addinfo($data)){

                $this->session->set_flashdata("su", "<div class='alert alert-success' role='alert'><font size='2px'>Succesfully updated.</font></div>");

                redirect("main/edit_addinfo");
        }
	}


  }

  public function edit_addinfo(){
    $this->load->model('model_users');
       $this->load->view('edit_addinfo');
  }





  function update_profilepic(){
        $foldername = sha1($_SESSION['applicant_id']);
   	 $config['upload_path']          = "./users/$foldername/";
        $config['allowed_types']     = 'gif|jpg|png';
        $config['max_size']          = 10000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('userfile')) {
            $data = array('upload_data' => $this->upload->data());
           $img = $data['upload_data']['file_name'];
 	// $id = $_SESSION['applicant_id'];
        $this->load->model('model_users');
        $this->model_users->update_profpic($img);
 		redirect('main/edit_aboutme');
        }


  }



public function view_profpic(){
	$email = $_SESSION['email'];
    $this->load->model('model_users');
    $data['photos'] = $this->model_users->get_profpic($email);
    $this->load->view('edit_aboutme', $data);
  }


  // END EDIT PROFILE

	public function logout()
	{
              $this->load->model('model_users');
              $this -> model_users ->logout($_SESSION['applicant_id']);
		$this -> session ->sess_destroy();

		redirect(base_url());
	}
 public function save_jobs(){


 		  $this -> load -> model('model_users');


                        if($this->session->userdata('is_logged_in')){


                        $this -> load -> view('save_jobs');
                        }else{
                            redirect('main');
                        }

	}

public function view_resume(){
	$this -> load -> model('model_users');
	if($this->session->userdata('is_logged_in')){
		//$this -> load -> view('view_resume');
		$id = $_SESSION['applicant_id'];
		$data['details']= $this->model_users->get_applicant_details($id);
    	$this->load->view('view_resume', $data);

	}else{
		redirect('main');
	}
}

public function submit(){
    $this -> load -> library('form_validation');


     $this -> load -> model('model_users');





      if($this->model_users->add_applicant()){
                  $newid = 0;

                 $dumpid = $this->model_users->getid($_SESSION['email']);

                          foreach ($dumpid as $varid) {
                              $newid = $varid['id'];
                          }





                                        $foldername = sha1($newid);
                                   // mkdir("C:/xampp/htdocs/ictsi/users/$foldername", 0755);
                                     mkdir("/home/ugmeme/public_html/ictsi/users/$foldername", 0755);
                                    // sa online ugmeme.com/ictsi
             $this -> session ->sess_destroy();
             $this->session->set_flashdata('regsuccess', "<div class='alert alert-success' role='alert'><center><font size='2px'>You have successfully created an account...</font></center></div>");

              redirect(base_url()."main");


      }

   else{

     $this -> load -> model('model_users');
     $this -> load -> view('final_registration');
   }


  }


public function view_application(){
	$this -> load -> model('model_users');
	if($this->session->userdata('is_logged_in')){
		$this -> load -> view('view_application');


	}else{
		redirect('main');
	}
}



public function delete_sjobs($id){
	$this->load->model('model_users');
	if($this->model_users->delete_sjobs($id));
	redirect(base_url() . "main/save_jobs");


}


public function job_result(){
  $this->load->model('model_users');

  $this->load->view('job_result');
}

public function dosearch(){
   $this->load->model('model_users');
       $this -> load -> library('form_validation');
       $this -> form_validation -> set_rules('job', 'job','required');

       if($this->form_validation->run()){

              $data['match'] = $this -> model_users -> getWork_area($_POST['job']);

                $this->load->view('job_result', $data);


       }else{
        echo "NGANGA";

       }


}

public function share_job(){
  $this->load->model('model_users');
  $this->load->library('recaptcha');
  $this->load->view('share');
}


public function shareviaemail(){
         $this->load->library('recaptcha');
         $this->load->model('model_users');
         $this -> load -> library('form_validation');
         $this -> form_validation -> set_rules('fname', 'First name','required');
         $this -> form_validation -> set_rules('lname', 'Last name','required');
         $this -> form_validation -> set_rules('emails[]', 'Email','required');
         $this -> form_validation -> set_rules('g-recaptcha-response', 'Captcha','required');
           if($this->form_validation->run()){


                $this->model_users->sendmail($_POST['jobid'], $_POST['emails'], $_POST['fname'], $_POST['lname']);
                             $this->session->set_flashdata('sent', "<div class='alert alert-success' role='alert'><center><font size='2px'>You have successfully sent!</font></center></div>");


                          redirect("main/share_job/$_POST[jobid]");


            }else{
                $this->load->view('share');
            }


}





}
