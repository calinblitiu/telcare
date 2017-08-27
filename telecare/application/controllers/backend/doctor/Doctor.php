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
//        $data['type'] 		= "";
//        $data['fname'] 	    = "";
//        $data['lname']		= "";
//        $data['spec']		= "";
//        $data['email']		= "";
//        $data['phone']      ="";
//        $data['fax']        ="";
//        $data['state']		= "";
//        $data['lang']		= "";
//        $data['dea']		= "";
//        $data['npi']		= "";
//        $data['password']	= "";
//        $data['doctor_type'] = "";
//        $data['message'] = "";

    	 $data['type'] 		= $this->input->get_post('type');
    	 $data['fname'] 	= $this->input->get_post('fname');
    	 $data['lname']		= $this->input->get_post('lname');
    	 $data['spec']		= $this->input->get_post('spec');
    	 $data['email']		= $this->input->get_post('email');
         $data['phone']     = $this->input->get_post('phone');
         $data['fax']       = $this->input->get_post('fax');
    	 $data['state']		= $this->input->get_post('state');
    	 $data['lang']		= $this->input->get_post('lang');
    	 $data['dea']		= $this->input->get_post('dea');
    	 $data['npi']		= $this->input->get_post('npi');
    	 $data['password']	= md5($this->input->get_post('pwd'));
    	 $data['doctor_type'] = $this->input->get_post('doctor_type');
    	 $data['message'] = $this->input->get_post('message');

         $doctor = $this->doctor_model->getDoctorEmail($data['email']);
         if($doctor)
         {
             $returndata = array(
                 "success" => 0,
                 "error" => "User is already exist",
                 "data" => "signup error"
             );
             echo json_encode($returndata);
             exit();
         }

         $data['img'] = '';

        if(isset($_FILES['img'])) {
            $uploaddir = './assets/uploads/doctor/';
            $path = $_FILES['img']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $uname = time() . uniqid(rand());
            $uploadfile = $uploaddir . $uname . '.' . $ext;
            $file_name = $uname . "." . $ext;
            if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
                //$this->sample_item_model->editItemField($item_no,$field,$file_name);
                $data['img'] = $file_name;
            } else {
                $data['img'] = "";
                // echo "Possible file upload attack!\n";
            }
        }

        $data['cv'] = "";
        if(isset($_FILES['cv'])) {
            $uploaddir = './assets/uploads/cv/';
            $path = $_FILES['cv']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $uname = time() . uniqid(rand());
            $uploadfile = $uploaddir . $uname . '.' . $ext;
            $file_name = $uname . "." . $ext;
            if (move_uploaded_file($_FILES['cv']['tmp_name'], $uploadfile)) {
                //$this->sample_item_model->editItemField($item_no,$field,$file_name);
                $data['cv'] = $file_name;
            } else {
                $data['cv'] = "";
                // echo "Possible file upload attack!\n";
            }
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
            $return_data['data'] = 'Login Error';
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
                $return_data['error'] = 'Login success';
                echo json_encode($return_data);
                exit();

            }
            else
            {
                $return_data['success'] = 0;
                $return_data['error'] = 'Password is invalid.';
                $return_data['data'] = 'Password is invaild';
                echo json_encode($return_data);
                exit();
            }
        }
    }

    public function logOut()
    {
        $token = $this->input->post('token');
        $doctor = $this->doctor_model->getDoctorToken($token);
        if($doctor)
        {
            $this->doctor_model->setToken($doctor['did'],"");
        }
        $array_items = array('user_type', 'token','doctor_id');
        $this->session->unset_userdata($array_items);
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
        $temp['img'] = base_url()."assets/uploads/doctor/".$doctor['img'];;
        $return_data['data'] = $temp;

        if($doctor['img'] == "" || $doctor['img'] == null)
        {
            $temp['img'] = base_url()."assets/uploads/doctor/no-img.png";
            $return_data['data'] = $temp;
        }

        echo json_encode($return_data,JSON_UNESCAPED_SLASHES);
        exit();

    }

}