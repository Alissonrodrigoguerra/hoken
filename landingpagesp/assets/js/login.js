$('#msg').ready(function(){

       var msg = $('#msg').text();
         
       if(msg){
        Materialize.toast(msg, 4000); 
       }
	
          
	
});

function myFunction(){

  var toastElement = $('.toast').first()[0];
  var toastInstance = toastElement.M_Toast;
  toastInstance.remove();v

}