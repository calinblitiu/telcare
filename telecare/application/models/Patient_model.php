<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/15/2017
 * Time: 11:34 AM
 */?>
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Patient_model extends CI_Model
{
    public $table_name = 'patient_table';

    public function addNewPatient($data)
    {
        return $this->db->insert($this->table_name, $data);
    }

    public function getPatientEmail($email)
    {
        $this->db->where('email',$email);
        $query = $this->db->get($this->table_name);
        $result = $query->result_array();
        if(count($result) == 0)
        {
            return false;
        }
        return $result[0];
    }

    public function setToken($pid,$token)
    {
        $this->db->where('pid', $pid);
        $this->db->set('token',$token);
        $this->db->update($this->table_name);
    }

    public function setForgetToken($email,$forget_token)
    {
        $this->db->where('email',$email);
        $this->db->set('forget_token',$forget_token);
        $this->db->update($this->table_name);
    }

    public function getPatientForgetToken($forget_token)
    {
        $this->db->where('forget_token',$forget_token);
        $query = $this->db->get($this->table_name);
        $result = $query->result_array();
        if(count($result) == 0)
        {
            return false;
        }
        return $result[0];
    }

    public function getPatientToken($token)
    {
        $this->db->where('token',$token);
        $query = $this->db->get($this->table_name);
        $result = $query->result_array();
        if(count($result)>0)
        {
            return $result[0];
        }
        return false;
    }

    public function getPatients($data){
        $this->db->where($data);
        $this->db->select("fname, lname, gender, dob, ssn, addr, email,img");
        $query = $this->db->get($this->table_name);
        $result = $query->result_array();
        if(count($result) == 0)
        {
            return false;
        }
        return $result;
    }

    public function setPatientEmailData($email,$data)
    {
        $this->db->where("email",$email);
        $this->db->set($data);
        $this->db->update($this->table_name);
        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        return false;
    }

    public function getPatientsData($data)
    {
        $this->db->where($data);
        $this->db->select("pid, fname, lname, gender, dob, ssn, addr, email,img");
        $query = $this->db->get($this->table_name);
        $result = $query->result_array();
        if (count($result)>0)
        {
            return $result;
        }
        return false;
    }

}
