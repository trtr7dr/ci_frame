jQuery(document).ready(function($) {

            var options = {
                beforeSend: function(){
                    //$(".upload-image-messages").html('<p><img src = "/img/loading.gif" class = "loader" /></p>');
                },
                complete: function(response){
	                var result = JSON.parse(response.responseText);
	                if (result['upload_code'] == 1){
		                if(result['upload_data'].length == 1){
		                	$(".upload-image-messages").html('<p class = "bg-success">Файл успешно загружен.</p>');
		                }else{
			                $(".upload-image-messages").html('<p class = "bg-success">' + result['upload_data'].length + ' файлов успешно загружен.</p>');
		                }
	                }else{
		                if(result['error'] == 'error'){
			                $(".upload-image-messages").html('<p class = "bg-success">Произошла непредвиденная ошибка</p>');
		                }else{
		                	$(".upload-image-messages").html('<p class = "bg-success">' + result['error'] + '</p>');
		                }
	                }
                    
                    $('html, body').animate({scrollTop: $(".upload-image-messages").offset().top-100}, 150);
                   
                }
            }; 
            $(".upload-image-form").ajaxForm(options); 
           
        });
 
 
 
 $(function (){
    $('#contact_form').submit(function (){
	    var name = document.getElementById('name');
	    var text = document.getElementById('text');
	    var mail = document.getElementById('mail');
		
		var check = true;
	    
	    if( name.value.length > 30 || name.value.length < 2 ){
		    //newDiv.insertBefore(itemLabel, name);
		    name.style.borderColor = "red";
		    check = false;
	    }
        
        if( text.value.length > 500 || text.value.length < 10 ){
		    //newDiv.insertBefore(itemLabel, name);
		    text.style.borderColor = "red";
		    check = false;
	    }
	    
		if(mail.value == ''){
			mail.style.borderColor = "red";
		    check = false;
		}
        
        return check;
    });
});
