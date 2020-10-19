<?php
defined('BASEPATH') or exit('URL inválida.');

class User_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Verifica login e trás as informações do usuario para por na sessão
     */
    public function getUser(string $userName, string $password)
    {
        $data = [
            'login' => $userName,
            'senha' => $password
        ];
        $result = $this->db->from('usuario')
            ->where($data)
            ->get();
        return $result->row();
    }
}
