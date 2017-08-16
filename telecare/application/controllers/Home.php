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
	    $this->load->view('layout/header');
		$this->load->view('home');
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

    public function loginPatient()
    {
        $this->load->view('layout/header');
        $this->load->view('patient/login');
    }

    /*
     * common
     */

    public function forgetPassword()
    {
        //$email = $this->inpput->post('email');
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 587,
            'smtp_user' => 'gaedongshoe@gmail.com',
            'smtp_pass' => 'Soksunae',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );
        $message = 'hello';
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('gaedongshoe@gmail.com'); // change it to yours
        $this->email->to('rubby.star@hotmail.com');// change it to yours
        $this->email->subject('Resume from JobsBuddy for your Job posting');
        $this->email->message($message);
        if($this->email->send())
        {
            echo 'Email sent.';
        }
        else
        {
            show_error($this->email->print_debugger());
        }


    }

    public function f_forgetPassword($token)
    {
        $this->load->view('layout/header');
        $this->load->view('forgetpassword');

    }

}
