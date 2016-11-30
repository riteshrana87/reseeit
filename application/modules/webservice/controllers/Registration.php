<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is Registration Web-Service.
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Registration extends REST_Controller {

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
		$fullname = $this->post('fullname');
		$email = $this->post('email');
		$pass = $this->post('pass');
		$zipcode = $this->post('zipcode');
		$device_token = $this->post('device_token');
		$type = $this->post('type');
		$device_type = $this->post('device_type');
		if(isset($fullname) && $fullname!="" && isset($email) && $email!="" && isset($pass) && $pass != "" && isset($zipcode) && $zipcode != "" && isset($device_token) && $device_token != "" && isset($type) && $type != "" )
		{
			//Add New Device id during login
			$e_where = "( email = '".$email."')";
			$e_available = $this -> Common_model -> retrieve($this->users_table,$e_where, $limit = NULL, $offset = 0, $sort = NULL, $selectoption = NULL);

			if( empty($e_available) && count($e_available) == 0)
			{
				$cur_timestemp=time();
				$cur_time = date("Y-m-d H:i:s",$cur_timestemp);
				
				$email_data= array();
				$email_data['role_id']=  5;
				$email_data['client_type_id']=  4;
				$email_data['password']=  md5($pass);
				$email_data['email']=  $email;
				$email_data['username']=  $email;
				$email_data['fullname']=  $fullname;
				$email_data['zipcode']=  $zipcode;
				//$email_data['device_token']=  $device_token;
				$email_data['register_type']=  $type;
				$email_data['created']=  $cur_time;
				$email_data['modified_date']=  $cur_time;
				$email_data['activated']=  'active';
				$inserted_user_id = $this -> Common_model -> add($this->users_table, $email_data);

				$u_where = "( user_id = '".$inserted_user_id."')";
				//$data['user_data'] = $this -> Common_model -> retrieve($this->users_table,$u_where, $limit = NULL, $offset = 0, $sort = NULL, $selectoption = NULL);
				$data['user_data'] = $this -> Common_model -> register_data($inserted_user_id);
				//pr($data['user_data']);exit;
				$user_id = $data['user_data'][0]->user_id;
				$fullname = $data['user_data'][0]->fullname;
				$email = $data['user_data'][0]->email;
				$zipcode= $data['user_data'][0]->zipcode;
				if($data['user_data'][0]->noviah_points_totals == ''){
					$total_point = 0;
				}else{
					$total_point = $data['user_data'][0]->noviah_points_totals;
				}
				$register_type = $data['user_data'][0]->register_type;
				$user_img = $data['user_data'][0]->user_img;
				/*$url = $data['user_data'][0]->user_img;
				$url = filter_var($url, FILTER_SANITIZE_URL);
				if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
					$user_img = $data['user_data'][0]->user_img;
				} else {
					$user_img = base_url().'uploads/user/big/'.$data['user_data'][0]->user_img;
				}*/

				$data['user_det'][] = array('user_id' =>$user_id,'fullname'=>$fullname,'email'=>$email,'zipcode'=>$zipcode,'total_point'=>(string)$total_point,'register_type'=>$register_type,'user_img'=>$user_img);

				if($inserted_user_id){
					//Add Devise token
				$device_add = $this -> Common_model -> AddDeviseToken($device_token, $inserted_user_id, $device_type, $this->users_devicetoken);
					$message = [
						'status' => '1',
						'message' => $this->lang->line('register_successfully'),
						'data' => $data['user_det']
					];
					$this->response($message, REST_Controller::HTTP_OK); // BAD_REQUEST (400) being the HTTP response code

				}
			}
			else
			{
				$message = [
						'status' => '0',
						'message' => $this->lang->line('email_exist')
					];
				$this->response($message, REST_Controller::HTTP_OK); // BAD_REQUEST (400) being the HTTP response code
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
