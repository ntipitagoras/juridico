<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CI_Mensagem {

	protected $CI;
    protected $mensagem = '';
    protected $prefixo  = '<div id="mensagem">';
    protected $posfixo  = '</div>';

    /*
     * @description Método construtor da library Mensagem, utilizado para carregar a instância e o arquivo de mensagens.
     *
     * @author Renan Hagiwara
     * @created 01/04/2013
     * @updated 01/04/2013
     *
     */
	public function __construct()
	{
		$this->CI =& get_instance();
        $this->CI->lang->load('mensagens');
	}

    /*
     * @description Método utilizado para retornar a mensagem já pronta, no caso do erro e alerta apenas irá exibir a mensagem, no caso de sucesso o sistema recupera a mensagem armazenada no flashdata do CodeIgniter.
     *
     * @author Renan Hagiwara
     * @created 01/04/2013
     * @updated 03/04/2013
     *
     */
	public function exibir()
	{
        if($this->CI->session->flashdata('mensagem'))
        {
            echo $this->mensagem = $this->CI->session->flashdata('mensagem');
        }
        else
        {
            echo $this->mensagem;
        }
	}

    /*
     * @description Método utilizado para definir a frase da mensagem de erro.
     *
     * @author Renan Hagiwara
     * @created 01/04/2013
     * @updated 03/04/2013
     *
     */
	public function erro($codigo)
	{
        if($codigo)
        {
            $FRASE = "\n<erro>".$this->CI->lang->line('erro-'.$codigo)."</erro>\n";
            $ERROS = $this->CI->form_validation->erros();
            $this->mensagem = $this->prefixo . $FRASE . $ERROS . $this->posfixo;
        }
        else
        {
            show_error('Falta de argumentos.');
        }
	}

    /*
     * @description Método utilizado para setar a mensagem de sucesso no flashdata do CodeIgniter.
     *
     * @author Renan Hagiwara
     * @created 01/04/2013
     * @updated 03/04/2013
     *
     */
	public function sucesso($codigo)
	{
        if($codigo)
        {
            $this->frase = "\n<sucesso>".$this->CI->lang->line('sucesso-'.$codigo)."</sucesso>\n";
            $this->mensagem = $this->prefixo . $this->frase . $this->posfixo;
            $this->CI->session->set_flashdata('mensagem', $this->mensagem);
        }
        else
        {
            show_error('Falta de argumentos.');
        }
	}

    /*
     * @description Método utilizado para setar uma mensagem de alerta.
     *
     * @author Renan Hagiwara
     * @created 01/04/2013
     * @updated 03/04/2013
     *
     */
	public function alerta($codigo)
	{
        if($codigo)
        {
            $FRASE = "<alerta>".$this->CI->lang->line('alerta-'.$codigo)."</alerta>";
            $this->mensagem = $this->prefixo . $FRASE . $this->posfixo;
        }
        else
        {
            show_error('Falta de argumentos.');
        }
	}
}

// END CI_Mensagens Class

/* End of file Mensagem.php */
/* Location: ./application/libraries/Mensagem.php */