<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is Registration Web-Service.
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class UploadProfileApi extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->users_table = $this->db->dbprefix('users');
        //$this -> page = lang('users');

        $this->load->library('REST_Controller');
        $this->load->model('Common_model');

    }
    public function index_post()
    {
        $Logged_UserId = $this->post('Logged_UserId');
        $user_img = $_FILES;
        //print_r($_FILES['user_img']);
        if(isset($Logged_UserId) && $Logged_UserId != "" && isset($user_img) && $user_img != "" )
        {
            $selectoption = array('user_img');
            $pic_where = "(user_id = '".$Logged_UserId."')";

            $user_picinfo = $this -> Common_model -> retrieve($this->users_table,$pic_where, $limit = NULL, $offset = 0, $sort = NULL, $selectoption);
            //File uploading code Start
            if($user_img)
            {
                //Upload Image
                $user_rnd = rand();
                $tmpname  = $_FILES['user_img']['tmp_name'];
                $bgImgPath                  = $this->config->item('user_img_big_path');
                $smallImgPath               = $this->config->item('user_img_small_path');
                //pr($uploaddir);exit;
                //Before upload image remove old image from folder
                if(isset($user_picinfo[0]->user_img) && $user_picinfo[0]->user_img != "")
                {
                    $img_str = explode(".",$user_picinfo[0]->user_img);
                    if (file_exists($bgImgPath.$img_str[0].'.'.$img_str[1]))
                        unlink($bgImgPath.$img_str[0].'.'.$img_str[1]);
                    if (file_exists($smallImgPath.$img_str[0].'.'.$img_str[1]))
                        unlink($smallImgPath.$img_str[0].'.'.$img_str[1]);

                }
                //Upload image function
                $this-> Common_model -> img_resize( $tmpname , 600 , $bgImgPath , $user_rnd.".jpg");
                $this-> Common_model -> img_resize( $tmpname , 120 , $smallImgPath , $user_rnd.".jpg");
                $user_img = $user_rnd.".jpg";
            }
            else
            {
                $user_img = $user_picinfo[0]->user_img;
            }
            //File uploading code End
            $user_where="(user_id ='".$Logged_UserId."')";
            $user_data['user_img'] = $user_img;
            $update_user = $this -> Common_model -> update($this->users_table, $user_where, $user_data);
            if($update_user)
            {
                $selectoption = array('user_img');
                $pic_where = "(user_id = '".$Logged_UserId."')";
                $data['user_pic_url'] = $this -> Common_model -> retrieve($this->users_table,$pic_where, $limit = NULL, $offset = 0, $sort = NULL, $selectoption);
                $data['user_img'] = base_url().'uploads/user/big/'.$data['user_pic_url'][0]->user_img;

                $message = [
                    'status' => '1',
                    'message' => $this->lang->line('update_successfully'),
                    'user_img' => $data['user_img']
                ];
                $this->response($message, REST_Controller::HTTP_OK); // BAD_REQUEST (400) being the HTTP response code
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
