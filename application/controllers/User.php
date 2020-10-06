<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if ($this->session->has_userdata('name')) {
			redirect('welcome');
		}

		$this->data['page'] = 'Login';
		$this->load->model('User_Model', 'user');
	}

	public function index()
	{
		$this->load->view('user/login', $this->data);
	}
	public function login()
	{
		if ($this->input->post()) {

			$this->form_validation->set_rules('text_name_user', 'nome de usuário', 'required', array('required' => 'o campo %s é obrigatorio'));
			$this->form_validation->set_rules('text_password', 'senha', 'required', array('required' => 'o campo %s é obrigatorio'));

			if ($this->form_validation->run() === true) {
				$result = $this->user->getUser($this->input->post('text_name_user', true), md5($this->input->post('text_password', true)));
				if ($result) {
					// Cria a sessão do usuário
					$this->session->set_userdata(
						array(
							'id'    => $result->id,
							'name'  => $result->name,
							'login' => $result->login,
						)
					);
					redirect('welcome');
				} else {
					$this->data['statusMessage'] = 'danger';
					$this->data['message'] = 'Usuário ou senha inválidos';
					$this->load->view('user/login', $this->data);
				}
			} else {
				$this->data['statusMessage'] = 'warning';
				$this->data['message'] = 'Verifique se os campos foram preenchidos';
				$this->load->view('user/login', $this->data);
			}
		}
	}
	public function logout()
	{
		//faz o logout do usuário
		if ($this->session->has_userdata('name')) {
			//destroi os dados da sessão                
			$this->session->unset_userdata('id');
			$this->session->unset_userdata('name');
			$this->session->unset_userdata('login');

			redirect('welcome');
		} else {
			redirect('welcome');
		}
	}
	public function newUser()
	{
		$this->data['page'] = 'Criar Conta';
		$this->load->view('user/register', $this->data);
	}
	public function insertUser()
	{
		$this->data['page'] = 'Criar Conta';

		if ($this->input->post()) {

			$this->form_validation->set_rules('text_name_complete', 'nome completo', 'required', array('required' => 'o campo %s é obrigatorio'));
			$this->form_validation->set_rules('text_username', 'login', 'required', array('required' => 'o campo %s é obrigatorio'));
			$this->form_validation->set_rules('text_password', 'senha', 'required', array('required' => 'o campo %s é obrigatorio'));
			$this->form_validation->set_rules('text_password2', 'validar senha', 'required', array('required' => 'o campo %s é obrigatorio'));

			if ($this->form_validation->run() === false) {

				$this->load->view('user/register', $this->data);
			} else {
				if (!$this->user->checkUser($this->input->post("text_username", true))) {

					// Verifica se os campos senha são igual
					if ($this->input->post('text_password', true) === $this->input->post('text_password2', true)) {

						//Cria conta de usuario
						if ($this->user->insert(
							$this->input->post('text_name_complete', true),
							$this->input->post('text_username', true),
							md5($this->input->post('text_password', true))
						)) {

							// usuario incluso com sucesso 
							$this->data['statusMessage'] = 'success';
							$this->data['message'] = 'Usuário incluso com sucesso';
							$this->load->view('user/login', $this->data);
						} else {
							$this->data['statusMessage'] = 'danger';
							$this->data['message'] = 'Aconteceu um erro ao inserir o usuario, tente novamente';
							$this->load->view('user/register', $this->data);
						}
					} else {
						$this->data['statusMessage'] = 'warning';
						$this->data['message'] = 'As senhas não corresponde';
						$this->load->view('user/register', $this->data);
					}
				} else {

					//Usuario já existe
					$this->data['message'] = 'Já existe um usuário com esse mesmo login';
					$this->load->view('user/register', $this->data);
				}
			}
		}
	}
}
