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
class CouponFeaturedList extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        //Set the table name
        $this->coupon = $this->db->dbprefix('coupon');
        $this->coupon_favorite = $this->db->dbprefix('coupon_favorite');

        $this->loyalty_interactions = $this->db->dbprefix('loyalty_interactions');
        $this->interactions = $this->db->dbprefix('interactions');
        $this->interactions_watch = $this->db->dbprefix('interaction_watch');
        //Set the controller and model
        $this->load->library('REST_Controller');
        $this->load->model('Common_model');
    }
    public function index_post()
    {
        $coupon_type = $this->post('coupon_type');
        $longitude = $this->post('longitude');
        $latitude = $this->post('latitude');
        $Logged_UserId = $this->post('Logged_UserId');

        $current_date = date('m/d/Y', strtotime('0 days'));
        $interactions_info = $this -> Common_model -> retrieve($this->interactions, '1=1');
        $final_data = array();

            foreach ($interactions_info as $interactions) {
                $current_date = date('m/d/Y', strtotime('0 days'));
                $interactions_expiry_date = date('m/d/Y', strtotime($interactions->expiry_date));

                if (strtotime($interactions_expiry_date) > strtotime('now')){
                    //$where = "(interaction_id =>'".$interactions->interaction_id."')";
                    $where = array('interaction_id' => $interactions->interaction_id);
                    $interactions_data = $this->Common_model->retrieve($this->loyalty_interactions, $where);
                //pr($interactions_data);exit;
                    foreach ($interactions_data as $interaction) {
                        $where_watch = array('Logged_UserId' => $Logged_UserId, 'interaction_id' => $interaction->loyalty_interaction_id);
                        $interactions_watch = $this -> Common_model -> retrieve($this->interactions_watch, $where_watch);
                        if(count($interactions_watch) != 0){ $interaction_watch_status = 1;  }
                        else{  $interaction_watch_status = 0;  }
                        if(!empty($interaction->link_to_interaction)) {
                            $final_data[] = [
                                'user_id' => $interactions->user_id,
                                'loyalty_interaction_id' => $interaction->loyalty_interaction_id,
                                'interaction_id' => $interaction->interaction_id,
                                'link_to_interaction' => $interaction->link_to_interaction,
                                'link_to_interaction_type' => $interaction->link_to_interaction_type,
                                'interaction_level' => $interaction->interaction_level,
                                'award_points' => $interaction->award_points,
                                'tags_text' => $interaction->tags_text,
                                'added_date' => $interaction->added_date,
                                'Type' => $interaction->Type,
                                'Status' => $interaction_watch_status,
                                'expiry_date' => $interactions->expiry_date,
                            ];
                        }

                    }
                }   //End if condition
                else {
                    $final_data[] = [
                        'user_id' => $interactions->user_id,
                        'start_date' => $interactions->start_date,
                        'expiry_date' => $interactions->expiry_date,
                        'default_interaction' => $interactions->default_interaction,
                        'default_interaction_type' => $interactions->default_interaction_type,
                        'Type' => $interactions->Type,
                    ];
                }
            }

        $where_user_data = array('user_id' => $Logged_UserId);
        $coupon_favorite_list = $this->Common_model->retrieve($this->coupon_favorite, $where_user_data);

        if(!empty($coupon_favorite_list)){
            foreach($coupon_favorite_list as $coupon_favorite){
                $coupon_data[] = $coupon_favorite->coupon_id;
            }
            $coupon_info = $this -> Common_model ->nearhere($longitude, $latitude, $coupon_type,$coupon_data);
        }else{
            $coupon_info = $this -> Common_model ->nearhere($longitude, $latitude, $coupon_type);

        }
//        echo $this->db->last_query();exit;

        if(count($coupon_info) > 0 or count($final_data) > 0)
            {
                $message = [
                    'status' => '1',
                    'message' => $this->lang->line('coupon_list'),
                    'image_path' => base_url()."uploads/coupon/big/",
                    'data' => $coupon_info,
                    'interactions'=> $final_data
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