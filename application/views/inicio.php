<html>
   <head>
      <title><?php echo $titulo;?></title>     
      <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css">
   </head>
   <body>
   <script src="<?php echo base_url()?>assets/js/jquery.js"></script>
   <script>
      $(document).ready(function() {  
         // url do servidor rest
         var url_e ='http://projetos/rest-server/api/arquivo/';      
         // FORMULARIO DE PESQUISA DE ARQUIVO
         $('#pesquisa_arquivo').submit(function(){      
            $(".pesquisa").hide( "slow" ).remove();

            var nome_arquivo  = $('.nome_arquivo').val();       
            
            var nome_ = nome_arquivo;       
            
            var url_pesquisa = url_e+''+nome_arquivo;
            console.log(url_pesquisa);
               $.ajax({
                  type:"GET",            
                  url: url_pesquisa, //adiciona o nome do arquivo na url de pesquisa                       
                  success: function(d){
                     console.log(d);

                     for(i=0; d.data.length>i; i++){
                        console.log(d.data[i].nome_sistema);
                        $('.exibe_pesquisa').append("<div class='pesquisa'>"+d.data[i].nome_sistema+"</div>");
                     }                
                  },                    
                  dataType: "Json",            
            });
            return false;
         });
      });
   </script>   
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
      <!-- recebe itens da pesquisa  -->
      <div class="exibe_pesquisa"></div>
     </div>      
   </body>
</html>