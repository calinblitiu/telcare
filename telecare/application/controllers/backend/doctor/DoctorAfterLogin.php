<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/16/2017
 * Time: 4:38 PM
 */
use OpenTok\OpenTok;
use OpenTok\MediaMode;
use OpenTok\ArchiveMode;
use OpenTok\Archive;
use OpenTok\OutputMode;
use OpenTok\Role;

class DoctorAfterLogin extends CI_Controller
{
    public $token = "";
    public $doctor;
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

    public function getMyPatients()
    {
        $data['did'] = $this->doctor['did'];
        $data['is_treated'] = "yes";
        $patients = $this->patient_model->getPatients($data);

        if (!$patients)
        {
            $return_data["success"] = 0;
            $return_data["error"] = "There is no patients";
            echo json_encode($return_data);
            exit();
        }

        for ($i = 0; $i<count($patients); $i++)
        {
            $temp_img = $patients[$i]["img"];

            if($temp_img == "" || $temp_img == null)
            {
                $patients[$i]["img"] = base_url()."assets/uploads/patient/no-img.png";
            }
            else{
                $patients[$i]["img"] = base_url()."assets/uploads/patient/".$temp_img;
            }


            $where_array = array(
                'pid'   =>  $patients[$i]['pid']
            );

            $schedule = $this->schedule_model->getScheduleData($where_array);
            if(!$schedule)
            {
                $patients[$i]['note'] = "";
                $patients[$i]['history'] = "";
            }
            else{
                $patients[$i]['note'] = $schedule['note'];
                $histories = explode(',',$schedule['history']);
                if (count($histories) <= 0)
                {
                    $patients[$i]['history'] = "";
                }
                else
                {
                    $temp_histories = array();
                    foreach ($histories as $history)
                    {
                        if($history != "" && $history){
                            $temp_histories[] = base_url()."assets/uploads/schedule/".$history;
                        }
                    }
                    $patients[$i]['history'] = $temp_histories;
                }
            }
        }

        $return_data["success"] = 1;
        $return_data["data"] = $patients;
        echo json_encode($return_data);
        exit();
    }

    public function getNewPatients()
    {
        $data['did'] = $this->doctor['did'];
        $data['is_treated'] = "no";
        $patients = $this->patient_model->getPatients($data);
        if (!$patients)
        {
            $return_data["success"] = 0;
            $return_data["error"] = "There is no new patients";
            echo json_encode($return_data);
            exit();
        }
        for ($i = 0; $i<count($patients); $i++)
        {
            $temp_img = $patients[$i]["img"];
            if($temp_img == "" || $temp_img == null)
            {
                $patients[$i]["img"] = base_url()."assets/uploads/patient/no-img.png";
            }
            else{
                $patients[$i]["img"] = base_url()."assets/uploads/patient/".$temp_img;
            }

            $where_array = array(
                'pid'   =>  $patients[$i]['pid']
            );

            $schedule = $this->schedule_model->getScheduleData($where_array);
            if(!$schedule)
            {
                $patients[$i]['note'] = "";
                $patients[$i]['history'] = "";
            }
            else{
                $patients[$i]['note'] = $schedule['note'];
                $histories = explode(',',$schedule['history']);
                if (count($histories) <= 0)
                {
                    $patients[$i]['history'] = "";
                }
                else
                {
                    $temp_histories = array();
                    foreach ($histories as $history)
                    {
                        if($history != "" && $history){
                            $temp_histories[] = base_url()."assets/uploads/schedule/".$history;
                        }
                    }
                    $patients[$i]['history'] = $temp_histories;
                }
            }
        }

        $return_data["success"] = 1;
        $return_data["data"] = $patients;
        echo json_encode($return_data);
        exit();
    }

    public function acceptPatient($is_accept)
    {
        $patient_email = $this->input->post("email");
        $patient = $this->patient_model->getPatientEmail($patient_email);

        if (!$patient)
        {
            $return_data['success'] = 0;
            $return_data['error'] = "There is not patient";
            echo json_encode($return_data);
            exit();
        }

        $data['is_accepted'] = $is_accept;

        if(!$this->patient_model->setPatientEmailData($patient_email,$data))
        {
            $return_data['success'] = 0;
            $return_data['error'] = "Patient is already accepted";
            if($is_accept == "no")
            {
                $return_data['error'] = "Patient is already declined";
            }
            echo json_encode($return_data);
            exit();
        }

        $return_data['success'] = 1;
        $return_data['error'] = "Patient is accepted";
        if($is_accept == "no")
        {
            $return_data['error'] = "Patient is declined";
        }
        echo json_encode($return_data);
        exit();
    }

    public function getTodaySchedule()
    {
        $data = array(
            "did" => $this->doctor['did']
        );
        $patients = $this->patient_model->getPatientsData($data);

        if(!$patients)
        {
            $return_data['success'] = 0;
            $return_data['error'] = "There is not patient";
            echo json_encode($return_data);
            exit();
        }

       // var_dump($patients);

        $return_data['success'] = 0;
        $return_data['error'] = "There is not today Schedule";
        $temp_schedule_patients = array();
        $today = date('Y-m-d h:i:s');
        $today_string = date('Y-m-d');//$today->format('Y-m-d');
        $today_max = date($today_string." 23:59:59");

        foreach ($patients as $patient)
        {
            $temp_today_schedule = $this->schedule_model->getTodaySchedule($patient['pid']);

            if ($temp_today_schedule)
            {
                $schedule_time = date($temp_today_schedule['date']);
                if($schedule_time >= $today and $schedule_time<=$today_max)
                {
                    $return_data['success'] = 1;
                    $return_data['error'] = "There is some schedule";
                    $temp_img = $patient['img'];
                    if($temp_img == "" || $temp_img == null)
                    {
                        $patient["img"] = base_url()."assets/uploads/patient/no-img.png";
                    }
                    else{
                        $patient["img"] = base_url()."assets/uploads/patient/".$temp_img;
                    }

                    $patient['note'] = $temp_today_schedule['note'];
                    $histories = explode(',',$temp_today_schedule['history']);
                    if (count($histories) <= 0)
                    {
                        $patient['history'] = "";
                    }
                    else
                    {
                        $temp_histories = array();
                        foreach ($histories as $history)
                        {
                            if($history != "" && $history){
                                $temp_histories[] = base_url()."assets/uploads/schedule/".$history;
                            }
                        }
                        $patient['history'] = $temp_histories;
                    }

                    $temp_schedule_patients[] = $patient;
                }
            }
        }
        $return_data['data'] = $temp_schedule_patients;

        echo json_encode($return_data);
        exit();
    }

    public function upComingAppointment()
    {
        $data = array(
            "did" => $this->doctor['did']
        );
        $patients = $this->patient_model->getPatientsData($data);

        if(!$patients)
        {
            $return_data['success'] = 0;
            $return_data['error'] = "There is not patient";
            echo json_encode($return_data);
            exit();
        }


        $return_data['success'] = 0;
        $return_data['error'] = "There is not today Schedule";
        $temp_data = array();

        $today = date('Y-m-d h:i:s');


        foreach ($patients as $patient)
        {
            $temp_schedules = $this->schedule_model->getSchedules(array('pid'=>$patient['pid']));
            if($temp_schedules)
            {
                $return_data = array();
                foreach ($temp_schedules as $schedule)
                {
                    $schedule_time = date($schedule['date']);
                    if($schedule_time >= $today )
                    {
                        $return_data['success']  = 1;
                        $return_data['error'] = "There are some schedules";
                        $temp_img = $patient['img'];
                        if($temp_img == "" || $temp_img == null)
                        {
                            $patient["img"] = base_url()."assets/uploads/patient/no-img.png";
                        }
                        else{
                            $patient["img"] = base_url()."assets/uploads/patient/".$temp_img;
                        }
                        $temp['patient'] = $patient;
                        $temp['schedule'] = $schedule;
                        $temp_data[] = $temp;
                    }
                }
            }

        }
        $return_data['data'] = $temp_data;
        echo json_encode($return_data);
        exit();
    }

    public function eOPATPatients()
    {
        $data = array(
            "did" => $this->doctor['did']
        );
        $patients = $this->patient_model->getPatientsData($data);

        if(!$patients)
        {
            $return_data['success'] = 0;
            $return_data['error'] = "There is not patient";
            echo json_encode($return_data);
            exit();
        }

        // var_dump($patients);

        $return_data['success'] = 0;
        $return_data['error'] = "There is not today Schedule";
        $temp_schedule_patients = array();
        $today = date('Y-m-d h:i:s');
        $today_string = date('Y-m-d');//$today->format('Y-m-d');
        $today_max = date($today_string." 23:59:59");
        // var_dump($today_max);
//        var_dump($today);
        foreach ($patients as $patient)
        {
            $temp_today_schedule = $this->schedule_model->getTodaySchedule($patient['pid']);

            if ($temp_today_schedule)
            {
                $schedule_time = date($temp_today_schedule['date']);
                if($schedule_time >= $today && $schedule_time<=$today_max)
                {
                    $return_data['success'] = 1;
                    $return_data['error'] = "There is some schedule";
                    $temp_img = $patient['img'];
                    if($temp_img == "" || $temp_img == null)
                    {
                        $patient["img"] = base_url()."assets/uploads/patient/no-img.png";
                    }
                    else{
                        $patient["img"] = base_url()."assets/uploads/patient/".$temp_img;
                    }

                    $patient['note'] = $temp_today_schedule['note'];
                    $histories = explode(',',$temp_today_schedule['history']);
                    if (count($histories) <= 0)
                    {
                        $patient['history'] = "";
                    }
                    else
                    {
                        $temp_histories = array();
                        foreach ($histories as $history)
                        {
                            if($history != "" && $history){
                                $temp_histories[] = base_url()."assets/uploads/schedule/".$history;
                            }
                        }
                        $patient['history'] = $temp_histories;
                    }

                    $temp_schedule_patients[] = $patient;
                }
            }
        }
        $return_data['data'] = $temp_schedule_patients;

        echo json_encode($return_data);
        exit();
    }


    public function getPriorConsults()
    {
        $data = array(
            "did" => $this->doctor['did'],
            "is_treated" => "yes",
            "email" => $this->input->post('email')
        );
        $patients = $this->patient_model->getPatientsData($data);

        if(!$patients)
        {
            $return_data['success'] = 0;
            $return_data['error'] = "There is not patient";
            echo json_encode($return_data);
            exit();
        }

        $where_data['pid'] = $patients[0]['pid'];

        $temp_schedules = $this->schedule_model->getSchedules($where_data);
        $return_schedules = array();
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
                $return_schedules[] = $temp_schedule;
            }
            $return_data['success'] = 1;
            $return_data['data'] = $return_schedules;
            echo json_encode($return_data);
            exit();
        }
        $return_data['success'] = 0;
        $return_data['error'] = "There is not any history";
        echo json_encode($return_data);
        exit();
    }


//    public function reqCall()
//    {
//        $patient_email = $this->input->post("email");
//        $is_call = $this->input->post("is_call");//0: calling, 1 : receive
//        $patient = $this->patient_model->getPatientEmail($patient_email);
//        if(!$patient)
//        {
//            $return_data['success'] = 0;
//            $return_data['error'] = "There is not patient";
//            echo json_encode($return_data);
//            exit();
//        }
//
//        $today_schedule = $this->schedule_model->getTodaySchedule($patient['pid']);
//        $current_schedule = $today_schedule;
//        if(!$today_schedule)
//        {
//            $return_data['success'] = 0;
//            $return_data['error'] = "There is not schedule";
//            echo json_encode($return_data);
//            exit();
//        }
//
//        if($today_schedule['opentok_session_id'] !="" && $today_schedule['opentok_token'] != "")
//        {
//            $return_data['success'] = 1;
//            $temp['opentok_session_id'] = $today_schedule['opentok_session_id'];
//            $temp['opentok_token'] = $today_schedule['opentok_token'];
//            $return_data['data'] = $temp;
//            echo json_encode($return_data);
//            if($is_call == "0") {
//                $this->sendNotification($patient);
//            }
//            exit();
//        }
//
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
//        $return_data['success'] = 1;
//        $return_data['data'] = $opentok;
//        echo json_encode($return_data);
//        $this->sendNotification($patient);
//        exit();
//    }


    public function reqCall()
    {
        $patient_email = $this->input->post("email");
        $is_call = $this->input->post("is_call");//0: calling, 1 : receive
        $patient = $this->patient_model->getPatientEmail($patient_email);
        if(!$patient)
        {
            $return_data['success'] = 0;
            $return_data['error'] = "There is not patient";
            echo json_encode($return_data);
            exit();
        }

        $today_schedule = $this->schedule_model->getTodaySchedule($patient['pid']);

        if(!$today_schedule)
        {
            $return_data['success'] = 0;
            $return_data['error'] = "There is not schedule";
            echo json_encode($return_data);
            exit();
        }

        $room_id = $today_schedule['room_id'];
        if($today_schedule['room_id'] == "" || $today_schedule['room_id'] == null) {
            $room_id = md5(uniqid(rand(), true));
        }

        $opentok = $this->getOpentokSessionAndToken($room_id);
        if($opentok)
        {
            $return_data['success'] = 1;
            $temp_data['opentok_session_id'] = $opentok['sessionId'];
            $temp_data['opentok_token'] = $opentok['token'];
            $temp_data['room_id'] = $room_id;
            $this->schedule_model->updateSchedule($today_schedule['id'],$temp_data);
            $return_data['data'] = $temp_data;
            echo json_encode($return_data);
            if($is_call == "0") {
                $this->sendNotification($patient);
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
        $patient_email = $this->input->post("email");
        $archiveId = $this->input->post('archiveId');
        $patient = $this->patient_model->getPatientEmail($patient_email);
        if(!$patient)
        {
            $return_data['success'] = 0;
            $return_data['error'] = "There is not patient";
            echo json_encode($return_data);
            exit();
        }

        $today_schedule = $this->schedule_model->getTodaySchedule($patient['pid']);

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
        //$this->opentok->startArchive($sessionId);
        if ($token == null || $sessionId == null)
        {
            $data["success"] = 0;
            $data["error"] = "Opentok session create error";
            return $data;
        }
        $data['opentok_session_id'] = $sessionId;
        $data['opentok_token'] = $token;
        return $data;
    }

    public function getSchedules()
    {
        $patients = $this->patient_model->getPatients(array('did'=>$this->doctor['did']));
        $return_data = array();
        if ($patients) {
            foreach ($patients as $patient) {
                $schedules = $this->schedule_model->getSchedules(array('pid' => $patient['pid']));
                if ($schedules) {
                    foreach ($schedules as $schedule) {
                        $temp['id'] = $schedule['id'];
                        $temp['title'] = $schedule['note'];
                        $temp['start'] = $schedule['date'];
                        $temp['schedule'] = $schedule;
                        $temp['patient'] = $patient;
                        $return_data[] = $temp;
                    }
                }
            }
        }
        echo json_encode($return_data);
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

        $this->doctor = $this->doctor_model->getDoctorToken($this->token);
        if(!$this->doctor)
        {
            $return_data['success'] = 0;
            $return_data['error'] = "You are not logged user. You have to login again";
            echo json_encode($return_data);
            exit();
        }
    }


    public function sendNotification($patient)
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

        $data['type'] = 0;
        $data['message'] = 'Hello! '.$patient["fname"]." ".$patient["lname"]." is requesting call!";
        $data['receiver'] = $patient;
        $data['sender'] = $this->doctor;
        $pusher->trigger('my-channel', 'my-event', $data);
    }

    public function sendMessage()
    {
        $receivers = $this->input->post('receivers');
        $msg = $this->input->post('msg');
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
        $data['type'] = 1;// 0 req call notification, 1 : send message from doctor to patients
        $data['receiver'] = $receivers;
        $data['sender'] = $this->doctor;
        $data['message'] = $msg;
        $pusher->trigger('my-channel', 'my-event', $data);

        $return_data['success'] = 1;
        echo json_encode($return_data);
    }

}
?>