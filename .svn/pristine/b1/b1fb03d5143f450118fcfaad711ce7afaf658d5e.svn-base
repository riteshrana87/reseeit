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
class LoyaltyInteractionsList extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        //Set the table name
        $this->loyalty_interactions = $this->db->dbprefix('loyalty_interactions');

        //Set the controller and model
        $this->load->library('REST_Controller');
        $this->load->model('Common_model');

    }
    public function index_post()
    {
        //$interactions = $this->post('interactions_type');
        $current_date = date('m/d/Y', strtotime('0 days'));
        //$interactions_where ="(expiry_date >= '".$current_date."' AND coupon_type='".$coupon_type."')";
        $interactions_where ="(expiry_date >= '".$current_date."')";
        $interact_info = $this -> Common_model -> retrieve($this->loyalty_interactions, $interactions_where);
        // pr($interact_info);exit;

        if(count($interact_info) > 0)
        {
            $message = [
                'status' => '1',
                'message' => $this->lang->line('interact_list'),
                'image_path' => base_url()."uploads/coupon/big/",
                'data' => $interact_info
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
    }
}