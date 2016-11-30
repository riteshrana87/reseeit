<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class receiptlist extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_admin_login();
        $this->earning_point = $this->db->dbprefix('earning_point');
        $this->earning_total_point = $this->db->dbprefix('earning_total_point');
        $this->company = $this->db->dbprefix('company');
        $this->load->model('imageupload_model');
        $this->type = ADMIN_SITE;
        $this->viewname = $this->uri->segment(2);


    }
    /*
    Author : Ritesh Ranaa
    Desc   : Display user list
    Input  :
    Output :
    Date   :04/11/2015
    */
    public function index()
    {
        $searchtext='';$perpage='';
        $searchtext = $this->input->post('searchtext');
        $sortfield  = $this->input->post('sortfield');
        $sortby     = $this->input->post('sortby');
        $perpage    = $this->input->post('perpage');
        $allflag    = $this->input->post('allflag');

        if(!empty($allflag) && ($allflag == 'all' || $allflag == 'changesorting' || $allflag == 'changesearch')) {
            $this->session->unset_userdata('user_sortsearchpage_data');
        }

        $searchsort_session = $this->session->userdata('user_sortsearchpage_data');
        //Sorting
        if(!empty($sortfield) && !empty($sortby))
        {
            $data['sortfield'] = $sortfield;
            $data['sortby'] = $sortby;
        }
        else
        {
            if(!empty($searchsort_session['sortfield']))
            {
                $data['sortfield'] = $searchsort_session['sortfield'];
                $data['sortby'] = $searchsort_session['sortby'];
                $sortfield = $searchsort_session['sortfield'];
                $sortby = $searchsort_session['sortby'];
            }
            else
            {
                $sortfield = 'ri.receipt_id';
                $sortby = 'desc';
                $data['sortfield']		= $sortfield;
                $data['sortby']			= $sortby;
            }
        }
        //Search text
        if(!empty($searchtext))
        {
            $data['searchtext'] = $searchtext;
        } else
        {
            if(empty($allflag) && !empty($searchsort_session['searchtext']))
            {
                $data['searchtext'] = $searchsort_session['searchtext'];
                $searchtext =  $data['searchtext'];
            }
            else
            {
                $data['searchtext'] = '';
            }
        }
        if(!empty($perpage) && $perpage != 'null')
        {
            //$perpage = $this->input->post('perpage');
            $data['perpage'] = $perpage;
            $config['per_page'] = $perpage;
        }
        else
        {
            if(!empty($searchsort_session['perpage'])) {
                $data['perpage'] = trim($searchsort_session['perpage']);
                $config['per_page'] = trim($searchsort_session['perpage']);
            } else {
                $config['per_page'] = '10';
                $data['perpage'] = '10';
            }
        }
        //pagination configuration
        $config['first_link']  = 'First';
        $config['base_url']    = base_url().$this->type.'/'.$this->viewname.'/index';

        if(!empty($allflag) && ($allflag == 'all' || $allflag == 'changesorting' || $allflag == 'changesearch')) {
            $config['uri_segment'] = 0;
            $uri_segment = 0;
        } else {
            $config['uri_segment'] = 4;
            $uri_segment = $this->uri->segment(4);
        }
        //Query
        $table            = RECEIPT_IMAGE.' as ri';
        //pr($searchtext);exit;
        if(!empty($searchtext) == "offer_received"){
            $where = array('ri.status' => "'$searchtext'");
        }elseif(!empty($searchtext)== "offer_not_received"){
            $where = array('ri.status' => "'$searchtext'");
        }else{
            $where = array('ri.status' => "''");
       }

       // $where = array('ri.status' => "''");
        $fields = array('ri.receipt_id', 'ri.user_id', 'ri.pro_id', 'ri.img_text', 'ri.receipt_img', 'ri.receipt_point', 'ri.added_date', 'ri.modified_date','ri.status','u.fullname');

        $join_tables   =  array('rst_users as u' =>'ri.user_id = u.user_id');
        if(!empty($searchtext))
        {
            $searchtext = html_entity_decode(trim($searchtext));
            $match=array('u.fullname'=>$searchtext,'u.user_id'=>$searchtext,'ri.status'=>$searchtext);
            $data['datalist']  = $this->general_model->get_records_data($table,$fields,$join_tables,'left','',$match,$config['per_page'],$uri_segment,$sortfield,$sortby,'',$where);
            $config['total_rows']  = $this->general_model->get_records_data($table,$fields,$join_tables,'left','',$match,'','',$sortfield,$sortby,'',$where,'','','1');

        //pr($this->db->last_query());exit;
        }
        else
        {

            $data['datalist']      = $this->general_model->get_records_data($table,$fields,$join_tables,'left','','',$config['per_page'],$uri_segment,$sortfield,$sortby,'',$where);
            //pr($data['datalist']);exit;
            $config['total_rows']  = $this->general_model->get_records_data($table,$fields,$join_tables,'left','','','','',$sortfield,$sortby,'',$where,'','','1');
        }

        //echo $this->db->last_query();exit;
//pr($data['datalist']);exit;
        $this->ajax_pagination->initialize($config);
        $data['pagination']  = $this->ajax_pagination->create_links();
        $data['uri_segment'] = $uri_segment;
        $sortsearchpage_data = array(
            'sortfield'  => $data['sortfield'],
            'sortby'     => $data['sortby'],
            'searchtext' => $data['searchtext'],
            'perpage'    => trim($data['perpage']),
            'uri_segment'=> $uri_segment,
            'total_rows' => $config['total_rows']);
        $this->session->set_userdata('user_sortsearchpage_data', $sortsearchpage_data);

        $data['client_data'] = $this->general_model->client_user_data_list();
      //  pr($data['client_data']);exit;

        if($this->input->post('result_type') == 'ajax')
        {
            $this->load->view($this->type.'/'.$this->viewname.'/ajax_list',$data);
        }
        else
        {
            $data['main_content'] = $this->type.'/'.$this->viewname.'/list';
            $this->load->view($this->type.'/assets/template',$data);
        }

    }

    public function check_user()
    {
        $id = $this->input->post('id');
        $email= $this->input->post('email');
        $match=array('email'=>$email);
        $exist_email = $this->general_model->get_records(USER_TABLE,array('user_id'), '', '',$match);
        //pr($exist_email);
        if(!empty($exist_email))
        {
            if($exist_email[0]['user_id'] == $id)
            {
                echo '0';
            }
            else
            {
                echo '1';
            }
        }
        else
        {
            echo '0';
        }
    }

    public function approve_receipt_image($receipt_id){
        $receipt_data['status'] = 'offer_received';
        $where = array('receipt_id' => $receipt_id);
        $this->general_model->update(RECEIPT_IMAGE, $receipt_data, $where);

        $table            = RECEIPT_IMAGE.' as ri';
        $where = array('receipt_id' => $receipt_id);
        $fields = array('ri.receipt_id', 'ri.user_id', 'ri.pro_id', 'ri.img_text', 'ri.receipt_img', 'ri.receipt_point', 'ri.added_date', 'ri.modified_date','ri.status','u.fullname','ud.user_deviceid','ud.device_type','u.client_type_id');

        $join_tables   =  array('rst_users as u' =>'ri.user_id = u.user_id','rst_users_devicetoken as ud' =>'ud.user_id = u.user_id');

        $user_device_token = $this->general_model->get_records($table,$fields,$join_tables,'left','','','','','','','',$where);
        $table_point            = POINT_ADD.' as pd';
        $wheres = array('pd.reward_type_id' => $user_device_token[0]['reward_type_id']);
        $point_fields = array('pd.*');
        $user_point = $this->general_model->get_records($table_point,$point_fields,'','','','','','','','','',$wheres);

        $point = 0;//$user_point[0]['client_points_earned'];
        $noviah_points = 1;
        $non_profit_points = 0;//$user_point[0]['non_profit_points_earned'];


        $com_data['user_id'] = $user_device_token[0]['user_id'];
        $com_data['client_points_earned'] = $point;
        $com_data['noviah_points_earned'] = $noviah_points;
        $com_data['non_profit_points_earned'] = $non_profit_points;

        $field = array('*');
        $match = array('user_id' => $com_data['user_id']);
        $get_last_earn_point = $this->general_model->get_records($this->earning_total_point, $field, '', '', $match);

        if(!empty($get_last_earn_point)){
            $com_data_total['user_id'] = $user_device_token[0]['user_id'];
            $com_data_total['client_points_totals'] = $point + $get_last_earn_point[0]['client_points_totals'];

            $com_data_total['noviah_points_totals'] = $noviah_points + $get_last_earn_point[0]['noviah_points_totals'];

            $com_data_total['non_profit_points_totals'] = $non_profit_points + $get_last_earn_point[0]['non_profit_points_totals'];

            $where = array('earning_total_id' => $get_last_earn_point[0]['earning_total_id']);
            $this->general_model->update($this->earning_total_point, $com_data_total, $where);

           $parent_available[] = $this->general_model->insert($this->earning_point,$com_data);
        }else{
            $com_data_total['user_id'] = $user_device_token[0]['user_id'];
            $com_data_total['client_points_totals'] = $point;
            $com_data_total['noviah_points_totals'] = $noviah_points;
            $com_data_total['non_profit_points_totals'] = $non_profit_points;
            $this->general_model->insert($this->earning_total_point,$com_data_total);
            $parent_available[] = $this->general_model->insert($this->earning_point,$com_data);
        }

        $table            = USERS_DEVICETOKEN.' as ud';
        $where = array('user_id' => $user_device_token[0]['user_id']);
        $fields = array('ud.*');

        $user_device = $this->general_model->get_records($table,$fields,'','','','','','','','','',$where);

    foreach($user_device as $device_data) {
        $device_token = $device_data['user_deviceid'];
        $message = 'Your receipt is approved by Noviah Technology';
        $user_id = $device_data['user_id'];
        $receipt_id = $user_device_token[0]['receipt_id'];
        $ern_point = $com_data_total['noviah_points_totals'];
        $status = 'Approved';
        echo $device_token.'</br>'.$message.'</br>'.$user_id.'</br>'.$receipt_id.'</br>'.$ern_point.'</br>'.$status;

        if ($user_device_token[0]['device_type'] == 'ios') {
            $this->push_notification($device_token, $message, $user_id, $receipt_id, $ern_point, $status);
        }

        if ($user_device_token[0]['device_type'] == 'android') {
            $this->gcm_cust_notification($device_token, $message, $user_id, $receipt_id, $ern_point, $status);
        }

    }
       $user_id = $user_device_token[0]['user_id'];
       $msg = 'successfully approved receipt';
       $this->session->set_flashdata('user_id', $user_id);
       $this->session->set_flashdata('message_session', $msg);
       $searchsort_session = $this->session->userdata('user_sortsearchpage_data');
       $pagingid = $searchsort_session['uri_segment'];
       redirect($this->type.'/'.$this->viewname.'/index/'.$pagingid);
    }

    public function not_approve_receipt_image($receipt_id){
        $receipt_data['status'] = 'offer_not_received';
        $where = array('receipt_id' => $receipt_id);
        $this->general_model->update(RECEIPT_IMAGE, $receipt_data, $where);

        $table            = RECEIPT_IMAGE.' as ri';
        $where = array('receipt_id' => $receipt_id);
        $fields = array('ri.receipt_id', 'ri.user_id', 'ri.pro_id', 'ri.img_text', 'ri.receipt_img', 'ri.receipt_point', 'ri.added_date', 'ri.modified_date','ri.status','u.fullname','ud.user_deviceid','ud.device_type');
        $join_tables   =  array('rst_users as u' =>'ri.user_id = u.user_id','rst_users_devicetoken as ud' =>'ud.user_id = u.user_id');
        $user_device_token = $this->general_model->get_records($table,$fields,$join_tables,'left','','','','','','','',$where);

        $table            = USERS_DEVICETOKEN.' as ud';
        $where = array('user_id' => $user_device_token[0]['user_id']);
        $fields = array('ud.*');

        $user_device = $this->general_model->get_records($table,$fields,'','','','','','','','','',$where);
        //pr($user_device);exit;
foreach($user_device as $device_data){
        $device_token = $device_data['user_deviceid'];
        $message ='Your receipt is not approved by Noviah Technology';
        $user_id = $device_data['user_id'];
        $receipt_id = $user_device_token[0]['receipt_id'];
        $ern_point = 100;
        $status = 'Not Approved';
        $device_token.'</br>'.$message.'</br>'.$user_id.'</br>'.$receipt_id.'</br>'.$ern_point.'</br>'.$status;

        if($device_data['device_type'] == 'ios'){
            $this->push_notification($device_token,$message,$user_id,$receipt_id,$ern_point,$status);
        }

        if($device_data['device_type'] == 'android'){
            $this->gcm_cust_notification($device_token,$message,$user_id,$receipt_id,$ern_point,$status);
        }

}
        $searchsort_session = $this->session->userdata('user_sortsearchpage_data');
        $pagingid = $searchsort_session['uri_segment'];
        redirect($this->type.'/'.$this->viewname.'/index/'.$pagingid);
    }

    public function push_notification($deviceToken,$message,$user_id,$receipt_id,$ern_point,$status)
    {
//        echo $message;exit;

        //$deviceToken = 'b2d38e65dcdfb3a06dda322cf5a62a638930ef73a0242336e00b80d607cece06';
            $passphrase = '';
            $ctx = stream_context_create();
            $filename = $_SERVER['DOCUMENT_ROOT'].'/reseeit/uploads/certificate/pushcert.pem';
            //$filename = 'uploads/certificate/pushcert.pem';

            stream_context_set_option($ctx, 'ssl', 'local_cert', $filename);
            stream_context_set_option($ctx, 'ssl', '', $passphrase);

// Open a connection to the APNS server
            $fp = stream_socket_client(
                //'ssl://gateway.sandbox.push.apple.com:2195', $err,
                'ssl://gateway.push.apple.com:2195', $err,
                $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

         /*   if (!$fp)
                exit("Failed to connect: $err $errstr" . PHP_EOL);

            echo 'Connected to APNS' . PHP_EOL;
         */

// Create the payload body
            $body['aps'] = array(
                'alert' => $message,
                'sound' => 'default',
                'content-available' => 1
            );
            $body['userdata'] = array(
             'user_id' => $user_id,
             'receipt_id' => $receipt_id,
             'EarningPoint' => (string)$ern_point,
             'status'=>$status,
            );
//echo 'test';exit;
// Encode the payload as JSON
            $payload = json_encode($body);

// Build the binary notification
            $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

// Send it to the server
      //  $result = fwrite($fp, $msg, strlen($msg));
            $result = fwrite($fp, $msg, strlen($msg));
        if (!$result)
            echo 'Message not delivered' . PHP_EOL;
        else
            echo 'Message successfully delivered'.PHP_EOL;
//        exit;

// Close the connection to the server
            fclose($fp);
        }

    public function gcm_cust_notification($deviceToken,$message,$user_id,$receipt_id,$ern_point,$status){
        $registatoin_ids = array();
        $i=0;

        $dynamic_message = "'".$message."'";
        $url = 'https://android.googleapis.com/gcm/send';

        $registatoin_ids = array($deviceToken);

        $body['userdata'] = array(
            'user_id' => $user_id,
            'receipt_id' => $receipt_id,
            'EarningPoint' => (string)$ern_point,
            'status'=>$status,
        );

        $message = array("message" => $dynamic_message, $body);

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
    public function receipt_by_addpoint(){
        $point_data['user_id']          = $this->input->post('user_id');
        $user_data_id          = $this->input->post('user_data');

/*        $field = array('*');
        $match = array('user_id' => $point_data['user_id']);
        $user_data = $this->general_model->get_records(USER_TABLE, $field, '', '', $match);
*/
        $field = array('*');
        $match = array('user_id' => $point_data['user_id']);
        $user_data = $this->general_model->get_records(CLIENT_REWARD, $field, '', '', $match);
        $table_point            = POINT_ADD.' as pd';
        $wheres = array('pd.reward_type_id' => $user_data[0]['reward_type_id']);
        $point_fields = array('pd.*');
        $user_point = $this->general_model->get_records($table_point,$point_fields,'','','','','','','','','',$wheres);

        $point = $user_point[0]['client_points_earned'];
        $noviah_points =$user_point[0]['noviah_points_earned'] - 1;
        $noviah_point_data =$user_point[0]['noviah_points_earned'];
        $non_profit_points =$user_point[0]['non_profit_points_earned'];

        $com_data['client_id'] = $point_data['user_id'];
        $com_data['user_id'] = $user_data_id;
        $com_data['client_points_earned'] = $point;
        $com_data['noviah_points_earned'] = $noviah_point_data;
        $com_data['non_profit_points_earned'] = $non_profit_points;

        $field = array('*');
        $match = array('user_id' => $user_data_id);

        $get_last_earn_point = $this->general_model->get_records($this->earning_total_point, $field, '', '', $match);
        //pr($get_last_earn_point);exit;

        if(!empty($get_last_earn_point)){
            $com_data_total['user_id'] = $user_data_id;
            $com_data_total['client_points_totals'] = $point + $get_last_earn_point[0]['client_points_totals'];

            $com_data_total['noviah_points_totals'] = $noviah_points + $get_last_earn_point[0]['noviah_points_totals'];

            $com_data_total['non_profit_points_totals'] = $non_profit_points + $get_last_earn_point[0]['non_profit_points_totals'];

            $where = array('earning_total_id' => $get_last_earn_point[0]['earning_total_id']);
               $this->general_model->update($this->earning_total_point, $com_data_total, $where);
               $parent_available[] = $this->general_model->insert($this->earning_point,$com_data);
        }else{
            $com_data_total['user_id'] = $user_data_id;
            $com_data_total['client_points_totals'] = $point;
            $com_data_total['noviah_points_totals'] = $noviah_points;
            $com_data_total['non_profit_points_totals'] = $non_profit_points;
            $this->general_model->insert($this->earning_total_point,$com_data_total);
            $parent_available[] = $this->general_model->insert($this->earning_point,$com_data);
        }

        $this->session->unset_userdata('message_session');
        $searchsort_session = $this->session->userdata('user_sortsearchpage_data');
        $pagingid = $searchsort_session['uri_segment'];
        redirect($this->type.'/'.$this->viewname.'/index/'.$pagingid);
    }
}
