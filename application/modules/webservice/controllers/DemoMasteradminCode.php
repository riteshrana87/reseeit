<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is Receipt Add Web-Service.
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class DemoMasteradminCode extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        //Set the controller and model
        $this->load->library('REST_Controller');
    }
    public function index_post()
    {
        // $user_name = $this->post('user_name');
        // $user_pass = $this->post('password');

        // if(isset($user_name) && $user_name!="" && isset($user_pass) && $user_pass != "")
        // {
        //   //$this->connectDb($user_name,$user_pass);
        //   $this->create_table_new($user_name,$user_pass);
        // }
        // else
        // {
        //     // Invalid id, set the response and exit.
        //     $message = [
        //         'status' => '0',
        //         'message' => $this->lang->line('access_denied')
        //     ];
        //     $this->response($message, REST_Controller::HTTP_OK); // BAD_REQUEST (400) being the HTTP response code
        // }
    }

    public function connectDb($user_name,$pass,$dbname) {

        $servername = "localhost";
        $username = $user_name;
        $password = $pass;

// Create connection
        $conn = new mysqli($servername, $username, $password);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

// Create database
        $sql = "CREATE DATABASE $dbname";
        if ($conn->query($sql) === TRUE) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . $conn->error;
        }

        $conn->close();
    }

    public function create_table_new_get($dbname='',$email='',$company_name='',$name=''){

        $user_name = 'root';
        $user_pass   = 'root';
        //$user_pass   = 'Infoc!ty2';

        $servername = "localhost";
        $username = $user_name;
        $password = $user_pass;

// Create connection
        $conn = new mysqli($servername, $username, $password);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //  $conn->close();


        $db['default'] = array(
            'dsn'   => '',
            'hostname' => 'mysql:host=localhost',
            'username' => $user_name,
            'password' => $user_pass,
            'database' => $dbname,
            'dbdriver' => 'pdo',
            'dbprefix' => '',
            'pconnect' => FALSE,
            'db_debug' => (ENVIRONMENT !== 'production'),
        );
        $con=new mysqli($servername, $username, $password,$dbname);
        $conmaster = new mysqli($servername, $username, $password,'masterblazedeskcrm');

        $password = $this->randomPassword();

        $qry = "UPDATE blzdsk_login set email='$email',password=md5('$password') where login_id = 27 AND email='$email'";
        $con->query($qry);

        $qrymaster = "UPDATE blzdsk_setup_master set email='$email',company_name='$company_name' where login_id = 27  AND domain_name='$dbname'";
        $conmaster->query($qrymaster);



        echo "update record successfully";
        exit;

    }

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

}