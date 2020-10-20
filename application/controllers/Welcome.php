<?php
defined('BASEPATH') or exit('URL inválida.');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->has_userdata('nome')) {
            redirect('User');
        }

        $this->data['page'] = 'Inicio';
        $this->data['username'] = $this->session->nome;
  
    }

    public function index()
    {
        $this->load->view('application/dashboard', $this->data);
    }

    
}
