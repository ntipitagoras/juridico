<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata('session_id') || !$this->session->userdata('nome')) {
				redirect ("login");
			}
			$this->load->model('usuario_model', 'usuarios');
			
		}


	public function index()
	{   
		$dados = array('usuarios' => $this->usuarios->listarTodos());
		$this->load->view('header');
		$this->load->view('usuarios', $dados);
		$this->load->view('footer');

	}

	public function adicionar()
	{
      
       $dados = array(
                 'nome' => $this->input->post('nome'),
                 'email' => $this->input->post('email'),
                 'senha'    =>  $this->input->post('senha'),
                 'nivel_admin'   => $this->input->post('nivel')             
                );

       $this->usuarios->adicionar($dados);
       
       $this->session->set_flashdata('msg', "Usuário adicionado com sucesso");
       redirect('usuarios');
	}

	public function remover()
	{
      
       $id = $this->input->post('id');
       $this->usuarios->remover($id);

       $this->session->set_flashdata('msg', "Usuário removido");
       redirect('usuarios');
	}

	public function atualizar()
	{
       $id = $this->input->post('id');
       $senha = $this->input->post('senha');

       if ($senha=='') {
       	$dados = array(
          'nome' => $this->input->post('nome'),
          'email' => $this->input->post('email'),
          'nivel_admin' => $this->input->post('nivel')
       	);
       	$this->usuarios->atualizar($dados, $id);
       	$this->session->set_flashdata('msg', "Dados atualizados");
        redirect('usuarios');

       }else{
       $dados = array(
          'nome' => $this->input->post('nome'),
          'email' => $this->input->post('email'),
          'senha'   => $this->input->post('senha'),
          'nivel_admin' => $this->input->post('nivel')
       	);
        $this->usuarios->atualizar($dados, $id);
        $this->session->set_flashdata('msg', "Dados atualizados");
        redirect('usuarios');


       }
      

       	}









}
