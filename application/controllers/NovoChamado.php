<?php
defined('BASEPATH') or exit('URL inválida.');

class NovoChamado extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //Carrega models
        $this->load->model('Empresa_Model', 'empresa');
        $this->load->model('Chamado_Model', 'chamado');

        //Carrega alguns dados
        $this->data['page'] = 'Novo chamado';
        $this->data['filiais'] = $this->empresa->getFilial();
        $this->data['departamentos'] = $this->empresa->getDepartamento();
    }

    public function index()
    {
        $this->load->view('chamado/novo', $this->data);
    }

    public function chamado()
    {
        $this->load->view('chamado/escreverchamado', $this->data);
    }

    public function abrirChamado()
    {
        if ($this->input->post()) {

            $this->form_validation->set_rules('inputNome', 'nome de usuário', 'required', array('required' => 'o campo %s é obrigatorio'));
            $this->form_validation->set_rules('inputTitulo', 'título do chamado', 'required', array('required' => 'o campo %s é obrigatorio'));
            $this->form_validation->set_rules('inputDetalhes', 'detalhes de chamado', 'required', array('required' => 'o campo %s é obrigatorio'));

            if ($this->form_validation->run() === true) {

                $formulario = [
                    'id_filial' =>  $this->input->post('inputFilial', true),
                    'id_departamento' => $this->input->post('inputDepartamento', true),
                    'id_status' => 1,
                    'nome_usuario' => $this->input->post('inputNome', true),
                    'titulo' => $this->input->post('inputTitulo', true),
                    'mensagem' => $this->input->post('inputDetalhes', true),
                ];

                if ($this->chamado->novoChamado($formulario)) {

                    $this->data['statusMessage'] = 'info';
                    $this->data['message'] = 'Chamado aberto com sucesso! Pode ficar tranquilo que já vamos resolver isso...';

                    $this->load->view('chamado/novo', $this->data);
                } else {

                    $this->data['statusMessage'] = 'danger';
                    $this->data['message'] = 'Aconteceu um erro ao enviar seu chamado, atualize a pagina e tente novamente!';

                    $this->load->view('chamado/novo', $this->data);
                }
            } else {

                $this->load->view('chamado/escreverchamado', $this->data);
            }
        }
    }
}
