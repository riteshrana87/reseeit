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
class ClientRewardList extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        //Set the table name
        $this->client_reward = $this->db->dbprefix('client_reward');

        //Set the controller and model
        $this->load->library('REST_Controller');
        $this->load->model('Common_model');
    }
    public function index_post()
    {

        $Logged_UserId = $this->post('Logged_UserId');
        $latitude = $this->post('latitude');
        $longitude = $this->post('longitude');

        $reward_info = $this -> Common_model -> user_point_data();
        $reward_get_fullname = array();
        $reward_final_array = array();
        foreach($reward_info as $rewards_info){
            $reward_data = $this->findmiles($latitude,$longitude, $rewards_info->user_id);
            $reward_get_fullname['client_reward_id'] = $rewards_info->client_reward_id;
            $reward_get_fullname['user_id'] = $rewards_info->user_id;
            $reward_get_fullname['reward_summary_img'] = $rewards_info->reward_summary_img;
            $reward_get_fullname['reward_img'] = $rewards_info->reward_img;
            $reward_get_fullname['reward_point'] = $rewards_info->reward_point;

        $point_info_data = $this -> Common_model -> noviah_points_data($rewards_info->user_id,$Logged_UserId);
            $noviah_points_earned = array();
            foreach($point_info_data as $point_info){
                $noviah_points_earned[] = $point_info->client_points_earned;
            }

            $noviah_points =  array_sum($noviah_points_earned);

            if($noviah_points == null){
                $reward_get_fullname['earned_reward_point'] = 0;
            }else{
                $reward_get_fullname['earned_reward_point'] = $noviah_points;
            }

            if($reward_data[0]['com_name'] == NULL){
                $reward_get_fullname['com_name'] = '';
            }else {
                $reward_get_fullname['com_name'] = $reward_data[0]['com_name'];
            }
            $reward_get_fullname['distance'] = $reward_data[0]['distance'];
            $reward_final_array[] = $reward_get_fullname;
        }
        //pr($reward_final_array);exit;
        if(count($reward_final_array) > 0)
        {
            $message = [
                'status' => '1',
                'message' => $this->lang->line('client_reward_list'),
                //'image_path' => base_url()."uploads/coupon/big/",
                'data' => $reward_final_array
            ];
            $this->response($message, REST_Controller::HTTP_OK);
        }
        else
        {
            // Invalid id, set the response and exit.
            $message = [
                'status' => '0',
                //'message' => $this->lang->line('access_denied')
                'message' => 'No more reward'
            ];
            $this->response($message, REST_Controller::HTTP_OK); // Not able to access
        }
    }

 public function findmiles($lati, $longi, $user_id) {
    $current_date = date('m/d/Y', strtotime('0 days'));

    $this->db->select('us.user_id,c.com_name,cl.lat,cl.long');
    $this->db->from('rst_users as us');
    $this->db->join('rst_company as c','us.user_id = c.user_id','LEFT');
    $this->db->join('rst_company_location as cl','c.user_id = cl.user_id','LEFT');
    $this->db->where('us.user_id', $user_id);
    $query = $this->db->get();
    $result = $query->result();

//pr($result);exit;
    foreach($result as $value){
        $user_id = $value->user_id;
        $lat = $value->lat;
        $long = $value->long;
        $com_name = $value->com_name;

        $lat1=$lati;
        $lon1=$longi;
        $lat2=$lat;
        $lon2=$long;
        // Formula for calculating distances
        // from latitude and longitude.
       /* $dist   = acos(sin(deg2rad($lat1))
            * sin(deg2rad($lat2))
            + cos(deg2rad($lat1))
            * cos(deg2rad($lat2))
            * cos(deg2rad($lon1 - $lon2)));

        $dist   = rad2deg($dist);
        $miles  = (float) $dist * 69;
*/

  /*      $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
*/

        $dLat = deg2rad($lat1) - deg2rad($lat2);

        $dLon = deg2rad($lon1) - deg2rad($lon2);

        $R = 6371; // km
    $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon/2) * sin($dLon/2);
    $c = 2 * atan2(sqrt($a), sqrt(1-$a));
    $d = $R * $c;

        $miles = $d/1.609344;

        // This is all displaying functionality
        $display  = sprintf("%0.2f",$miles).' miles' ;

        //$display .= ' ('.sprintf("%0.2f",$km).' kilometers)' ;

        //print_r($shop_pro);
        $featured_product_array = array(
            //'user_id' => $user_id,
            'com_name' => $com_name,
            'distance' =>  $display,
        );

        $report_data[] = $featured_product_array;
    }
    return $report_data;
}


}