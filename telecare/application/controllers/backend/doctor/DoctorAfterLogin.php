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
    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('token')==null){
            $return_data['success'] = 0;
            $return_data['error'] = 'session is destroied';
            echo json_encode($return_data);
            exit();
        }

        $this->load->model('patient_model');
        $this->load->model('doctor_model');
    }

    public function getOnCallDoctor()
    {
        $doctor = $this->doctor_model->getOnCallDoctor();

        if(!$doctor){
            $return_data['success'] = 0;
            $return_data['error'] = 'There is not on call doctor';
            echo json_encode($return_data);
            exit();
        }

        $return_data['success'] = 1;
        $return_data['img'] = base_url()."assets/uploads/doctor/".$doctor['img'];

        if($doctor['img'] == "" || $doctor['img'] == null)
        {
            $return_data['img'] = base_url()."assets/uploads/doctor/no-img.png";
        }

        echo json_encode($return_data);
        exit();

    }

}
?>