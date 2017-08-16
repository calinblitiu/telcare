<?php

/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/16/2017
 * Time: 4:31 PM
 */
class PatientAfterLogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('token')){
            redirect('/');
        }

        $this->load->model('patient_model');
        $this->load->model('doctor_model');
    }

}