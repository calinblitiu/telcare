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

}
