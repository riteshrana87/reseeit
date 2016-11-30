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
class EarningPoint extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->earning_point = $this->db->dbprefix('earning_point');
        $this->earning_total_point = $this->db->dbprefix('earning_total_point');
        $this->company = $this->db->dbprefix('company');

        $this->load->library('REST_Controller');
        $this->load->model('Common_model');

    }
    public function index_post()
    {
        $Logged_UserId = $this->post('Logged_UserId');

        $point = 10;
        $noviah_points = 20;
        $non_profit_points = 15;

               $com_data['user_id'] = $Logged_UserId;
               $com_data['client_points_earned'] = $point;
               $com_data['noviah_points_earned'] = $noviah_points;
               $com_data['non_profit_points_earned'] = $non_profit_points;

               $field = array('*');
               $match = array('user_id' => $com_data['user_id']);
               $get_last_earn_point = $this->general_model->get_records($this->earning_total_point, $field, '', '', $match);

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

        if( !empty($parent_available)){
                    $message = [
                        'status' => '1',
                        'message' => 'interaction successfully done',
                        'Earnpoint' =>$point,

                    ];
                    $this->response($message, REST_Controller::HTTP_OK);

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
}
