<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		check_admin_login();
		$this->type = ADMIN_SITE;
		$this->viewname = $this->uri->segment(2);

	}
	/*
	Author : Niral Patel
    Desc   : Display user list
	Input  :
	Output :
	Date   :12/10/2015
	*/

	public function index()
	{	
		$searchtext='';$perpage='';
		$searchtext = $this->input->post('searchtext');
		$sortfield  = $this->input->post('sortfield');
		$sortby     = $this->input->post('sortby');
		$perpage    = $this->input->post('perpage');
		$allflag    = $this->input->post('allflag');
		if(!empty($allflag) && ($allflag == 'all' || $allflag == 'changesorting' || $allflag == 'changesearch')) {
            $this->session->unset_userdata('cms_sortsearchpage_data');
        }
        
        $searchsort_session = $this->session->userdata('cms_sortsearchpage_data');
		//Sorting
		if(!empty($sortfield) && !empty($sortby)) 
		{
            $data['sortfield'] = $sortfield;
            $data['sortby'] = $sortby;
		}
		else
		{		
			if(!empty($searchsort_session['sortfield'])) 
			{
				$data['sortfield'] = $searchsort_session['sortfield'];
				$data['sortby'] = $searchsort_session['sortby'];
				$sortfield = $searchsort_session['sortfield'];
				$sortby = $searchsort_session['sortby'];
			} 
			else 
			{
					$sortfield = 'cms_id';
					$sortby = 'desc';
					$data['sortfield']		= $sortfield;
	    			$data['sortby']			= $sortby;
			}
		}
		//Search text
		if(!empty($searchtext))
		{
			$data['searchtext'] = $searchtext;
		} else 
		{
            if(empty($allflag) && !empty($searchsort_session['searchtext']))
            {
                $data['searchtext'] = $searchsort_session['searchtext'];
                $searchtext =  $data['searchtext'];
            }
            else
			{
				$data['searchtext'] = '';
			}	        
        }
		
		if(!empty($perpage) && $perpage != 'null')
		{
                    //$perpage = $this->input->post('perpage');
                    $data['perpage'] = $perpage;
                    $config['per_page'] = $perpage;	
		}
        else
		{
			if(!empty($searchsort_session['perpage'])) {
				$data['perpage'] = trim($searchsort_session['perpage']);
				$config['per_page'] = trim($searchsort_session['perpage']);
			} else {
				$config['per_page'] = '10';
				$data['perpage'] = '10';
			}
		}
		//pagination configuration
        $config['first_link']  = 'First';
        $config['base_url']    = base_url().$this->type.'/'.$this->viewname.'/index';
        
        if(!empty($allflag) && ($allflag == 'all' || $allflag == 'changesorting' || $allflag == 'changesearch')) {
            $config['uri_segment'] = 0;
            $uri_segment = 0;
        } else {
            $config['uri_segment'] = 4;
            $uri_segment = $this->uri->segment(4);
        }
        //Query
        $table            = CMS_TABLE.' as u';
		$fields           = array('u.*');
		
		if(!empty($searchtext))
		{	
			$searchtext = html_entity_decode(trim($searchtext));
			$match=array('u.page_name'=>$searchtext,'u.slug'=>$searchtext);
			$data['datalist']      = $this->general_model->get_records($table,$fields,'','','',$match,$config['per_page'],$uri_segment,$sortfield,$sortby,'');
			$config['total_rows']  = $this->general_model->get_records($table,$fields,'','','',$match,'','',$sortfield,$sortby,'','','','','1');
		}
		else
		{
			$data['datalist']      = $this->general_model->get_records($table,$fields,'','','','',$config['per_page'],$uri_segment,$sortfield,$sortby);
			$config['total_rows']  = $this->general_model->get_records($table,$fields,'','','','','','',$sortfield,$sortby,'','','','','1');

		}

        $this->ajax_pagination->initialize($config);
	    $data['pagination']  = $this->ajax_pagination->create_links();
	    $data['uri_segment'] = $uri_segment;
	    $sortsearchpage_data = array(
            'sortfield'  => $data['sortfield'],
            'sortby'     =>$data['sortby'],
            'searchtext' =>$data['searchtext'],
          	'perpage'    => trim($data['perpage']),
            'uri_segment'=> $uri_segment,
            'total_rows' => $config['total_rows']);
        $this->session->set_userdata('cms_sortsearchpage_data', $sortsearchpage_data);
        
	    if($this->input->post('result_type') == 'ajax')
		{
			$this->load->view($this->type.'/'.$this->viewname.'/ajax_list',$data);
		}
		else
		{
			$data['main_content'] = $this->type.'/'.$this->viewname.'/list';
	    	$this->load->view($this->type.'/assets/template',$data);
		}
            
	}
	/*
	Author : Niral Patel
    Desc   : Edit user 
	Input  :
	Output :
	Date   :26/10/2015
	*/
	public function add_record()
    {
        $data['main_content'] = $this->type.'/'.$this->viewname.'/add';
	    $this->load->view($this->type.'/assets/template',$data);
    }
    /*
	Author : Niral Patel
    Desc   : insert user 
	Input  : Post value
	Output : insert value
	Date   :26/10/2015
	*/
	public function insert_data()
    {
    	$cdata['page_name']        = trim(ucfirst($this->input->post('page_name')));
		$cdata['slug']             = trim($this->input->post('slug'));
		$cdata['content']          = $this->input->post('content');
		$cdata['status']           = 1;
		$cdata['created_date']     = db_datetimeformat();
		$cms_id = $this->general_model->insert(CMS_TABLE,$cdata);

		$msg = $this->lang->line('common_add_success_msg');
        $this->session->set_flashdata('message_session', $msg);

		$searchsort_session = $this->session->userdata('cms_sortsearchpage_data');
		$pagingid = $searchsort_session['uri_segment'];
		redirect($this->type.'/'.$this->viewname.'/'.$pagingid);
    }
	/*
	Author : Niral Patel
    Desc   : Edit user 
	Input  :
	Output :
	Date   :26/10/2015
	*/
	public function edit_record()
    {
    	$id = $this->uri->segment(4);
        $table            = CMS_TABLE.' as u';
		$fields           = array('u.*');
		$match = array('u.cms_id' => $id);
		$result      	      = $this->general_model->get_records($table,$fields,'','',$match);
		$data['editRecord']   = $result;
		$data['main_content'] = $this->type.'/'.$this->viewname.'/add';
	    $this->load->view($this->type.'/assets/template',$data);
    }
    /*
	Author : Niral Patel
    Desc   : Upadate user 
	Input  : Post value
	Output : Update value
	Date   :26/10/2015
	*/
	public function update_data()
    {
    	//pr($_POST);
    	$id = $this->input->post('id');
    	$cdata['page_name']        = trim(ucfirst($this->input->post('page_name')));
		$cdata['slug']             = trim($this->input->post('slug'));
		$cdata['content']          = $this->input->post('content');
		
		$where = array('cms_id' => $id);
		$cms_id = $this->general_model->update(CMS_TABLE, $cdata, $where);

		$msg = $this->lang->line('common_edit_success_msg');
        $this->session->set_flashdata('message_session', $msg);

		$searchsort_session = $this->session->userdata('cms_sortsearchpage_data');
		$pagingid = $searchsort_session['uri_segment'];
		redirect($this->type.'/'.$this->viewname.'/index/'.$pagingid);
    }
    
    /*
    @Description: Function for delete data
    @Author: Niral Patel
    @Input: - Delete user id
    @Output: - New User list after record is deleted.
    @Date: 23-010-15
    */
	public function ajax_delete_all()
	{		
		$admin = $this->session->userdata('reseeit_admin_session'); 
		
		$id    = $this->input->post('single_remove_id');
		if(!empty($id))
		{
			$match = array("cms_id"=>$id);
            $fields = array("image"); 
			$image_name     = $this->general_model->get_records(CMS_TABLE,$fields,'','',$match);
			//pr($image_name);echo $image_name[0]['image'];exit;
			if(!empty($image_name[0]['image']))
			{
				if(file_exists($this->config->item('admin_user_img_big_path').$image_name[0]['image']))
	            {
	                unlink($this->config->item('admin_user_img_big_path').$image_name[0]['image']);
	                 
	            }
	             if(file_exists($this->config->item('admin_user_img_small_path').$image_name[0]['image']))
	            {
	               unlink($this->config->item('admin_user_img_small_path').$image_name[0]['image']);
	            }
			}
            $where = array('cms_id' => $id);
			$this->general_model->delete(CMS_TABLE,$where);
			unset($id);
		}
		
		$array_data = $this->input->post('myarray');
        $delete_all_flag = 0;$cnt = 0;
		for($i=0;$i<count($array_data);$i++)
		{
			$match = array("cms_id"=>$array_data[$i]);
            $fields = array("image"); 
			$image_name     = $this->general_model->get_records(CMS_TABLE,$fields,'','',$match);
            if(file_exists($this->config->item('admin_user_img_big_path').$image_name[0]['image']))
            {
                unlink($this->config->item('admin_user_img_big_path').$image_name[0]['image']);
                 
            }
             if(file_exists($this->config->item('admin_user_img_small_path').$image_name[0]['image']))
            {
               unlink($this->config->item('admin_user_img_small_path').$image_name[0]['image']);
            }
            $where = array('cms_id' => $array_data[$i]);
			$this->general_model->delete(CMS_TABLE,$where);
            $delete_all_flag = 1;
            $cnt++;
		}
		//pagingation
        $searchsort_session = $this->session->userdata('cms_sortsearchpage_data');
        //pr($searchsort_session);exit;
        if(!empty($searchsort_session['uri_segment']))
            $pagingid = $searchsort_session['uri_segment'];
        else
            $pagingid = 0;
        $perpage = !empty($searchsort_session['perpage'])?$searchsort_session['perpage']:'10';
        $total_rows = $searchsort_session['total_rows'];
        if($delete_all_flag == 1)
        {
            $total_rows -= $cnt;
            $pagingid*$perpage;
            if($pagingid*$perpage > $total_rows) {
                if($total_rows % $perpage == 0) // if all record delete
                {
                    $pagingid -= $perpage;
                }
            }
        } else {
            if($total_rows % $perpage == 1)
                $pagingid -= $perpage;
        }
        
        if($pagingid < 0)
            $pagingid = 0;
        echo $pagingid;
		
	}
	/*
    @Description: Function for Unpublish User Profile By Admin
    @Author: Niral Patel
    @Input: - Delete id which User record want to Unpublish
    @Output: - New User list after record is Unpublish.
    @Date: 26-10-2015
    */
    function unpublish_record()
    {
        $id = $this->input->post('id');
        $array_data = $this->input->post('myarray');
        if(!empty($id))
        {
        	$status = $this->input->post('status');
			$cdata['status'] = $status;
			$this->general_model->update(CMS_TABLE,$cdata,array('cms_id'=>$id));
        }
        if(!empty($array_data))
        {
        	for($i=0;$i<count($array_data);$i++)
			{
				$where = array('cms_id' => $array_data[$i]);
				$cdata['status'] = 1;
				$this->general_model->update(CMS_TABLE,$cdata,$where);
			}
        }
		
		$searchsort_session = $this->session->userdata('cms_sortsearchpage_data');
		$pagingid = $searchsort_session['uri_segment'];
        echo $pagingid;
    }
	
	/*
    @Description: Function for publish User Profile By Admin
    @Author: Niral Patel
    @Input: - Delete id which User record want to publish
    @Output: - New User list after record is publish.
    @Date: 26-10-2015
    */
	function publish_record()
    {
        $id = $this->input->post('id');
        $array_data = $this->input->post('myarray');
        if(!empty($id))
        {
        	$status = $this->input->post('status');
			$cdata['status'] = $status;
			$this->general_model->update(CMS_TABLE,$cdata,array('cms_id'=>$id));
        }
        if(!empty($array_data))
        {
        	for($i=0;$i<count($array_data);$i++)
			{
				$where = array('cms_id' => $array_data[$i]);
				$cdata['status'] = 0;
				$this->general_model->update(CMS_TABLE,$cdata,$where);
			}
        }
		$searchsort_session = $this->session->userdata('cms_sortsearchpage_data');
		$pagingid = $searchsort_session['uri_segment'];
		echo $pagingid;
    }
}
