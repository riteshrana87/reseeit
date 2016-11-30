<?php

/*
  @Description: General Model
  @Author: Niral Patel
  @Input:
  @Output:
  @Date: 14-10-15 */

  class General_model extends CI_Model
  {

    function __construct()
    {
        parent::__construct();
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function update($table, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    
     //GET all type of data
    function get_records($table='',$fields='',$join_tables='',$join_type='',$match_and = '',$match_like ='', $num = '',$offset='',$orderby='',$sort='',$group_by='',$wherestring='',$having='',$where_in='',$totalrow='',$or_where='')
    {  
        if(!empty($fields))
        {
            foreach($fields as $coll => $value)
            {
                $this->db->select($value,false);
            }
        }

        $this->db->from($table);

        if(!empty($join_tables))
        {
            foreach($join_tables as $coll => $value)
            {
                $this->db->join($coll, $value,$join_type);
            }
        }
        if($match_like != null)
            $this->db->or_like($match_like);
        if($match_and != null )
            $this->db->where($match_and);

        if($wherestring != '')
            $this->db->where($wherestring, NULL, FALSE);
        if(!empty($where_in)){
            foreach($where_in as $key => $value){
                $this->db->where_in($key,$value);
            }
        }

        if(!empty($or_where)){
            foreach($or_where as $key => $value){
                $this->db->or_where($key,$value);
            }
        }

        if($group_by != null)
            $this->db->group_by($group_by);
        if($having != null)
            $this->db->having($having);
        if($orderby != null && $sort != null)
            $this->db->order_by($orderby,$sort);

        

        if($offset != null && $num != null)
            $this->db->limit($num,$offset);
        elseif($num != null )
            $this->db->limit($num);
        $query_FC = $this->db->get();
                    //echo $this->db->last_query();exit;
        if(!empty($totalrow))
            return $query_FC->num_rows();
        else
            return $query_FC->result_array();

    }
    //Send mail using smtp
    function send_email($to = '', $subject = '', $message = '', $from = '', $cc = '',$bcc ='',$data='') 
    {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gogglegmail.com',
            'smtp_port' => 465,
            'smtp_timeout' => '30',
            'smtp_user' => 'helpdeskcmetric@gmail.com',
            'smtp_pass' => 'Cyber#2015!',
            'mailtype' => 'html',
        );
        $this->load->library('email',$config);
        
        //$this->email->initialize($config);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->from($from, $this->config->item('sitename'));
        $this->email->to($to);
        $this->email->cc($cc);
        $this->email->bcc($bcc); 
        if($this->email->send())
        {echo 'done';}else{echo 'oops';}
        $this->email->clear(TRUE);
    }

      public function get_user_tree_data($user_id)
      {
          $this->db->select('c1.user_id as client_account,c2.user_id as location_admins,c3.user_id as manage_users');
          $this->db->from('rst_users As c1');
          $this->db->join('rst_users As c2','c2.parent_uid = c1.user_id','LEFT');
          $this->db->join('rst_users As c3','c3.parent_uid = c2.user_id','LEFT');
         // $this->db->join('rst_users As c4','c4.parent_uid = c3.user_id','LEFT');
          $this->db->where('c1.user_id',$user_id);
          $query = $this->db->get();
          $result = $query->result();
          return $result;
      }

      public function role_data()
      {
          $this->db->select('role_id,role_name');
          $this->db->from('rst_roles');
          $this->db->where_not_in('role_id', array(1,5));
          $query = $this->db->get();
          $result = $query->result();
          return $result;
      }

      function get_records_data($table='',$fields='',$join_tables='',$join_type='',$match_and = '',$match_like ='', $num = '',$offset='',$orderby='',$sort='',$group_by='',$wherestring='',$having='',$where_in='',$totalrow='',$or_where='')
      {
          if(!empty($fields))
          {
              foreach($fields as $coll => $value)
              {
                  $this->db->select($value,false);
              }
          }

          $this->db->from($table);

          if(!empty($join_tables))
          {
              foreach($join_tables as $coll => $value)
              {
                  $this->db->join($coll, $value,$join_type);
              }
          }
          if($match_like != null)
              $this->db->or_like($match_like);
          if($match_and != null )
              $this->db->where($match_and);

          if($wherestring != '')
              $this->db->where($wherestring, NULL, FALSE);
          if(!empty($where_in)){
              foreach($where_in as $key => $value){
                  $this->db->where_in($key,$value);
              }
          }

          if(!empty($or_where)){
              foreach($or_where as $key => $value){
                  $this->db->or_where($key,$value);
              }
          }

          if($group_by != null)
              $this->db->group_by($group_by);
          if($having != null)
              $this->db->having($having);
          if($orderby != null && $sort != null)
              $this->db->order_by($orderby,$sort);



          if($offset != null && $num != null)
              $this->db->limit($num,$offset);
          elseif($num != null )
              $this->db->limit($num);
          $query_FC = $this->db->get();
          //echo $this->db->last_query();exit;
          if(!empty($totalrow))
              return $query_FC->num_rows();
          else
              return $query_FC->result_array();

      }

      public function roles_check_user($email,$password)
      {
          $table            = USER_TABLE.' as u';
          $ignore = array(1);

          $this->db->select('u.user_id,u.password,u.role_id,u.username,u.first_name,u.last_name,u.phone_number,u.email,u.user_img,u.activated,u.fullname,u.register_type,rl.role_name');
          $this->db->from($table);
          $this->db->join('rst_roles as rl','u.role_id = rl.role_id','LEFT');
          $this->db->where('u.email',$email);
          $this->db->where('u.password',$password);
          $this->db->where('u.activated','active');
          $this->db->where_not_in('u.role_id', $ignore);
          $query = $this->db->get();
          $result = $query->result();
          return $result;
      }

      public function login_user($user_id,$role_id)
      {
          $table            = USER_TABLE.' as u';
          $this->db->select('u.user_id,u.role_id,u.username,u.first_name,u.last_name,u.phone_number,u.email,u.user_img,u.activated,u.fullname,u.register_type,rl.role_name');
          $this->db->from($table);
          $this->db->join('rst_roles as rl','u.role_id = rl.role_id','LEFT');
          $this->db->where('u.user_id',$user_id);
          $this->db->where('u.activated','active');
          $this->db->where('u.role_id', $role_id);
          $query = $this->db->get();
          $result = $query->result();
          return $result;
      }

      public function client_user_data()
      {
          $table            = USER_TABLE.' as u';
          $this->db->select('u.user_id,u.role_id,u.username,u.first_name,u.last_name,u.phone_number,u.email,u.user_img,u.activated,u.fullname,u.register_type,co.com_name');
          $this->db->from($table);
          $this->db->join('rst_company as co','u.user_id = co.user_id','LEFT');
          $this->db->where('u.role_id',2);
          $this->db->where('u.activated','active');
          $this->db->group_by('u.user_id');
          $query = $this->db->get();
          $result = $query->result();
          return $result;
      }

      public function client_user_data_list()
      {
          $table            = CLIENT_REWARD.' as u';
          $this->db->select('u.user_id,u.reward_type_id,us.username,us.first_name,us.last_name,us.phone_number,us.email,us.user_img,us.activated,us.fullname,us.register_type,co.com_name');
          $this->db->from($table);
          $this->db->join('rst_company as co','u.user_id = co.user_id','LEFT');
          $this->db->join('rst_users as us','u.user_id = us.user_id','LEFT');
          $this->db->where('us.activated','active');
          $this->db->group_by('u.user_id');
          $query = $this->db->get();
          $result = $query->result();
          return $result;
      }
  }