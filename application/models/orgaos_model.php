<?php

class Orgaos_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    

public function listarTodos()
{
	$this->db->select('*');
	$this->db->from('orgaos');
    return $this->db->get()->result();
}

public function adicionar($dados)
{
    $this->db->insert('orgaos',$dados);
}



public function atualizar($dados, $id)
{   
	$this->db->where('id_orgao', $id);
	$this->db->update('orgaos',$dados);

}




}