<?php
defined('BASEPATH') or exit('URL inválida.');

class Empresa_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Busca todas as filiais
     */
    public function getFilial()
    {
        $result = $this->db->from('filial')
            ->get();
        return $result->result_array();
    }

    /**
     * Busca os departamentos
     */
    public function getDepartamento()
    {
        $result = $this->db->from('departamento')
            ->get();
        return $result->result_array();
    }

}
