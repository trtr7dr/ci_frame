<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_lib {

    public $modules = array();

	function __construct()
	{
        $this->CI =& get_instance();
        $this->CI->config->load('admin/admin_settings', TRUE);
        $this->CI->settings = $this->CI->config->item('admin_settings');

        //отладка и оптимизация - озникают проблемы с асинхронными функциями jquery
        //$this->CI->output->enable_profiler(TRUE);
	}

	// финальная сборка страницы амдинки
	function render_admin_page($tpl = null)
	{
        //$tpl += Modules::run('settings/get_settings');
        $tpl += $this->CI->settings;
        $tpl['admin_main_menu'] = $this->get_admin_main_menu();
		$this->CI->load->view('admin/main.tpl', $tpl);
	}

    // проверка уведомлений admin_alerts
    function _check_admin_alerts()
    {
        if( $this->CI->session->flashdata('alert_success')	OR
            $this->CI->session->flashdata('alert_info')	OR
            $this->CI->session->flashdata('alert_warning')	OR
            $this->CI->session->flashdata('alert_danger')	)
        {
            return $this->CI->load->view('admin/admin_alerts.tpl', array(), TRUE);
        }
        else
        {
            return '';
        }
    }

    // установка уведомления admin_alerts
    function set_admin_alerts($type, $message, $uri = NULL, $refresh = NULL)
    {
        $this->CI->session->set_flashdata($type, $message);
        $this->write_log($message);
        if ($uri)
        {
            if ($refresh)
            {
                redirect($uri, 'refresh');
            } else {
                redirect($uri);
            }
        }

    }

    //вывод основного меню администрирования
    function get_admin_main_menu(){
        //$data = $this->CI->settings;

        //Определяем установленны ли основные модули и если они включены то выводим дополнительную информацию в меню

        $data['is_menu'] = 0;

        $data['is_page'] = 0;
        $data['is_category'] = 0;
        $data['is_widget'] = 0;
        $data['is_forms'] = 0;
        foreach ($this->modules as $row) {
            if($row['name'] == 'menu' && $row['in_menu'] == 1) $data['is_menu'] = 1;
            if($row['name'] == 'forms' && $row['in_menu'] == 1) $data['is_forms'] = 1;
            if($row['type'] == 'widget' && $row['in_menu'] == 1)
            {
                $data['is_widget']++;
                $widget_list[] = $row;
            }
            if($row['name'] == 'page' && $row['in_menu'] == 1){
                $data['is_page'] = 1;
                $data['is_material']++;
            }
            if($row['name'] == 'category' && $row['in_menu'] == 1){
                $data['is_category'] = 1;
                $data['is_material']++;
            }
        }

        ($data['is_forms'] == 1) ? $data['new_form_orders'] = $this->CI->db->where('status', '1')->from('forms')->count_all_results() : $data['new_form_orders'] = '';
        ($data['is_menu'] == 1) ? $data['menus_list'] = $this->CI->db->get('menus')->result_array() : $data['menus_list']='';
        ($data['is_widget'] > 0) ? $data['widget_list'] = $widget_list : $data['widget_list'] = '';

        $html = $this->CI->load->view('admin/main_menu.tpl', $data, true);
        return $html;
    }


    
    // генерация хлебных крошек
	function get_admin_menu_breadcrumbs()
	{
        $html = '<ul class="breadcrumb">';
        //ищем и выводим ссылку по URI
        $bread_second = $this->CI->uri->segment(2);
        $bread_third = $this->CI->uri->segment(3);
        if($bread_second == ""){
            $html .= '<li class="active">Dashboard</li>';
        }
        elseif(isset($bread_second) && !isset($bread_third)) {
        $html .= '<li><a href="/admin">Главная</a></li>';
            foreach ($this->modules as $row) {
                if ($row->name == $bread_second) {
                    $html .= '<li class="active">' . $row->title . '</li>';
                    $html .= '<li class="active">Управление</li>';
                }
            }
		}
        elseif(isset($bread_second) && isset($bread_third)) {
            $html .= '<li><a href="/admin">Главная</a></li>';

            foreach ($this->modules as $row) {
                if ($row->name == $bread_second) {
                    $html .= '<li><a href="/admin/'.$row->name.'">'.$row->title.'</a></li>';
                    if($row->sub_menu != ""){
                        $menu = $row->sub_menu;
                        $menu = explode('|',$menu);
                        foreach($menu as $menus)
                        {
                            $name_href = explode("-",$menus);
                            if($name_href[1] == $bread_third) {
                                $html .= "<li class='active'>" . $name_href[0] . "</li>";
                            }
                        }
                    }
                }
            }
        }
        $html .= '</ul>';
		return $html;
	}

    // поиск и герерация кода для загрузки скриптов модуля
    function _get_module_styles($module_name)
    {
        $dir = BASEPATH."../modules/".$module_name."/assets/css/";
        $css_dir = base_url()."modules/".$module_name."/assets/css/";
        $html = '';
        if (file_exists($dir)) {
            $files = scandir($dir);
            $delete = array(".", "..", $module_name.".css");
            $files = array_diff ($files, $delete);
            foreach ($files as $key => $file) {
                $ext = explode("." , $file);
                if ($ext[1] == "css")
                {
                    $html .= '<link href="'.$css_dir.$file.'" rel="stylesheet" />'."\n";
                }
            }
            $main_css = $dir.$module_name.".css";
            if (file_exists($main_css)) {
                $html .= '<link href="'.$css_dir.$module_name.'.css" rel="stylesheet" />'."\n";
            }
            return $html;
        }
        return '';
    }


    // поиск и герерация кода для загрузки стилей модуля
    function _get_module_scripts($module_name)
    {
        $dir = BASEPATH."../modules/".$module_name."/assets/js/";
        $css_dir = base_url()."modules/".$module_name."/assets/js/";
        $html = '';
        if (file_exists($dir)) {
            $files = scandir($dir);
            $delete = array(".", "..", $module_name.".js");
            $files = array_diff ($files, $delete);
            foreach ($files as $key => $file) {
                $ext = explode("." , $file);
                if ($ext[1] == "js")
                {
                    $html .= '<script src="'.$css_dir.$file.'"></script>'."\n";
                }
            }
            $main_css = $dir.$module_name.".js";
            if (file_exists($main_css)) {
                $html .= '<script src="'.$css_dir.$module_name.'.js" rel="stylesheet"></script>'."\n";
            }
            return $html;
        }
        return '';
    }

    public $translitCharacters = array(
        "А"=>"a","Б"=>"b","В"=>"v","Г"=>"g",
        "Д"=>"d","Е"=>"e","Ж"=>"j","З"=>"z","И"=>"i",
        "Й"=>"y","К"=>"k","Л"=>"l","М"=>"m","Н"=>"n",
        "О"=>"o","П"=>"p","Р"=>"r","С"=>"s","Т"=>"t",
        "У"=>"u","Ф"=>"f","Х"=>"h","Ц"=>"ts","Ч"=>"ch",
        "Ш"=>"sh","Щ"=>"sch","Ъ"=>"","Ы"=>"yi","Ь"=>"",
        "Э"=>"e","Ю"=>"yu","Я"=>"ya","а"=>"a","б"=>"b",
        "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
        "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
        "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
        "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
        "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
        "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",
        " "=> "-", "."=> "", "/"=> "-"
    );

    //транслит имени в URL
    function url_translit($name)
    {
        $urlstr = strtr($name, $this->translitCharacters);
        $urlstr = preg_replace('/[^A-Za-z0-9_\-]/', '', $urlstr);
        $url = strtolower(trim($urlstr, '-'));
        return $url;
    }
	
	//проверка на наличие модуля
    function isset_module($module_name)
    {
        $dir = BASEPATH."../modules/".$module_name;
        $isset = false;
        if (file_exists($dir)) {
            $isset = true;
        }
        return $isset;

    }

    //запись логов в бд
    function write_log($message)
    {
        $data['user_id'] = $this->CI->session->userdata('user_id');
        $data['user_name'] = $this->CI->session->userdata('username');
        $data['message'] = $message;
        $data['date'] = date('Y-m-d H:i:s');
        $this->CI->db->insert('log', $data);
    }

    function html_defend($string)
    {
        $code = strip_tags($string);
        $code = htmlentities($code, ENT_QUOTES, "UTF-8");
        $code = htmlspecialchars($code, ENT_QUOTES);
        return $code;
    }


}

