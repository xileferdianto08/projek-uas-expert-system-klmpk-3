<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class UsersModels extends CI_Model
{
    public function getUserData()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function getSpecificUser($email)
    {
        $this->db->trans_begin();
        $query = $this->db->select('*')->from('user')->where('email', $email)->get();
        $this->db->trans_complete();

        if($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            return FALSE;
        }else
        {
            return $query->result_array();
        }
    }

    public function login($email, $password)
    {
        $email = str_replace("'", "", $email);
        $password = str_replace("'", "", $password);
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where("email = '$email' AND password = '$password'");
        return $this->db->get()->result();
    }

    public function register($name, $email, $password, $age)
    {
        $data = array(
            'userId' => NULL,
            'name' => str_replace("'", "", $name),
            'email' => str_replace("'", "", $email),
            'password' => str_replace("'", "", $password),
            'age' => str_replace("'", "", $age)
        );
        $this->db->insert('user', $data);
    }

    public function updateUser($id, $name, $email,  $age)
    {
        $this->db->set('username', str_replace("'", "", $name));
        $this->db->set('email', str_replace("'", "", $email));
        $this->db->set('age', str_replace("'", "", $age));

        $this->db->where('userId', str_replace("'", "", $id));
        $this->db->update('user');
    }

    public function getId($name)
    {
        $this->db->select('*')->from('user')->where("name = '$name'");
        return $this->db->get()->result();
    }

    public function checkEmail($email)
    {
        return $this->db->get_where('user', ['email' => $email]);
    }

    public function checkUsername($name)
    {
        return $this->db->get_where('user', ['name' => $name]);
    }
}
?>