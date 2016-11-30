<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Active_adds extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_admin_login();
        $this->app_ads = $this->db->dbprefix('app_ads');
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
        $searchtext = '';
        $perpage = '';
        $searchtext = $this->input->post('searchtext');
        $sortfield = $this->input->post('sortfield');
        $sortby = $this->input->post('sortby');
        $perpage = $this->input->post('perpage');
        $allflag = $this->input->post('allflag');
        if (!empty($allflag) && ($allflag == 'all' || $allflag == 'changesorting' || $allflag == 'changesearch')) {
            $this->session->unset_userdata('active_add_sortsearchpage_data');
        }
        $searchsort_session = $this->session->userdata('active_add_sortsearchpage_data');
        //Sorting

        if (!empty($sortfield) && !empty($sortby)) {
            $data['sortfield'] = $sortfield;
            $data['sortby'] = $sortby;
        } else {
            if (!empty($searchsort_session['sortfield'])) {
                $data['sortfield'] = $searchsort_session['sortfield'];
                $data['sortby'] = $searchsort_session['sortby'];
                $sortfield = $searchsort_session['sortfield'];
                $sortby = $searchsort_session['sortby'];
            } else {
                $sortfield = 'adds.user_id';
                $sortby = 'desc';
                $data['sortfield'] = $sortfield;
                $data['sortby'] = $sortby;
            }
        }
        //Search text
        if (!empty($searchtext)) {
            $data['searchtext'] = $searchtext;
        } else {
            if (empty($allflag) && !empty($searchsort_session['searchtext'])) {
                $data['searchtext'] = $searchsort_session['searchtext'];
                $searchtext = $data['searchtext'];
            } else {
                $data['searchtext'] = '';
            }
        }

        if (!empty($perpage) && $perpage != 'null') {
            //$perpage = $this->input->post('perpage');
            $data['perpage'] = $perpage;
            $config['per_page'] = $perpage;
        } else {
            if (!empty($searchsort_session['perpage'])) {
                $data['perpage'] = trim($searchsort_session['perpage']);
                $config['per_page'] = trim($searchsort_session['perpage']);
            } else {
                $config['per_page'] = '10';
                $data['perpage'] = '10';
            }
        }
        //pagination configuration
        $config['first_link'] = 'First';
        $config['base_url'] = base_url() . $this->type . '/' . $this->viewname . '/index';

        if (!empty($allflag) && ($allflag == 'all' || $allflag == 'changesorting' || $allflag == 'changesearch')) {
            $config['uri_segment'] = 0;
            $uri_segment = 0;
        } else {
            $config['uri_segment'] = 4;
            $uri_segment = $this->uri->segment(4);
        }
        //Query
        $table = APP_ADS_TABLE . ' as adds';

        if(!empty(is_numeric($searchtext))== 0){
            $where = '';
        }elseif(!empty($searchtext) == 1){
                $where = array('adds.status' => 1);
           }elseif(!empty($searchtext)==0){
                $where = array('adds.status' => 0);
        }

        $fields = array('*');
        $join_tables   =  array('rst_users as ud' =>'adds.user_id = ud.user_id');
    if(!empty($searchtext))
        {
            $searchtext = html_entity_decode(trim($searchtext));
            //    $match=array('u.fullname'=>$searchtext);
        $data['datalist']  = $this->general_model->get_records($table,$fields,$join_tables,'left','','',$config['per_page'],$uri_segment,$sortfield,$sortby,'',$where);
            $config['total_rows']  = $this->general_model->get_records($table,$fields,$join_tables,'left','','','','',$sortfield,$sortby,'',$where,'','','1');
            //echo $this->db->last_query();exit;
        }
        else
        {
            $data['datalist']      = $this->general_model->get_records($table,$fields,$join_tables,'left','','',$config['per_page'],$uri_segment,$sortfield,$sortby,'',$where);
//            echo $this->db->last_query();exit;
            $config['total_rows']  = $this->general_model->get_records($table,$fields,$join_tables,'left','','','','',$sortfield,$sortby,'',$where,'','','1');
        }

        //pr($data['datalist']);exit;
        //pr($this->db->last_query());exit;
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
        $this->session->set_userdata('active_add_sortsearchpage_data', $sortsearchpage_data);

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
        $fields = array('ri.receipt_id', 'ri.user_id', 'ri.pro_id', 'ri.img_text', 'ri.receipt_img', 'ri.receipt_point', 'ri.added_date', 'ri.modified_date','ri.status','u.fullname','ud.user_deviceid','ud.device_type');

        $join_tables   =  array('rst_users as u' =>'ri.user_id = u.user_id','rst_users_devicetoken as ud' =>'ud.user_id = u.user_id');

        $user_device_token = $this->general_model->get_records($table,$fields,$join_tables,'left','','','','','','','',$where);

        $point = 10;
        $noviah_points = 20;
        $non_profit_points = 15;

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

        $device_token = $user_device_token[0]['user_deviceid'];
        $message ='Your receipt is approved by Noviah Technology';
        $user_id = $user_device_token[0]['user_id'];
        $receipt_id = $user_device_token[0]['receipt_id'];
        $ern_point = $com_data_total['noviah_points_totals'];
        $status = 'Approved';

        if($user_device_token[0]['device_type'] == 'ios'){
            $this->push_notification($device_token,$message,$user_id,$receipt_id,$ern_point,$status);
        }

        if($user_device_token[0]['device_type'] == 'android'){
            $this->gcm_cust_notification($device_token,$message,$user_id,$receipt_id,$ern_point,$status);
        }
        $searchsort_session = $this->session->userdata('active_add_sortsearchpage_data');
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
        //pr($user_device_token);exit;
        $device_token = $user_device_token[0]['user_deviceid'];
        $message ='Your receipt is not approved by Noviah Technology';
        $user_id = $user_device_token[0]['user_id'];
        $receipt_id = $user_device_token[0]['receipt_id'];
        $ern_point = 100;
        $status = 'Not Approved';
        if($user_device_token[0]['device_type'] == 'ios'){
            $this->push_notification($device_token,$message,$user_id,$receipt_id,$ern_point,$status);
        }

        if($user_device_token[0]['device_type'] == 'android'){
            $this->gcm_cust_notification($device_token,$message,$user_id,$receipt_id,$ern_point,$status);
        }

        $searchsort_session = $this->session->userdata('active_add_sortsearchpage_data');
        $pagingid = $searchsort_session['uri_segment'];
        redirect($this->type.'/'.$this->viewname.'/index/'.$pagingid);
    }

    public function push_notification($deviceToken,$message,$user_id,$receipt_id,$ern_point,$status)
    {
        $passphrase = '';
        $ctx = stream_context_create();
        $filename = $_SERVER['DOCUMENT_ROOT'].'/reseeit/uploads/certificate/pushcert.pem';
        //$filename = 'uploads/certificate/pushcert.pem';

        stream_context_set_option($ctx, 'ssl', 'local_cert', $filename);
        stream_context_set_option($ctx, 'ssl', '', $passphrase);

// Open a connection to the APNS server
        $fp = stream_socket_client(
            'ssl://gateway.sandbox.push.apple.com:2195', $err,
            $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

        if (!$fp)
            exit("Failed to connect: $err $errstr" . PHP_EOL);

        echo 'Connected to APNS' . PHP_EOL;

// Create the payload body
        $body['aps'] = array(
            'alert' => $message,
            'sound' => 'default'
        );
        $body['userdata'] = array(
            'user_id' => $user_id,
            'receipt_id' => $receipt_id,
            'EarningPoint' => (string)$ern_point,
            'status'=>$status,
        );

// Encode the payload as JSON
        $payload = json_encode($body);

// Build the binary notification
        $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

// Send it to the server
        $result = fwrite($fp, $msg, strlen($msg));

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

    function unpublish_record()
    {
        $id = $this->input->post('id');
        $array_data = $this->input->post('myarray');
        if(!empty($id))
        {
            $status = $this->input->post('status');
            $cdata['status'] = $status;
            $this->general_model->update(APP_ADS_TABLE,$cdata,array('app_ads_id'=>$id));
        }
        if(!empty($array_data))
        {
            for($i=0;$i<count($array_data);$i++)
            {
                $where = array('app_ads_id' => $array_data[$i]);
                $cdata['status'] = '1';
                $this->general_model->update(APP_ADS_TABLE,$cdata,$where);
            }
        }

        $searchsort_session = $this->session->userdata('active_add_sortsearchpage_data');
        $pagingid = $searchsort_session['uri_segment'];
        echo $pagingid;
    }

    /*
    @Description: Function for publish User Profile By Admin
    @Author: Niral Patel
    @Input: - Delete id which User record want to publish
    @Output: - New User list after record is publish.
    @Date: 26-10-2015
    */
    function publish_record()
    {
        $id = $this->input->post('id');
        $array_data = $this->input->post('myarray');
        if(!empty($id))
        {
            $status = $this->input->post('status');
            $cdata['status'] = $status;
            $this->general_model->update(APP_ADS_TABLE,$cdata,array('app_ads_id'=>$id));
        }
        if(!empty($array_data))
        {
            for($i=0;$i<count($array_data);$i++)
            {
                $where = array('app_ads_id' => $array_data[$i]);
                $cdata['status'] = '0';
                $this->general_model->update(APP_ADS_TABLE,$cdata,$where);
            }
        }
        $searchsort_session = $this->session->userdata('active_add_sortsearchpage_data');
        $pagingid = $searchsort_session['uri_segment'];
        echo $pagingid;
    }
}
