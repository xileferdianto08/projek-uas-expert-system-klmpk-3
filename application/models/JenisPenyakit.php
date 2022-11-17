<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisPenyakit extends CI_Model {
    public function getAllData()
    {
        $query = $this->db->get('jenis_penyakit');
        return $query->result_array();
    }

    public function getPenyakitId($name)
    {
        $this->db->select('*')->from('jenis_penyakit')->where("penyakit = '$name'");
        return $this->db->get()->result();
    }
}
?>