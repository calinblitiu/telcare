<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Doctor_model extends CI_Model
{
	public $table_name = 'doctor_table';

	public function addNewDoctor($data)
	{
		return $this->db->insert($this->table_name, $data);
	}

}