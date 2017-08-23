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
}