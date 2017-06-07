<html>
   <head>
      <title><?php echo $titulo;?></title>     
      <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css">
      <link rel="stylesheet" href="<?php echo base_url()?>assets/css/complemento.css">
   </head>
   <body>
   <script src="<?php echo base_url()?>assets/js/jquery.js"></script>   
   <script src="<?php echo base_url()?>assets/js/functions.js"></script>
     <div class='container'>
     <!--menu da aplicação -->
     <nav class="navbar navbar-default container-fluid">
        <div class="container">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo base_url('arquivo/inicio');?>">Inicio</a></li>
                <li><a href="<?php echo base_url('arquivo/pesquisa_arquivo');?>">pesquisar</a></li>
                <li><a href="<?php echo base_url('arquivo/add_arquivo');?>">adicionar arquivo </a></li>
            </ul>
        </div>
     </nav>      
     <h1>Sistema de Gerencimento de Arquivos </h1>
      <div class='col-lg-12'>         
      </div>
      <!--retorna elementos do array via json-->
      <div class='cont_pagina'></div>
      <!-- recebe itens da pesquisa  -->
      <div class="exibe_pesquisa"></div>
     </div>      
   </body>
</html>