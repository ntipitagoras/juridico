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


  public function profile()
  { 
    $this->load->view('header');
    $this->load->view('profiles');
    $this->load->view('footer');
  }

    public function updateProfile()
  { 
    $this->load->helper('file');
    $nome = $this->input->post('nome');
    $email = $this->input->post('email');
    $senha =  $this->input->post('senha');
    $id    =  $this->input->post('id');
    $arquivo = $_FILES['imagem'];
    
    
    if ($senha) {
      $dados = array(
        'nome' => $nome,
        'email'=> $email,
        'senha'=> $senha
       );
    $this->usuarios->atualizar($dados, $id);
    }else{
      $dados = array(
        'nome' => $nome,
        'email'=> $email
       );
      $this->usuarios->atualizar($dados, $id);
    }

    if ($arquivo) {
      $file_name = '';

      for($a=0; $a<10; $a++){
       $file_name .= rand(1,9);//sorteia 1 numero de 0 a 9
       }
      $config['upload_path']          = './uploads/img';
      $config['allowed_types']        = 'jpg|png|jpeg';
      $config['max_size']             = 2048;
      $config['max_width']            = 1024;
      $config['max_height']           = 768;
      $config['file_name']           = $file_name;
      $patch = array('profilePatch' => $config['file_name']);
      $this->load->library('upload', $config);
      
    

      if ($this->upload->do_upload('imagem')){
         echo 'Arquivo salvo com sucesso.';
         $this->usuarios->addPhoto($patch, $id);

      }else{
         echo $this->upload->display_errors();
      }

      

    }else{

    }


      
      

      






}

}