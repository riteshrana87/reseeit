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
class ListofUserReceipt extends REST_Controller {

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
        $receipt_info = $this -> Common_model -> receipt_list($Logged_UserId);
        //pr($receipt_info);exit;
        if(!empty($receipt_info)){
            foreach($receipt_info  as $receipt){
                $receipt_data['receipt_id'] = $receipt->receipt_id;
                if($receipt->status == 'offer_received'){
                    $receipt_data['status'] = 'Approved';
                }elseif($receipt->status == 'offer_not_received'){
                    $receipt_data['status'] = 'NotApproved';
                }else{
                    $receipt_data['status'] = '';
//                break;
                }
                $receipt_list[]= $receipt_data;
            }
            //pr($reward_final_array);exit;
            if($receipt_info[0]->noviah_points_totals == null){
                $receipt_info= 0;
            }else{
                $receipt_info = $receipt_info[0]->noviah_points_totals;
            }
            if(count($receipt_list) > 0)
            {
                $message = [
                    'status' => '1',
                    'message' => $this->lang->line('receipt_list'),
                    'data' => $receipt_list,
                    'EarningPoint' =>$receipt_info
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
            $message = [
                'status' => '0',
                'message' => $this->lang->line('access_denied')
            ];
            $this->response($message, REST_Controller::HTTP_OK); // Not able to access
        }

    }


}