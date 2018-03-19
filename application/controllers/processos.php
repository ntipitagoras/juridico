<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Processos extends CI_Controller {

    public function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata('session_id') || !$this->session->userdata('nome')) {
				redirect ("login");
			}
			$this->load->model('processos_model', 'processos');
			
		}


	public function index()
	{   
		$dados = array('orgao' => $this->processos->buscaOrgaos());
		$this->load->view('header');
		$this->load->view('adicionar', $dados);
		$this->load->view('footer');

	}

	public function adicionar()
	{
      
       $dados = array(
                 'requerente' => $this->input->post('requerente'),
                 'data_recebimento' => $this->input->post('date-receiver'),
                 'assunto'    =>  $this->input->post('assunto'),
                 'orgao_id'   => $this->input->post('orgao'),
                 'comentario' => $this->input->post('coment'),
                 'data_final' => $this->input->post('prazo')
                );

       $this->processos->adicionar($dados);
       $this->session->set_flashdata('msg', "Processo cadastrado com sucesso");
       redirect('processos');
	}

	public function atualizarData()
	{   $dataAtual = new Datetime(date('Y/m/d'));
	    $dataUser = new Datetime($this->input->post('data')); 
        $id = $this->input->post('id');
        
        $data = array('data_final' =>$this->input->post('data'));

        if ($dataUser >= $dataAtual) {
        	
            if ($this->processos->atualizarData($id, $data)) {
        	$this->session->set_flashdata('msg', 'Data definida');
        	redirect('dashboard');
            } 

        }else{
        	$this->session->set_flashdata('error', 'A data precisa ser maior que a data atual');
        	redirect('dashboard');
        }

        
        
	}
    
    public function atualizarDados()
	{   
		$dataAtual = new Datetime(date('Y/m/d'));
	    $dataUser = new Datetime($this->input->post('data')); 

        $id = $this->input->post('id');
        $dados = array(
          'data_final' =>$this->input->post('data'),
          'requerente' =>$this->input->post('requerente'),
          'assunto'    =>$this->input->post('assunto'),
          'orgao_id'   =>$this->input->post('orgao')
         );
       
        if ($dataUser >= $dataAtual) {
           if ($this->processos->atualizarDados($id, $dados)) {
        	$this->session->set_flashdata('msg', 'Processo atualizado');
        	redirect('processos/abertos');       	
        }

        }else{

        	$this->session->set_flashdata('error', 'A data do prazo precisa ser maior que a data atual');
        	redirect('processos/abertos');
        }
               
	}

	public function remarcarProcesso()
	{   
		$dataAtual = new Datetime(date('Y/m/d'));
	    $dataUser = new Datetime($this->input->post('data')); 

        $id = $this->input->post('id');
        $dados = array(
          'data_final' =>$this->input->post('data'),
          'requerente' =>$this->input->post('requerente'),
          'assunto'    =>$this->input->post('assunto'),
          'comentario' =>$this->input->post('coment')
         ); 
       
        if ($dataUser >= $dataAtual) {
           if ($this->processos->atualizarDados($id, $dados)) {
        	  $this->session->set_flashdata('msg', 'Processo remarcado');
        	redirect('processos/abertos');       	
        }

        }else{

        	$this->session->set_flashdata('error', 'A data do prazo precisa ser maior que a data atual');
        	redirect('processos/atrasados');
        }
               
	}

	public function finalizar()
	{
		$id = $this->input->post('id');
		$dados = array(
          'requerente' => $this->input->post('requerente'),
          'assunto'    => $this->input->post('assunto'),
          'data_recebimento' => $this->input->post('data_recebimento'),
          'orgao_id'   => $this->input->post('orgao_id'),
          'comentario' => $this->input->post('comentario'),
          'data_final' => $this->input->post('data_final'),
          'resultado'  =>  $this->input->post('resultado'),
          'data_finalizacao' =>date('Y/m/d : H:m')

		);

		if ($this->processos->finalizarProcesso($dados, $id)) {
			$this->session->set_flashdata('msg', 'Processo finalizado com sucesso');
            redirect('processos/atrasados');
		}
		




	}


    public function abertos()
    {  
       $data = date('Y/m/d');
       $dados = array();
       $dados = array('dados'=> $this->processos->processosAbertos($data), 'orgao' => $this->processos->buscaOrgaos());

        $this->load->view('header');
		$this->load->view('abertos', $dados);
		$this->load->view('footer');

    }

     public function atrasados()
    {
     
       $data = date('Y/m/d');
       $dados = array('dados'=> $this->processos->processosAtrasados($data));

        $this->load->view('header');
		$this->load->view('atrasados', $dados);
		$this->load->view('footer');
     



    }


     public function encerrados()
    {
     
     



    }





}
