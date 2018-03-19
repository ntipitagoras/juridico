<?php

class Processos_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    
public function adicionar($dados)
{

$this->db->insert('processos', $dados);


}

public function buscaOrgaos()
{

$this->db->select('*');
$this->db->from('orgaos');
return $this->db->get()->result();

}

public function atualizarData($id, $data)
{
	$this->db->where('id', $id);   
    return $this->db->update('processos', $data);
}

public function atualizarDados($id, $data)
{
	$this->db->where('id', $id);   
    return $this->db->update('processos', $data);
}

public function processosAbertos($data)
{
	$this->db->select('*');
	$this->db->where('data_final >=', $data); 
	$this->db->join('orgaos', 'orgao_id = orgaos.id_orgao', 'left');  
    $this->db->from('processos');
    return $this->db->get()->result();
}

public function processosAtrasados($data)
{
	$this->db->select('*');
	$this->db->where('data_final <', $data); 
	$this->db->join('orgaos', 'orgao_id = orgaos.id_orgao', 'left');  
    $this->db->from('processos');
    return $this->db->get()->result();
}

public function processosEncerrados()
{
	
}

public function finalizarProcesso($dados, $id)
{
	$this->db->insert('encerrados', $dados);
	$this->db->where('id', $id);
	$this->db->delete('processos');
	return true;
}



}