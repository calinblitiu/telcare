<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Doctor extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();

        $this->load->model('doctor_model');
          
    }

    public function signUp()
    {
    	 $data['type'] 		= $this->input->get_post('type');
    	 $data['fname'] 	= $this->input->get_post('fname');
    	 $data['lname']		= $this->input->get_post('lname');
    	 $data['spec']		= $this->input->get_post('spec');
    	 $data['email']		= $this->input->get_post('email');
    	 $data['state']		= $this->input->get_post('state');
    	 $data['lang']		= $this->input->get_post('lang');
    	 $data['dea']		= $this->input->get_post('dea');
    	 $data['npi']		= $this->input->get_post('npi');
    	 $data['password']	= md5($this->input->get_post('pwd'));

         $doctor = $this->doctor_model->getDoctorEmail($data['email']);
         if(count($doctor) > 0)
         {
             $returndata = array(
                 "success" => 0,
                 "error" => "User is aleady exist",
                 "data" => "signup error"

             );
             echo json_encode($returndata);
             exit();
         }

        $uploaddir = './assets/uploads/doctor/';
        $path = $_FILES['img']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $uname = time().uniqid(rand());
        $uploadfile = $uploaddir .$uname.'.'.$ext;
        $file_name = $uname.".".$ext;
        if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
            //$this->sample_item_model->editItemField($item_no,$field,$file_name);
            $data['img'] = $file_name;
        } else {
            $data['img'] = "";
            // echo "Possible file upload attack!\n";
        }

        if($this->doctor_model->addNewDoctor($data))
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
    	 		// "message" => "signup is error"
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
                    'token'             => $token,
                    'doctor_id'         => $doctor['did']
                );
                $this->session->set_userdata($sess_data);

                $this->doctor_model->setToken($this->session->userdata('doctor_id'),$token);

                $return_data['success'] = 1;
                $temp = array();
                $temp['token'] = $token;
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

    public function logOut()
    {
        $this->doctor_model->setToken($this->session->userdata('doctor_id'),"");
        $array_items = array('user_type', 'token','doctor_id');
        $this->session->unset_userdata($array_items);
    }

}