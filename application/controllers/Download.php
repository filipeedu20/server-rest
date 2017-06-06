
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

   public function index()
   {
     
   }
   public function realizarDownload(){
      $this->load->helper('download');
      $this->load->model('Arquivo_model');      
      $this->load->library('zip');
      $this->load->library('session');
      
      $idArquivo = $this->uri->segment(3);

      $arquivo = $this->Arquivo_model->retornaDownload($idArquivo);
      
      
      
      // incrementa número de downloads
      $num_download = $arquivo->num_download + 1;
      var_dump($arquivo);
      
      $dados['num_download'] = $num_download;

      

      if($this->Arquivo_model->alterar($arquivo->id_arquivo,$dados)){
         $caminho = 'uploads/'.$arquivo->nome_dir;
         $data =file_get_contents($caminho); // Read the file's contents   
         $nome = $arquivo->nome_sistema;
         $nome = str_replace(" ","_",$nome);

         $this->zip->read_file($caminho);
         $this->zip->download('my_backup.zip');

         // $this->zip->add_data($name, $data);

         // $this->zip->archive('uploads/'.$arquivo->nome_dir, $nome );
         // $this->zip->download('download.zip');



         // retira espaços em branco do nome do arquivo para download
         
         // $this->zip->add_data('/uploads/13b733f2ec4c728c36e0974a2327dd79.png', $nome);
         // $this->zip->archive('./files/zip/meu_texto.zip');
         // $this->zip->download('download.zip');
         // if($this->zip->read_dir('./uploads/13b733f2ec4c728c36e0974a2327dd79.png')){
         //    // Faz o download do arquivo comprimido
         //    $this->zip->download('download.zip');
         // }else{
         //    // Define a mensagem de erro a ser exibida para o usuário
         //    echo "erro ao zipar arquivo";
         // }
         // force_download($nome, $data);
      }else{
         echo "não foi possível realizar o download";
      }

      
      // $data =file_get_contents("uploads/13b733f2ec4c728c36e0974a2327dd79.png"); // Read the file's contents   
      // $nome ="13b733f2ec4c728c36e0974a2327dd79.png";
      // force_download($nome, $data);
   }

}

/* End of file Download.php */
