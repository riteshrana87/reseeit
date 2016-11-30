<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is Receipt Add Web-Service.
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Favorite_coupon extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        //Set the table name
        $this->coupon_image = $this->db->dbprefix('coupon_favorite');

        //Set the controller and model
        $this->load->library('REST_Controller');
        $this->load->model('Common_model');

    }
    public function index_post()
    {
        $user_id = $this->post('Logged_UserId');
        $coupon_id = $this->post('coupon_id');

        if(isset($user_id) && $user_id != "" && isset($coupon_id) && $coupon_id != "" )
        {
            $cur_timestemp=time();
            $cur_time = date("Y-m-d H:i:s",$cur_timestemp);

            $coupon_data['user_id'] = $user_id;
            $coupon_data['added_date'] = $cur_time;
            $coupon_data['coupon_id'] = $coupon_id;
            $coupon_favorite_if = $this -> Common_model -> add($this->coupon_image, $coupon_data);
            if($coupon_favorite_if)
            {
                // Receipt add message
                $message = [
                    'status' => '1',
                    'message' => $this->lang->line('coupon_add_successfully'),
                    'coupon_favorite_id'=>$coupon_favorite_if,
                ];
                $this->response($message, REST_Controller::HTTP_OK);
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