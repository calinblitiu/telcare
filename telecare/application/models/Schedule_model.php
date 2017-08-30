<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/16/2017
 * Time: 5:10 PM
 */
?>
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Schedule_model extends CI_Model
{
    public $table_name = 'schedule';

    public function addNewSchedule($data)
    {
        $this->db->set($data);
        $this->db->insert($this->table_name);
        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        return false;
    }

    public function getScheduleCurrent($pid)
    {
        $this->db->where('pid',$pid);
        $this->db->order_by("updated", "desc");
        $query = $this->db->get($this->table_name);
        $result = $query->result_array();

        if(count($result) == 0)
        {
            return false;
        }
        return $result[0];
    }

    public function getTodaySchedule($pid)
    {
        $this->db->where('pid',$pid);
        $this->db->order_by("updated", "desc");
        $query = $this->db->get($this->table_name);
        $result = $query->result_array();

        if(count($result) == 0)
        {
            return false;
        }
        return $result[0];
    }

    public function getScheduleData($data)
    {
        $this->db->where($data);
        $this->db->select("note, history");
        $this->db->order_by("updated", "desc");
        $query = $this->db->get($this->table_name);
        $result = $query->result_array();
        if(count($result) == 0)
        {
            return false;
        }
        return $result[0];
    }

    public function getSchedules($data)
    {
        $this->db->where($data);
        $query = $this->db->get($this->table_name);
        $result = $query->result_array();
        if(count($result) == 0)
        {
            return false;
        }
        return $result;
    }

    public function updateSchedule($id,$data)
    {
        $this->db->where("id",$id);
        $this->db->set($data);
        $this->db->update($this->table_name);
        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        return false;
    }

}
