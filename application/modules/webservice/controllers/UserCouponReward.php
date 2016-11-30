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
class UserCouponReward extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->coupon_reward_table = $this->db->dbprefix('user_coupon_reward');
        $this->load->library('REST_Controller');
        $this->load->model('Common_model');

    }
    public function index_post()
    {
        $user_id = $this->post('user_id');
        $coupon_id = $this->post('coupon_id');
        $point = 10;
        if(isset($user_id) && $user_id!="" && isset($coupon_id) && $coupon_id!="" && isset($point) && $point != "")
        {
            $u_where = "( user_id = '".$user_id."' AND coupon_id = '".$coupon_id."')";
            $available = $this -> Common_model -> retrieve($this->coupon_reward_table,$u_where, $limit = NULL, $offset = 0, $sort = NULL, $selectoption = NULL);
            if( empty($available) && count($available) == 0)
            {
                $reward_data= array();
                $reward_data['user_id']=  $user_id;
                $reward_data['coupon_id']=  $coupon_id;
                $reward_data['point']=  $point;
                $reward_data['added_date']     = db_datetimeformat();
                $inserted_user_id = $this -> Common_model -> add($this->coupon_reward_table, $reward_data);

                if($inserted_user_id){
                    $message = [
                        'status' => '1',
                        'message' => 'You have earn reward point .',
                        'Earnpoint' => 10
                    ];
                    $this->response($message, REST_Controller::HTTP_OK);
                    // BAD_REQUEST (400) being the HTTP response code
                }
            }
            else
            {
                $message = [
                    'status' => '0',
                    'message' => $this->lang->line('coupon_exist')
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