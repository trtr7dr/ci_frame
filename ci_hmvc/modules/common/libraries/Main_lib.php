<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main_lib {

	function __construct(){
        $this->CI =& get_instance();
        //отладка и оптимизация
        $this->CI->output->enable_profiler(FALSE);
        $this->CI->config->load('common/site_settings', TRUE);
	}

    // финальная сборка страницы сайта
	function render_main_page($data){
        $data += $this->CI->config->item('site_settings');
		$this->CI->parser->parse("site/header.tpl",$data);
        $this->CI->parser->parse("site/content.tpl", $data);
        $this->CI->parser->parse("site/footer.tpl", $data);
	}
	
	function check_isset_page($url, $table){
        $this->CI->db->where('meta_url', $url)->from($table);
        if($this->CI->db->count_all_results() < 1){
            show_404();
        }
    }
    
    function get_meta_data($url, $table){
	    $result =  $this->CI->db->select('meta_title, meta_description, meta_keywords, name')->where('meta_url', $url)->get($table)->row_array();
	    $result['meta_title'] != "" ? $result['meta_title'] = $result['meta_title'] : $result['meta_title'] = $result['name'];
	 
	    //добавляем суффикс к title если не пустой
	    $title_suffix = $this->CI->config->item('title_suffix', 'site_settings');
	    if(!empty($title_suffix)) $result['meta_title'] .= $title_suffix;  
	 
	    return $result;
	}
	
	function pagination(){
       //элементов на странице
       $config["per_page"] = '5';
 
       $config['full_tag_open'] = '<ul class="pagination">';
       $config['full_tag_close'] = '</ul>';
       $config['num_tag_open'] = '<li>';
       $config['num_tag_close'] = '</li>';
       $config['cur_tag_open'] = '<li class="active"><span>';
       $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
       $config['prev_tag_open'] = '<li>';
       $config['prev_tag_close'] = '</li>';
       $config['next_tag_open'] = '<li>';
       $config['next_tag_close'] = '</li>';
       $config['first_link'] = '«';
       $config['prev_link'] = '‹';
       $config['last_link'] = '»';
       $config['next_link'] = '›';
       $config['first_tag_open'] = '<li>';
       $config['first_tag_close'] = '</li>';
       $config['last_tag_open'] = '<li>';
       $config['last_tag_close'] = '</li>';        
       return $config;
   }
    
   function short_content($text, $position = NULL, $more_tag = FALSE) {
       $this->CI->load->helper('text');
       if ($position == NULL && $more_tag == FALSE) {
           $position = '400'; //задаем количество символов для вывода
           $short_text = strip_tags($text, '<p><a>');
           $short_text = character_limiter($short_text, $position, '...');
 
       }
       if ($position != NULL && $more_tag == FALSE) {
           $short_text = strip_tags($text, '<p><a>'); //удаляем все теги в тексте кроме <a> и <p>
           $short_text = character_limiter($short_text, $position, '...');
       }
       elseif($more_tag){
           $position = strrpos($text, '<!-- more -->'); // поиск позиции точки с конца строки
           $text = substr($text, 0, $position); // обрезаем строку используя количество
           $short_text = strip_tags($text, '<p><a>');
       }
 
       return $short_text;
   }
 
   function substrword($str, $begin, $length){
       if (($begin + $length) < strlen($str)) {
           return substr($str, $begin, $length).current(explode(' ', substr($str, $length))).'...';
       }
       return $str;
   }


}

