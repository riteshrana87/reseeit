<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loyalty_interactions extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('imageupload_model');
        $this->type = USERS_SITE;
        $this->viewname = $this->uri->segment(2);
        $this->users_div = $this->db->dbprefix('users_devicetoken');
    }
    public function index($data='')
    {
        $user_session = $this->session->userdata('reseeit_user_session');

        $field = array('user_id', 'role_id', 'username', 'email', 'user_img', 'activated', 'fullname', 'register_type','first_name');
        $match = array('user_id' => $user_session['user_id']);
        $data['userrecord'] = $this->general_model->get_records(USER_TABLE, $field, '', '', $match);

        /*$table            = INTERACTION.' as i';
        $fields           = array('i.*');

        $match = array('li.user_id' => $user_session['user_id']);
        $data['loyalty_data'] = $this->general_model->get_records($table,$fields,'','',$match,'','','','','','','');
*/

        $table            = INTERACTION.' as i';
        $fields           = array('*');
        $join_tables      =  array('rst_loyalty_interactions as li' =>'li.interaction_id = i.interaction_id');

        $match = array('i.user_id' => $user_session['user_id']);
        $data['loyalty_data']  = $this->general_model->get_records($table,$fields,$join_tables,'left','',$match,'','','','','','');

      // pr($data['loyalty_data']);exit;
        $data['msg'] = $this->session->flashdata('msg');
        $this->load->view('loyalty_interactions', $data);
    }

    /*
   Author : Ritesh rana
   Desc   : insert Loyalty Interactions
   Input  : Post value
   Output : insert value
   Date   :24/11/2015
   */
    public function insert_data()
    {
        //pr($_POST);exit;

        $user_session = $this->session->userdata('reseeit_user_session');
        $interact_data['user_id'] = $user_session['user_id'];
        $interact_data['start_date'] = $_POST['start_date'];
        $interact_data['expiry_date'] = $_POST['expiry_date'];
        $interact_data['default_interaction'] = $_POST['default_interaction'];
        $interact_data['type'] = 'default';

        if (isset($interact_data['start_date']) && $interact_data['start_date'] != "" && isset($interact_data['expiry_date']) && $interact_data['expiry_date'] != "" && isset($interact_data['default_interaction']) && $interact_data['default_interaction'] != "") {

            $external_link = $interact_data['default_interaction'];
            $interact_data['default_interaction_type'] = $this->mime_content_type($external_link);

            $interaction_id = $this->general_model->insert(INTERACTION, $interact_data);

            if ($interaction_id) {
                for ($i = 0; $i < 6; $i++) {
                    $interact['interaction_id'] = $interaction_id;
                    $interact['link_to_interaction'] = $_POST['link_to_interaction'][$i];
                    $interact['interaction_level'] = $_POST['interaction_level'][$i];
                    $interact['award_points'] = $_POST['award_points'][$i];
                    $interact['introduction_message'] = $_POST['introduction_message'][$i];
                    $interact['tags_text'] = $_POST['tags_text'][$i];
                    $interact_data['type'] = 'interaction';
                    $interact['added_date'] = db_datetimeformat();
                    $interaction_link = $_POST['link_to_interaction'][$i];
                    $interact['link_to_interaction_type'] = $this->mime_content_type($interaction_link);
                    $this->general_model->insert(LOYALTY_INTERACTION, $interact);

                    if(!empty($interact['introduction_message'])) {
                        $this->push_notification($interact['introduction_message']);
                        $this->gcm_cust_notification($interact['introduction_message']);
                    }

                }
                $msg = $this->lang->line('common_add_success_msg');
                $this->session->set_flashdata('message_session', $msg);
                redirect($this->type . '/loyalty_interactions');
            }
        }else {

                $msg = $this->lang->line('please insert a Start date,End date,Default interaction');
                $this->session->set_flashdata('message_session', $msg);
                redirect($this->type . '/loyalty_interactions');
            }

    }
    public function update_data()
    {
        //echo FCPATH;exit;
       // pr($_POST);exit;
        $user_session = $this->session->userdata('reseeit_user_session');
        $interact_data['user_id'] = $user_session['user_id'];
        $interact_data['start_date'] = $_POST['start_date'];
        $interact_data['expiry_date'] = $_POST['expiry_date'];
        $interact_data['default_interaction'] = $_POST['default_interaction'];
        $interact_data['interaction_id'] = $_POST['interaction_id'];

        $external_link = $interact_data['default_interaction'];
        $interact_data['default_interaction_type'] = $this->mime_content_type($external_link);

        $where = array('interaction_id' => $interact_data['interaction_id']);
        $this->general_model->update(INTERACTION, $interact_data, $where);

        for($i=0;$i<6;$i++)
        {
            $interact['loyalty_interaction_id'] =$_POST['loyalty_interaction_id'][$i];
            $interact['link_to_interaction'] = $_POST['link_to_interaction'][$i];
            $interact['interaction_level'] = $_POST['interaction_level'][$i];
            $interact['award_points'] = $_POST['award_points'][$i];
            $interact['introduction_message'] = $_POST['introduction_message'][$i];
            $interact['tags_text'] = $_POST['tags_text'][$i];
            $interact['added_date']     = db_datetimeformat();


            $interaction_link = $_POST['link_to_interaction'][$i];
            $interact['link_to_interaction_type'] = $this->mime_content_type($interaction_link);

         //   pr($interact['link_to_interaction_type']);exit;


            $where = array('loyalty_interaction_id' => $interact['loyalty_interaction_id']);
            $this->general_model->update(LOYALTY_INTERACTION, $interact, $where);
        if(!empty($interact['introduction_message'])) {
                $this->push_notification($interact['introduction_message']);
                $this->gcm_cust_notification($interact['introduction_message']);
           }


        }
        $msg = $this->lang->line('common_edit_success_msg');
        $this->session->set_flashdata('message_session', $msg);
        redirect($this->type.'/loyalty_interactions');
    }

    function mime_content_type($filename) {

        $mime_types = array(

            'txt' => 'text',
            'htm' => 'text',
            'html' => 'text',
            'php' => 'text',
            'css' => 'text',
            'js' => 'application',
            'json' => 'application',
            'xml' => 'application',
            'swf' => 'application',
            'flv' => 'video',

            // images
            'png' => 'image',
            'jpe' => 'image',
            'jpeg' => 'image',
            'jpg' => 'image',
            'gif' => 'image',
            'bmp' => 'image',
            'ico' => 'image',
            'tiff' => 'image',
            'tif' => 'image',
            'svg' => 'image',
            'svgz' => 'image',

            // archives
            'zip' => 'application',
            'rar' => 'application',
            'exe' => 'application',
            'msi' => 'application',
            'cab' => 'application',

            // audio/video
            'mp3' => 'audio',
            'qt' => 'video',
            'mov' => 'video',
            'm4v' =>'video',

            // adobe
            'pdf' => 'application',
            'psd' => 'image',
            'ai' => 'application',
            'eps' => 'application',
            'ps' => 'application',

            // ms office
            'doc' => 'application',
            'rtf' => 'application',
            'xls' => 'application',
            'ppt' => 'application',
            'docx' => 'application',

            // open office
            'odt' => 'application',
            'ods' => 'application',
        );

        $ext = @strtolower(array_pop(explode('.',$filename)));

        if (array_key_exists($ext, $mime_types)) {
            return $mime_types[$ext];
        }elseif(function_exists('finfo_open')) {
            /*$finfo = @finfo_open(FILEINFO_MIME);
            $mimetype = @finfo_file($finfo, $filename);
            finfo_close($finfo);
            */
            $finfo = 'video';
            return $finfo;
        }
        else {
            return 'application/octet-stream';
        }
    }
    public function push_notification($message)
    {
        //echo $_SERVER['DOCUMENT_ROOT'];exit;
        $field = array("user_deviceid");
        $match = array('device_type' => 'ios','CHAR_LENGTH(user_deviceid) >='=> 31);
        $users_info = $this->general_model->get_records($this->users_div, $field, '', '', $match);
        //pr($users_info);exit;
            foreach ($users_info as $users) {
                $deviceToken = $users['user_deviceid'];

                $passphrase = '';
                $ctx = stream_context_create();
                $filename = $_SERVER['DOCUMENT_ROOT'].'/reseeit/uploads/certificate/pushcert.pem';

                stream_context_set_option($ctx, 'ssl', 'local_cert', $filename);
                stream_context_set_option($ctx, 'ssl', '', $passphrase);

// Open a connection to the APNS server
                $fp = stream_socket_client(
                   /* 'ssl://gateway.sandbox.push.apple.com:2195', $err,*/
                    'ssl://gateway.push.apple.com:2195', $err,
                    $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

/*                if (!$fp)
                    exit("Failed to connect: $err $errstr" . PHP_EOL);

                echo 'Connected to APNS' . PHP_EOL;*/

// Create the payload body
                $body['aps'] = array(
                    'alert' => $message,
                    'sound' => 'default'
                );

// Encode the payload as JSON
                $payload = json_encode($body);

// Build the binary notification
  $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

// Send it to the server
                $result = fwrite($fp, $msg, strlen($msg));
               /* if (!$result)
                    echo 'Message not delivered' . PHP_EOL;
                else
                    echo
                        'Message successfully delivered'.PHP_EOL;
                    */
// Close the connection to the server
                fclose($fp);



            }

    }

   public function gcm_cust_notification($dynamic_message,$start_lmt=NULL,$end_lmt=NULL,$post_ID=NULL,$slug=NULL){
       $registatoin_ids = array();
       $i=0;

       $dynamic_message = "'".$dynamic_message."'";

       $field = array("user_deviceid");
       $match = array('device_type' => 'android');
       $device_tokan = $this->general_model->get_records($this->users_div, $field, '', '', $match);
        //pr($device_tokan);exit;


       $url = 'https://android.googleapis.com/gcm/send';
        foreach($device_tokan as $result) {
            $registatoin_ids[] = $result['user_deviceid'];
        }

       //$registatoin_ids = array('APA91bGZ0ZTgHiph9BjmbcPtTOly1kVibPDMS9F1T_utSY5ECOHHbgYKD-SDGWNW7lM1PQTDqr8tNRbmO19j1PEYEhUHhA_AOyFjvkCNpOMwg56soSesaRA');
       $message = array("message" => $dynamic_message);
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
