<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is ForgetPassword Web-Service.
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class ForgetPassword extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        
		//Table Name
		$this->users_table = $this->db->dbprefix('users');
		$this->users_devicetoken = $this->db->dbprefix('users_devicetoken');
		
		//Load Library and Model
		$this->load->library('REST_Controller');
		$this->load->library('email');
        $this->load->model('Common_model');
    }
	public function index_post()
	{
		$email = $this->post('email');
		if(isset($email) && $email!="")
		{
			//Add New Device id during login
			$e_where = "( email = '".$email."' && activated = 'active')";
			$e_available = $this -> Common_model -> retrieve($this->users_table,$e_where, $limit = NULL, $offset = 0, $sort = NULL, $selectoption = NULL); 
			
			if( !empty($e_available) && count($e_available) != 0)
			{
				$cur_timestemp=time();
				$cur_time = date("Y-m-d H:i:s",$cur_timestemp);
				
				$email_data= array();
				$email_data['new_password_key']=  rand();
				$email_data['new_password_requested']=  $cur_time;
				$email_where = "( email = '".$email."' )";
				$updatemail = $this -> Common_model -> update($this->users_table, $email_where, $email_data);
				if($updatemail)
				{
					//Send mail code
					$config['charset'] = 'utf-8';//utf-8, iso-8859-1, etc..
					$config['wordwrap'] = TRUE;
					$config['mailtype'] = 'html';//html or text
					$this->email->initialize($config);  
					$main_message="<div><h2>Website Forget Password email</h2><p>still in progress.</p></div>";
					$this->email->from('no-reply@reseeit.com', 'reseeit');
					$this->email->to($email);
					$this->email->subject('Forget Password');
					$this->email->message($main_message);
					if($this->email->send())
						{
							$message = [
								'status' => '1',
								'message' => $this->lang->line('email_sent_successfully')
							];
							$this->response($message, REST_Controller::HTTP_OK); 
						}
						else
						{
								$message = [
									'status' => '0',
									'message' => $this->lang->line('email_sent_error')
								];
								$this->response($message, REST_Controller::HTTP_OK); 
						}
				}
			}
			else
			{
				$message = [
						'status' => '0',
						'message' => $this->lang->line('enter_valid_email')
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
