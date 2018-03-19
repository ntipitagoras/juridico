<?php

class Usuario_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    
public function login($email, $senha)
{

	$this->db->select('*');
	$this->db->from('usuarios');
    $this->db->where('email',$email);
    $this->db->where('senha',$senha);
    return $this->db->get()->result();
}

public function listarTodos()
{

	$this->db->select('*');
	$this->db->from('usuarios');
    return $this->db->get()->result();
}

public function adicionar($dados)
{
    $this->db->insert('usuarios',$dados);
}

public function remover($id)
{
	$this->db->where('id', $id);
    $this->db->delete('usuarios');

}

public function atualizar($dados,$id)
{   
	$this->db->where('id', $id);
	$this->db->update('usuarios',$dados);

}




}