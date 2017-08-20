<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/16/2017
 * Time: 4:38 PM
 */?>
<?php
class DoctorAfterLogin extends CI_Controller
{
    public $token = "";
    public $doctor;

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
        }

        $return_data["success"] = 1;
        $return_data["data"] = $patients;
        echo json_encode($return_data);
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

        $this->doctor = $this->doctor_model->getDoctorToken($this->token);
        if(!$this->doctor)
        {
            $return_data['success'] = 0;
            $return_data['error'] = "You are not logged user. You have to login again";
            echo json_encode($return_data);
            exit();
        }
    }


}
?>