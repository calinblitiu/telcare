<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/22/2017
 * Time: 2:20 AM
 */?>
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mokup extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('doctor_model');
        $this->load->model('patient_model');
        $this->load->model('shedule_model');
    }
}
