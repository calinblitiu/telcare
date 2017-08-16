<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	////////////////////////////////
	/////  Front End ///////////////
	////////////////////////////////

    public function __construct()
    {
        parent::__construct();
        $this->load->model('doctor_model');
        $this->load->model('patient_model');
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
        $email = $this->inpput->post('email');
        $user_type = $this->input->post('user_type');

        $receiver = null;

        if($user_type == USER_TYPE_DOCTOR)
        {
            $receiver =$this->doctor_model->getDoctorEmail($email);
        }
        else if($user_type == USER_TYPE_PATIENT)
        {
            $receiver =$this->patient_model->getPatientEmail($email);
        }
        else
        {
            $return_data['success'] = 0;
            $return_data['message'] = "there is not user type like that";
            echo json_encode($return_data);
            exit();
        }

        if(!$receiver)
        {
            $return_data['success'] = 0;
            $return_data['message'] = "there is not register email";
            echo json_encode($return_data);
            exit();
        }

        $forget_token = md5(uniqid(rand(), true));
        if($user_type == USER_TYPE_DOCTOR)
        {
            $this->doctor_model->setForgetToken($email,$forget_token);
        }
        else if($user_type == USER_TYPE_PATIENT)
        {
            $this->doctor_model->setForgetToken($email,$forget_token);
        }

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 587,
            'smtp_user' => 'gaedongshoe@gmail.com',
            'smtp_pass' => 'Soksunae',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );
        $message = "you can reset password in this url ".base_url()."f_reset_passsword/".$user_type."/".$forget_token;
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('gaedongshoe@gmail.com'); // change it to yours
        //$this->email->to($email);// change it to yours
        $this->email->to('rubby.star@hotmail.com');
        $this->email->subject('reset password for');
        $this->email->message($message);
        if($this->email->send())
        {
            //echo 'Email sent.';
            $return_data['success'] = '1';
            $return_data['message'] = 'mail send success';
            echo json_encode($return_data);
            exit();
        }
        else
        {
           // show_error($this->email->print_debugger());
            $return_data['success'] = 0;
            $return_data['message'] = "mail send error";
            echo json_encode($return_data);
            exit();
        }

    }

    public function f_resetPassword($user_type,$forget_token)
    {
        $this->load->view('layout/header');

        $receiver = null;

        if($user_type == USER_TYPE_DOCTOR)
        {
            $receiver = $this->doctor_model->getDoctorForgetToken($forget_token);
        }
        else if($user_type == USER_TYPE_PATIENT)
        {
            $receiver = $this->patient_model->getPatientForgetToken($forget_token);
        }
        else
        {
            $this->load->view('errorpage');
            //exit();
            return;
        }

        if (!$receiver || $forget_token == ""){
            $this->load->view('errorpage');
            //exit();
            return;
        }

        $data['user_type'] = $user_type;
        $data['data'] = $receiver;
        $data['forget_token'] = $forget_token;

        $this->load->view('resetpassword',$data);
    }

}
