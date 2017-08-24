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
        $this->load->model('schedule_model');
    }

    public function index()
    {
        $this->load->view('mokup/Home');
    }

    public function patientPortal()
    {
        $this->load->view('mokup/patientportal');
    }

    public function providerPortal(){
        $this->load->view('mokup/provider_portal/providerportal');
    }

    public function hospital()
    {
        $this->load->view('mokup/Hospital');
    }

    public function login()
    {
        $this->load->view('mokup/login');
    }

    public function signUp(){
        $this->load->view('mokup/signup');
    }

    public function consultOrSecondOpinion()
    {
        $this->load->view('mokup/service/consultorsecondopinion');
    }

    public function eoPAT()
    {
        $this->load->view('mokup/service/eopat');
    }

    public function contactUS()
    {
        $this->load->view('mokup/contactus');
    }

    public function providerInfectiouse()
    {
        $this->load->view('mokup/provider_portal/infectious');
    }

    public function providerRefering()
    {
        $this->load->view('mokup/provider_portal/refering_provider');
    }

    public function providerRegisteration()
    {
        $this->load->view('mokup/provider_portal/registeration_provider');
    }

    public function referingPhysicianSignup()
    {
        $this->load->view('mokup/provider_portal/refering_physician_singup');
    }

    public function patientEducation()
    {
        $this->load->view('mokup/service/patient_education');
    }

    public function startToFinish()
    {
        $this->load->view('mokup/service/start_to_finish');
    }

    public function videoAudioMessaging()
    {
        $this->load->view('mokup/video_audio_messaging');
    }

    public function directory()
    {
        $this->load->view('mokup/footer/directory');
    }

    public function about()
    {
        $this->load->view('mokup/footer/about');
    }

    public function dashboard()
    {
        $this->load->view('mokup/dashboard');
    }

    public function patientDashBoard()
    {
        $this->load->view('mokup/patient_dashboard');
    }

    public function privacyPolicy()
    {
        $this->load->view('mokup/privacy_policy');
    }

    public function termsAndCondition()
    {
        $this->load->view('mokup/terms_and_condition');
    }

    public function accountsPage()
    {
        $this->load->view('mokup/account_page');
    }

    public function services()
    {
        $this->load->view('mokup/service/services');
    }

    public function checkOut()
    {
        $this->load->view('mokup/check_out');
    }

    public function pusherTest()
    {
        $this->load->view('mokup/pusher_test');
    }

    public function sendNotification()
    {
        $options = array(
            'cluster' => 'us2',
            'encrypted' => true
        );
        $pusher = new Pusher\Pusher(
            '4d19d5b3edbd8e1743b4',
            'e568f9f7c0b1af9ab21d',
            '387748',
            $options
        );

        $data['message'] = 'hello world';
        $pusher->trigger('my-channel', 'my-event', $data);
    }

}
