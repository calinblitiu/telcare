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
        $data['fname'] 	    = " ";
        $data['lname']		= " ";
        $data['dob']		= " ";
        $data['email']		= " ";
        $data['ssn']		= " ";
        $data['gender']		= " ";
        $data['addr']		= " ";
        $data['pwd']    	= " ";
        if($this->input->get_post('fname')) {
            $data['fname'] = $this->input->get_post('fname');
        }
        if($this->input->get_post('fname')) {
            $data['lname'] = $this->input->get_post('lname');
        }
        if($this->input->get_post('fname')) {
            $data['dob'] = $this->input->get_post('dob');
        }
        if($this->input->get_post('fname')) {
            $data['email'] = $this->input->get_post('email');
        }
        if($this->input->get_post('fname')) {
            $data['ssn'] = $this->input->get_post('ssn');
        }
        if($this->input->get_post('fname')) {
            $data['gender'] = $this->input->get_post('gender');
        }
        if($this->input->get_post('fname')) {
            $data['addr'] = $this->input->get_post('addr');
        }
        if($this->input->get_post('fname')) {
            $data['pwd'] = md5($this->input->get_post('pwd'));
        }

        $patient = $this->patient_model->getPatientEmail($data['email']);

        if($patient)
        {
            $returndata = array(
                "success" => 0,
                "error" => "User is aleady exist",
                "data" => "signup error"
            );
            echo json_encode($returndata);
            exit();
        }
        $data['img'] = "";
        if (isset($_FILES['img'])) {
            $uploaddir = './assets/uploads/patient/';
            $path = $_FILES['img']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $uname = time() . uniqid(rand());
            $uploadfile = $uploaddir . $uname . '.' . $ext;
            $file_name = $uname . "." . $ext;
            if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
                $data['img'] = $file_name;
            } else {
                $data['img'] = "";
            }
        }
        $data['token'] = md5(uniqid(rand(), true));
        if($this->patient_model->addNewPatient($data))
        {
            $returndata['success'] = 1;
            $returndata['error'] = "Login Success";
            $temp['token'] = $data['token'];
            $returndata['data'] = $temp;
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
            $return_data['data'] = "There is not user";
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
                    'token'             => $token,
                    'img'               => $patient['img'],
                    'email'             => $patient['email'],
                    'fname'             => $patient['fname'],
                    'lname'             => $patient['lname'],
                    'gender'            => $patient['gender'],
                    'dob'               => $patient['dob'],
                    'ssn'               => $patient['ssn'],
                    'addr'              => $patient['addr'],
                    'did'               => $patient['did']
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
                $return_data["error"] = "login sucsess";
                echo json_encode($return_data);
                exit();

            }
            else
            {
                $return_data['success'] = 0;
                $return_data['error'] = 'Password is invalid.';
                $return_data['data'] = "Password is invalid";
                echo json_encode($return_data);
                exit();
            }
        }
    }

    public function logOut()
    {
        $token = $this->input->post('token');
        $patient = $this->patient_model->getPatientToken($token);
        if($patient)
        {
            $this->patient_model->setToken($patient['pid']);
        }
        $array_items = array('user_type', 'token','patient_id');
        $this->session->unset_userdata($array_items);
    }

}
