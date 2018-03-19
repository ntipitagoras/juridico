<?php

class Dashboard_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    
public function getAllSemPrazo()
{

	$this->db->select('*');
	$this->db->where('data_final', 'NULL');
	$this->db->from('processos');
	$this->db->join('orgaos', 'orgao_id = orgaos.id_orgao', 'left');
	return $this->db->get()->result();
}

public function atualizarData($id, $data)
{
	$this->db->where('id', $id);   
    return $this->db->update('processos', $data);
}

}