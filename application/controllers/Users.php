<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('');
		$this->load->model('');
		$this->load->library('form_validation');
	}

	// public function index()
	// {
	// 	$this->load->view('welcome_message');
	// }

	public function index()
    {
        $data['title'] = "Login";
        $data['css'] = $this->load->view('include/style.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/script.php', NULL, TRUE);
        $this->load->view('pages/loginForm', $data);
    }

	// public function index()
    // {
    //     $data['title'] = "Register";
    //     $data['css'] = $this->load->view('include/style.php', NULL, TRUE);
    //     $data['js'] = $this->load->view('include/script.php', NULL, TRUE);
    //     $this->load->view('pages/registerForm', $data);
    // }

    public function doLogin()
    {
        $postEmail = $this->input->post('email');
        $postPassword = $this->input->post('password');

        $email = $this->db->escape($postEmail);
        $password = hash('sha512', $postPassword);
        $hashedPwd = $this->db->escape($password);



        $userData = $this->loginModel->checkUser($email, $hashedPwd);
        if (!empty($userData)) {
            $this->session->set_userdata('username', $userData[0]->username);
            $this->session->set_userdata('is_login', '1');
            $this->session->set_userdata('roles', $userData[0]->userType);
            if ($userData[0]->userType === 'Admin') {
                redirect(base_url('Admin'));
            } else if ($userData[0]->userType === 'User') {
                redirect(base_url('User'));
            } else if ($userData[0]->userType === 'Management') {
                redirect(base_url('Management'));
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="margin-top:1%">Email Atau Password Anda Salah Silahkan Diulangi Lagi</div>');
            redirect(site_url('login'), 'refresh');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('is_login');
        $this->session->unset_userdata('roles');
        redirect(base_url('Welcome'));
    }

	public function doRegister()
    {
        $form_validate = array(
            array(
                'field' => 'name',
                'label' => 'User Name:',
                'rules' => 'required|min_length[6]|alpha_numeric_spaces|callback_checkUsernameIsExist',
                'errors' => array(
                    'min_length' => 'Input minimal {param} number',
                    'alpha_numeric_spaces' => 'Input must provide a string'
                )
            ),
            array(
                'field' => 'email',
                'label' => 'Email:',
                'rules' => 'required|valid_email|callback_checkEmailIsExist',
            ),
            array(
                'field' => 'password',
                'label' => 'Password:',
                'rules' => 'required|min_length[6]|alpha_numeric',
                'errors' => array(
                    'min_length' => 'Input minimal {param} number',
                    'alpha_numeric' => 'Input must be a combination alphabet with number'
                )
            ),


        );
        $this->form_validation->set_rules($form_validate);
        $data['title'] = "Register";
        $data['css'] = $this->load->view('include/style.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/script.php', NULL, TRUE);



        if ($this->form_validation->run() === false) {
            $this->load->view('pages/registerForm', $data);
        } else {
            $postName = $this->input->post('name');
            $postEmail = $this->input->post('email');
            $postPassword = $this->input->post('password');
            $hashedPwd = hash("sha512", $postPassword);


            $name = $this->db->escape($postName);
            $email = $this->db->escape($postEmail);
            $password = $this->db->escape($hashedPwd);

            $roles = "User";

            $this->userModel->addUser($name, $email, $hashedPwd, $roles);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Anda Berhasil mendaftar, silahkan login</div>');
            redirect(base_url('Login'));
        }
    }

    public function checkEmailIsExist($email)
    {
        $email_db = $this->userModel->checkEmail($email)->row();

        if (!empty($email_db)) {
            $this->form_validation->set_message('checkEmailIsExist', 'This email is existed! Please check your input');
            return FALSE;
        }
        return TRUE;
    }

    public function checkUsernameIsExist($name)
    {
        $name_db = $this->userModel->checkUsername($name)->row();

        if (!empty($name_db)) {
            $this->form_validation->set_message('checkUsernameIsExist', 'This username is existed! Please check your input');
            return FALSE;
        }
        return TRUE;
    }

	public function resetPassword()
	{
		$postEmail = $this->input->post('email');
		$postPassword = $this->input->post('newPassword');

		$email = $this->db->escape($postEmail);
		$newPassword= hash('sha512', $postPassword);
		$hashedPwd = $this->db->escape($newPassword);


	}


}
