<html>
   <head>
      <title></title>   
      <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css">
      <link rel="stylesheet" href="<?php echo base_url()?>assets/css/complemento.css">
   </head>
   <body>     
    <script src="<?php echo base_url()?>assets/js/jquery.js"></script>   
    <script src="<?php echo base_url()?>assets/js/jquery.form.js"></script>
    <script src="<?php echo base_url()?>assets/js/functions.js"></script>
     <div class='container'>
     <!--menu da aplicação -->
     <nav class="navbar navbar-default container-fluid">
        <div class="container">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url('arquivo/inicio');?>">Inicio</a></li>
                <li><a href="<?php echo base_url('arquivo/pesquisa_arquivo');?>">pesquisar</a></li>
                <li class="active"><a href="<?php echo base_url('arquivo/add_arquivo');?>">adicionar arquivo </a></li>
            </ul>
        </div>
     </nav>      
         <h1>Adicionar Arquivo</h1>         
      <div class='col-lg-12 pagina'>      
      <!-- retorno de mensagens  -->
      <div class="retorno_successo"  style='display:none'>
        <!--retorno se a operação ocorreu com sucesso -->
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>          
        </div>   
      </div>        
      <div class="retorno_erro" style='display:none'>        
        <!--retorno se a operação ocorreu com sucesso -->
        <div class="alert alert-danger" >
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>                    
        </div>        
      </div>  
        <div class='cont'>
           <div class="conteudo col-lg-12">              
            <form class="form-horizontal" method="POST"  id="envia_form" enctype="multipart/form-data">            
            <hr>
            <div class="input-group">
              <label for="">Nome do Arquivo</label>
              <input type="text" class="form-control nome_sistema"  placeholder="Nome do Arquivo" name='nome_sistema'>              
            </div>
            <hr>
            <div class="input-group">
              <label for="">Selecione o arquivo</label>              
              <input class="arquivo" name="arquivo" placeholder="Foto de perfil" type="file" id='fileUpload' >              
            </div>
               <hr>
               <div class="input-group">
                  <label for="">Descrição</label>                  
                  <textarea rows="3" cols="20" class='descricao form-control' name="descricao"></textarea>
               </div>			
               <div>
                  <input type="submit" value="Enviar" class='envia btn btn-primary' id='envia' >
               </div>	  	
            </form>
         </div>
        </div>
      </div>      
     </div>      
      <script>
    // validação do formulário
    $(document).ready(function(){
      $('.form-horizontal').validate({
          messages:{arquivo: { required: ' Faça o upload do arquivo.'}},
          rules:{arquivo: { required:true},}
        });
      });
     </script>
     <script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>
   </body>
</html>