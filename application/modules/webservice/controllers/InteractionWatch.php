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
class InteractionWatch extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->interaction_watch_table = $this->db->dbprefix('interaction_watch');
        $this->earning_total_point = $this->db->dbprefix('earning_total_point');
        $this->earning_point = $this->db->dbprefix('earning_point');
        $this->load->library('REST_Controller');
        $this->load->model('Common_model');

    }
    public function index_post()
    {
        $user_id = $this->post('user_id');
        $loyalty_interaction_id = $this->post('interaction_id');
        $Logged_UserId = $this->post('Logged_UserId');
        $point = $this->post('award_point');


        if(isset($user_id) && $user_id!="" && isset($loyalty_interaction_id) && $loyalty_interaction_id!="" && isset($Logged_UserId) && $Logged_UserId != "")
        {
           $u_where = "('Logged_UserId' = '".$Logged_UserId."' AND interaction_id = '".$loyalty_interaction_id."')";
            $available = $this -> Common_model -> retrieve($this->interaction_watch_table,$u_where, $limit = NULL, $offset = 0, $sort = NULL, $selectoption = NULL);
            //pr($available);exit;
            //pr($this->db->last_query());exit;
            if(empty($available) && count($available) == 0)
            {

               /* $field = array('total_point');
                $match = array('user_id' => $Logged_UserId);
                $userrecord = $this->general_model->get_records(USER_TABLE, $field, '', '', $match);
                $point_add = $userrecord[0]['total_point'] + $point;

                $udata['total_point'] = $point_add;
                $where = array('user_id' => $Logged_UserId);
                $this->general_model->update(USER_TABLE, $udata, $where);
            */
                //new code

                $client_point = 10;
                $noviah_points = $point;
                $non_profit_points = 15;

                $com_data['user_id'] = $Logged_UserId;
                $com_data['client_points_earned'] = $client_point;
                $com_data['noviah_points_earned'] = $noviah_points;
                $com_data['non_profit_points_earned'] = $non_profit_points;

                $field = array('*');
                $match = array('user_id' => $com_data['user_id']);
                $get_last_earn_point = $this->general_model->get_records($this->earning_total_point, $field, '', '', $match);
                //pr($get_last_earn_point);exit;
                if(!empty($get_last_earn_point)){
                    $com_data_total['user_id'] = $Logged_UserId;
                    $com_data_total['client_points_totals'] = $point + $get_last_earn_point[0]['client_points_totals'];

                    $com_data_total['noviah_points_totals'] = $noviah_points + $get_last_earn_point[0]['noviah_points_totals'];

                    $com_data_total['non_profit_points_totals'] = $non_profit_points + $get_last_earn_point[0]['non_profit_points_totals'];

                    $where = array('earning_total_id' => $get_last_earn_point[0]['earning_total_id']);
                    $this->general_model->update($this->earning_total_point, $com_data_total, $where);

                    $parent_available[] = $this->general_model->insert($this->earning_point,$com_data);
                }else{
                    $com_data_total['user_id'] = $Logged_UserId;
                    $com_data_total['client_points_totals'] = $point;
                    $com_data_total['noviah_points_totals'] = $noviah_points;
                    $com_data_total['non_profit_points_totals'] = $non_profit_points;

                    $this->general_model->insert($this->earning_total_point,$com_data_total);
                    $parent_available[] = $this->general_model->insert($this->earning_point,$com_data);
                }

                //end new code

                $int_status['Status'] = 1;
                $where = array('loyalty_interaction_id' => $loyalty_interaction_id);
                $this->general_model->update(LOYALTY_INTERACTION, $int_status, $where);

                $watch_data= array();
                $watch_data['Logged_UserId']=  $Logged_UserId;
                $watch_data['interaction_id']=  $loyalty_interaction_id;
                $watch_data['added_date']     = db_datetimeformat();
                $watch_user_id = $this -> Common_model -> add($this->interaction_watch_table, $watch_data);

                if($watch_user_id){
                    $message = [
                        'status' => '1',
                        'message' => 'interaction successfully done',
                        'Earnpoint' =>$com_data_total['noviah_points_totals'],

                    ];
                    $this->response($message, REST_Controller::HTTP_OK);
                    // BAD_REQUEST (400) being the HTTP response code
                }
            }
            else
            {
                $message = [
                    'status' => '0',
                    'message' => $this->lang->line('interaction_exist')
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
