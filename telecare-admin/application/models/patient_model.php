<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/23/2017
 * Time: 10:45 AM
 */
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Patient_model extends CI_Model
{
    public $table_name = "patient_table";

    public function getAllPatients()
    {
        $this->db->select("img, fname, lname, gender, dob, email, ssn, addr, did, is_treated, is_accepted");
        $query = $this->db->get($this->table_name);
        $result = $query->result_array();

        if(count($result) <= 0)
        {
            return false;
        }
        return $result;
    }

    public function getNewPatients()
    {
        $this->db->where('did',null);
        $query = $this->db->get($this->table_name);
        $result = $query->result_array();
        if (count($result) <= 0)
        {
            return false;
        }
        return $result;
    }

    public function getPatientPid($pid)
    {
        $this->db->where('pid', $pid);
        $query = $this->db->get($this->table_name);
        $result = $query->result_array();

        if(count($result) <= 0)
        {
            return false;
        }
        return $result[0];
    }

    public function setDidToPid($pid, $did)
    {
        $this->db->where('pid',$pid);
        $this->db->set('did',$did);
        $this->db->update($this->table_name);
        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        return false;
    }
}