<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class HasilDiagnosaModels extends CI_Model {
    public function getAllData()
    {
        
        $this->db->select("hd.userId, hd.solusiId, CONVERT_TZ('hd'.'dateTime',`+00:00`,`+6:00`) as dateTime, user.name name, s.namaSolusi as namaSolusi, s.solusi solusi")->from('hasil_diagnosa hd')->join('user as user', 'hd.userId = user.id ')->join("jenis_solusi as s", "hd.solusiId = s.id");

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSpecificData($userId)
    {
        $this->db->select("hd.userId, hd.solusiId, CONVERT_TZ(hd.dateTime,'+00:00','+6:00') as dateTime, user.name name, s.namaSolusi as namaSolusi, s.solusi solusi")->from('hasil_diagnosa hd')->where('hd.userId', $userId)->join('user as user', 'hd.userId = user.id ')->join("jenis_solusi as s", "hd.solusiId = s.id")->order_by('hd.dateTime', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }

    // public function getData($userId)
    // {
    //     $this->db->sel
    // }


    public function addHasilDiagnosa($userId, $solusiId)
    {
        
        $data = array(
            'id' => NULL,
            'userId' => $userId,
            'solusiId' => $solusiId,
            'dateTime' => date('Y-m-d H:i:s')

        );

        $this->db->insert('hasil_diagnosa', $data);

        
    }
}
?>