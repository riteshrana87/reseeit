<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location_user_account extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('imageupload_model');
        $this->type = USERS_SITE;
        $this->viewname = $this->uri->segment(2);
    }
    public function index($data='')
    {
        $user_session = $this->session->userdata('reseeit_user_session');

        $table            = USER_TABLE.' as u';
        $where            = array('u.activated' => "'active'");

        $fields = array('u.user_id', 'u.role_id', 'u.username', 'u.email', 'u.user_img', 'u.activated', 'u.fullname', 'u.register_type','u.last_name','u.first_name','rl.role_name','co.com_id','co.com_name','cl.address','cl.	com_location_id','cl.state','cl.city','cl.zipcode','cl.description','u.phone_number');

        $join_tables      =  array('rst_roles as rl' =>'rl.role_id = u.role_id','rst_company as co' =>'co.user_id = u.user_id','rst_company_location as cl' =>'cl.user_id = u.user_id');
        $match = array('u.user_id' => $user_session['user_id']);
        $data['userlist'] = $this->general_model->get_records($table,$fields,$join_tables,'left',$match,'','','','','','',$where);

        $data['msg'] = $this->session->flashdata('msg');
        $this->load->view('location_user_account', $data);
    }

    /*
   Author : Ritesh rana
   Desc   : insert user
   Input  : Post value
   Output : insert value
   Date   :18/11/2015
   */
    public function insert_data()
    {
        //    pr($_POST);exit;
        //pr($_FILES);exit;
        $client_data['fullname'] = $_POST['first_name'].' '.$_POST['last_name'];
        $client_data['first_name'] =  $_POST['first_name'];
        $client_data['last_name'] =  $_POST['last_name'];
        $client_data['phone_number'] =  $_POST['phone_number'];
        $where = array('user_id' => $_POST['user_id']);
        $this->general_model->update(USER_TABLE, $client_data, $where);

        $com_data['user_id'] =  $_POST['user_id'];
        $com_data['com_name'] =  $_POST['com_name'];
        $com_data['added_date']     = db_datetimeformat();
        $com_id = $this->general_model->insert(COMPANY,$com_data);

        $company_data['com_id'] =  $com_id;
        $company_data['user_id'] =  $_POST['user_id'];
        $company_data['address'] =  $_POST['address'];
        $company_data['state'] =  $_POST['state'];
        $company_data['city'] =  $_POST['city'];
        $company_data['zipcode'] =  $_POST['zipcode'];
        $company_data['description'] =  trim($_POST['description']);

        $map_info = $this->get_latlong_val($_POST['address'], $com_data['com_name'], $_POST['zipcode'], $_POST['city']);

        $company_data['lat'] = $map_info['lat'];
        $company_data['long'] = $map_info['long'];
        $company_data['added_date'] = $com_data['added_date'];
       $company_id= $this->general_model->insert(COMPANY_LOCATION,$company_data);

        if($company_id){
            $msg = $this->lang->line('update_successfully');
            $this->session->set_flashdata('message_session', $msg);
            redirect($this->type.'/location_user_account');
        }else{
            $msg = $this->lang->line('plz_try_again');
            $this->session->set_flashdata('message_session', $msg);
            redirect($this->type.'/location_user_account');
        }

    }

    public function update_data()
    {
        //pr($_POST);exit;
        //pr($_FILES);exit;
        $client_data['fullname'] = $_POST['first_name'].' '.$_POST['last_name'];
        $client_data['first_name'] = $_POST['first_name'];
        $client_data['last_name'] = $_POST['last_name'];

        $client_data['phone_number'] = $_POST['phone_number'];
        $where = array('user_id' => $_POST['user_id']);
        $this->general_model->update(USER_TABLE, $client_data, $where);

        $com_data['user_id'] = $_POST['user_id'];
        $com_data['com_name'] = $_POST['com_name'];
        $com_data['added_date'] = db_datetimeformat();
        $where = array('com_id' => $_POST['com_id']);
        $com_id = $this->general_model->update(COMPANY, $com_data, $where);

        $company_data['com_id'] = $_POST['com_id'];
        $company_data['user_id'] = $_POST['user_id'];
        $company_data['address'] = $_POST['address'];
        $company_data['state'] = $_POST['state'];
        $company_data['city'] = $_POST['city'];
        $company_data['zipcode'] = $_POST['zipcode'];
        $company_data['description'] =  trim($_POST['description']);
        $map_info = $this->get_latlong_val($_POST['address'], $com_data['com_name'], $_POST['zipcode'], $_POST['city']);

        $company_data['lat'] = $map_info['lat'];
        $company_data['long'] = $map_info['long'];
        $company_data['added_date'] = $com_data['added_date'];
        $where = array('com_location_id' => $_POST['com_location_id']);
        $this->general_model->update(COMPANY_LOCATION, $company_data, $where);

        $msg = $this->lang->line('update_successfully');
        $this->session->set_flashdata('message_session', $msg);
        redirect($this->type . '/location_user_account');



    }




    function get_latlong_val($address, $cname=NULL, $postcode=NULL, $plaats=NULL)
    {
        if($cname == ""){  $prepAddr = str_replace(' ','+',$address.'+'.$postcode.'+'.$plaats);  }
        if($address == "" ){ $prepAddr = str_replace(' ','+',$postcode.'+'.$plaats); }
        else{ $prepAddr = str_replace(' ','+',$cname.'+'.$address.'+'.$postcode.'+'.$plaats);  }

        $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.urlencode($prepAddr).'&sensor=false');
        $output= json_decode($geocode);
        if($output->status == 'ZERO_RESULTS')
        {
            $prepPost = str_replace(' ','+',$postcode.'+'.$plaats);
            $geocode_post=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepPost.'&sensor=false');
            $output_post= json_decode($geocode_post);
            if($output_post->status == 'ZERO_RESULTS')
            {
                $prepPost = str_replace(' ','+',$plaats);
                $geocode_post=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepPost.'&sensor=false');
                $output_post= json_decode($geocode_post);
                $latitude = $output_post->results[0]->geometry->location->lat;
                $longitude = $output_post->results[0]->geometry->location->lng;

                $map_array = array('lat'=>$latitude, 'long'=>$longitude);
            }
            else
            {
                $latitude = $output_post->results[0]->geometry->location->lat;
                $longitude = $output_post->results[0]->geometry->location->lng;
                $map_array = array('lat'=>$latitude, 'long'=>$longitude);
            }
        }
        else
        {
            $latitude = $output->results[0]->geometry->location->lat;
            $longitude = $output->results[0]->geometry->location->lng;
            $map_array = array('lat'=>$latitude, 'long'=>$longitude);
        }
        return $map_array;
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

}
