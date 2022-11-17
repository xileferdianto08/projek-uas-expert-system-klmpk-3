<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SurveiDiagnosa extends CI_Model {
    public function getDataPerUser($userId)
    {
        $this->db->select("*")->from("survei_diagnosa")->where("userId = '$userId' ");
        return $this->db->get()->result();
    }
}
?>