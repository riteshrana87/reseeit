<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function index()
    {
        $this->type = USERS_SITE;
        $this->viewname = $this->uri->segment(2);
        $user_session = $this->session->userdata('reseeit_user_session');
       if($user_session)
        {
            $this->session->unset_userdata('reseeit_user_session');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('role_id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('user_img');
            $this->session->unset_userdata('activated');
            $this->session->unset_userdata('fullname');
            $this->session->unset_userdata('register_type');
            redirect(base_url($this->type));
        }
        else
            redirect(base_url($this->type));
    }
}
