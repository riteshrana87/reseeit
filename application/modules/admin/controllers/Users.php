<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_admin_login();
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
                $sortfield = 'user_id';
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
        $table            = USER_TABLE.' as u';
        $where            = array('u.activated' => "'active'");
        $fields           = array('u.*','rl.role_name');
        $join_tables      =  array('rst_roles as rl' =>'rl.role_id = u.role_id');
        if(!empty($searchtext))
        {
            $searchtext = html_entity_decode(trim($searchtext));
            $match=array('u.register_type'=>$searchtext,'u.email'=>$searchtext);
            $data['datalist']  = $this->general_model->get_records($table,$fields,$join_tables,'left','',$match,$config['per_page'],$uri_segment,$sortfield,$sortby,'',$where);
            $config['total_rows']  = $this->general_model->get_records($table,$fields,$join_tables,'left','',$match,'','',$sortfield,$sortby,'',$where,'','','1');
           //echo $this->db->last_query();exit;
        }
        else
        {
            $data['datalist']      = $this->general_model->get_records($table,$fields,$join_tables,'left','','',$config['per_page'],$uri_segment,$sortfield,$sortby,'',$where);
            $config['total_rows']  = $this->general_model->get_records($table,$fields,$join_tables,'left','','','','',$sortfield,$sortby,'',$where,'','','1');
        }

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
    /*
    Author : Ritesh Rana
    Desc   : Edit user
    Input  :
    Output :
    Date   :04/11/2015
    */
    public function add_record()
    {
        $field = array('role_id', 'role_name');
        $data['role_type'] = $this->general_model->get_records(ROLES_TABLE,$field);

        $field = array('client_type_id', 'client_type', 'client_type_name');
        $data['client_type'] = $this->general_model->get_records(CLIENT_TYPE,$field);

        $data['main_content'] = $this->type.'/'.$this->viewname.'/add';
        $this->load->view($this->type.'/assets/template',$data);
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
        //pr($_FILES);exit;
        $id = $this->input->post('id');
        $cdata['username']         = trim($this->input->post('email'));
        $cdata['first_name']        = trim(ucfirst($this->input->post('first_name')));
        $cdata['last_name']        = trim(ucfirst($this->input->post('last_name')));
        $cdata['fullname']        = trim(ucfirst($this->input->post('first_name').' '.$this->input->post('last_name')));
        $cdata['email']            = trim($this->input->post('email'));
        $cdata['password']         = md5($this->input->post('password'));
        $cdata['zipcode']          = trim($this->input->post('zipcode'));
        $cdata['phone_number']          = trim($this->input->post('phone_number'));
        $cdata['register_type']    = trim($this->input->post('register_type'));
        $cdata['client_type_id']    = trim($this->input->post('client_type_id'));
        $cdata['role_id']          = trim($this->input->post('role_id'));
        $cdata['activated']        = 'active';
        $cdata['created']     = db_datetimeformat();
        //uploading the image
        if(!empty($_FILES['user_img']['name']))
        {
            $oldbookimg                 = $this->input->post('user_img');//new add
            $bgImgPath                  = $this->config->item('user_img_big_path');
            $smallImgPath               = $this->config->item('user_img_small_path');
            $uploadFile = 'user_img';
            $thumb = "thumb";
            $hiddenImage = !empty($oldbookimg)?$oldbookimg:'';
            $cdata['user_img'] = $this->imageupload_model->upload_image($uploadFile,$bgImgPath,$smallImgPath,$thumb,TRUE);

        }
        //pr(USER_TABLE);exit;
        $user_id = $this->general_model->insert(USER_TABLE,$cdata);

        $msg = $this->lang->line('common_add_success_msg');
        $this->session->set_flashdata('message_session', $msg);

        $searchsort_session = $this->session->userdata('user_sortsearchpage_data');
        $pagingid = $searchsort_session['uri_segment'];
        //redirect($this->type.'/'.$this->viewname.'/'.$pagingid);
        redirect($this->type.'/'.$this->viewname.'/index/'.$pagingid);
    }
    /*
    Author : Ritesh Rana
    Desc   : Edit user
    Input  :
    Output :
    Date   :04/11/2015
    */
    public function edit_record()
    {
        $id = $this->uri->segment(4);
        $table            = USER_TABLE.' as u';
        $fields           = array('u.*');
        $match = array('u.user_id' => $id);
        $result      	      = $this->general_model->get_records($table,$fields,'','',$match);
        $field = array('role_id', 'role_name');
        $data['role_type'] = $this->general_model->get_records(ROLES_TABLE,$field);

        $field = array('client_type_id', 'client_type', 'client_type_name');
        $data['client_type'] = $this->general_model->get_records(CLIENT_TYPE,$field);

        $data['editRecord']   = $result;
        $data['main_content'] = $this->type.'/'.$this->viewname.'/add';
        $this->load->view($this->type.'/assets/template',$data);
    }
    /*
	Author : Ritesh Rana
    Desc   : Upadate user 
	Input  : Post value
	Output : Update value
	Date   :04/11/2015
	*/
    public function update_data()
    {
        $id = $this->input->post('id');
        $cdata['username']         = trim($this->input->post('email'));
        $cdata['fullname']        = trim(ucfirst($this->input->post('first_name').' '.$this->input->post('last_name')));

        $cdata['first_name']        = trim(ucfirst($this->input->post('first_name')));
        $cdata['last_name']        = trim(ucfirst($this->input->post('last_name')));
        $cdata['email']            = trim($this->input->post('email'));
        //$cdata['password']         = md5($this->input->post('password'));
        $cdata['zipcode']          = trim($this->input->post('zipcode'));
        $cdata['phone_number']          = trim($this->input->post('phone_number'));
        $cdata['register_type']    = trim($this->input->post('register_type'));
        $cdata['role_id']          = trim($this->input->post('role_id'));
        $cdata['client_type_id']    = trim($this->input->post('client_type_id'));
        /*$cdata['activated']        = trim($this->input->post('activated'));*/
        $cdata['created']          = db_datetimeformat();

        $image                      = $this->input->post('hiddenFile');
        $image_name                 = $this->input->post('user_img');

        $bgImgPath                  = $this->config->item('user_img_big_path');
        $smallImgPath               = $this->config->item('user_img_small_path');
        //uploading the image

        if(!empty($_FILES['user_img']['name']))
        {
            $uploadFile = 'user_img';
            $thumb = "thumb";
            $hiddenImage = !empty($image_name)?$image_name:'';
            $cdata['user_img'] = $this->imageupload_model->upload_image($uploadFile,$bgImgPath,$smallImgPath,$thumb,TRUE);
            $match = array("user_id"=>$id);
            $fields = array("user_img");
            $image_name     = $this->general_model->get_records(USER_TABLE,$fields,'','',$match);

            if(file_exists($this->config->item('user_img_big_path').$image_name[0]['user_img']))
            {
                unlink($this->config->item('user_img_big_path').$image_name[0]['user_img']);
            }
            if(file_exists($this->config->item('user_img_small_path').$image_name[0]['user_img']))
            {
                unlink($this->config->item('user_img_small_path').$image_name[0]['user_img']);
            }
        }
        $where = array('user_id' => $id);
        $user_id = $this->general_model->update(USER_TABLE, $cdata, $where);

        $msg = $this->lang->line('common_edit_success_msg');
        $this->session->set_flashdata('message_session', $msg);

        $searchsort_session = $this->session->userdata('user_sortsearchpage_data');
        $pagingid = $searchsort_session['uri_segment'];
        redirect($this->type.'/'.$this->viewname.'/index/'.$pagingid);
    }
    /*
    @Description: Function for check user already exist
    @Author: Ritesh Rana
    @Input: - 
    @Output: - 
    @Date: 04/11/2015
    */

    public function check_user()
    {
        $id = $this->input->post('id');
        $email= $this->input->post('email');
        $match=array('email'=>$email,'activated'=>'active');
        $exist_email = $this->general_model->get_records(USER_TABLE,array('user_id'), '', '',$match);
        //pr($this->db->last_query());exit;
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
    /*
    @Description: Function for delete data
    @Author: Ritesh Rana
    @Input: - Delete user id
    @Output: - New User list after record is deleted.
    @Date: 04-11-2015
    */
    public function ajax_delete_all()
    {
        $admin = $this->session->userdata('reseeit_admin_session');
        $id    = $this->input->post('single_remove_id');

        if(!empty($id))
        {
            $where = array('user_id' => $id);
            $this->general_model->delete(INVOICE_TABLE,$where);
            $this->general_model->delete(USERS_TABLE,$where);
            unset($id);
        }

        $array_data = $this->input->post('myarray');
        $delete_all_flag = 0;$cnt = 0;
        for($i=0;$i<count($array_data);$i++)
        {
            $where = array('user_id' => $array_data[$i]);
            $this->general_model->delete(INVOICE_TABLE,$where);
            $this->general_model->delete(USERS_TABLE,$where);
            $delete_all_flag = 1;
            $cnt++;
        }
        //pagingation
        $searchsort_session = $this->session->userdata('user_sortsearchpage_data');
        //pr($searchsort_session);exit;
        if(!empty($searchsort_session['uri_segment']))
            $pagingid = $searchsort_session['uri_segment'];
        else
            $pagingid = 0;
        $perpage = !empty($searchsort_session['perpage'])?$searchsort_session['perpage']:'10';
        $total_rows = $searchsort_session['total_rows'];
        if($delete_all_flag == 1)
        {
            $total_rows -= $cnt;
            $pagingid*$perpage;
            if($pagingid*$perpage > $total_rows) {
                if($total_rows % $perpage == 0) // if all record delete
                {
                    $pagingid -= $perpage;
                }
            }
        } else {
            if($total_rows % $perpage == 1)
                $pagingid -= $perpage;
        }

        if($pagingid < 0)
            $pagingid = 0;
        echo $pagingid;

    }
    /*
    @Description: Function for Unpublish User Profile By Admin
    @Author: Ritesh Rana
    @Input: - Delete id which User record want to Unpublish
    @Output: - New User list after record is Unpublish.
    @Date: 04-11-2015
    */
    function unpublish_record()
    {
        $id = $this->input->post('id');
        $array_data = $this->input->post('myarray');
        if(!empty($id))
        {
            $status = $this->input->post('activated');
           // pr($status);exit;
            $cdata['activated'] = $status;
            $this->general_model->update(USER_TABLE,$cdata,array('user_id'=>$id));
        }
        if(!empty($array_data))
        {

            for($i=0;$i<count($array_data);$i++)
            {
                $where = array('user_id' => $array_data[$i]);
                $cdata['activated'] = 'inactive';
                $this->general_model->update(USER_TABLE,$cdata,$where);
            }

        }

        $searchsort_session = $this->session->userdata('user_sortsearchpage_data');
        $pagingid = $searchsort_session['uri_segment'];
        echo $pagingid;
    }

    /*
    @Description: Function for publish User Profile By Admin
    @Author: Ritesh Rana
    @Input: - Delete id which User record want to publish
    @Output: - New User list after record is publish.
    @Date: 04-11-2015
    */
    function publish_record()
    {
        $id = $this->input->post('id');
        $array_data = $this->input->post('myarray');
        if(!empty($id))
        {
            $status = $this->input->post('status');
            $cdata['activated'] = $status;
            $this->general_model->update(USER_TABLE,$cdata,array('user_id'=>$id));
        }
        if(!empty($array_data))
        {
            for($i=0;$i<count($array_data);$i++)
            {
                $where = array('user_id' => $array_data[$i]);
                $cdata['activated'] = 'inactive';
                $this->general_model->update(USER_TABLE,$cdata,$where);
            }
        }
        $searchsort_session = $this->session->userdata('user_sortsearchpage_data');
        $pagingid = $searchsort_session['uri_segment'];
        echo $pagingid;
    }
}
