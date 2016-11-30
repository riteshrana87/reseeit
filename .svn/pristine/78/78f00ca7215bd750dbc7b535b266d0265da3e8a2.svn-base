<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is Update User Web-Service.
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Updateuser extends REST_Controller {

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
		$pass = $this->post('pass');
		$zipcode = $this->post('zipcode');
		$user_id = $this->post('user_id');
		$user_img = $_FILES;
		//print_r($_FILES['user_img']);
		if(isset($fullname) && $fullname!="" && isset($pass) && $pass != "" && isset($zipcode) && $zipcode != "" && isset($user_id) && $user_id != "" && isset($user_img) && $user_img != "" )
		{
			$selectoption = array('user_img');
			$pic_where = "(user_id = '".$user_id."')";
			$user_picinfo = $this -> Common_model -> retrieve($this->users_table,$pic_where, $limit = NULL, $offset = 0, $sort = NULL, $selectoption);
			//File uploading code Start
			if($user_img)
			{
				//Upload Image
				$user_rnd = rand();
				$tmpname  = $_FILES['user_img']['tmp_name'];
				$uploaddir = APPPATH.'images/user_pic/';
				//Before upload image remove old image from folder
				if(isset($user_picinfo[0]->user_img) && $user_picinfo[0]->user_img != "")
				{
					$img_str = explode(".",$user_picinfo[0]->user_img);
					//print_r($img_str);
					if (file_exists($uploaddir.$img_str[0].'.'.$img_str[1]))
						unlink($uploaddir.$img_str[0].'.'.$img_str[1]);
					if (file_exists($uploaddir.$img_str[0].'_small.'.$img_str[1]))
						unlink($uploaddir.$img_str[0].'_small.'.$img_str[1]);
					if(file_exists($uploaddir.$img_str[0].'_maxheight.'.$img_str[1]))	
						unlink($uploaddir.$img_str[0].'_maxheight.'.$img_str[1]);
				}
				//Upload image function
				$this-> Common_model -> img_resize( $tmpname , 600 , $uploaddir , $user_rnd.".jpg");
				$this-> Common_model -> img_resize( $tmpname , 120 , $uploaddir , $user_rnd."_small.jpg");
				$this-> Common_model -> img_resize( $tmpname , 500 , $uploaddir , $user_rnd."_maxheight.jpg", 1);
				$user_img = $user_rnd.".jpg";
			}
			else
			{
				$user_img = $user_picinfo[0]->user_img;
			}
			
			//File uploading code End
			$user_where="(user_id ='".$user_id."')";
			$user_data['fullname'] = $fullname;
			$user_data['password'] = md5($pass);
			$user_data['zipcode'] = $zipcode;
			$user_data['user_img'] = $user_img;
			$update_user = $this -> Common_model -> update($this->users_table, $user_where, $user_data);
			if($update_user)
			{
				 // Invalid id, set the response and exit.
				$message = [
					'status' => '1',
					'message' => $this->lang->line('update_successfully')
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