<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class HasilDiagnosa extends CI_Model {
    public function getAllData()
    {
        $this->db->select('hd.*, user.name, penyakit.name')->from('hasil_diagnosa hd')->join('user as user', 'hd.userId = user.id ')->join("penyakit as penyakit", "hd.penyakitId = penyakit.id");

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSpecificData($userId)
    {
        $this->db->select('hd.*, user.name, penyakit.name')->from('hasil_diagnosa hd')->where("hd.userId = $userId ")->join('user as user', 'hd.userId = user.id ')->join("penyakit as penyakit", "hd.penyakitId = penyakit.id");

        $query = $this->db->get();
        return $query->result_array();
    }

    public function addHasilDiagnosa($userId, $penyakitId)
    {
        
        $data = array(
            'id' => NULL,
            'userId' => $userId,
            'penyakitId' => $penyakitId,
            'dateTime' => date('Y-m-d H:i:s')

        );

        $this->db->insert('hasil_diagnosa', $data);
    }
}
?>