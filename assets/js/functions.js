// Todas as operações realizadas no sistema
var hasOwnProperty = Object.prototype.hasOwnProperty;
// verifica se um objeto está vazio
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
// url do servidor rest
var url_e ='http://projetos/rest-server/api/arquivo/';      
//  url para realizar o download do arquivo
var url_download = "http://projetos/rest-server/download/realizarDownload/"; 

// esconde elementos
$(".retorno_pesquisa").hide();
$('.exibe_pesquisa').hide();

//-----------------------------------------------------------------------------------
// Retorna todos os arquivos cadastrados           
$.ajax({
   type:"GET",            
   url: url_e, //adiciona o nome do arquivo na url de pesquisa                       
   success: function(d){ 
      $('.exibe_pesquisa').show();                    
      // verifica se foi encontrado algum intem  
      if(isEmpty(d)==false){
      for(i=0; d.data.length>i; i++){
         // adiciona elemento na url para realizar o download
         var link_download =url_download+''+d.data[i].id_arquivo;
         $('.cont_pagina').append(
               "<div class='pesquisa'><div class='col-lg-6'><a href='"+link_download+"' class='btn btn-success'>Download</a></div>"+
               "<div class='col-lg-6'> <strong>Downloads:</strong> "+d.data[i].num_download+"</div>"+
               "<div class='col-lg-12 nome_arquivo'> <strong>Nome do Arquivo:</strong> "+d.data[i].nome_sistema+"</div>"+
               "<div class='col-lg-12 descricao'><p><strong>Descrição</strong></p> "+d.data[i].descricao +"</div></div>");
            }                         
         }                   
         $(".loader").hide(); //esconde loader
      },
      beforeSend(){
         $('.cont_pagina').append("<div class='loader'></div>");
      } ,                   
      dataType: "Json",            
   });

//-----------------------------------------------------------------------------------
//Rertorna dados de pesquisa
$('#pesquisa_arquivo').submit(function(){      
   $(".pesquisa").hide( "slow" ).remove();
   // nome do arquivo vindo do formulário
   var nome_arquivo  = $('.nome_arquivo').val();                   
   var nome= nome_arquivo.replace(" ","_");                           
   var url_pesquisa = url_e+''+nome;
   console.log(nome_arquivo);
   if(nome_arquivo){
      $.ajax({
      type:"GET",            
      url: url_pesquisa, //adiciona o nome do arquivo na url de pesquisa                       
      success: function(d){ 
         $('.exibe_pesquisa_form').show();
         $(".retorno_pesquisa").hide();
         //fecha loader
         $(".loader").hide();
         // verifica se foi encontrado algum intem  
         if(isEmpty(d)==false){
            for(i=0; d.data.length>i; i++){
               // adiciona elemento na url para realizar o download
               var link_download =url_download+''+d.data[i].id_arquivo;
                  $('.exibe_pesquisa_form').append(
                     "<div class='pesquisa'><div class='col-lg-6'><a href='"+link_download+"' class='btn btn-success'>Download</a></div>"+
                     "<div class='col-lg-6'> <strong>Downloads:</strong> "+d.data[i].num_download+"</div>"+
                     "<div class='col-lg-12 nome_arquivo'> <strong>Nome do Arquivo:</strong> "+d.data[i].nome_sistema+"</div>"+
                     "<div class='col-lg-12 descricao'><p><strong>Descrição</strong></p> "+d.data[i].descricao +"</div></div>"
                  );
               }                         
            }else{
               $(".retorno_pesquisa").show();
               $('.exibe_pesquisa_form').hide();
               $(".retorno_pesquisa").text("Nenhum arquivo encontrado");                                
            }                     
         },   
            beforeSend(){
            $('.conteudo').append("<div class='loader'></div>");
            } ,                                    
            dataType: "Json",            
      });//fim ajax
   }//fim if
return false;
});
      // FORMULARIO DE ENVIO DE ARQUIVO         
$("#envia_form").submit(function(){
      //  limpa retornos anteriores 
      $(".result").remove();
      $('.retorno_erro').hide();  
      $('.retorno_successo').hide();    
      $('#envia_form').ajaxSubmit({
            url  : url_e,
            type : 'POST',
            success:function(data){   
            // verifica se houve sucesso
            if(data.message.retorno=='sucesso'){                             
                        $('.retorno_successo').show();            
                        $('.alert-success').append("<div class='result'>"+data.message.mensagem+"</div>");                  
                        // limpa campos do form
                        $('#envia_form').each (function(){
                              this.reset();
                        });
                        $(".loader").hide(); //esconde loader
                  }else{
                        $('.retorno_erro').show();  
                        $('.alert-danger').append("<div class='result'>"+data.message.mensagem+"</div>");                  
                  }                
                  $(".loader").remove(); //exibe loader
            },
            beforeSend(){
                  $('.cont').append("<div class='loader'></div>"); //exibe loader
            } ,          
            dataType:"json"
      });
      return false;
});

}); //fim do documento functions.js




