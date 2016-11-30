<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
**********************************************************************************
* Copyright: gitbench 2014
* Licence: Please check CodeCanyon.net for licence details. 
* CodeCanyon Project: http://codecanyon.net/item/freelancer-office/8870728
* Package Date: 2014-09-24 09:33:11 
***********************************************************************************
*/
class Common_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
	}
	// List all your items
	public function retrieve($table_name, $where, $limit = NULL, $offset = 0 , $sort = NULL, $selectoption = NULL)
	{	
		if (isset($sort)) {
			$this -> db -> order_by($sort['order_by'],$sort['order']);
		}
		if (isset($selectoption)) {
			$all_option = implode(",",$selectoption);
			//$this -> db -> select('user_id, fullname, email, zipcode, total_point as EarningPoint');
			$this -> db -> select($all_option);
		}
		return $this -> db -> where($where) 							   
						   -> get($table_name,$limit, $offset) 
						   -> result();
	}

	public function retrieve_app_ads($table_name, $where = NULL, $limit = NULL, $offset = 0 , $sort = NULL, $selectoption = NULL)
	{
		if (isset($sort)) {
			$this -> db -> order_by($sort['order_by'],$sort['order']);
		}
		if (isset($selectoption)) {
			$all_option = implode(",",$selectoption);
			//$this -> db -> select('user_id, fullname, email, zipcode, total_point as EarningPoint');
			$this -> db -> select($all_option);
		}
		return $this -> db ->get($table_name,$limit, $offset)
			-> result();
	}

	
	// Add a new item
	public function add($table_name,$data = array())
	{
		$this -> db -> insert($table_name, $data);
		return $this -> db -> insert_id();
	}

	//Update one item
	public function update( $table_name, $where = array(), $data = array())
	{
		return $this -> db -> where($where) -> update($table_name , $data);
	}

	//Delete one item
	public function delete($table_name, $where)
	{
		return $this -> db -> where($where) -> delete($table_name);
	}
	/*
	 * Insert Device Token
	 */
	public function AddDeviseToken($device_token, $user_id, $device_type=NULL, $tablename)
	{
		
		$de_where = "( user_deviceid = '".$device_token."' AND user_id= '".$user_id."' )";
		$device_available = $this -> retrieve($tablename,$de_where, $limit = NULL, $offset = 0, $sort = NULL, $selectoption = NULL); 
		if( empty($device_available) && count($device_available) == 0)
		{
		$cur_timestemp=time();
		$cur_time = date("Y-m-d H:i:s",$cur_timestemp);
		$dt_data= array();
		$dt_data['user_id']=  $user_id;
		$dt_data['user_deviceid']=  $device_token;
		$dt_data['device_type']=  $device_type;
		$dt_data['created']=  $cur_time;
		$dt_add = $this -> add($tablename, $dt_data);
		}
	}
	/*
	 * Resize Image Function
	 */
	function img_resize( $tmpname, $size, $save_dir, $save_name, $maxisheight = 0 )
    {
		$save_dir     .= ( substr($save_dir,-1) != "/") ? "/" : "";
		$gis        = getimagesize($tmpname);
		$type        = $gis[2];
		switch($type)
			{
			case "1": $imorig = imagecreatefromgif($tmpname); break;
			case "2": $imorig = imagecreatefromjpeg($tmpname);break;
			case "3": $imorig = imagecreatefrompng($tmpname); break;
			default:  $imorig = imagecreatefromjpeg($tmpname);
			}

			$x = imagesx($imorig);
			$y = imagesy($imorig);
		   
			$woh = (!$maxisheight)? $gis[0] : $gis[1] ;   
		   
			if($woh <= $size)
			{
			$aw = $x;
			$ah = $y;
			}
				else
			{
				if(!$maxisheight){
					$aw = $size;
					$ah = $size * $y / $x;
				} else {
					$aw = $size * $x / $y;
					$ah = $size;
				}
			}  
			$im = imagecreatetruecolor($aw,$ah);
		if (imagecopyresampled($im,$imorig , 0,0,0,0,$aw,$ah,$x,$y))
			if (imagejpeg($im, $save_dir.$save_name))
				return true;
				else
				return false;
    }

	function nearhere($longi,$lati,$coupon_type,$coupon_id=NUll) {

//		SELECT *
//		FROM  `rst_coupon` rc
//JOIN  `rst_users` AS  `us` ON rc.user_id = us.user_id
//JOIN rst_company AS c ON us.user_id = c.user_id
//JOIN rst_company_location AS cl ON c.user_id = cl.user_id
//WHERE us.activated =  'active'
//		AND  `rc`.`coupon_type` =  'featured'
//		AND STR_TO_DATE(`expiry_date`,'%m/%d/%Y') > '2016-01-08'


		$current_date = date('Y-m-d', strtotime('0 days'));
		$this->db->select('*,co.user_id as user');
		$this->db->from('rst_coupon as co');
		$this->db->join('rst_users as us','us.user_id = co.user_id','LEFT');
		$this->db->join('rst_company as c','us.user_id = c.user_id','LEFT');
		$this->db->join('rst_company_location as cl','c.user_id = cl.user_id','LEFT');
		$this->db->where('us.activated' ,'active');
		if($coupon_type !== 'all') {
			$this->db->where('co.coupon_type', $coupon_type);
		}
		$this->db->where('STR_TO_DATE(co.expiry_date,\'%m/%d/%Y\') >=' ,$current_date);
		$this->db->where_not_in('co.coupon_id',$coupon_id);
		$this->db->where_not_in('c.com_name','');
		$this->db->where_not_in('co.coupon_img','');
		$this->db->group_by('co.coupon_id');

//		$this->db->select('*');
//		$this->db->from('rst_users as us');
//		$this->db->join('rst_company as c','us.user_id = c.user_id','LEFT');
//		$this->db->join('rst_company_location as cl','c.user_id = cl.user_id','LEFT');
//		$this->db->join('rst_coupon as co','c.user_id = co.user_id','LEFT');
//		$this->db->where('us.activated' ,'active');
////		$this->db->where('co.expiry_date >=' ,$current_date);
////		$this->db->where('STR_TO_DATE(co.expiry_date,\'%m/%d/%Y\') >=' ,$current_date);
//		$this->db->where_not_in('co.coupon_id',$coupon_id);
//		if($coupon_type !== 'all') {
//			$this->db->where('co.coupon_type', $coupon_type);
//		}
//		$this->db->group_by('co.coupon_id');
		$query = $this->db->get();
		$result = $query->result();
//	pr($this->db->last_query());exit;
//	pr($result);exit;
		foreach($result as $value){
				$user_id = $value->user;
				$lat = $value->lat;
				$long = $value->long;
				$com_name = $value->com_name;
				$address = $value->address;
				$phone_number = $value->phone_number;
				$description = $value->description;
				$coupon_id = $value->coupon_id;
				$max_number = $value->max_number;
				$coupon_code = $value->coupon_code;
				$coupon_img = $value->coupon_img;
				$detailed_coupon_img = $value->detailed_coupon_img;
				$coupon_type = $value->coupon_type;
				$delivery_method = $value->delivery_method;
				$tags_text = $value->tags_text;
				$summary = $value->summary;
				$com_url = $value->com_url;
				$expiry_date = $value->expiry_date;
				$latitude = $value->lat;
				$longitude = $value->long;

			$lat1=$lati;
			$lon1=$longi;
			$lat2=$lat;
			$lon2=$long;
			// Formula for calculating distances
			// from latitude and longitude.
		/*	$dist   = acos(sin(deg2rad($lat1))
				* sin(deg2rad($lat2))
				+ cos(deg2rad($lat1))
				* cos(deg2rad($lat2))
				* cos(deg2rad($lon1 - $lon2)));

			$dist   = rad2deg($dist);
			$miles  = (float) $dist * 69;
		*/
			$dLat = deg2rad($lat1) - deg2rad($lat2);

			$dLon = deg2rad($lon1) - deg2rad($lon2);

			$R = 6371; // km
			$a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon/2) * sin($dLon/2);
			$c = 2 * atan2(sqrt($a), sqrt(1-$a));
			$d = $R * $c;

			$miles = $d/1.609344;


			// This is all displaying functionality
			$display  = sprintf("%0.2f",$miles).' miles' ;
			//$display .= ' ('.sprintf("%0.2f",$km).' kilometers)' ;
			//print_r($shop_pro);

				$featured_product_array = array(
					'user_id' => $user_id,
					'com_name' => $com_name,
					'description' => $description,
					'Distance' => $display,
					'address' => $address,
					'coupon_id' => $coupon_id,
					'max_number' => $max_number,
					'coupon_code' => $coupon_code,
					'detailed_coupon_img' => $detailed_coupon_img,
					'delivery_method' => $delivery_method,
					'coupon_img' => $coupon_img,
					'tags_text' => $tags_text,
					'summary' => $summary,
					'com_url' => $com_url,
					'expiry_date' => $expiry_date,
					'coupon_type' => $coupon_type,
					'latitude' => $latitude,
					'longitude' => $longitude,
				);
				$report_data[] = $featured_product_array;
		}
		if(isset($report_data) && !empty($report_data))
		{
			$final_report_data = $report_data;
		}
		else{
			$final_report_data = array();
		}

		return $final_report_data;
	}
	public function auto_authentication_data($email)
	{
	$this->db->select('rst_users.user_id,rst_users.email,rst_users.fullname,rst_users.user_img,rst_users.zipcode,rst_earning_total_point.noviah_points_totals');
		$this->db->from('rst_users');
		$this->db->join('rst_earning_total_point','rst_users.user_id = rst_earning_total_point.user_id','LEFT');
		$this->db->where('rst_users.email',$email);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function authentication_data($email,$pass)
	{
		$this->db->select('u.user_id,u.fullname,u.email,u.zipcode,u.user_img,uep.noviah_points_totals');
		$this->db->from('rst_users as u');
		$this->db->join('rst_earning_total_point as uep','u.user_id = uep.user_id','LEFT');
		$this->db->where('u.email',$email);
		$this->db->where('u.password',md5($pass));
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function register_data($user_id)
	{
		$this->db->select('u.user_id,u.fullname,u.email,u.zipcode,u.user_img,uep.noviah_points_totals,u.register_type');
		$this->db->from('rst_users as u');
		$this->db->join('rst_earning_total_point as uep','u.user_id = uep.user_id','LEFT');
		$this->db->where('u.user_id',$user_id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function user_point_data()
	{
		$this->db->select('u.client_reward_id,u.user_id,u.reward_type_id,u.reward_summary_img,u.reward_img,u.reward_point');
		$this->db->from('rst_client_reward as u');
		$this->db->join('rst_earning_total_point as uep','u.user_id = uep.user_id','LEFT');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function noviah_points_data($user_id,$Logged_UserId='')
	{
		$this->db->select('*');
		$this->db->from('rst_earning_point as ep');
		$this->db->where('ep.client_id',$user_id);
		$this->db->where('ep.user_id',$Logged_UserId);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function noviah_points_totals($Logged_UserId='')
	{
		$this->db->select('*');
		$this->db->from('rst_earning_total_point as ep');
		$this->db->where('ep.user_id',$Logged_UserId);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function receipt_list($Logged_UserId='')
	{
		$this->db->select('ri.receipt_id,ri.status,uep.noviah_points_totals');
		$this->db->from('rst_receipt_image as ri');
		$this->db->join('rst_earning_total_point as uep','ri.user_id = uep.user_id','LEFT');
		$this->db->where('ri.user_id',$Logged_UserId);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}


}
/* End of file client_model.php */
/* Location: ./application/modules/lead/models/client_model.php */
