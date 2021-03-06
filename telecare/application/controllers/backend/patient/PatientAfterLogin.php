<?php

/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/16/2017
 * Time: 4:31 PM
 */
use \Stripe\Stripe;
use OpenTok\OpenTok;
use OpenTok\MediaMode;
use OpenTok\ArchiveMode;
use OpenTok\Archive;


class PatientAfterLogin extends CI_Controller
{
    public $token = "";
    public $patient;
    private $opentok_apikey = "45947752";
    private $opentok_secret = "a6663c33deec1bba20ed0ebc02a29c1460e7f0a1";
    private $opentok;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('patient_model');
        $this->load->model('doctor_model');
        $this->load->model('schedule_model');

        $this->token = $this->input->post('token');
        //$this->checkTokenSession();
        $this->checkToken();

    }

    public function setSchedule()
    {
        $data['pid'] = $this->patient['pid'];
        $data['date'] = $this->input->post('date');
        $data['note'] = $this->input->post('note');
        $data['history'] = $this->input->post('history');
        if($this->schedule_model->addNewSchedule($data))
        {
            $return_data['success'] = 1;
            $return_data['error'] = "Add new schedule success";
            $return_data['data'] = "Add new schedule success";
            echo json_encode($return_data);
            exit();
        }

        $return_data['success'] = 0;
        $return_data['error'] = "Add new schedule fail";
        $return_data['data'] = "Add new schedule fail";
        echo json_encode($return_data);
        exit();

    }

    public function uploadHistoryAttach(){
        $uploaddir = './assets/uploads/schedule/';
        $path = $_FILES['img']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $uname = time().uniqid(rand());
        $uploadfile = $uploaddir .$uname.'.'.$ext;
        $file_name = $uname.".".$ext;
        if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
            //$this->sample_item_model->editItemField($item_no,$field,$file_name);
            $temp['img'] = $file_name;
            $data['data'] = $temp;
            $data['success'] = 1;
            echo json_encode($data);
            exit();
        }

        $data['error'] = "Upload fail";
        $data['success'] = 0;
        echo json_encode($data);
        exit();
    }

    public function uploadFile(){
        $uploaddir = './assets/uploads/schedule/';
        $path = $_FILES['file']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $uname = time().uniqid(rand());
        $uploadfile = $uploaddir .$uname.'.'.$ext;
        $file_name = $uname.".".$ext;
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
            //$this->sample_item_model->editItemField($item_no,$field,$file_name);
            $setdata['uploadfiles'] = $this->patient['uploadfiles'].$file_name.",";
            if(!$this->patient_model->setPatientEmailData($this->patient['email'],$setdata)){
                $data['error'] = "Database Transaction Fail.";
                $data['success'] = 0;
                echo json_encode($data);
                exit();
            }
            $temp['img'] = $file_name;
            $data['data'] = $temp;
            $data['success'] = 1;
            echo json_encode($data);
            exit();
        }

        $data['error'] = "Upload fail";
        $data['success'] = 0;
        echo json_encode($data);
        exit();
    }

    public function getUploads()
    {
        $uploads_arr = array();
        $uploads_str = $this->patient['uploadfiles'];
        $temp = explode(',',$uploads_str);
        foreach ($temp as $item){
            if($item != "") {
                $temp_url = base_url() . "assets/uploads/schedule/".$item;
                $uploads_arr[] = $temp_url;
            }
        }

        $schedules = $this->schedule_model->getSchedules(array('pid'=>$this->patient['pid']));
        if($schedules)
        {
            foreach ($schedules as $schedule)
            {
                if($schedule['history'] != "" && $schedule['history'] != null)
                {
                    $temp = explode(',',$schedule['history']);
                    foreach ($temp as $item){
                        if($item != "") {
                            $temp_url = base_url() . "assets/uploads/schedule/".$item;
                            $uploads_arr[] = $temp_url;
                        }
                    }
                }
            }
        }

        echo json_encode($uploads_arr);
    }

    public function getSchedules()
    {
        $data['pid'] = $this->patient['pid'];
        $schedules = $this->schedule_model->getSchedules($data);
        $return_data = array();
        foreach ($schedules as $schedule)
        {
            $temp['id'] = $schedule['id'];
            $temp['start'] = $schedule['date'];
            $temp['title'] = $schedule['note'];

            $return_data[] = $temp;
        }
        echo json_encode($return_data);
    }

    public function setScheduleIOS(){
        $data['pid'] = $this->patient['pid'];
        $data['date'] = $this->input->post('date');
        $data['note'] = $this->input->post('note');

        $upload_count = $this->input->post('attach_count');
        if($upload_count <= 0 || !isset($upload_count))
        {
            $return_data['success'] = 0;
            $return_data['error'] = "There is not any attachments, please upload some files";
            echo json_encode($return_data);
            exit();
        }
        $data['history'] = "";
        for ($i = 0;$i<$upload_count;$i++)
        {
            $uploaddir = './assets/uploads/schedule/';
            $path = $_FILES['img_'.$i]['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $uname = time().uniqid(rand());
            $uploadfile = $uploaddir .$uname.'.'.$ext;
            $file_name = $uname.".".$ext;
            if (move_uploaded_file($_FILES['img_'.$i]['tmp_name'], $uploadfile)) {
                $data['history'] = $data['history'].$file_name.",";
            }
        }

        if ($data['history'] == "")
        {
            $return_data['success'] = 0;
            $return_data['error'] = "file upload happens error";
            echo json_encode($return_data);
            exit();
        }

        if($this->schedule_model->addNewSchedule($data))
        {
            $return_data['success'] = 1;
            $return_data['error'] = "Add new schedule success";
            $return_data['data'] = "Add new schedule success";
            echo json_encode($return_data);
            exit();
        }

        $return_data['success'] = 0;
        $return_data['error'] = "Add new schedule fail";
        echo json_encode($return_data);
        exit();

    }

    public function getIdDoctor()
    {
       if($this->patient['did'] == "" || $this->patient['did'] == null)
       {
           $return_data['success'] = 0;
           $return_data['error'] = "You are not alloced to any Doctor";
           echo json_encode($return_data);
           exit();
       }
        $doctor = $this->doctor_model->getDoctorId($this->patient['did']);

       if(!$doctor)
       {
           $return_data['success'] = 0;
           $return_data['error'] = "This doctor is remove in database.";
           echo json_encode($return_data);
           exit();
       }

       $return_data['success'] = 1;
       if($doctor['img'] == "" || $doctor['img'] == null)
       {
           $doctor['img'] = base_url()."assets/uploads/doctor/no-img.png";
       }
       else{
           $doctor['img'] = base_url()."assets/uploads/doctor/".$doctor['img'];
       }
       $return_data['data'] = $doctor;
       echo json_encode($return_data);
       exit();
    }

//    public function reqCall()
//    {
//        $doctor = $this->doctor_model->getDoctorId($this->patient['did']);
//        $is_call = $this->input->post("is_call");//0: calling, 1 : receive
//        if($this->patient['did'] == "" || $this->patient['did'] == null)
//        {
//            $return_data['success'] = 0;
//            $return_data['error'] = "You are not alloced to any Doctor";
//            echo json_encode($return_data);
//            exit();
//        }
//
//        $current_schedule = $this->schedule_model->getScheduleCurrent($this->patient['pid']);
//        if(!$current_schedule){
//            $return_data['success'] = 0;
//            $return_data['error'] = "You have not schedule,please add new schedule";
//            echo json_encode($return_data);
//            exit();
//        }
//
//        if($current_schedule['opentok_session_id'] != "" && $current_schedule['opentok_token'] != "")
//        {
//            $opentok_val['opentok_session_id'] = $current_schedule['opentok_session_id'];
//            $opentok_val['opentok_token'] = $current_schedule['opentok_token'];
//            $data['success'] = 1;
//            $data['data'] = $opentok_val;
//            echo json_encode($data);
//            if($is_call == "0") {
//                $this->sendNotification($doctor);
//            }
//            exit();
//        }
//
//        //$this->load->helper('opentok');
//        $opentok = $this->createNewOpentokSession();
//
//        if(!$opentok)
//        {
//            $data["success"] = 0;
//            $data["error"] = "Opentok Session creation is failed!";
//            $data['data'] = $opentok;
//            echo json_encode($data);
//            exit();
//        }
//
//        if(!$this->schedule_model->updateSchedule($current_schedule['id'],$opentok))
//        {
//            $return_data['success'] = 0;
//            $return_data['error'] = "Opentok session is not added to database";
//            echo json_encode($return_data);
//            exit();
//        }
//
//        $return_data['success'] = 1;
//        $return_data['data'] = $opentok;
//        $this->sendNotification($doctor);
//        echo json_encode($return_data);
//        //exit();
//    }

    public function reqCall()
    {
        $doctor = $this->doctor_model->getDoctorId($this->patient['did']);
        $is_call = $this->input->post("is_call");//0: calling, 1 : receive
        if($this->patient['did'] == "" || $this->patient['did'] == null)
        {
            $return_data['success'] = 0;
            $return_data['error'] = "You are not alloced to any Doctor";
            echo json_encode($return_data);
            exit();
        }

        $current_schedule = $this->schedule_model->getScheduleCurrent($this->patient['pid']);
        $room_id = $current_schedule['room_id'];
        if($current_schedule['room_id'] == "" || $current_schedule['room_id'] == null) {
            $room_id = md5(uniqid(rand(), true));
        }

        $opentok = $this->getOpentokSessionAndToken($room_id);
        if($opentok)
        {
            $return_data['success'] = 1;
            $temp_data['opentok_session_id'] = $opentok['sessionId'];
            $temp_data['opentok_token'] = $opentok['token'];
            $temp_data['room_id'] = $room_id;
            $this->schedule_model->updateSchedule($current_schedule['id'],$temp_data);
            $return_data['data'] = $temp_data;
            echo json_encode($return_data);
            if($is_call == "0") {
               // $this->sendNotification($doctor);
            }
            exit();
        }
        else{
            $return_data['success'] = 0;
            $return_data['error'] = "Opentok session and token error";
        }
    }

    public function getOpentokSessionAndToken($room_id)
    {
        $url = $this->config->item('heroku_url')."room/".$room_id;
        $ch = curl_init();
        // Disable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set the url
        curl_setopt($ch, CURLOPT_URL,$url);
        // Execute
        $result=curl_exec($ch);
        // Closing
        curl_close($ch);

        // Will dump a beauty json :3
        $result = json_decode($result, true);
        if ($result == null)
        {
            return false;
        }
        //echo json_encode($result);
        return $result;
    }

    public function saveArchiveId()
    {
        $archiveId = $this->input->post('archiveId');

        $today_schedule = $this->schedule_model->getTodaySchedule($this->patient['pid']);

        if(!$today_schedule)
        {
            $return_data['success'] = 0;
            $return_data['error'] = "There is not schedule";
            echo json_encode($return_data);
            exit();
        }

        $temp_recods = "";

        if($today_schedule['rec_videos'] == "")
        {
            $temp_recods = $archiveId;
        }
        else{
            $temp_recods = $today_schedule['rec_videos'].",".$archiveId;
        }

        $this->schedule_model->updateSchedule($today_schedule['id'],array('rec_videos'=>$temp_recods));
        $return_data['success'] = 1;
        $return_data['error'] = "save successfully";
        echo json_encode($return_data);
        exit();

    }

   public function createNewOpentokSession()
    {
        $this->opentok = new OpenTok($this->opentok_apikey, $this->opentok_secret);
        $session = $this->opentok->createSession();
        $sessionId = $session->getSessionId();
        $token = $session->generateToken();

       if ($token == null || $sessionId == null)
       {
           $data["success"] = 0;
           $data["error"] = "Opentok session create error";
          return $data;
       }

       //$this->opentok->startArchive($sessionId);
       $data['opentok_session_id'] = $sessionId;
       $data['opentok_token'] = $token;
       return $data;
    }

    public function getRecordedVideos()
    {
        $data['pid'] = $this->patient['pid'];
        $schedules = $this->schedule_model->getSchedules($data);
        $return_data = array();
        if ($schedules) {
            $return_data['success'] = 1;
            $videos = array();
            foreach ($schedules as $schedule) {
                $temp_videos = $schedule['rec_videos'];
                $temp_videos = explode(',', $temp_videos);
                if(count($temp_videos)>0)
                {
                    foreach ($temp_videos as $archiveId) {
                        if($archiveId != "") {
                            $videos[] = $this->config->item('heroku_url') . "archive/" . $archiveId . "/view";
                        }
                    }
                }
            }
            $return_data['data'] = $videos;
            echo json_encode($return_data);
            exit();
        }
        $return_data['success'] = 0;
        $return_data['error'] = "There are not schedules";
    }

    function setDuration()
    {
        $duration = $this->input->post('duration');
        $doctor = $this->doctor_model->getDoctorId($this->session->userdata('did'));

        if(!$doctor)
        {
            exit();
        }
        else
        {
            $today = date('Y-m-d h:i:s');
            $today_string = date('Y-m-d');//$today->format('Y-m-d');
            $today_max = date($today_string." 23:59:59");
            $current_schedule = $this->schedule_model->getScheduleCurrent($this->session->userdata("patient_id"));
            $schedule_time = date($current_schedule['date']);

            if($current_schedule)
            {
                if($schedule_time >= $today && $schedule_time<=$today_max)
                {
                    $data['duration'] = $duration+$current_schedule['duration'];
                    $this->schedule_model->updateSchedule($current_schedule['id'],$data);
                }
                else{
                    exit();
                }
            }
            else{
                exit();
            }
        }
    }

    public function checkOut()
    {
        $stripe_token = $this->input->post('stripeToken');//$_POST['stripeToken'];
        $amount = $this->input->post('amount');//$_POST['amount'];
        $stripe_charge="";
        Stripe::setApiKey("sk_test_B9TdZJeFIk4d01GXdy0vVM9q");
        try{
            $stripe_charge = \Stripe\Charge::create(array(
                "amount" => $amount,
                "currency" => "usd",
                "card" => $stripe_token,
                "description" => "test"
            ));
        }catch (Exception $e)
        {
            $return_data['success'] = 0;
            $return_data['error'] = "Payment happens error";
            echo json_encode($return_data);
            exit();
        }
        $return_data['success'] = 1;
        $return_data['data'] = "payement successed";
        echo json_encode($return_data);
        exit();
    }

    public function getPriorConsults()
    {
        $where_data['pid'] = $this->patient['pid'];
        $temp_schedules = $this->schedule_model->getSchedules($where_data);
        $return_data = array();
        if ($temp_schedules)
        {
            foreach ($temp_schedules as $temp_schedule)
            {
                $temp_history = $temp_schedule['history'];
                $temp_history = explode(',',$temp_history);
                $temp_history_arr = array();
                foreach ($temp_history as $history_item)
                {
                    if($history_item)
                    {
                        $temp_history_arr[] = base_url().'assets/uploads/schedule/'.$history_item;
                        $temp_schedule['history'] = $temp_history_arr;
                    }
                }

                $return_data[] = $temp_schedule;
            }

            $data['success'] = 1;
            $data['schedules'] = $return_data;
            echo json_encode($data);
            exit();
        }

        $data['success'] = 0;
        $data['error'] = "There is not any Schedules";
        echo json_encode($data);
        exit();
    }

    private function checkTokenSession(){
        if($this->session->userdata('token')){
            $return_data['success'] = 0;
            $return_data['error'] = 'session is destroied';
            echo json_encode($return_data);
            exit();
        }
    }

    private function checkToken()
    {
        if($this->token == "" || !isset($this->token) || $this->token == null){
            $return_data['success'] = 0;
            $return_data['error'] = 'You have to post token';
            echo json_encode($return_data);
            exit();
        }

        $this->patient = $this->patient_model->getPatientToken($this->token);
        if(!$this->patient)
        {
            $return_data['success'] = 0;
            $return_data['error'] = "You are not logged user. You have to login again";
            echo json_encode($return_data);
            exit();
        }
    }



    public function sendNotification($doctor)
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

       // $data["msg"] = "aaa";
        $data['type'] = 0;
        $data['message'] = 'Hello! '.$doctor["fname"]." ".$doctor["lname"]." is requesting call!";
        $data['receiver'] = $doctor;
        $data['sender'] = $this->patient;
        $pusher->trigger('my-channel', 'my-event', $data);

    }
}