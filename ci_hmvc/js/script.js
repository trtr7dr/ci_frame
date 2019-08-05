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