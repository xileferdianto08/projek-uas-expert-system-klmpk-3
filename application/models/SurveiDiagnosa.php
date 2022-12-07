<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SurveiDiagnosa extends CI_Model {
    public function getDataPerUser($userId)
    {
        $this->db->select("*")->from("survei_diagnosa")->where("userId = '$userId' AND diagnosed = 0");
        return $this->db->get()->result();
    }

    public function getId($userId)
    {
        $this->db->select("*")->from("survei_diagnosa")->where("userId = '$userId' AND diagnosed = 0");
        return $this->db->get()->result();
    }

    public function addHasilSurvey($userId, $gejalaId)
    {
            $data = array(
                'id' => NULL,
                'userId' => $userId,
                'gejalaId' => (int)$gejalaId['gejalaId'],
                'diagnosed' => 0
            );
            $this->db->insert('survei_diagnosa', $data);

        
    }

    public function updateDiagnosedStat($userId)
    {
        $this->db->set('diagnosed', 1);
        $this->db->where('userId', $userId);
        $this->db->update('survei_diagnosa');
    }
}
?>