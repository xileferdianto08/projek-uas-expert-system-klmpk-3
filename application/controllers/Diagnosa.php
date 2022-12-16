<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('UsersModels');
        $this->load->model('JenisGejala');
        $this->load->model('JenisSolusi');
        $this->load->model('HasilDiagnosaModels');
        $this->load->model('SurveiDiagnosa');
    }

    public function index()
    {
        if ($_SESSION['email']) {
            $data['title'] = 'Survey';
            $data['dataGejala'] = $this->JenisGejala->getAllData();
            $data['navbar'] = $this->load->view('template/navbar', NULL, true);
            $data['footer'] = $this->load->view('template/footer', null, true);
            $data['name'] = $this->UsersModels->getId($_SESSION['email'])[0]->name;
            $this->load->view('Survei/diagnosis', $data);
        } else redirect(base_url("Users"));
    }

    public function inputGejala()
    {
        $check = $this->input->post('gejala');
        if (empty($check)) {
            $this->session->set_flashdata('msg', '<div class="survei-error" style="margin-top:1%">Anda belum mengisi form ini!</div>');
            redirect(site_url('Diagnosa'), 'refresh');
        } else {
            foreach ($check as $gejala) {
                $userId = $this->UsersModels->getId($_SESSION['email'])[0]->id;
                $this->SurveiDiagnosa->addHasilSurvey($userId,  array(
                    'gejalaId' => $gejala
                ));
            }
            redirect(base_url("Diagnosa/calculateFC"));
        }
    }

    public function calculateFC()
    {
        $userId = $this->UsersModels->getId($_SESSION['email'])[0]->id;
        $result =  $this->SurveiDiagnosa->getDataPerUser($userId);


        for ($i = 0; $i < sizeof($result); $i++) {
            if ((int) $result[$i]->gejalaId == 1) {
                if ((int) $result[$i + 1]->gejalaId == 2) {
                    if ((int) $result[$i + 2]->gejalaId == 10) {
                        if ((int) $result[$i + 3]->gejalaId == 11) {
                            if ((int) $result[$i + 4]->gejalaId == 18) {

                                $this->HasilDiagnosaModels->addHasilDiagnosa($userId, 1);
                                $this->SurveiDiagnosa->updateDiagnosedStat((int)$result[0]->userId);



                                break;
                            }
                        }
                    }
                }
            }

            if ((int) $result[$i]->gejalaId == 1) {
                if ((int) $result[$i + 1]->gejalaId == 2) {
                    if ((int) $result[$i + 2]->gejalaId == 3) {
                        if ((int) $result[$i + 3]->gejalaId == 5) {
                            if ((int) $result[$i + 4]->gejalaId == 7) {
                                $this->HasilDiagnosaModels->addHasilDiagnosa($userId, 2);
                                $this->SurveiDiagnosa->updateDiagnosedStat((int)$result[0]->userId);
                                break;
                            }
                        }
                    }
                }
            }

            if ((int) $result[$i]->gejalaId == 6) {
                if ((int) $result[$i + 1]->gejalaId == 9) {
                    if ((int) $result[$i + 2]->gejalaId == 13) {
                        if ((int) $result[$i + 3]->gejalaId == 17) {
                            $this->HasilDiagnosaModels->addHasilDiagnosa($userId, 3);
                            $this->SurveiDiagnosa->updateDiagnosedStat((int)$result[0]->userId);
                            break;
                        }
                    }
                }
            }

            if ((int) $result[$i]->gejalaId == 11) {
                if ((int) $result[$i + 1]->gejalaId == 12) {
                    if ((int) $result[$i + 2]->gejalaId == 13) {
                        $this->HasilDiagnosaModels->addHasilDiagnosa($userId, 4);
                        $this->SurveiDiagnosa->updateDiagnosedStat((int)$result[0]->userId);
                        break;
                    }
                }
            }

            if ((int) $result[$i]->gejalaId == 1) {
                if ((int) $result[$i + 1]->gejalaId == 7) {
                    if ((int) $result[$i + 2]->gejalaId == 12) {
                        if ((int) $result[$i + 3]->gejalaId == 13) {
                            $this->HasilDiagnosaModels->addHasilDiagnosa($userId, 5);
                            $this->SurveiDiagnosa->updateDiagnosedStat((int)$result[0]->userId);
                            break;
                        }
                    }
                }
            }

            if ((int) $result[$i]->gejalaId == 1) {
                if ((int) $result[$i + 1]->gejalaId == 2) {
                    if ((int) $result[$i + 2]->gejalaId == 3) {
                        if ((int) $result[$i + 3]->gejalaId == 4) {
                            if ((int) $result[$i + 4]->gejalaId == 5) {
                                if ((int)$result[$i + 5]->gejalaId == 6) {
                                    if ((int)$result[$i + 6]->gejalaId == 7) {
                                        if ((int)$result[$i + 7]->gejalaId == 8) {
                                            if ((int)$result[$i + 8]->gejalaId == 9) {
                                                if ((int)$result[$i + 9]->gejalaId == 10) {
                                                    if ((int)$result[$i + 10]->gejalaId == 11) {
                                                        if ((int)$result[$i + 11]->gejalaId == 12) {
                                                            if ((int)$result[$i + 12]->gejalaId == 13) {
                                                                if ((int)$result[$i + 13]->gejalaId == 14) {
                                                                    if ((int)$result[$i + 14]->gejalaId == 15) {
                                                                        if ((int)$result[$i + 15]->gejalaId == 16) {
                                                                            if ((int)$result[$i + 16]->gejalaId == 17) {
                                                                                if ((int)$result[$i + 17]->gejalaId == 18) {
                                                                                    $this->HasilDiagnosaModels->addHasilDiagnosa($userId, 6);
                                                                                    $this->SurveiDiagnosa->updateDiagnosedStat((int)$result[0]->userId);
                                                                                    break;
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        $this->SurveiDiagnosa->deleteUnusedData((int)$result[0]->userId);
        redirect(base_url('Diagnosa/displayResult'));
    }

    public function displayResult()
    {
        $userId = $this->UsersModels->getId($_SESSION['email'])[0]->id;

        $userName = $this->UsersModels->getId($_SESSION['email'])[0]->name;

        if ($_SESSION['email']) {
            $this->SurveiDiagnosa->deleteUnusedData($userId);
            $data['title'] = 'Hasil Diagnosa';
            $data['navbar'] = $this->load->view('template/navbar', null, true);
            $data['footer'] = $this->load->view('template/footer', null, true);
            $data['name'] = $userName;
            $data['resultList'] = $this->HasilDiagnosaModels->getSpecificData($userId);
            $this->load->view('HasilDiagnosa/hasilDiagnosa', $data);
        } else redirect(base_url('Users'));
    }
}
