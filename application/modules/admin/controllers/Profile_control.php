<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_control extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

        $this->type = ADMIN_SITE;
        $this->viewname = $this->uri->segment(2);
		check_admin_login();
	}
	/*
	Author : Niral Patel
    Desc   : View Profile
	Input  :
	Output :
	Date   :23/10/2015
	*/
	public function index()
	{
		$admin_session = $this->session->userdata('reseeit_admin_session'); 
		//$field = array('name', 'admin_id','email', 'status');
        $field = array('fullname','user_id','email', 'activated');
        $match = array('user_id' => $admin_session['admin_id']);
        $data['editRecord'] = $this->general_model->get_records(USER_TABLE,$field, '', '',$match);
        $data['msg'] = $this->session->flashdata('msg');
        $data['main_content'] = $this->type.'/'.$this->viewname.'/view';
	    $this->load->view($this->type.'/assets/template',$data);
	}

	function edit_profile()
	{
		$admin_session = $this->session->userdata('reseeit_admin_session'); 
		
		//$field = array('name', 'admin_id','email', 'status');
        $field = array('fullname','user_id','email', 'activated');
        $match = array('user_id' => $admin_session['admin_id']);
        $data['editRecord'] = $this->general_model->get_records(USER_TABLE,$field, '', '',$match);

        $data['main_content'] = $this->type.'/'.$this->viewname.'/add';
	    $this->load->view($this->type.'/assets/template',$data);
	}
	function update_data()
	{
		//pr($_POST);exit;
		$admin_session = $this->session->userdata('reseeit_admin_session'); 
		
		$cdata['fullname']              = trim(ucfirst($this->input->post('name')));
        $cdata['email']             = trim($this->input->post('email'));

        $where = array('user_id' => $admin_session['admin_id']);
        $this->general_model->update(USER_TABLE, $cdata, $where);
        $this->session->set_flashdata('msg','Profile update sucessfully.');
        //echo $this->db->last_query();exit;
        redirect($this->type.'/'.$this->viewname);
	}
	/*
    @Description: Function for check user already exist
    @Author: Niral Patel
    @Input: - 
    @Output: - 
    @Date: 12/10/2015
    */

    public function check_user()
    {
        $id = $this->input->post('id');
        $email= $this->input->post('email');
        $match=array('email'=>$email);
        $exist_email = $this->general_model->get_records(USER_TABLE,array('user_id'), '', '',$match);
        //pr($exist_email);
        if(!empty($exist_email))
        {
            if($exist_email[0]['user_id'] == $id)
            {
                echo '0';
            }
            else
            {
                echo '1';
            }
        }
        else
        {
            echo '0';
        }
    }
}
