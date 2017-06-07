<html>
   <head>
      <title><?php echo $titulo;?></title>     
      <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css">
      <link rel="stylesheet" href="<?php echo base_url()?>assets/css/complemento.css">
      
   </head>
   <body>
   <script src="<?php echo base_url();?>assets/js/jquery.js"></script>   
   <script src="<?php echo base_url();?>assets/js/functions.js"></script>
   <script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>
     <div class='container'>
     <!--menu da aplicação -->      
     <nav class="navbar navbar-default container-fluid">
        <div class="container">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url('arquivo/inicio');?>">Inicio</a></li>
                <li class="active"><a href="<?php echo base_url('arquivo/pesquisa_arquivo');?>">pesquisar</a></li>
                <li><a href="<?php echo base_url('arquivo/add_arquivo');?>">adicionar arquivo </a></li>
            </ul>
        </div>
     </nav>
    
     <h1>Pesquisa de Arquivos</h1>
      <div class='col-lg-12 conteudo'>      
         <form  id="pesquisa_arquivo" name="pesquisa_arquivo"> 
            <div class="form-group col-lg-10">
                <input type="text" class="form-control nome_arquivo" name="nome_arquivo">                
            </div>             
            <div class="form-group col-lg-2">
                <input type="submit" value="Pesquisar" class='btn btn-primary'> 
            </div>             
         </form>
      </div>
      <!-- recebe itens da pesquisa  -->
      <div class="exibe_pesquisa_form col-lg-12">     
      </div>
      <div class='col-lg-12'>
        <div class="retorno_pesquisa alert alert-danger" style='display:none'></div>           
      </div>      
     </div>      
     <script>         
        $(document).ready(function(){
            $('#pesquisa_arquivo').validate({
                messages:{nome_arquivo: { required: ' Informe o nome do arquivo.'}},
                rules:{nome_arquivo: { required:true}}
            });
        });
     </script>     
   </body>
</html>