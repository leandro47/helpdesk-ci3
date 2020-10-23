<?php
defined('BASEPATH') or exit('URL inválida.');

class NovoChamado extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->data['page'] = 'Novo chamado';
  
    }

    public function index()
    {
        $this->load->view('chamado/novo', $this->data);
    }

}
