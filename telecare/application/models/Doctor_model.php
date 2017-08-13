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

}