<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/15/2017
 * Time: 11:32 AM
 */?>

<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Patient extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('patient_model');

    }

    public function signUp()
    {
        $data['fname'] 	    = $this->input->get_post('fname');
        $data['lname']		= $this->input->get_post('lname');
        $data['dob']		= $this->input->get_post('dob');
        $data['email']		= $this->input->get_post('email');
        $data['ssn']		= $this->input->get_post('ssn');
        $data['gender']		= $this->input->get_post('gender');
        $data['addr']		= $this->input->get_post('addr');
        $data['pwd']    	= md5($this->input->get_post('pwd'));

        $patient = $this->patient_model->getPatientEmail($data['email']);
        if(count($patient) > 0)
        {
            $returndata = array(
                "success" => 0,
                "error" => "User is aleady exist",
                "data" => "signup error"

            );
            echo json_encode($returndata);
            exit();
        }

        $uploaddir = './assets/uploads/patient/';
        $path = $_FILES['img']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $uname = time().uniqid(rand());
        $uploadfile = $uploaddir .$uname.'.'.$ext;
        $file_name = $uname.".".$ext;
        if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
            $data['img'] = $file_name;
        } else {
            $data['img'] = "";
        }

        if($this->patient_model->addNewPatient($data))
        {
            $returndata = array(
                "success" => 1,
                "error" => "Signup succesed!",
                "data" => "signup successed"

            );
            echo json_encode($returndata);
            exit();
        }
        else
        {
            $returndata = array(
                "success" => 0,
                "error" => "signup error",
                "data" => "signup is error"
            );

            echo json_encode($returndata);
            exit();
        }
    }

    public function logIn()
    {
        $email = $this->input->post('email');
        $pwd = $this->input->post('pwd');

        $patient = $this->patient_model->getPatientEmail($email);

        if(!$patient)
        {
            $return_data['success'] = 0;
            $return_data['error'] = 'There is not user';
            echo json_encode($return_data);
            exit();
        }
        else
        {
            $hash_pwd = md5($pwd);
            if($hash_pwd == $patient['pwd'])
            {
                $token = md5(uniqid(rand(), true));
                $sess_data = array(
                    'user_type'         => USER_TYPE_PATIENT,
                    'patient_id'        => $patient['pid'],
                    'token'             => $token
                );
                $this->session->set_userdata($sess_data);

                $this->patient_model->setToken($this->session->userdata('patient_id'),$token);

                $return_data['success'] = 1;
                $temp = array();
                $temp['token'] = $token;
                $temp['fname'] = $patient['fname'];
                $temp['lname'] = $patient['lname'];
                $temp['email'] = $patient['email'];
                $temp['dob']   = $patient['dob'];
                $temp['ssn']   = $patient['ssn'];
                $temp['addr']  = $patient['addr'];
                $temp['gender']  = $patient['gender'];
                $temp['img']   = base_url()."assets/uploads/patient/".$patient['img'];
                $return_data['data'] = $temp;

                echo json_encode($return_data);
                exit();

            }
            else
            {
                $return_data['success'] = 0;
                $return_data['error'] = 'Password is invalid.';
                echo json_encode($return_data);
                exit();
            }
        }
    }

    public function logOut()
    {
        $this->patient_model->setToken($this->session->userdata('patient_id'),"");
        $array_items = array('user_type', 'token','patient_id');
        $this->session->unset_userdata($array_items);
    }

}
