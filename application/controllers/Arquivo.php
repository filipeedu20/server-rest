<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arquivo extends CI_Controller {

	public function index()
	{
		
	}

	// Página para envio de arquivo 
	public function envia_arquivo(){
		$data['titulo'] = "Envio de Arquivo";
		$this->load->view('envia_arquivo', $data);
	}
	public function arquivos(){
		$data['titulo'] = "Exibição de arquivos ";		
		$this->load->view('view_all_files', $data);
	}

}

/* End of file Arquivo.php */
/* Location: ./application/controllers/Arquivo.php */