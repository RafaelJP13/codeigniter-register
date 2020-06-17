<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct()
    {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->data = array(
            'page_title' => 'Teste - Cadastro',
        );
               
    }

	function index()
	{
		$data = $this->data;
		$this->load->view('/partials/header', $data);
		$this->load->view('register', $data);
		
	}

	function store(){

		$this->load->library('form_validation');
		$data = $this->data;
		
		$this->form_validation->set_rules("name", 'nome', 'required|min_length[2]');
		$this->form_validation->set_rules("email", 'email', 'required|min_length[5]|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Senha', 'required|min_length[6]');
		$this->form_validation->set_rules('telephone', 'Telefone', 'required|min_length[15]|callback_validatePhone');
		$this->form_validation->set_rules('confirmPassword', 'Confirmar Senha', 'required|min_length[6]|matches[password]');
		$this->form_validation->set_rules('zipcode', 'Cep', 'required|exact_length[9]');
		$this->form_validation->set_rules('state', 'UF', 'required|exact_length[2]|alpha');
		$this->form_validation->set_rules('neighborhood', 'Bairro', 'required|min_length[2]');
		$this->form_validation->set_rules('street', 'Rua', 'required|min_length[2]');
		
		$statusValidation = $this->form_validation->run();

		if($statusValidation){

			$this->load->model('User');


			$userData = array(

				'name'    		   => $this->input->post('name'),
				'rg'        	   => $this->input->post('rg'), 
				'email' 	   	   => strtolower($this->input->post('email')),
				'telephone' 	   => $this->input->post('telephone'),
				'password'  	   => md5($this->input->post('password')),
				'zipcode'          => $this->input->post('zipcode'),
				'state'            => $this->input->post('state'),
				'city'             => $this->input->post('city'),
				'neighborhood'     => $this->input->post('neighborhood'),
				'street'           => $this->input->post('street'),
				'number'           => $this->input->post('number'),
				'reference'        => $this->input->post('reference'),
				'typeHabitation'   => $this->input->post('typeHabitation')
	
			);
	
			$typesHabitation = array(
				'home' => 0,
				'ap' => 1
			);
	
			if($userData['typeHabitation'] == $typesHabitation['ap']){
	
				$userData['floor'] = $this->input->post('floor');
				$userData['room']  = $this->input->post('room');
	
			}

			$insert = $this->User->store($userData);

			if($insert != 0) $this->session->set_flashdata('success', 'Usuário cadastrado com sucesso!');
				
			else $this->session->set_flashdata('error', 'Houve um erro ao cadastrar o usuário, contate o administrador do sistema!');
			
			redirect('Register/index','refresh');

		} else{

			$this->load->view('/partials/header', $data);
			$this->load->view('register', $data);

		}
	}

	function validatePhone(){

		$onlyNumbersTelephone = preg_replace('/[^0-9 ]/', '', $telephoneNumber);

		if(preg_match('/^\d(?!.*(\d)\1{5,}).+$/', $onlyNumbersTelephone)) return true;
		
 		$this->form_validation->set_message('validatePhone', 'Telefone Inválido.'); 
		return false;
		
	}

}
