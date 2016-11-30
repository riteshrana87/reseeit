<?php 
/*
    @Description: Change password controller
    @Author: Niral Patel
    @Date: 27-10-15
	
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Change_password extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_admin_login();
        $this->type = ADMIN_SITE;
        $this->viewname = $this->uri->segment(2);
        $this->admin_session = $this->session->userdata('reseeit_admin_session');
    }
    /*
    @Description: Function for Get password
    @Author: Niral Patel
    @Date: 27-10-15
    */
    public function index()
    {	
		$data['main_content'] = $this->type.'/'.$this->viewname.'/change_password';
	    $this->load->view($this->type.'/assets/template',$data);
    }
    /*
    @Description: Function for Update password
    @Author: Niral Patel
    @Input: - Update details of password
    @Output: - List with updated password details
    @Date: 27-10-15
    */
    public function admin_change_password()
    {
		$id = $this->admin_session['admin_id'];
		$password = md5($this->input->post('oldpassword'));
		
		$fields = array('user_id','email');
		$match = array('user_id'=>$id, 'password'=>$password);
		$result = $this->general_model->get_records(USER_TABLE,$fields,'','',$match);
	
		if(!empty($result) && count($result)>0)
		{
			$cdata['password'] = md5($this->input->post('password'));
			$update = $this->general_model->update(USER_TABLE,$cdata,array('user_id'=>$id));
			$this->session->set_flashdata('message_session',$this->lang->line('password_change_succ'));
			redirect($this->type.'/'.$this->viewname);		
		}
		else
		{
			$this->session->set_flashdata('message_session',$this->lang->line('invalid_old_password'));
			redirect($this->type.'/'.$this->viewname);
		}
       
    }
   
}