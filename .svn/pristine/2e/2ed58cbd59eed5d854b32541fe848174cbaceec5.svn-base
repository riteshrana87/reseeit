<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is Receipt List Web-Service.
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class ReceiptList extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        
		//Set the table name 
		$this->receipt_image = $this->db->dbprefix('receipt_image');
		
		//Set the controller and model
		$this->load->library('REST_Controller');
        $this->load->model('Common_model');

    }
	public function index_post()
	{
		$user_id = $this->post('user_id');
		$type = $this->post('type');
		
		if(isset($user_id) && $user_id != "" && isset($type) && $type != "" )
		{
			$receipt_where = "( user_id =".$user_id." )";
			if($type == 'mostrecent')
			{
				$limit = 3;
				$offset = 0;
				$sort = array("order_by" => "added_date","order" => "DESC");
			}
			if($type == 'all')
			{
				$limit = NULL;
				$offset = 0;
				$sort = NULL;
			}

			$receipt_info = $this -> Common_model -> retrieve($this->receipt_image, $receipt_where,$limit , $offset , $sort , $selectoption = NULL);
			if(count($receipt_info) > 0)
			{
				$message = [
					'status' => '1',
					'message' => $this->lang->line('receipt_list'),
					'data' => $receipt_info
				];
				$this->response($message, REST_Controller::HTTP_OK); 
			}
			else 
			{
				
			}
		}
		else
		{
			 // Invalid id, set the response and exit.
			$message = [
				'status' => '0',
				'message' => $this->lang->line('access_denied')
			];
            $this->response($message, REST_Controller::HTTP_OK); // Not able to access
		}
	}
}
