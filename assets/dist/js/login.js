

$(function(){      //inicializa jQuery
   $('.form-login').submit(function(){    //nome do form no evento submit identificado por class
      $.ajax({
         url: 'login/autenticar',
         type: 'POST',
         dataType: 'json',
         data: $('.form-login').serialize(),

         success: function( data ){              
         if (data=='true') {

          $("#btn_entrar").attr('disabled', 'true');
           document.location.href='dashboard';
         }
         if (data=='false') {
          $('#resposta').html("<h5>Senha incorreta</h5>");
          $('#resposta').removeAttr("hidden");
          
         }

         },
         beforeSend: function(){      
            $("#btn-login").attr('value', 'Tentando..');   
            
            

        },
        complete: function(msg){    

            $("#btn-login").attr('value', 'Entrar'); 
          
            
        }
      });
    return false; //não recarregar a página
   });
});

