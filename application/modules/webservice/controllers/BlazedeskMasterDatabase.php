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
class BlazedeskMasterDatabase extends REST_Controller {

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

    public function create_table_new_get($dbname,$adminuser,$adminpwd,$address,$address2='',$state='',$city='',$country='',$zipcode='',$telephone='',$firstname='',$lastname='',$is_crm='',$is_pm='',$is_support='',$total_user='',$crm_flag='',$pm_flag='',$support_flag=''){


        $user_name = 'root';
        $user_pass   = 'root';
        //$user_pass   = 'Infoc!ty2';
//    $user_pass   = '';


        $address = rawurldecode($address);
        $address2 = rawurldecode($address2);
        $state = rawurldecode($state);
        $city = rawurldecode($city);

        $servername = "localhost";
        $username = $user_name;
        $password = $user_pass;

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
        $filename = base_url().'blazedesk.sql';
        $data_filename = base_url().'default_superadmin_user_create.sql';
        $con=new mysqli($servername, $username, $password,$dbname);
        $conmaster = new mysqli($servername, $username, $password,'masterblazedeskcrm');

// Temporary variable, used to store current query
        $templine = '';
// Read in entire file
        $lines = file($filename);
// Loop through each line
        foreach ($lines as $line)
        {
// Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || $line == '')
                continue;

// Add this line to the current segment
            $templine .= $line;
// If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';')
            {
                // Perform the query
                $con->query($templine);
                // Reset temp variable to empty
                $templine = '';
            }
        }

//import data
        $templine_data = '';
// Read in entire file
        $lines_data = file($data_filename);
// Loop through each line
        foreach ($lines_data as $line_data)
        {
// Skip it if it's a comment
            if (substr($line_data, 0, 2) == '--' || $line_data == '')
                continue;

// Add this line to the current segment
            $templine_data .= $line_data;
// If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line_data), -1, 1) == ';')
            {
                // Perform the query
                $con->query($templine_data);
                // Reset temp variable to empty
                $templine_data = '';
            }
        }
        $qry = "UPDATE blzdsk_login set firstname = '$firstname', lastname='$lastname',email='$adminuser',password=md5('$adminpwd'),address='$address',address_1='$address2',state='$state',pincode='$zipcode',telephone1='$telephone',created_date=now() where login_id = 27";
        $con->query($qry);

        $qrymaster = "INSERT INTO blzdsk_setup_master (email,total_user,support_user,crm_user,pm_user,login_id,	is_crm,is_pm,is_support)
VALUES ('$adminuser','$total_user','$is_support','$is_crm','$is_pm','27',$crm_flag,$pm_flag,$support_flag)";
        $conmaster->query($qrymaster);


        /*
          mkdir("/var/www/html/$dbname");
          shell_exec("rsync -r /var/www/html/blazedeskcrm/ /var/www/html/$dbname");

          $filename = "/var/www/html/$dbname/application/config/database.php";
  //Read Old Code from file
      //Read Old Code from file
      $readFileHandle = fopen($filename,"r");
      $defaultContent = fread($readFileHandle, filesize($filename));
  //Append new Code in file
      $writeFileHandle = fopen($filename,"w");
      $dbtest = '$db';
          $doller = '$';
      $newContent = "<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  ".$doller."active_group = 'default';
  ".$doller."query_builder = TRUE;
  if(".$doller."_SERVER['HTTP_HOST'] == 'localhost' || ".$doller."_SERVER['HTTP_HOST'] ==  '10.1.5.64')
  {
   ".$doller."db_name = 'blazedeskcrm';
   ".$doller."db_pass = '';
  }else{
   ".$doller."db_name = '$dbname';
   ".$doller."db_pass = 'Infoc!ty2';
  }
  ".$doller."db['default'] = array(
      'dsn'	=> '',
      'hostname' => 'localhost',
      'username' => 'root',
      'password' => ".$doller."db_pass,
      'database' => ".$doller."db_name,
      'dbdriver' => 'mysqli',
      'dbprefix' => 'blzdsk_',
      'pconnect' => FALSE,
      'db_debug' => (ENVIRONMENT !== 'production'),
      'cache_on' => FALSE,
      'cachedir' => '',
      'char_set' => 'utf8',
      'dbcollat' => 'utf8_general_ci',
      'swap_pre' => '',
      'encrypt' => FALSE,
      'compress' => FALSE,
      'stricton' => FALSE,
      'failover' => array(),
      'save_queries' => TRUE
  );
      ".$doller."db['ADMINDB'] = array(
      'dsn'	=> '',
      'hostname' => 'localhost',
      'username' => 'root',
      'password' => ".$doller."db_pass,
      'database' => 'masterblazedeskcrm',
      'dbdriver' => 'mysqli',
      'dbprefix' => 'blzdsk_',
      'pconnect' => FALSE,
      'db_debug' => (ENVIRONMENT !== 'production'),
      'cache_on' => FALSE,
      'cachedir' => '',
      'char_set' => 'utf8',
      'dbcollat' => 'utf8_general_ci',
      'swap_pre' => '',
      'encrypt' => FALSE,
      'compress' => FALSE,
      'stricton' => FALSE,
      'failover' => array(),
      'save_queries' => TRUE); ?>\n";
      fwrite($writeFileHandle, $newContent);

  fclose($readFileHandle);
  fclose($writeFileHandle);

          */

        echo "Tables imported successfully";
        exit;

    }

    public function dev_create_trial_get($dbname, $companyName, $email, $firstname, $lastname, $phone,$upassword) {
//echo "test";exit;
        $user_name = 'root';
        //$user_pass = 'Infoc!ty2';
        $user_pass = 'root';
        // $user_pass = '';
        $servername = "localhost";
        $username = $user_name;
        $password = $user_pass;
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
        //  $conn->close();
        $db['default'] = array(
            'dsn' => '',
            'hostname' => 'mysql:host=localhost',
            'username' => $user_name,
            'password' => $user_pass,
            'database' => $dbname,
            'dbdriver' => 'pdo',
            'dbprefix' => '',
            'pconnect' => FALSE,
            'db_debug' => (ENVIRONMENT !== 'production'),
        );
        $filename = base_url() . 'blazedesk.sql';
        $data_filename = base_url() . 'default_superadmin_user_create.sql';
        $con = new mysqli($servername, $username, $password, $dbname);
        $conmaster = new mysqli($servername, $username, $password, 'masterblazedeskcrm');

// Temporary variable, used to store current query
        $templine = '';
// Read in entire file
        $lines = file($filename);
// Loop through each line
        foreach ($lines as $line) {
// Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || $line == '')
                continue;
// Add this line to the current segment
            $templine .= $line;
// If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';') {
                // Perform the query
                $con->query($templine);
                // Reset temp variable to empty
                $templine = '';
            }
        }

        //import data
        $templine_data = '';
        // Read in entire file
        $lines_data = file($data_filename);
        // Loop through each line
        foreach ($lines_data as $line_data) {
            // Skip it if it's a comment
            if (substr($line_data, 0, 2) == '--' || $line_data == '')
                continue;
            // Add this line to the current segment
            $templine_data .= $line_data;
            // If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line_data), -1, 1) == ';') {
                // Perform the query
                $con->query($templine_data);
                // Reset temp variable to empty
                $templine_data = '';
            }
        }
        $adminpwd = rand();
        $qry = "UPDATE blzdsk_login set firstname = '$firstname', lastname='$lastname',email='$email',password=md5($upassword),created_date=now(),modified_date=now() where login_id = 27";
        $con->query($qry);

        //       $qrymaster = "INSERT INTO blzdsk_setup_master (email,total_user,support_user,crm_user,pm_user,login_id)
        //VALUES ('$adminuser','$total_user','$is_support','$is_crm','$is_pm','27',$crm_flag,$pm_flag,$support_flag)";
        //       $conmaster->query($qrymaster);
        $qrymaster = "INSERT INTO blzdsk_setup_master (domain_name,company_name,email,total_user,support_user,crm_user,pm_user,login_id, is_crm,is_pm,is_support,start_date)
VALUES ('$dbname','$companyName','$email',1000,1000,1000,1000,'27',1,1,1,NOW())";
        $conmaster->query($qrymaster);

        echo "Tables imported successfully";
        exit;
    }

}