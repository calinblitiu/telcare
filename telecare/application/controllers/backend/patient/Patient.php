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
        $data['dod']		= $this->input->get_post('dod');
        $data['email']		= $this->input->get_post('email');
        $data['ssn']		= $this->input->get_post('ssn');
        $data['gender']		= $this->input->get_post('gender');
        $data['addr']		= $this->input->get_post('addr');
        $data['pwd']    	= md5($this->input->get_post('pwd'));

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

        $doctor = $this->doctor_model->getDoctorEmail($email);

        if(!$doctor)
        {
            $return_data['success'] = 0;
            $return_data['error'] = 'There is not user';
            echo json_encode($return_data);
            exit();
        }
        else
        {
            $hash_pwd = md5($pwd);
            if($hash_pwd == $doctor['password'])
            {
                $token = md5(uniqid(rand(), true));
                $sess_data = array(
                    'user_type'         => USER_TYPE_DOCTOR,
                    'email'             => $token,
                    'doctor_id'         => $doctor['did']
                );
                $this->session->set_userdata($sess_data);

                $return_data['success'] = 1;
                $temp = array();
                $temp['fname'] = $doctor['fname'];
                $temp['lname'] = $doctor['lname'];
                $temp['spec']  = $doctor['spec'];
                $temp['type']  = $doctor['type'];
                $temp['email'] = $doctor['email'];
                $temp['state'] = $doctor['state'];
                $temp['lang']  = $doctor['lang'];
                $temp['dea']  = $doctor['dea'];
                $temp['npi']  = $doctor['npi'];
                $temp['img']  = base_url()."assets/uploads/doctor/".$doctor['img'];
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

}
