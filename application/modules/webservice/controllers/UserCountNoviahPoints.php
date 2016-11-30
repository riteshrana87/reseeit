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
class UserCountNoviahPoints extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        //Set the table name
        $this->earning_total = $this->db->dbprefix('earning_total_point');

        //Set the controller and model
        $this->load->library('REST_Controller');
        $this->load->model('Common_model');
    }
    public function index_post()
    {
        $Logged_UserId = $this->post('Logged_UserId');
            $totals_point_info = $this -> Common_model -> noviah_points_totals($Logged_UserId);
             if(!empty($totals_point_info)){
                 $noviah_points_earned = $totals_point_info[0]->noviah_points_totals;
                 if($noviah_points_earned == null){
                     $reward_get_fullname['EarningPoint'] = 0;
                 }else{
                     $reward_get_fullname['EarningPoint'] = $noviah_points_earned;
                 }
                 $reward_final_array[] = $reward_get_fullname;
                 //pr($reward_final_array);exit;
                 if(count($reward_final_array) > 0)
                 {
                     $message = [
                         'status' => '1',
                         'message' => $this->lang->line('count_totals_points'),
                         'data' => $reward_final_array
                     ];
                     $this->response($message, REST_Controller::HTTP_OK);
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
             }else{
                 $reward_final_array[]['EarningPoint'] = 0;
                 $message = [
                     'status' => '1',
                     'message' => $this->lang->line('count_totals_points'),
                     'data' =>$reward_final_array
                 ];
                 $this->response($message, REST_Controller::HTTP_OK); // Not able to access
             }

    }


}