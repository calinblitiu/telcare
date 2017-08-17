<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/18/2017
 * Time: 4:13 AM
 */?>

<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Patient extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function setSchedule(){
        $this->load->view('layout/header');
        $this->load->view('patient/setschedule');
    }
}
