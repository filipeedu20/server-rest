<html>
   <head>
      <title><?php echo $titulo;?></title>     
      <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css">
      <link rel="stylesheet" href="<?php echo base_url()?>assets/css/complemento.css">
   </head>
   <body>
   <script src="<?php echo base_url()?>assets/js/jquery.js"></script>
   <script>
      var hasOwnProperty = Object.prototype.hasOwnProperty;

function isEmpty(obj) {

    // null é "empty"
    if (obj == null) return true;

    // Suponhamos que se tenha uma propriedade length com um valor diferente de zero
    // Essa proriedade será verdadeira
    if (obj.length > 0)    return false;
    if (obj.length === 0)  return true;

    // Caso contrário ela tem todas as sua propriedades?
    // Isto não se manipula
    // toString e valueOf são erros de enumeração no IE < 9
    for (var key in obj) {
        if (hasOwnProperty.call(obj, key)) return false;
    }

    return true;
}
      $(document).ready(function() {  
          $(".retorno_pesquisa").hide();
          $('.exibe_pesquisa').hide();
         // url do servidor rest
         var url_e ='http://projetos/rest-server/api/arquivo/';      
        //  url para realizar o download do arquivo
         var url_download = "http://projetos/rest-server/download/realizarDownload/"; 
         // FORMULARIO DE PESQUISA DE ARQUIVO
         $('#pesquisa_arquivo').submit(function(){      
         $(".pesquisa").hide( "slow" ).remove();
        // nome do arquivo vindo do formulário
        var nome_arquivo  = $('.nome_arquivo').val();                   

        var nome= nome_arquivo.replace(" ","_");                   
        
        var url_pesquisa = url_e+''+nome;
        var i = 0; 
            $.ajax({
                type:"GET",            
                url: url_pesquisa, //adiciona o nome do arquivo na url de pesquisa                       
                success: function(d){ 
                    $('.exibe_pesquisa').show();
                    $(".retorno_pesquisa").hide();
                // verifica se foi encontrado algum intem  
                    if(isEmpty(d)==false){
                    for(i=0; d.data.length>i; i++){
                        // adiciona elemento na url para realizar o download
                        var link_download =url_download+''+d.data[i].id_arquivo;
                        $('.exibe_pesquisa').append(
                            "<div class='pesquisa'><div class='col-lg-6'><a href='"+link_download+"' class='btn btn-success'>Download</a></div>"+
                            "<div class='col-lg-6'> <strong>Downloads:</strong> "+d.data[i].num_download+"</div>"+
                            "<div class='col-lg-12 nome_arquivo'> <strong>Nome do Arquivo:</strong> "+d.data[i].nome_sistema+"</div>"+
                            "<div class='col-lg-12 descricao'><p><strong>Descrição</strong></p> "+d.data[i].descricao +"</div></div>"
                            );
                    }                         
                    }else{
                    $(".retorno_pesquisa").show();
                    $('.exibe_pesquisa').hide();
                    $(".retorno_pesquisa").text("Nenhum arquivo encontrado");                                
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
                <li><a href="<?php echo base_url('arquivo/inicio');?>">Inicio</a></li>
                <li class="active"><a href="<?php echo base_url('arquivo/pesquisa_arquivo');?>">pesquisar</a></li>
                <li><a href="<?php echo base_url('arquivo/add_arquivo');?>">adicionar arquivo </a></li>
            </ul>
        </div>
     </nav>
    
     <h1>Pesquisa de Arquivos</h1>
      <div class='col-lg-12'>      
         <form action="" id="pesquisa_arquivo" method='get'>
            <input type="text" class="nome_arquivo" name="nome_arquivo">
            <input type="submit" value="Pesquisar">
         </form>
      </div>
      <!-- recebe itens da pesquisa  -->
      <div class="exibe_pesquisa col-lg-12">     
      </div>
      <div class='col-lg-12'>
        <div class="retorno_pesquisa alert alert-danger" style='display:none'></div>           
      </div>      
     </div>      
   </body>
</html>