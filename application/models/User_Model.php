<?php
defined('BASEPATH') or exit('URL inválida.');

class User_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert(string $name, string $userName, string $password)
    {
        $data = array(
            'name' => $name,
            'login' => $userName,
            'password' => $password
        );
        $this->db->insert('user', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }

    public function checkUser(string $userName)
    {
        $data = array('login' => $userName);
        $result = $this->db->from('user')
            ->where($data)
            ->get();
        return $result->row();
    }

    public function getUser(string $userName, string $password)
    {
        $data = [
            'login' => $userName,
            'password' => $password
        ];
        $result = $this->db->from('user')
            ->where($data)
            ->get();
        return $result->row();
    }
}
