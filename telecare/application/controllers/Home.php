<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	////////////////////////////////
	/////  Front End ///////////////
	////////////////////////////////

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function signUpDoctor()
	{
		$this->load->view('doctor/signup');
	}
}
