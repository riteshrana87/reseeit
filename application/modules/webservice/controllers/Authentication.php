<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
//require APPPATH . '/libraries/REST_Controller.php';

/**
 * This web-service use for authenticate user.
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Authentication extends REST_Controller {

    function __construct()
    { 
        // Construct the parent class
        parent::__construct();

        $this->users_table = $this->db->dbprefix('users');
		$this->users_devicetoken = $this->db->dbprefix('users_devicetoken');
		//$this -> page = lang('users');

		$this->load->library('REST_Controller');
        $this->load->model('Common_model');

    }
	public function index_post()
	{
		$email = $this->post('email');
		$fullname = $this->post('fullname');
		$pass = $this->post('pass');
		$device_token = $this->post('device_token');
		$type = $this->post('type');
		$user_img = $this->post('user_img');
		$device_type = $this->post('device_type');

		if(isset($email) && $email!="" && isset($pass) && $pass != "" && isset($device_token) && $device_token != "" && isset($type) && $type != "" )
		{
			$data['auth_valid'] = $this -> Common_model -> authentication_data($email,$pass);
			//pr($data['auth_valid']);exit;
			if(count($data['auth_valid']) > 0)
			{
				$data['auth_valid_data']['user_id'] = $data['auth_valid'][0]->user_id;
				$data['auth_valid_data']['fullname'] = $data['auth_valid'][0]->fullname;
				$data['auth_valid_data']['email'] = $data['auth_valid'][0]->email;
				$data['auth_valid_data']['zipcode'] = $data['auth_valid'][0]->zipcode;
				if($data['auth_valid'][0]->noviah_points_totals == NULL){
					$data['auth_valid_data']['EarningPoint'] = "0";
				}else{
				$data['auth_valid_data']['EarningPoint'] = $data['auth_valid'][0]->noviah_points_totals;
				}

				//validat proper url formate
				$url = $data['auth_valid'][0]->user_img;
				$url = filter_var($url, FILTER_SANITIZE_URL);
				if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
					$data['auth_valid_data']['user_img'] = $data['auth_valid'][0]->user_img;

				} else {
					$data['auth_valid_data']['user_img'] = base_url().'uploads/user/big/'.$data['auth_valid'][0]->user_img;
				}

				$data['user_data'][] = $data['auth_valid_data'];

				//Add New Device id during login
				//pr($data['auth_valid_data']['user_id']);exit;
				$device_add = $this -> Common_model -> AddDeviseToken($device_token, $data['auth_valid_data']['user_id'], $device_type, $this->users_devicetoken);


//pr($this->db->last_quwery());exit;
				$message = [
					'status' => '1',
					'message' => $this->lang->line('login_successfully'),
					'data' => $data['user_data']
				];
				$this->set_response($message, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
			}
			else
			{

				if($type == 'fb' || $type == 'gplus')
				{
					/*
					 *Add New FB and Google Plus User in database 
					 */
						$cur_timestemp=time();
						$cur_time = date("Y-m-d H:i:s",$cur_timestemp);

						$email_data= array();
						$email_data['role_id']=  5;
						$email_data['client_type_id']=  4;
						$email_data['password']=  md5($pass);
						$email_data['email']=  $email;
						$email_data['username']=  $email;
						$email_data['fullname']=  $fullname;
						//$email_data['zipcode']=  $zipcode;
						$email_data['device_token']=  $device_token;
						$email_data['register_type']=  $type;
						$email_data['created']=  $cur_time;
						$email_data['modified_date']=  $cur_time;
						$email_data['user_img']=  $user_img;
						$email_data['activated']=  'active';
						$inserted_user_id = $this -> Common_model -> add($this->users_table, $email_data);
						
						if($inserted_user_id)
						{
							/*
							 *Fetch Register record data	
							 */
						$where="(user_id ='".$inserted_user_id."')";
							//$selectoption = "'user_id, fullname, email, zipcode, total_point as EarningPoint'";
						$selectoption = array('user_id', 'fullname', 'email', 'zipcode', 'total_point as EarningPoint','user_img');

							$data['auth_valid'] = $this -> Common_model -> retrieve($this->users_table,$where, $limit = NULL, $offset = 0, $sort = NULL, $selectoption);

							/*
							*Add New Device id during login
							*/
							$device_add = $this -> Common_model -> AddDeviseToken($device_token, $inserted_user_id, $device_type, $this->users_devicetoken);

							$message = [
							'status' => '1',
							'message' => $this->lang->line('login_successfully'),
							'data' => $data['auth_valid']
							];
							$this->set_response($message, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
						}
						else{
							$message = [
							'status' => '0',
							'message' => $this->lang->line('plz_try_again')
							];
							$this->set_response($message, REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
						}
				}
				else
				{
					$message = [
						'status' => '0',
						//'message' => $this->lang->line('invalid_credential')
						'message' => "Your ReSeeIt ID or password was entered incorrectly. Please try again."
					];
					$this->set_response($message, REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
				}
			}
		}
		else
		{
			 // Invalid id, set the response and exit.
			$message = [
				'status' => '0',
				'message' => $this->lang->line('access_denied')
			];
            $this->response($message, REST_Controller::HTTP_OK); // BAD_REQUEST (400) being the HTTP response code
		}
	}
}
