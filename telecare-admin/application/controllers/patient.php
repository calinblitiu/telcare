<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/23/2017
 * Time: 10:44 AM
 */
if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Patient extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('doctor_model');
        $this->load->model('patient_model');
        $this->load->model('schedule_model');
        $this->isLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'Telecare Admin: Patients';
        $this->global['patients'] = $this->patient_model->getAllPatients();

        $this->loadViews("patient/patientlist", $this->global, NULL , NULL);
    }

    public function newPatients()
    {
        $this->global['pageTitle'] = 'Telecare Admin: New Ptients';
        //$this->global['newpatients'] = array();
         $patients = $this->patient_model->getNewPatients();
         $temp_patients = array();
         foreach ($patients as $patient) {
             $schedule = $this->schedule_model->getSchedule($patient['pid']);
             if($schedule)
             {
                $temp_patients[] = $patient;
             }
         }

         $this->global['newpatients'] = $temp_patients;

        $this->loadViews("patient/newpatientlist", $this->global, NULL , NULL);
    }

    public function newPatient($pid)
    {
        $this->global['pageTitle'] = 'Telecare Admin: Patients';
        $this->global['patient'] = $this->patient_model->getPatientPid($pid);

        if(!$this->global['patient'])
        {
            redirect("404_override");
        }

        $this->global['doctors'] = $this->doctor_model->getAllDoctors();

        $this->loadViews("patient/newpatient", $this->global, NULL , NULL);
    }

    public function setDidToPid()
    {
        $did = $this->input->post('did');
        $pid = $this->input->post('pid');
        $date = $this->input->post('datetime');

        $lastschedule = $this->schedule_model->getLastSchedule($pid);

        if($this->patient_model->setDidToPid($pid,$did) && $lastschedule && $this->schedule_model->setDateTime($lastschedule['id'],$date))
        {
            $return_data['success'] = 1;
            $return_data['msg'] = "success";
            echo json_encode($return_data);
            exit();
        }
        $return_data['success'] = 0;
        $return_data['msg'] = "error";
        echo json_encode($return_data);
        exit();
    }
}