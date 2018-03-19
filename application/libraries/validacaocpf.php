<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Validação de CPF
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Validação de CPF
 * @author		Escritório Escola Dev Team
 * @link		http://www.semanatrans.esy.es
 */
 
class Validacaocpf {

    public function verificar($cpf){ 
	// Elimina possivel mascara          
	$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

	// Verifica se o numero de digitos informados é igual a 11
	if (strlen($cpf) != 11) { 
		$msgerro = 'O CPF deve ter onze dígitos!';
		return $msgerro;
	} 
	// Verifica se o numero digitado esta com os digitos repitidos
	elseif ($cpf == '00000000000' || $cpf == '11111111111' ||  
			$cpf == '22222222222' || $cpf == '33333333333' ||  
			$cpf == '44444444444' || $cpf == '55555555555' ||  
			$cpf == '66666666666' || $cpf == '77777777777' ||  
			$cpf == '88888888888' || $cpf == '99999999999') {
		$msgerro = 'O CPF contem dígitos repetidos!';
		return $msgerro;
	}
	else { 
		// Verifica se o numero informado é um CPF valido
		for ($t = 9; $t < 11; $t++) {
		for ($d = 0, $c = 0; $c < $t; $c++) {
		$d += $cpf{$c} * (($t + 1) - $c);
		}					            
		$d = ((10 * $d) % 11) % 10;					            
		if ($cpf{$c} != $d) {  
		$msgerro = 'CPF informado não é valido!';
		return $msgerro;
		}
	}
	}
	}            
}
 
/* End of file verificaCpf.php */