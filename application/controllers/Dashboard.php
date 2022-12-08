<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UsersModels');
    }

    public function index()
    {
        if ($_SESSION['email']) {
            $data['title'] = 'Dashboard | Diagnosa COVID-19';
            $data['navbar'] = $this->load->view('template/navbar', NULL, true);
            $data['footer'] = $this->load->view('template/footer', null, true);
            $data['name'] = $this->UsersModels->getId($_SESSION['email'])[0]->name;
            $this->load->view('dashboard/dashboard', $data);
        } else redirect(base_url("Users"));
    }

    
}
