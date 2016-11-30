<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
//require APPPATH . '/libraries/REST_Controller.php';

/**
 * This web-service use for authenticate user.
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class AutoAuthentication extends REST_Controller {

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
        $email = $this->post('email');
        $device_token = $this->post('device_token');

        if(isset($email) && $email!="" && isset($device_token) && $device_token != "")
        {

            $data['auth_valid'] = $this -> Common_model -> auto_authentication_data($email);
            //pr($data['auth_valid']);exit;
            $data['auth_valid_data']['user_id'] = $data['auth_valid'][0]->user_id;
            $data['auth_valid_data']['fullname'] = $data['auth_valid'][0]->fullname;
            $data['auth_valid_data']['email'] = $data['auth_valid'][0]->email;
            $data['auth_valid_data']['zipcode'] = $data['auth_valid'][0]->zipcode;

            if($data['auth_valid'][0]->noviah_points_totals == null){
                $data['auth_valid_data']['EarningPoint'] = "0";
            }else{
                $data['auth_valid_data']['EarningPoint'] = $data['auth_valid'][0]->noviah_points_totals;
            }
            $data['auth_valid_data']['user_img'] = base_url().'uploads/user/big/'.$data['auth_valid'][0]->user_img;
            $data['user_data'][] = $data['auth_valid_data'];
//pr($data['user_data']);exit;
            if(count($data['auth_valid']) > 0)
            {

                $message = [
                    'status' => '1',
                    'message' => $this->lang->line('login_successfully'),
                    'data' => $data['user_data']
                ];
                $this->set_response($message, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $message = [
                        'status' => '0',
                        //'message' => $this->lang->line('invalid_credential')
                        'message' => "Your ReSeeIt ID or password was entered incorrectly. Please try again."

                    ];
                    $this->set_response($message, REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

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
