<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{   
		$this->load->view('login');
	
	}



	public function autenticar()
	{
	 $this->load->model('usuario_model','usuario');

      $email = $this->input->post('email');
      $senha = $this->input->post('senha');
  
      $res = $this->usuario->login($email, $senha);
      if ($res!=NULL) {
        $dados = array(
          'id'   => $res[0]->id,
          'nome' => $res[0]->nome,
          'email'=> $res[0]->email,
          'nivel-admin' =>$res[0]->nivel_admin
        );

        $this->session->set_userdata($dados);
		    echo json_encode('true');
      }else{

         echo json_encode('false');
      }


	}





}
