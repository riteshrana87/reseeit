<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
	}
	function _remap($slug)
	{
        $this->index($slug);
 	}
	public function index($slug)
	{ 
		$table            = CMS_TABLE.' as u';
		$fields           = array('u.cms_id,u.slug,u.page_name,u.status');
		$match1 = array('u.status' => 1);
		$menu_page      	      = $this->general_model->get_records($table,$fields,'','',$match1);
		$data['menu_page']   = $menu_page;
		if(!empty($slug))
		{
			$table            = CMS_TABLE.' as u';
			$fields           = array('u.*');
			$match = array('u.slug' => $slug);
			$result      	      = $this->general_model->get_records($table,$fields,'','',$match);
			$data['editRecord']   = $result;
			$data['main_content'] = 'page';
	    	$this->load->view('assets/template',$data);
		}	
	}
	

}
