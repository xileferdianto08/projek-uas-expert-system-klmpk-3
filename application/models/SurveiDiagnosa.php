<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SurveiDiagnosa extends CI_Model {
    public function getDataPerUser($userId)
    {
        $this->db->select("*")->from("survei_diagnosa")->where("userId = '$userId' ");
        return $this->db->get()->result();
    }

    public function addHasilSurvey($userId, $gejalaId)
    {
            $data = array(
                'id' => NULL,
                'userId' => $userId,
                'gejalaId' => (int)$gejalaId['gejalaId']
            );
            $this->db->insert('survei_diagnosa', $data);

        
    }
}
?>