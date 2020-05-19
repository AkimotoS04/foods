<?php

class About extends CI_Controller
{
    /**
     * Main foods page which containes all
     * all available foods.
     **/
    public function __construct()
	{
		parent::__construct();
        $this->load->library('session');
        $this->load->model('food_model');
    }
    public function index()
    {
        $data['title'] = 'About';
        if ($this->session->userdata('user_type') != null) {
            if ($this->session->userdata('user_type') == 0 && strcmp($this->session->userdata('email'),'superadmin@gmail.com') == 0) {

                $data['new'] = $this->food_model->get_request();

            }
        }
     
        $this->load->view('templates/header', $data);
        $this->load->view('about/index', $data);
        $this->load->view('templates/footer');

    }
}