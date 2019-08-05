<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    //функция добавляет в бд все данные заявки
    function insert_form($form_data){
        $this->db->insert('forms', $form_data);
        $id = $this->db->insert_id();
        return $id;
    }

	function session(){
		if(isset($_SESSION['created'])){
			if (time() - $_SESSION['created'] > 5) {
			    session_destroy();
			    session_unset();
			    return true;
			}else{
			    return false;
			}
		}
		else{
			$_SESSION['created'] = time();
			return true;
		}
	}
	
	function send_mail($name, $mail, $text){
		
		$to  = "h2so4oh2@gmail.com";  
		
		$subject = "С сайта CI3"; 
		
		$message = $text.'\n'.$name;
		
		$headers  = "Content-type: text/html; charset=utf8 \r\n"; 
		$headers .= "From: От кого письмо ".$mail."\r\n"; 
		$headers .= "Reply-To: reply-to@example.com\r\n"; 
		
		mail($to, $subject, $message, $headers); 
		
	}

}