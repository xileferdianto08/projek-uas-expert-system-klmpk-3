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
            $data['name'] = $this->UsersModels->getId($_SESSION['email'])[0]->name;
            $this->load->view('Survei/diagnosis', $data);
        } else redirect(base_url("Users"));
    }

    public function inputGejala()
    {
            $check = $this->input->post('gejala');
            foreach ($check as $gejala) {
                $userId = $this->UsersModels->getId($_SESSION['email'])[0]->id;
                $this->SurveiDiagnosa->addHasilSurvey($userId,  array(
                    'gejalaId' => $gejala
                ));
            }
            redirect(base_url("Diagnosa/calculateFC"));
    }

    public function calculateFC()
    {
        $userId = $this->UsersModels->getId($_SESSION['email'])[0]->id;
        $result =  $this->SurveiDiagnosa->getDataPerUser($userId);


        for ($i=0; $i < sizeof($result); $i++) { 
            if((int) $result[$i]->gejalaId == 1){
                if((int) $result[$i+1]->gejalaId == 2){
                    if ((int) $result[$i+2]->gejalaId == 10) {
                        if((int) $result[$i+3]->gejalaId == 11){
                            if((int) $result[$i+4]->gejalaId == 18){
                                $this->HasilDiagnosaModels->addHasilDiagnosa($userId, 1);

                                break;
                            }
                            
                        }
                        
                    }
                    
                }
                
            }

            if((int) $result[$i]->gejalaId == 1){
                if((int) $result[$i+1]->gejalaId == 2){
                    if ((int) $result[$i+2]->gejalaId == 3) {
                        if((int) $result[$i+3]->gejalaId == 5){
                            if((int) $result[$i+4]->gejalaId == 7){
                                $this->HasilDiagnosaModels->addHasilDiagnosa($userId,2);
                                break;
                            }
                            
                        }
                        
                    }
                    
                }
                
            } 

            if((int) $result[$i]->gejalaId == 6){
                if((int) $result[$i+1]->gejalaId == 9){
                    if ((int) $result[$i+2]->gejalaId == 13) {
                        if((int) $result[$i+3]->gejalaId == 17){
                            $this->HasilDiagnosaModels->addHasilDiagnosa($userId,3);
                            break;
                        }
                        
                    }
                    
                }
                
            }
            
            if((int) $result[$i]->gejalaId == 11){
                if((int) $result[$i+1]->gejalaId == 12){
                    if ((int) $result[$i+2]->gejalaId == 13) {
                        $this->HasilDiagnosaModels->addHasilDiagnosa($userId,4);
                        break;
                    }
                   
                }
                
            }
            
            if((int) $result[$i]->gejalaId == 1){
                if((int) $result[$i+1]->gejalaId == 7){
                    if ((int) $result[$i+2]->gejalaId == 12) {
                        if((int) $result[$i+3]->gejalaId == 13){
                            $this->HasilDiagnosaModels->addHasilDiagnosa($userId,5);
                            break;
                            
                        }
                       
                    }
                    
                }
                
            }


        }
        redirect(base_url('Dashboard'));
        
        
    }

    public function displayResult()
    {
        $userId = $this->UsersModels->getId($_SESSION['email'])[0]->id;
        
        $userName = $this->UsersModels->getId($_SESSION['email'])[0]->name;

        if($_SESSION['email']){
            $data['title'] = 'Hasil Diagnosa';
            $data['navbar'] = $this->load->view('template/navbar', null, true);
            $data['name'] = $userName;
            $data['resultList'] = $this->HasilDiagnosaModels->getSpecificData($userId);
            $this->load->view('HasilDiagnosa/hasilDiagnosa', $data);

        } else redirect(base_url('Users'));
    }
}
