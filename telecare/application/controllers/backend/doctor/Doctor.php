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
    	 $data['password']	= $this->input->get_post('pwd');

        $uploaddir = './assets/uploads/doctor/';
        $path = $_FILES['img']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $uname = time().uniqid(rand());
        $uploadfile = $uploaddir .$uname.'.'.$ext;
        $file_name = $uname.$ext;
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

    	 	);
    	 	echo json_encode($returndata);
    	 	exit();
    	 }
    	 else
    	 {
    	 	$returndata = array(
    	 		"success" => 0,
    	 		"message" => "signup is error"
    	 	);

    	 	echo json_encode($returndata);
    	 	exit();
    	 }
    }

    

}