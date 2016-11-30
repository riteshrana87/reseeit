<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_ads extends CI_Controller {

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

        $field = array('user_id', 'role_id', 'username', 'email', 'user_img', 'activated', 'fullname', 'register_type','first_name');
        $match = array('user_id' => $user_session['user_id']);
        $data['userrecord'] = $this->general_model->get_records(USER_TABLE, $field, '', '', $match);

        $table            = APP_ADS_TABLE.' as at';
        $fields           = array('at.*');

        $match = array('at.user_id' => $user_session['user_id']);
        $data['app_data'] = $this->general_model->get_records($table,$fields,'','',$match,'','','','','','','');
        //pr($data['app_data']);exit;
        $data['msg'] = $this->session->flashdata('msg');
        $this->load->view('app_ads', $data);

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
        //pr($_POST);exit;
        // pr($_FILES);exit;
        $appdata = array();
        for($i=0;$i<4;$i++)
        {
           // pr($_FILES);exit;
            $user_session = $this->session->userdata('reseeit_user_session');
            $appdata['user_id'] = $user_session['user_id'];
            $appdata['status'] =  $_POST['status'][$i];
            $appdata['added_date']     = db_datetimeformat();
        if(!empty($_FILES['app_img']['name'][$i]) && $_FILES['app_img']['name'][$i] != "")
            {
                $allowed_extensions = array( "image/png", "image/jpg", "image/gif","image/jpeg" );
            if(in_array( $_FILES['app_img']['type'][$i], $allowed_extensions )){
                    $oldbookimg                 = $_FILES['app_img']['tmp_name'][$i];//new add
                    $user_rnd = rand();
                    $bgImgPath                  = $this->config->item('app_ads_img_big_path');
                    $smallImgPath               = $this->config->item('app_ads_img_small_path');
                    $uploadFile = 'app_img';
                    $thumb = "thumb";
                    $this->imageupload_model->img_resize( $oldbookimg , 600 , $bgImgPath, $user_rnd.".jpg");
                    $this->imageupload_model->img_resize( $oldbookimg , 120 , $smallImgPath, $user_rnd.".jpg");
                    $appdata['app_img'] = $user_rnd.".jpg";
                }else{
                    $msg = "You may only upload png, jpg,gif,jpeg.";
                    $this->session->set_flashdata('message_session', $msg);
                    redirect($this->type.'/app_ads');
                }
        }
            else
            {
                $appdata['app_img'] = "";
            }

            $this->general_model->insert(APP_ADS_TABLE,$appdata);

        }
        $msg = $this->lang->line('common_add_success_msg');
        $this->session->set_flashdata('message_session', $msg);
        $searchsort_session = $this->session->userdata('user_sortsearchpage_data');
        $pagingid = $searchsort_session['uri_segment'];
        redirect($this->type.'/app_ads');
    }

    public function update_data()
    {
        //pr($_POST);exit;
        //pr($_FILES);exit;
        for($i=0;$i<4;$i++)
        {
            $user_session = $this->session->userdata('reseeit_user_session');
            $appdata['user_id'] = $user_session['user_id'];
            $appdata['status'] =  $_POST['status'][$i];
            $appdata['app_ads_id'] =  $_POST['app_ads_id'][$i];
            $appdata['added_date']     = db_datetimeformat();

            if(!empty($_FILES['app_img']['name'][$i])) {
                $allowed_extensions = array( "image/png", "image/jpg", "image/gif","image/jpeg" );
                if (in_array( $_FILES['app_img']['type'][$i], $allowed_extensions ) ){
                    $oldbookimg = $_FILES['app_img']['tmp_name'][$i];//new add
                    $app_rnd = rand();
                    $bgImgPath = $this->config->item('app_ads_img_big_path');
                    $smallImgPath = $this->config->item('app_ads_img_small_path');
                    $uploadFile = 'app_img';
                    $thumb = "thumb";
                    $this->imageupload_model->img_resize($oldbookimg, 600, $bgImgPath, $app_rnd . ".jpg");
                    $this->imageupload_model->img_resize($oldbookimg, 120, $smallImgPath, $app_rnd . ".jpg");
                    $appdata['app_img'] = $app_rnd . ".jpg";

                    $match = array("app_ads_id" => $appdata['app_ads_id']);
                    $fields = array("app_img");
                    $image_name = $this->general_model->get_records(APP_ADS_TABLE, $fields, '', '', $match);
                    if (file_exists($bgImgPath . $image_name[0]['app_img'])) {
                        unlink($bgImgPath . $image_name[0]['app_img']);
                    }
                    if (file_exists($smallImgPath . $image_name[0]['app_img'])) {
                        unlink($smallImgPath . $image_name[0]['app_img']);
                    }
                }else{
                    $msg = "You may only upload png, jpg,gif,jpeg.";
                    $this->session->set_flashdata('message_session', $msg);
                    redirect($this->type.'/app_ads');
                }

            }else{

                $field = array('app_ads_id', 'app_img');
                $match = array('app_ads_id' => $appdata['app_ads_id']);
                $app_img_data = $this->general_model->get_records(APP_ADS_TABLE, $field, '', '', $match);
                if(count($app_img_data) > 0){
                    $appdata['app_img'] = $app_img_data[0]['app_img'];
                }else{
                    $appdata['app_img'] = "";
                }
            }
            $where = array('app_ads_id' => $appdata['app_ads_id']);
            $this->general_model->update(APP_ADS_TABLE, $appdata, $where);
        }

        $msg = $this->lang->line('common_edit_success_msg');
        $this->session->set_flashdata('message_session', $msg);
        redirect($this->type.'/app_ads');
    }

}
