<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    private $_users = 'tb_users';

    public function register($data)
    {
        $this->db->insert($this->_users, $data);
    }

    public function get_user($email)
    {
        return $this->db->get_where($this->_users, ['email' => $email])->row_array();
    }
}
