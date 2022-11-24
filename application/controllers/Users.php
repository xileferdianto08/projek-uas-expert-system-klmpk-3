<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UsersModels');
		$this->load->library('form_validation');
	}



	public function index()
    {
        $data['title'] = "Login";
        // $data['css'] = $this->load->view('include/style.php', NULL, TRUE);
        // $data['js'] = $this->load->view('include/script.php', NULL, TRUE);
        $this->load->view('authentication/login', $data);
    }

    public function doLogin()
    {


        $postEmail = $this->input->post('email');
        $postPassword = $this->input->post('password');

        $email = $this->db->escape($postEmail);
        $password = hash('sha512', $postPassword);
        $hashedPwd = $this->db->escape($password);



        $userData = $this->UsersModels->login($email, $hashedPwd);
        if (!empty($userData)) {
            $this->session->set_userdata('email', $userData[0]->email);
            redirect('Dashboard');

        } else {
            $this->session->set_flashdata('msg', '<div class="login-error-text" style="margin-top:1%">Email Atau Password Anda Salah Silahkan Diulangi Lagi</div>');
            redirect(site_url('users'), 'refresh');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        redirect(base_url('Users'));
    }

    public function Register()
    {
        $data['title'] = "Register";
        $this->load->view('authentication/register', $data);
    }

	public function doRegister()
    {
        $form_validate = array(
            array(
                'field' => 'email',
                'label' => 'Email:',
                'rules' => 'required|valid_email|callback_checkemailIsExist',
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



        if ($this->form_validation->run() === false) {
            $this->load->view('authentication/register', $data);
        } else {
            $postName = $this->input->post('name');
            $postEmail = $this->input->post('email');
            $postAge = $this->input->post('age');
            $postPassword = $this->input->post('password');
            $postConfirmPassword = $this->input->post('cppassword');
            if($postConfirmPassword !== $postPassword){
                $this->session->set_flashdata('confirmPwdMsg', '<div class="login-error-text" style="margin-top:1%">*Confirm Password tidak sesuai!</div>');
                redirect(site_url('users/Register'), 'refresh');
            }

            $hashedPwd = hash("sha512", $postPassword);


            $name = $this->db->escape($postName);
            $email = $this->db->escape($postEmail);
            $password = $this->db->escape($hashedPwd);

            $age = $this->db->escape($postAge); 

            $this->UsersModels->register($name, $email, $password, $age);
            $this->session->set_flashdata('msg', '<div class="login-register-text">Anda Berhasil mendaftar, silahkan login</div>');
            redirect(base_url('Users'));
        }
    }

    public function checkemailIsExist($email)
    {
        $email_db = $this->UsersModels->checkemail($email)->row();

        if (!empty($email_db)) {
            $this->form_validation->set_message('checkemailIsExist', 'Email sudah terdaftar');
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
