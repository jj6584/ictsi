<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emp extends CI_Controller {

            public function index(){

                $this -> login();
            }

            public function login(){

                $this -> load ->view('emp/emp_login');
            }


            public function dashboard(){
                $this -> load -> model('model_emp');
                $this -> load -> view('emp/emp_dashboard');
            }

			public function mobile_dashboard(){
                $this -> load -> model('model_emp');
                $this -> load -> view('emp/mp_for_mobile');

            }

            public function referralform(){
              $this -> load -> model('model_emp');
                $this -> load -> view('emp/emp_ref_form');
            }

            public function referral_validation(){
                $this->load->library('form_validation');
                $this->load->model('model_emp');

                $this-> form_validation -> set_rules('fname', 'First Name', 'required');
                $this-> form_validation -> set_rules('lname', 'Last Name', 'required');
                $this-> form_validation -> set_rules('skills[]', 'Skills', 'required');
                $this-> form_validation -> set_rules('year', 'Year of Expirience', 'required');
                $this-> form_validation -> set_rules('pos', 'Position', 'required');

                if($this->form_validation->run()){

					$newskills = "";
					$arrayofskills = $_POST['skills'];
					foreach($arrayofskills as $varskills){
						$newskills .= $varskills .",";
					}
					  $length = mb_strlen($newskills)-1;
                            $removecomma =  mb_substr($newskills,0,$length);

                  $data = array(
                     'fname' => $this->input->post('fname'),
                     'lname'=> $this->input->post('lname'),
                     'skills'=> $removecomma,
                     'years_expi'=> $this->input->post('year'),
                     'work_position'=> $this->input->post('pos')
                     );

                     $referallnotifs = array(
                       'type_id' => 9,
                       'sender_id' => $_SESSION['emp_id']
                     );

                     $this -> model_emp ->insertreferralnotif($referallnotifs);
                  $this->model_emp->insert_referral($data);
                  redirect(base_url() . "emp/referralform");

                }else{

                  $this -> load -> view('emp/emp_ref_form');
                }
            }

            public function request(){
                $this -> load -> model('model_emp');
                $this -> load -> view('emp/emp_req_form');
            }

            public function request_validation(){
                $this->load->library('form_validation');
                $this->load->model('model_emp');

                $this-> form_validation -> set_rules('position', 'Vacant Position', 'required');
                $this-> form_validation -> set_rules('deptname', 'Department Name', 'required');
                $this-> form_validation -> set_rules('skills[]', 'Skills', 'required');
                $this-> form_validation -> set_rules('year', 'Year of Expirience', 'required');

                $this-> form_validation -> set_rules('emptype', 'Employee Type', 'required');
                $this-> form_validation -> set_rules('jobslots', 'Job slots', 'required');

                if($this->form_validation->run()){
					$newskills = "";
					$arrayofskills = $_POST['skills'];
					foreach($arrayofskills as $varskills){
						$newskills .= $varskills .",";
					}
					  $length = mb_strlen($newskills)-1;
                            $removecomma =  mb_substr($newskills,0,$length);
                  $data = array(
                    'job_position' => $this->input->post('position'),
                     'dept_name'=> $this->input->post('deptname'),
                     'skills_requirements'=> $removecomma,
                     'work_expi'=> $this->input->post('year'),

                     'employment_type' => $this->input->post('emptype'),
					 'job_slots' => $this->input->post('jobslots'),
					 'emp_id' => $_SESSION['emp_id']
                     );

                  $this->model_emp->insert_request($data);
                      $notifs = array(
                        'type_id' => 8,
                        'sender_id' => $_SESSION['emp_id']

                      );

                      $this ->model_emp->insertmanpowernotif($notifs);

                  redirect(base_url() . "emp/request");

                }else{

                  $this -> load -> view('emp/emp_req_form');
                }
              }

            public function logout(){

                  $this -> session ->sess_destroy();
                  redirect(base_url() . "emp");
            }

            public function submiteval(){


                  $this->load->library('form_validation');
                  $this->load->model('model_emp');
                   $this->form_validation->set_rules('evalcontrol[]', 'evaluation', 'required');
                      if($this->form_validation->run()){
                        $sum = 0;
                        $counter = 0;

                $d = $_POST['evalcontrol'];

                foreach ($d as $key) {
                    $sum +=$key;
                    $counter++;
                }

                $average = $sum / $counter;

                            if($this->model_emp->inserteval($_POST['evalcontrol'], $_POST['empID'], $average)){
                                redirect('emp/dashboard');
                            }


                      }else{
                        redirect('emp/dashboard');
                      }

            }

			public function submiteval_mobile(){


                  $this->load->library('form_validation');
                  $this->load->model('model_emp');
                   $this->form_validation->set_rules('evalcontrol[]', 'evaluation', 'required');
                      if($this->form_validation->run()){
                        $sum = 0;
                        $counter = 0;

                $d = $_POST['evalcontrol'];
				$theid = $_POST['sessionID2'];

                foreach ($d as $key) {
                    $sum +=$key;
                    $counter++;
                }

                $average = $sum / $counter;

                            if($this->model_emp->inserteval($_POST['evalcontrol'], $_POST['empID'], $average)){
                                redirect("emp/mobile_dashboard?id=$theid");
                            }


                      }else{
                        redirect('emp/mobile_dashboard');
                      }

            }


            public function getevalquestions(){

                  $this->load->library('form_validation');
                  $this->load->model('model_emp');

                 $this->form_validation->set_rules('evalform', 'Employee Id', 'required');
                      if($this->form_validation->run()){

                                    $this->session->set_flashdata("eval", $_POST['evalform']);


                                      redirect("emp/dashboard");



                      }else{
                        echo "nganga!";
                      }


            }

			public function getevalquestions_mobile(){

                  $this->load->library('form_validation');
                  $this->load->model('model_emp');

                 $this->form_validation->set_rules('evalform', 'Employee Id', 'required');
                      if($this->form_validation->run()){

                                    $this->session->set_flashdata("eval", $_POST['evalform']);

										$theid = $_POST['sessionID'];
                                      redirect("emp/mobile_dashboard?id=$theid");



                      }else{
                        echo "nganga!";
                      }


            }





            public function employee_validation(){
                    $this->load->library('form_validation');
                 $this->form_validation->set_rules('empid', 'Employee Id', 'required|trim|callback_validate_emp');
                 $this->form_validation->set_rules('emppass', 'Password', 'required|trim|sha1');
                 if($this->form_validation->run()){
                     $d = $this -> model_emp -> getDetails($this->input->post('empid'));
                        foreach ($d as $details) {
                            $data = array(

                          'emp_id' => $details->c_emp_id,
                          'emp_fname' => $details->c_e_name,
                          'emp_mname' => $details->c_e_mname,
                          'emp_lname' => $details->c_e_lname,
                          'is_logged_in' => 1

                          );
                        }

                        $this -> session -> set_userdata($data);

                        redirect('emp/dashboard');
                 }else{

                    $this -> login();
                 }

            }

            public function validate_emp(){
                 $this->load->model('model_emp');
                  if($this->model_emp->emp_log_in()){
                    return true;
                  }else{
                    $this->form_validation->set_message('validate_emp', 'Incorrect username or password');
                        return false;
                  }
            }

			public function profile(){
                $this->load->model('model_emp');
                $this->load->view('emp/emp_profile');
              }

              public function edit_profile(){
                $this->load->model('model_emp');
                $this->load->view('emp/emp_editprofile');
              }


}
