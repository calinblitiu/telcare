<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/23/2017
 * Time: 10:45 AM
 */
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Doctor_model extends CI_Model
{
    public $table_name = "doctor_table";

    public function getAllDoctors()
    {
        //$this->db->select("img, type, fname, lname, spec, email, state, lang, dea, npi, is_on_call_doctor");
        $query = $this->db->get($this->table_name);
        $result = $query->result_array();

        if(count($result) <= 0)
        {
            return false;
        }
        return $result;
    }


}