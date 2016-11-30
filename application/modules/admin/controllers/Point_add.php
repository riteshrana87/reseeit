<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Point_add extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_admin_login();
		$this->type = ADMIN_SITE;
		$this->viewname = $this->uri->segment(2);

	}
	/*
	Author : Ritesh Rana
    Desc   : Display user list
	Input  :
	Output :
	Date   :17/11/2015
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
			$this->session->unset_userdata('point_reward_sortsearchpage_data');
		}

		$searchsort_session = $this->session->userdata('point_reward_sortsearchpage_data');

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
				$sortfield = 'reward_type_id';
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
		$table            = POINT_ADD.' as c';
		$fields           = array('c.*');

		if(!empty($searchtext))
		{
			$searchtext = html_entity_decode(trim($searchtext));
			$match=array('c.reward_type_id'=>$searchtext);
			$data['datalist']      = $this->general_model->get_records($table,$fields,'','','',$match,$config['per_page'],$uri_segment,$sortfield,$sortby,'');
			$config['total_rows']  = $this->general_model->get_records($table,$fields,'','','',$match,'','',$sortfield,$sortby,'','','','','1');
		}
		else
		{

		 $data['datalist']      = $this->general_model->get_records($table,$fields,'','','','',$config['per_page'],$uri_segment,$sortfield,$sortby);

			$config['total_rows']  = $this->general_model->get_records($table,$fields,'','','','','','',$sortfield,$sortby,'','','','','1');
		}
		//pr($data['datalist']);exit;
		//pr($this->db->last_query());exit;
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
		$this->session->set_userdata('point_reward_sortsearchpage_data', $sortsearchpage_data);

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
	Author : Ritesh Rana
    Desc   : Edit user
	Input  :
	Output :
	Date   :17/11/2015
	*/
	public function add_record()
	{
		$field = array('client_type_id', 'client_type', 'client_type_name');
		$data['client_type'] = $this->general_model->get_records(CLIENT_TYPE,$field);
		$data['main_content'] = $this->type.'/'.$this->viewname.'/add';
		$this->load->view($this->type.'/assets/template',$data);
	}
	/*
    Author : Ritesh Rana
    Desc   : insert user
    Input  : Post value
    Output : insert value
    Date   :17/11/2015
    */
	public function insert_data()
	{
		//$point_data['client_type_id']          = $this->input->post('client_type_id');
		$point_data['client_points_earned']          = $this->input->post('client_points_earned');
		$point_data['noviah_points_earned']          = $this->input->post('noviah_points_earned');
		$point_data['non_profit_points_earned']          = $this->input->post('non_profit_points_earned');
	//pr($point_data);exit;
		$point_id = $this->general_model->insert(POINT_ADD,$point_data);

		$msg = $this->lang->line('common_add_success_msg');
		$this->session->set_flashdata('message_session', $msg);

		$searchsort_session = $this->session->userdata('point_reward_sortsearchpage_data');
		$pagingid = $searchsort_session['uri_segment'];
		//redirect($this->type.'/'.$this->viewname.'/'.$pagingid);
		redirect($this->type.'/'.$this->viewname.'/index/'.$pagingid);
	}
	/*
	Author : Ritesh Rana
    Desc   : Edit user
	Input  :
	Output :
	Date   :26/10/2015
	*/
	public function edit_record()
	{
		$id = $this->uri->segment(4);
		$table            = POINT_ADD.' as u';
		$fields           = array('u.*');
		$match = array('u.reward_type_id' => $id);
		$result      	      = $this->general_model->get_records($table,$fields,'','',$match);
		$data['editRecord']   = $result;
		$field = array('client_type_id', 'client_type', 'client_type_name');
		$data['client_type'] = $this->general_model->get_records(CLIENT_TYPE,$field);

		$data['main_content'] = $this->type.'/'.$this->viewname.'/add';
		$this->load->view($this->type.'/assets/template',$data);
	}
	/*
    Author : Ritesh Rana
    Desc   : Upadate user
    Input  : Post value
    Output : Update value
    Date   :17/11/2015
    */
	public function update_data()
	{
		$id = $this->input->post('reward_type_id');
		//$point_data['client_type_id']          = $this->input->post('client_type_id');
		$point_data['client_points_earned']          = $this->input->post('client_points_earned');
		$point_data['noviah_points_earned']          = $this->input->post('noviah_points_earned');
		$point_data['non_profit_points_earned']          = $this->input->post('non_profit_points_earned');

		$where = array('reward_type_id' => $id);
		$point_id = $this->general_model->update(POINT_ADD, $point_data, $where);

		$msg = $this->lang->line('common_edit_success_msg');
		$this->session->set_flashdata('message_session', $msg);

		$searchsort_session = $this->session->userdata('point_reward_sortsearchpage_data');
		$pagingid = $searchsort_session['uri_segment'];
		redirect($this->type.'/'.$this->viewname.'/index/'.$pagingid);
	}

	/*
    @Description: Function for delete data
    @Author: Ritesh Rana
    @Input: - Delete user id
    @Output: - New User list after record is deleted.
    @Date: 17-11-2015
    */
	public function ajax_delete_all()
	{
		$admin = $this->session->userdata('reseeit_admin_session');

		$id  = $this->input->post('single_remove_id');
		if(!empty($id))
		{
			$where = array('point_id' => $id);
			$this->general_model->delete(POINT_ADD,$where);
			unset($id);
		}

		$array_data = $this->input->post('myarray');
		$delete_all_flag = 0;$cnt = 0;
		for($i=0;$i<count($array_data);$i++)
		{
			$where = array('point_id' => $array_data[$i]);
			$this->general_model->delete(POINT_ADD,$where);
			$delete_all_flag = 1;
			$cnt++;
		}
		//pagingation
		$searchsort_session = $this->session->userdata('point_reward_sortsearchpage_data');
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



}
