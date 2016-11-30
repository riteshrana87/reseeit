<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('imageupload_model');
		$this->type = USERS_SITE;
		$this->viewname = $this->uri->segment(2);
	}
	public function index($data='')
	{
	    $user_session = $this->session->userdata('reseeit_user_session');
		if($user_session) {
			$field = array('user_id', 'role_id', 'username', 'email', 'user_img', 'activated', 'fullname', 'register_type','first_name');

			$match = array('user_id' => $user_session['user_id']);
			$data['userrecord'] = $this->general_model->get_records(USER_TABLE, $field, '', '', $match);

			$table            = COUPON_TABLE.' as c';
			$where            = array('c.status' => "'active'",'c.coupon_type' => "'featured'");
			$fields           = array('c.*');

			$match = array('c.user_id' => $user_session['user_id']);
			$data['coupon_data'] = $this->general_model->get_records($table,$fields,'','',$match,'','','','','','',$where);

			//pr($data['coupon_data']);exit;
			$data['msg'] = $this->session->flashdata('msg');
			$this->load->view('coupon_featured', $data);
		}else{
			$data['role_type'] = $this->general_model->role_data();
			//pr($data['role_type']);exit;
			$table            = CMS_TABLE.' as u';
			$fields           = array('u.cms_id,u.slug,u.page_name,u.status');
			$match1 = array('u.status' => 1);
			$menu_page      	      = $this->general_model->get_records($table,$fields,'','',$match1);
			$data['menu_page']   = $menu_page;
			$this->load->view('home',$data);
		}

	}

	public function login($user_id,$role_id)
	{
		/*$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		//$role_id = $this->input->post('role_id');
		*/
		if ($user_id && $role_id)
		{
			/*$table            = USER_TABLE.' as u';
			$fields = array('u.user_id','u.role_id','u.username','u.first_name','u.last_name','u.phone_number','u.email','u.user_img', 'u.activated','u.fullname','u.register_type','rl.role_name');
			$join_tables      =  array('rst_roles as rl' =>'rl.role_id = u.role_id');
			$match = array('u.email' => $email, 'u.password' => $password);

			$udata = $this->general_model->get_records($table,$fields,$join_tables,'left',$match);
			*/
			$udata = $this->general_model->login_user($user_id,$role_id);
			//pr($udata);exit;
			if (count($udata) > 0) {
					if ($udata[0]->activated == 'active') {
						$userdata = array(
							'user_id' => $udata[0]->user_id,
							'role_id' => $udata[0]->role_id,
							'username' => $udata[0]->username,
							'first_name' => $udata[0]->first_name,
							'last_name' => $udata[0]->last_name,
							'phone_number' => $udata[0]->phone_number,
							'email' => $udata[0]->email,
							'user_img' => $udata[0]->user_img,
							'fullname' => !empty($udata[0]->fullname) ? $udata[0]->fullname : '',
							'register_type' => $udata[0]->register_type,
							'role_name' => $udata[0]->role_name,
							'activated' => 'active');
						$this->session->set_userdata('reseeit_user_session', $userdata);
						redirect(base_url(USERS_SITE));
					} else {
						$msg = $this->lang->line('inactive_account');
						$newdata = array('msg' => $msg);
						$data['msg'] = $msg;
						$this->index($data);
						//$this->load->view(USERS_SITE, $data);
					}
			} else {
				$msg = $this->lang->line('invalid_us_pass');
				$newdata = array('msg' => $msg);
				$data['msg'] = $msg;
				$this->index($data);
				//$this->load->view(USERS_SITE, $data);
			}
		} else {

			$data['msg'] = $this->session->flashdata('msg');
			$this->index($data);
			//$this->load->view(USERS_SITE, $data);
		}

	}

	public function roles_check_login()
	{
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		//$role_id = $this->input->post('role_id');
	if ($email && $password)
		{
			$udata = $this->general_model->roles_check_user($email,$password);

			if (count($udata) > 0) {
				if (count($udata) == 1) {
					$this->login($udata[0]->user_id,$udata[0]->role_id);
				}else {
					$data['roles_check'] = $udata;
					$this->load->view('check_users_roles', $data);
				}
			} else {

				$msg = $this->lang->line('invalid_us_pass');
				$newdata = array('msg' => $msg);
				$data['msg'] = $msg;
				$this->index($data);
				//$this->load->view(USERS_SITE, $data);
			}
		} else {
			$data['msg'] = $this->session->flashdata('msg');
			$this->index($data);
			//$this->load->view(USERS_SITE, $data);
		}

	}


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
