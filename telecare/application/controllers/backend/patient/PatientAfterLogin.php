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
            $return_data['success'] = 0;
            $return_data['error'] = 'session is destroied';
            echo json_encode($return_data);
            exit();
        }

        $this->load->model('patient_model');
        $this->load->model('doctor_model');
    }

    public function setSchedule()
    {
        $token = $this->input->post('token');
        $this
    }

}