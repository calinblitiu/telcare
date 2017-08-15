<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	////////////////////////////////
	/////  Front End ///////////////
	////////////////////////////////

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function signUpDoctor()
	{
		$this->load->view('layout/header');
		$this->load->view('doctor/signup');
	}

	public function loginDoctor()
    {
        $this->load->view('layout/header');
        $this->load->view('doctor/login');
    }

    public function signUpPatient()
    {
        $this->load->view('layout/header');
        $this->load->view('patient/signup');
    }
}
