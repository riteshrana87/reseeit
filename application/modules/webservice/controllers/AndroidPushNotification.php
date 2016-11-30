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
class AndroidPushNotification extends REST_Controller
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        //Set the table name
        $this->users_div = $this->db->dbprefix('users_devicetoken');
        $this->interactions = $this->db->dbprefix('loyalty_interactions');
        //Set the controller and model
        $this->load->library('REST_Controller');
//echo "test";exit;
        $this->load->model('Common_model');

    }

  /* public function index_post($start_lmt=NULL,$end_lmt=NULL,$post_ID=NULL,$slug=NULL){
        $dynamic_message = 'hiiiii';
        $registatoin_ids = array();
        $i=0;
$registatoin_ids[] = 'APA91bGZ0ZTgHiph9BjmbcPtTOly1kVibPDMS9F1T_utSY5ECOHHbgYKD-SDGWNW7lM1PQTDqr8tNRbmO19j1PEYEhUHhA_AOyFjvkCNpOMwg56soSesaRA';

        //Below $url comment by rupesh
        $url = 'https://android.googleapis.com/gcm/send';
        //$url = 'test';

        $message = array("p_id" => $post_ID, "type" => $slug, "message" => $dynamic_message);
        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
        );

        $headers = array(
            'Authorization: key=AIzaSyAkd0uS5IQO8EB6LXi4AsWjXgJrX6eysnk',
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Disabling SSL Certificate support temporarly

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        // Execute post
        $result = curl_exec($ch);
        pr($result);exit;
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
        $result;
    }
*/
    public function index_post($dynamic_message=NULL,$start_lmt=NULL,$end_lmt=NULL,$post_ID=NULL,$slug=NULL){
        $registatoin_ids = array();
        $i=0;
        $dynamic_message = 'hiii';

        $url = 'https://android.googleapis.com/gcm/send';

        $registatoin_ids = array('APA91bE6oq65EwU0HONN2lsT2BVdTJthiSlEKl-TvFANJubsRMpoIyPDqngqoTDidmLEIsTEBcpmP4zRSXYX5gMb_FGA_a8nvt-dkzQ6Zg02o11nlWZvd5o');

        $message = array("p_id" => $post_ID, "type" => $slug, "message" => $dynamic_message);
        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
        );
//pr($fields);exit;
        $headers = array(
            'Authorization: key=AIzaSyAo8uWiwtZhm_TGXpwEB7Co7ql-vjVar2M',
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Disabling SSL Certificate support temporarly

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));

        }
        //pr($result);exit;
        // Close connection
        curl_close($ch);
        $result;


    }

}