<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/23/2017
 * Time: 10:45 AM
 */
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Schedule_model extends CI_Model
{
    public $table_name = "schedule";

    public function getAllDoctors()
    {
        $this->db->select("img, type, fname, lname, spec, email, state, lang, dea, npi, is_on_call_doctor");
        $query = $this->db->get($this->table_name);
        $result = $query->result_array();

        if(count($result) <= 0)
        {
            return false;
        }
        return $result;
    }

    public function getSchedule($pid)
    {
        $this->db->where('pid',$pid);
        $query = $this->db->get($this->table_name);
        $result = $query->result_array();
        if(count($result) <=0)
        {
            return false;
        }
        return $result[0];
    }

    public function getLastSchedule($pid)
    {
        $this->db->where("pid",$pid);
        $this->db->order_by("updated","desc");
        $query = $this->db->get($this->table_name);
        $result = $query->result_array();
        if(count($result)<=0)
        {
            return false;
        }
        return $result[0];
    }

    public function setDateTime($id,$datetime)
    {
        $this->db->where('id',$id);
        $this->db->set("date",$datetime);
        $this->db->update($this->table_name);
        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        return false;
    }

}