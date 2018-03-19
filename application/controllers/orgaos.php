<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orgaos extends CI_Controller {

    public function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata('session_id') || !$this->session->userdata('nome')) {
				redirect ("login");
			}
			$this->load->model('orgaos_model', 'orgaos');
			
		}


	public function index()
	{   
		$dados = array('orgaos' => $this->orgaos->listarTodos());
		$this->load->view('header');
		$this->load->view('orgaos', $dados);
		$this->load->view('footer');

	}

	public function adicionar()
	{
      
       $dados = array('nome' => $this->input->post('nome'));
                            
       $this->orgaos->adicionar($dados);
       
       $this->session->set_flashdata('msg', "Órgão adicionado com sucesso");
       redirect('orgaos');
	}


	public function atualizar()
	{
        $id = $this->input->post('id');
   
       	$dados = array(
          'nome' => $this->input->post('nome'),   
       	);

       	$this->orgaos->atualizar($dados, $id);
       	$this->session->set_flashdata('msg', "Dados atualizados");
        redirect('orgaos');

        


     }
      

       	









}
