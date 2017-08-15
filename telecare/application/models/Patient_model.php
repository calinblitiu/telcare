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
        $result = $query->result_array($query);
        if(count($result) == 0)
        {
            return false;
        }
        return $result[0];
    }

}
