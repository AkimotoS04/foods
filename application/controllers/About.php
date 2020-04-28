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
    }
    public function index()
    {
        $data['title'] = 'About';
     
        $this->load->view('templates/header');
        $this->load->view('about/index', $data);
        $this->load->view('templates/footer');

    }
}