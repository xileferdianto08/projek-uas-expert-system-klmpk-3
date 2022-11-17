<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisGejala extends CI_Model {
    public function getAllData()
    {
        $query = $this->db->get("jenis_gejala");
        return $query->result_array();
    }

    public function getGejalaID($name)
    {
        $this->db->select('*')->from('jenis_gejala')->where("jenisGejala = '$name'");
        return $this->db->get()->result();
    }

    



}
?>