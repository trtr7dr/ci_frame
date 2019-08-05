<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

   function get_menu_query($menu_name){
       $result = $this->db->select('menus.*, menus_data.*')
           ->where('menus.menu_name', $menu_name)
           ->where('menus_data.visible', '1')
           ->from('menus')
           ->join('menus_data', 'menus.id = menus_data.menu_id', 'right')
           ->order_by('menus_data.order asc, menus_data.id asc')
           ->get();
       return $result;
   }
   
   function clear_url(){
	   $url = base_url();
	   return substr($url, 0, strlen($url)-1);
   }
   
    function build_tree($cats,$parent_id,$only_parent = false){
	   
	   
        if(is_array($cats) and isset($cats[$parent_id])){
            $tree = '<ul class="submenu">';
            if($only_parent==false){
                foreach($cats[$parent_id] as $cat){
                    $tree .= '<li><a href="'.base_url().$cat['url'].'">'.$cat['name'].'</a>';
                    $tree .=  $this->build_tree($cats,$cat['id']);
                    $tree .= '</li>';
                }
            }elseif(is_numeric($only_parent)){
                $cat = $cats[$parent_id][$only_parent];
                $tree .= '<li>'.$cat['name'].' #'.$cat['id'];
                $tree .=  $this->build_tree($cats,$cat['id']);
                $tree .= '</li>';
            }
            $tree .= '</ul>';
 
        }
        else return null;
        return $tree;
    }
    
    
    function get_sub_menu($id){
	    $query = $this->get_menu_query('right_menu');

        foreach($query->result_array() as $cat){
            $cats_ID[$cat['id']][] = $cat;
            $cats[$cat['parent_id']][$cat['id']] =  $cat;
        }

        $menu = $this->build_tree($cats, $id);
        return $menu;
	    
    }
    
   
   function get_menu_item($menu_name){
	   $html ='<ul class="menu">';
	    $query = $this->get_menu_query($menu_name);
        foreach ($query->result() as $row){
	        
	        $parent_id = $row->parent_id;
	        $id = $row->id;
	        
	        if($parent_id == 0){
	            $href = $this->menu_model->clear_url().$row->url;
	            $name = $row->name;
	            $html .= "<li><a class='blog-nav-item ".$id."' href='".$href."'>";
	            $html .= $name;
	            $html .= "</a>";
	            if($id == 5){
		        	$html .= $this->get_sub_menu($id);
		        }
		        $html .= "</li>";
            }
            
        }
        $html .= "</ui>";
        return $html;
   }
   
}