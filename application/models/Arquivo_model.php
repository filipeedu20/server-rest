<?php
// Responsável por manipular o banco de dados 
defined('BASEPATH') OR exit('No direct script access allowed');
class Arquivo_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // carregamos o helper que irá fazer o gerenciamento da criptografia da senha
        $this->load->helper('passw_service');
    }

    /*
     * Lista todas as informações dos arquivos registrados 
     */
    public function GetAll($campos = '*')
    {
        $this->db->select($campos)
        ->from('arquivo')
        ->order_by('nome_sistema','ASC');

        return $this->db->get()->result_array();
    }

    /*
     * Método que irá listar todos os arquivos
     * recebe como parâmetro os campos a serem retornados
     */
    public function GetById($nome, $campos = '*')
    {   
        // verifica se o array está vazio 
        if (empty($nome)) {
            return array();
        }
        $this->db->select($campos)
        ->from('arquivo')
        ->like('nome_sistema',$nome)
        ->order_by('nome_sistema','ASC');
        return $this->db->get()->result_array();
    }

    /**
     * Método que irá fazer a validação dos dados e processar o insert na tabela
     * @param array com informações vindas do formulário
     */
    function Insert($dados)
    {
        if (!isset($dados)) {
            $response['status'] = false;
            $response['message'] = "Dados não informados.";
        } else {
            // setamos os dados que devem ser validados
            $this->form_validation->set_data($dados);
            // definimos as regras de validação
            $this->form_validation->set_rules('nome_sistema','Nome','required');
            $this->form_validation->set_rules('descricao','Descrição','required|min_length[6]');
            

            // executamos a validação e verificamos o seu retorno
            // caso haja algum erro de validação, define no array $response
            // o status e as mensagens de erro
            if ($this->form_validation->run() === false) {
                $response['status'] = false;
                $response['message'] = validation_errors();
            } else {        
                //executamos o insert
                $status = $this->db->insert('arquivo', $dados);
                // verificamos o status do insert
                if ($status) {
                    $response['status'] = true;
                    $response['message'] = "Arquivo inserido com sucesso.";
                } else {
                    $response['status'] = false;
                    $response['message'] = $this->db->error_message();
                }
            }
        }
        // retornamos as informações sobre o insert
        return $response;
    }

    /*
     * Atualiza os registros do arquivo especificado 
     * recebe como parâmetro o array com os dados do formulário
     */
    function Update($campo, $valor, $dados)
    {
        if (!isset($dados) || !isset($field) || !isset($dados)) {
            $response['status'] = false;
            $response['message'] = "Dados não informados.";
        } else {
            // setamos os dados que devem ser validados
            $this->form_validation->set_data($dados);
            // definimos as regras de validação
            $this->form_validation->set_rules('nome_sistema','Nome','required|min_length[2]|trim');            
            $this->form_validation->set_rules('descricao','Descrição','required|min_length[6]|trim');            

            // executamos a validação e verificamos o seu retorno
            // caso haja algum erro de validação, define no array $response
            // o status e as mensagens de erro
            if ($this->form_validation->run() === false) {
                $response['status'] = false;
                $response['message'] = validation_errors();
            } else {
                

                //executamos o update
                $this->db->where($campo, $valor);
                $status = $this->db->update('arquivo', $dados);
                // verificamos o status do insert
                if ($status) {
                    $response['status'] = true;
                    $response['message'] = "Arquivo atualizado com sucesso.";
                } else {
                    $response['status'] = false;
                    $response['message'] = $this->db->error_message();
                }
            }
        }
        // retornamos as informações sobre o update
        return $response;
    }


    /*
     * Método que irá fazer a remoção dos dados
     * Recebe como parâmetro o campo e o valor a serem usados na cláusula where
     */
    function Delete($campo, $valor)
    {

        if (is_null($campo) || is_null($valor)) {
            $response['status'] = false;
            $response['message'] = "Dados não informados.";
        } else {
            // definimos o campo que é o parâmetro para remoção
            $this->db->where($campo, $valor);
            // removemos o registro e armazenamos o status do procedimento
            $status =  $this->db->delete('arquivo');

            // verificamos o status do procedimento de remoção
            if ($status) {
                $response['status'] = true;
                $response['message'] = "Arquivo removido com sucesso.";
            } else {
                $response['status'] = false;
                $response['message'] = $this->db->error_message();
            }
        }
        // retornamos as informações sobre o status do procedimento
        return $response;
    }
    // Retorna informações do arquivo para realização do download
    public function retornaDownload($idArquivo){
        $this->db->from('arquivo');        
        $this->db->where('id_arquivo', $idArquivo);
        return $this->db->get()->row();
    }
    /**
    * Realiza alterando interna do sistema 
    */
    public function alterar($idArquivo,$dados){                
        $this->db->where('id_arquivo', $idArquivo);        
        $this->db->update('arquivo', $dados);                
        // verifica se houve alteração no sistema 
        if($this->db->affected_rows()>=1){
            return true;
        }else{
            return false;
        }        
    }
}
