<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata('session_id') || !$this->session->userdata('nome')) {
				redirect ("login");
			}
			$this->load->model('dashboard_model', 'dashboard');
			
		}


	public function index()
	{   
        $dados = array('processos'=>$this->dashboard->getAllSemPrazo());
		$this->load->view('header');
		$this->load->view('dashboard', $dados);
		$this->load->view('footer');
	}

	
}
