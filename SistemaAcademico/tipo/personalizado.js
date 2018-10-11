$(function(){
    $("#pesquisa").keyup(function (){
       var pesquisa = $(this).val();
       
       if(pesquisa != ''){
           var dados = {
               palavra : pesquisa
           }
           $.post('pesquisa.php', dados, function(retorna){
              $(".resultado").html(retorna); 
           });
       }
       
    }); 
});

