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
        $this->load->model('imageupload_model');
        $this->type = USERS_SITE;
        $this->viewname = $this->uri->segment(2);

    }
    /*
    @Description: Function for Get password
    @Author: Niral Patel
    @Date: 27-10-15
    */
    public function index()
    {
        $user_id = $this->input->post('user_id');
        $password = md5($this->input->post('old_password'));

        $fields = array('user_id','email');
        $match = array('user_id'=>$user_id, 'password'=>$password);
        $result = $this->general_model->get_records(USER_TABLE,$fields,'','',$match);
        if(!empty($result) && count($result)>0)
        {
            if($this->input->post('new_password') == $this->input->post('new_confirm_password')) {
                $cdata['password'] = md5($this->input->post('new_password'));
                $update = $this->general_model->update(USER_TABLE, $cdata, array('user_id' => $user_id));
                $this->session->set_flashdata('message', $this->lang->line('password_change_succ'));
                redirect($this->type . '/client_account');
            }else{
                $this->session->set_flashdata('message', $this->lang->line('co_pass_not_match'));
                redirect($this->type . '/client_account');
            }
        }
        else
        {
            $this->session->set_flashdata('message',$this->lang->line('invalid_old_password'));
            redirect($this->type.'/client_account');
        }
    }
}