<?php



class My404 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->output->set_status_header('404');
        // $data['content'] = 'error_404s'; // View name
        $this->load->view('error_404s');//loading in my template
    }





}




?>