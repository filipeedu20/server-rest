<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arquivo extends CI_Controller {

	public function index()
	{
		
	}
	// Página inicial 
	public function inicio(){
		$data['titulo'] = "Sistema de Gerenciamento de arquivos";
		$this->load->view('inicio', $data);
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
	// Página de download e pesquisa dos arquivos
	public function pesquisa_arquivo(){		
		// carrega helper para fazer download
		$this->load->helper('download');
		$data['titulo'] = "Exibição de arquivos ";		
		$this->load->view('pesquisa_arquivo', $data);		
	}
	public function add_arquivo(){
		
		$data['titulo'] = "Adicionar Arquivo ";		
		$this->load->view('add_arquivo', $data);		
	}
	 

}

/* End of file Arquivo.php */
/* Location: ./application/controllers/Arquivo.php */