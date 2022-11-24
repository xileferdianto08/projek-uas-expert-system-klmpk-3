<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisSolusi extends CI_Model {
    public function getAllData()
    {
        $query = $this->db->get('jenis_solusi');
        return $query->result_array();
    }

    public function getSolusiName($id)
    {
        $this->db->select('*')->from('jenis_solusi')->where("id = '$id'");
        return $this->db->get()->result();
    }
}
?>