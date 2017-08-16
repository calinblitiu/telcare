<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Doctor_model extends CI_Model
{
	public $table_name = 'doctor_table';

	public function addNewDoctor($data)
	{
		return $this->db->insert($this->table_name, $data);
	}

	public function getDoctorEmail($email)
    {
        $this->db->where('email',$email);
        $query = $this->db->get($this->table_name);
        $result = $query->result_array($query);
        if(count($result) == 0)
        {
            return false;
        }
        return $result[0];
    }

    public function setToken($did,$token)
    {
        $this->db->where('did', $did);
        $this->db->set('token',$token);
        $this->db->update($this->table_name);
    }

    public function setForgetToken($email,$forget_token)
    {
	    $this->db->where('email',$email);
	    $this->db->set('forget_token',$forget_token);
        $this->db->update($this->table_name);
    }

    public function getDoctorForgetToken($forget_token)
    {
        $this->db->where('forget_token',$forget_token);
        $query = $this->db->get($this->table_name);
        $result = $query->result_array($query);
        if(count($result) == 0)
        {
            return false;
        }
        return $result[0];
    }

    public function getOnCallDoctor()
    {
        $this->db->where('is_on_call_doctor',"1");
        $query = $this->db->get($this->table_name);
        $result = $query->result_array($query);
        if(count($result) == 0)
        {
            return false;
        }
        return $result[0];
    }

}