<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon_featured extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('imageupload_model');
        $this->type = USERS_SITE;
        $this->viewname = $this->uri->segment(2);

    }
    public function index()
    {

    }
    /*
	Author : Ritesh rana
    Desc   : insert user
	Input  : Post value
	Output : insert value
	Date   :04/11/2015
	*/
    public function insert_data()
    {
          //pr($this->input->post('start_date'));exit;
//        /for()
        //pr($_POST);exit;
        //pr($_FILES);exit;

        for($i=0;$i<3;$i++)
        {
            $user_session = $this->session->userdata('reseeit_user_session');
            $cdata['user_id'] = $user_session['user_id'];
            $cdata['coupon_type'] =  $_POST['coupon_type'];
            $cdata['coupon_code'] =  $_POST['coupon_code'][$i];
            $cdata['start_date'] = $_POST['start_date'][$i];
            $cdata['expiry_date'] = $_POST['expiry_date'][$i];
            $cdata['max_number'] = $_POST['max_number'][$i];
            $cdata['summary'] = $_POST['summary'][$i];
            $cdata['tags_text'] = $_POST['tags_text'][$i];
            $cdata['delivery_method'] = $_POST['delivery_method'][$i];
            $cdata['added_date']     = db_datetimeformat();

            if(!empty($_FILES['coupon_img']['name'][$i]))
            {

                $allowed_extensions = array( "image/png", "image/jpg", "image/gif","image/jpeg" );
                if (in_array( $_FILES['coupon_img']['type'][$i], $allowed_extensions ) ){
                    $oldbookimg                 = $_FILES['coupon_img']['tmp_name'][$i];//new add
                    $coupon_rnd = rand();
                    $bgImgPath                  = $this->config->item('coupon_img_big_path');
                    $smallImgPath               = $this->config->item('coupon_img_small_path');
                    $uploadFile = 'coupon_img';
                    $thumb = "thumb";
                    $this->imageupload_model->img_resize( $oldbookimg , 600 , $bgImgPath, $coupon_rnd.".jpg");
                    $this->imageupload_model->img_resize( $oldbookimg , 120 , $smallImgPath, $coupon_rnd.".jpg");
                    $cdata['coupon_img'] = $coupon_rnd.".jpg";
                }else{
                    $msg = "You may only upload png, jpg,gif,jpeg.";
                    $this->session->set_flashdata('message_session', $msg);
                    redirect($this->type);
                }
            }else{
                $cdata['coupon_img'] = "";
            }

            if(!empty($_FILES['detailed_coupon_img']['name'][$i]))
            {
                $allowed_extensions = array( "image/png", "image/jpg", "image/gif","image/jpeg" );
                if (in_array( $_FILES['detailed_coupon_img']['type'][$i], $allowed_extensions ) ) {
                    $oldbookimg                 = $_FILES['detailed_coupon_img']['tmp_name'][$i];//new add
                    $det_coupon_rnd = rand();
                    $bgImgPath                  = $this->config->item('coupon_img_big_path');
                    $smallImgPath               = $this->config->item('coupon_img_small_path');
                    $uploadFile = 'coupon_img';
                    $thumb = "thumb";
                    $this->imageupload_model->img_resize( $oldbookimg , 600 , $bgImgPath, $det_coupon_rnd.".jpg");
                    $this->imageupload_model->img_resize( $oldbookimg , 120 , $smallImgPath, $det_coupon_rnd.".jpg");
                    $cdata['detailed_coupon_img'] = $det_coupon_rnd.".jpg";
                }else{
                    $msg = "You may only upload png, jpg,gif,jpeg.";
                    $this->session->set_flashdata('message_session', $msg);
                    redirect($this->type);
                }
            }else{
                $cdata['detailed_coupon_img'] = "";
            }

            //pr($cdata);exit;
            $this->general_model->insert(COUPON_TABLE,$cdata);
        }

        $msg = $this->lang->line('common_add_success_msg');
        $this->session->set_flashdata('message_session', $msg);

        $searchsort_session = $this->session->userdata('user_sortsearchpage_data');
        $pagingid = $searchsort_session['uri_segment'];
        redirect($this->type);
    }

    public function update_data()
    {
        //pr($this->input->post('start_date'));exit;
        //pr($_POST);exit;
        // pr($_FILES);exit;
        for($i=0;$i<3;$i++)
        {
            $user_session = $this->session->userdata('reseeit_user_session');
            $cdata['user_id'] = $user_session['user_id'];
            $cdata['coupon_id'] = $_POST['coupon_id'][$i];
            $cdata['coupon_type'] =  $_POST['coupon_type'];
            $cdata['coupon_code'] =  $_POST['coupon_code'][$i];
            $cdata['start_date'] = $_POST['start_date'][$i];
            $cdata['expiry_date'] = $_POST['expiry_date'][$i];
            $cdata['max_number'] = $_POST['max_number'][$i];
            $cdata['summary'] = $_POST['summary'][$i];
            $cdata['tags_text'] = $_POST['tags_text'][$i];
            $cdata['delivery_method'] = $_POST['delivery_method'][$i];
            $cdata['added_date']     = db_datetimeformat();

            if(!empty($_FILES['coupon_img']['name'][$i]))
            {
                $allowed_extensions = array( "image/png", "image/jpg", "image/gif","image/jpeg" );
                if (in_array( $_FILES['coupon_img']['type'][$i], $allowed_extensions ) ){
                    $oldbookimg                 = $_FILES['coupon_img']['tmp_name'][$i];//new add
                    $coupon_rnd = rand();
                    $bgImgPath                  = $this->config->item('coupon_img_big_path');
                    $smallImgPath               = $this->config->item('coupon_img_small_path');
                    $uploadFile = 'coupon_img';
                    $thumb = "thumb";
                    $this->imageupload_model->img_resize( $oldbookimg , 600 , $bgImgPath, $coupon_rnd.".jpg");
                    $this->imageupload_model->img_resize( $oldbookimg , 120 , $smallImgPath, $coupon_rnd.".jpg");
                    $cdata['coupon_img'] = $coupon_rnd.".jpg";
                    $match = array("coupon_id" => $cdata['coupon_id']);
                    $fields = array("coupon_img");
                    $image_name = $this->general_model->get_records(COUPON_TABLE,$fields,'','',$match);

                    if(file_exists($bgImgPath.$image_name[0]['coupon_img']))
                    {
                        unlink($bgImgPath.$image_name[0]['coupon_img']);
                    }
                    if(file_exists($smallImgPath.$image_name[0]['coupon_img']))
                    {
                        unlink($smallImgPath.$image_name[0]['coupon_img']);
                    }
                }else{
                    $msg = "You may only upload png, jpg,gif,jpeg.";
                    $this->session->set_flashdata('message_session', $msg);
                    redirect($this->type);
                }
            }else{

                $field = array('coupon_id', 'coupon_img');
                $where = array('coupon_id' => $cdata['coupon_id']);
                $app_img_data = $this->general_model->get_records(COUPON_TABLE, $field, '', '', $where);
                if(count($app_img_data) > 0){
                    $cdata['coupon_img'] = $app_img_data[0]['coupon_img'];
                }else{
                    $cdata['coupon_img'] = "";
                }
            }

            if(!empty($_FILES['detailed_coupon_img']['name'][$i]))
            {
                $allowed_extensions = array( "image/png", "image/jpg", "image/gif","image/jpeg" );
                if (in_array( $_FILES['detailed_coupon_img']['type'][$i], $allowed_extensions ) ){
                    $oldbookimg                 = $_FILES['detailed_coupon_img']['tmp_name'][$i];//new add
                    $det_coupon_rnd = rand();
                    $bgImgPath                  = $this->config->item('coupon_img_big_path');
                    $smallImgPath               = $this->config->item('coupon_img_small_path');
                    $uploadFile = 'coupon_img';
                    $thumb = "thumb";
                    $this->imageupload_model->img_resize( $oldbookimg , 1200 , $bgImgPath, $det_coupon_rnd.".jpg");
                    $this->imageupload_model->img_resize( $oldbookimg , 240 , $smallImgPath, $det_coupon_rnd.".jpg");
                    $cdata['detailed_coupon_img'] = $det_coupon_rnd.".jpg";
                    $match = array("coupon_id" => $cdata['coupon_id']);
                    $fields = array("detailed_coupon_img");
                    $image_name = $this->general_model->get_records(COUPON_TABLE,$fields,'','',$match);

                    if(file_exists($bgImgPath.$image_name[0]['detailed_coupon_img']))
                    {
                        unlink($bgImgPath.$image_name[0]['detailed_coupon_img']);
                    }
                    if(file_exists($smallImgPath.$image_name[0]['detailed_coupon_img']))
                    {
                        unlink($smallImgPath.$image_name[0]['detailed_coupon_img']);
                    }
                }else{
                    $msg = "You may only upload png, jpg,gif,jpeg.";
                    $this->session->set_flashdata('message_session', $msg);
                    redirect($this->type);
                }
            }else{

                $field = array('coupon_id', 'detailed_coupon_img');
                $where = array('coupon_id' => $cdata['coupon_id']);
                $app_img_data = $this->general_model->get_records(COUPON_TABLE, $field, '', '', $where);
                if(count($app_img_data) > 0){
                    $cdata['detailed_coupon_img'] = $app_img_data[0]['detailed_coupon_img'];
                }else{
                    $cdata['detailed_coupon_img'] = "";
                }
            }

            //pr($cdata);exit;
            $where = array('coupon_id' => $cdata['coupon_id']);
            $this->general_model->update(COUPON_TABLE, $cdata, $where);
        }

        $msg = $this->lang->line('common_edit_success_msg');
        $this->session->set_flashdata('message_session', $msg);
        redirect($this->type);
    }



}