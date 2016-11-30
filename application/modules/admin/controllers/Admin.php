<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        
    }

    /*
      Author : Niral Patel
      Desc  :
      Input  :
      Output :
      Date   :12/10/2015
     */
    public function index() 
    {
        $admin_session = $this->session->userdata('reseeit_admin_session');
		if ($admin_session['active'] === TRUE)
        {
           redirect(base_url(ADMIN_SITE.'/dashboard'));
        }
        else
        {
			$this->do_login();
		} 
    }
    
    /*
        @Description : Check Login is valid or not 
        @Author      : Niral Patel
        @Input       : adminemail, passowrd and / or adminemail
        @Output      : true or false
        @Date        : 06-10-15
    */
    /*   public function index() {
       $admin_data = $this->login_model->get_all_data('admins');
       $data['main_content'] = ADMIN_SITE . '/login/login';
       $this->load->view(ADMIN_SITE . '/assets/templatelogoin', $data);
    }*/

    public function do_login() 
    {
    	//echo 1;exit;
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        if ($email && $password)
        {
            $field = array('fullname','role_id','user_id','email','user_img', 'activated');
            $match = array('email' => $email, 'password' => $password,'role_id'=>1);
            $udata = $this->general_model->get_records(USER_TABLE,$field, '', '',$match);

            /*echo $this->db->last_query();
            pr($udata);exit;*/
            if (count($udata) > 0) {
                if ($udata[0]['role_id'] == 1) {
                    if ($udata[0]['activated'] == 'active') {
                        $newdata = array(
                            'name' => !empty($udata[0]['fullname'])?$udata[0]['fullname']:'',
                            'admin_id' => $udata[0]['user_id'],
                            'admin_email' => $udata[0]['email'],
                            'admin_type'  => $udata[0]['role_id'],
                            'admin_image'  => $udata[0]['user_img'],
                            'active' => TRUE);
                        $this->session->set_userdata('reseeit_admin_session', $newdata);
                        redirect(base_url(ADMIN_SITE));
                    } else {
                        $msg = $this->lang->line('inactive_account');
                        $newdata = array('msg' => $msg);
                        $data['msg'] = $msg;
                        $this->load->view(ADMIN_SITE, $data);
                    }
                }else{
                    $msg = $this->lang->line('invalid_us_pass');
                    $newdata = array('msg' => $msg);
                    $data['msg'] = $msg;
                    $this->load->view(ADMIN_SITE, $data);
                }
            } else {
                $msg = $this->lang->line('invalid_us_pass');
                $newdata = array('msg' => $msg);
                $data['msg'] = $msg;
                $this->load->view(ADMIN_SITE, $data);
            }
        } else {
            $data['msg'] = $this->session->flashdata('msg');
            $this->load->view(ADMIN_SITE, $data);
        }
      
    }
    /*
      Author : Niral Patel
      Desc   : Send mail to given email id
      Input  : Email id
      Output : Sent mail to given email id
      Date   : 27/10/2015
     */

    public function forgot_password()
    {
        $email = $this->input->post('forgot_email');

        $field = array('fullname','role_id','user_id','email','user_img', 'activated');
        $match = array('email' => $email,'role_id'=>1);
        $result = $this->general_model->get_records(USER_TABLE,$field, '', '',$match);

        if((count($result))>0)
        {
            $name =  $result[0]['fullname'];
            $email =  $result[0]['email'];
            $pass_variable_activation = array('name' => $name, 'email' => $email);
            $data['actdata'] = $pass_variable_activation;
            $this->load->view(ADMIN_SITE.'/'.'reset_password',$data);
        }
        else
        {
            $msg = "No such user found";
            $data['msg'] = $msg;
            $this->load->view(ADMIN_SITE, $data);
        }
    }
    /*
      Author : Niral Patel
      Desc  :
      Input  :
      Output :
      Date   :12/10/2015
     */

    public function reset_password(){
        $this->load->view('reset_password');
    }

    public function add_new_password(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $rpassword = $this->input->post('rpassword');

        if($password == $rpassword){
            $field = array('fullname','role_id','user_id','email','user_img', 'activated');
            $match = array('email' => $email);
            $result = $this->general_model->get_records(USER_TABLE,$field, '', '',$match);
            $where = array('user_id' => $result[0]['user_id']);
            $cdata['password'] = md5($password);
            $user_id = $this->general_model->update(USER_TABLE, $cdata, $where);

            $msg= 'Successfully Change Password.';
            $data['msg'] = $msg;
            $this->load->view(ADMIN_SITE,$data);
        }else{
            $msg= 'Invalid old password.';
            $data['msg'] = $msg;
            $this->load->view(ADMIN_SITE.'/'.'reset_password',$data);
        }

    }
    public function check_user() {
        $user_data = $this->login_model->get_all_data('users');
        $data['main_content'] = ADMIN_SITE . '/login/login';
        $this->load->view(ADMIN_SITE . '/assets/templatelogoin', $data);
    }

}
