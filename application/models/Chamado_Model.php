<?php
defined('BASEPATH') or exit('URL inválida.');

class Chamado_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Registra um chamado
     */
    public function novoChamado(array $array)
    {
        $this->db->insert('chamados', $array);

        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        }
        return false;
    }
}
