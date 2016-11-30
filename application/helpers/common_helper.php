<?php
function pr($var)
{
	echo '<pre>';
	if(is_array($var)) {
		print_r($var);
	} else {
		var_dump($var);
	}
	echo '</pre>';
}
function check_admin_login()
{
	$CI = & get_instance();  //get instance, access the CI superobject
	$adminLogin = $CI->session->userdata('reseeit_admin_session');
	(!empty($adminLogin['admin_id']))?'':redirect('admin');  	
}

function check_user_login()
{
	$CI = & get_instance();  //get instance, access the CI superobject
	$userLogin = $CI->session->userdata('reseeit_user_session');
	(!empty($userLogin['user_id']))?'':redirect('login');  	
}
/*
@Description: Function for date format
@Author: Niral Patel
@Input: - 
@Output: - date
@Date: 2-2-2014
*/
function datetimeformat($date='')
{
	//echo date("m/d/Y", strtotime($date));
	return date("m/d/Y H:i:s", strtotime($date));
}
function db_datetimeformat($date='')
{
	if(!empty($date))
	{
		return date("Y-m-d H:i:s", strtotime($date));
	}
	else
	{
		return date("Y-m-d H:i:s");
	}
	
}
function dateformat($date='')
{
	//echo date("m/d/Y", strtotime($date));
	return date("m/d/Y", strtotime($date));
}
function db_dateformat($date='')
{
	if(!empty($date))
	{
		return date("Y-m-d", strtotime($date));
	}
	else
	{
		return date("Y-m-d");
	}
	
}

function getMailConfig() {

	$CI = & get_instance();
	$dashWhere = "config_key='email_settings'";
	$defaultDashboard = $CI->common_model->get_records(CONFIG, array('value'), '', '', $dashWhere);
	$configData = (array) json_decode($defaultDashboard[0]['value']);
	return $configData;
}

function send_mail($to, $subject, $message, $attach = NULL) {

	$CI = & get_instance();

	$configs = getMailConfig(); // Get Email configs from Email settigs page

	//$CI->load->library('parser');
	if(!empty($configs)){
		$config['protocol'] = $configs['email_protocol'];
		$config['smtp_host'] = $configs['smtp_host']; //change this
		$config['smtp_port'] = $configs['smtp_port'];
		$config['smtp_user'] = $configs['smtp_user']; //change this
		$config['smtp_pass'] = $configs['smtp_pass']; //change this
		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['newline'] = "\r\n"; //use double quotes to comply with RFC 8
		$CI->load->library('email', $config); // load email library
		$CI->email->from($configs['smtp_user'], "CMS TEST");
		$CI->email->to($to);
		$CI->email->subject($subject);
		$CI->email->message($message);
		if (isset($attach) && $attach != "") {
			$CI->email->attach($attach); // attach file /path/to/file1.png
		}

		return $CI->email->send();
	}else{

		$where = "config_key='email'";
		$fromEmail = $CI->common_model->get_records(CONFIG, array('value'), '', '', $where);
		if(isset($fromEmail[0]['value']) && !empty($fromEmail[0]['value'])){
			$from_Email = $fromEmail[0]['value'];
		}
		$where1 = "config_key='project_name'";
		$projectName = $CI->common_model->get_records(CONFIG, array('value'), '', '', $where1);
		if(isset($projectName[0]['value']) && !empty($projectName[0]['value'])){
			$project_Name = $projectName[0]['value'];
		}
		$CI->load->library('email');
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$CI->email->initialize($config);
		$config['mailtype'] = "html";
		$CI->email->initialize($config);
		$CI->email->set_newline("\r\n");
		$CI->email->from($from_Email, $project_Name);
		//$list = array('mehul.patel@c-metric.com');
		$CI->email->to($to);
		$CI->email->subject($subject);
		$CI->email->message($message);
		if (isset($attach) && $attach != "") {
			$CI->email->attach($attach); // attach file /path/to/file1.png
		}
		return $CI->email->send();

	}


	// pr($data); exit;
}

?>