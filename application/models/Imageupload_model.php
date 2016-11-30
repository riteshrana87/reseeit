<?php

/*
    @Description: Image Upload Model
    @Author: Niral Patel
    @Input: 
    @Output: 
    @Date: 26-10-2015*/

class imageupload_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
  
    }

    /*
    @Description: Function for image upload
    @Author: Niral Patel
    @Input: 
    @Output: Image will upload on perticular folder
    @Date: 26-10-2015
    */
	function upload_image($uploadFile='',$bigImgPath='',$smallImgPath='',$thumb='',$existImage='')	{

	if(!empty($existImage)){
			$path = $bigImgPath.$existImage;
			$path_thumb = $smallImgPath.$existImage;
			@unlink($path);
			@unlink($path_thumb);
		}
		$upload_name = $uploadFile;
		$config['upload_path'] = $bigImgPath; /* NB! crea          te this dir! */
		//$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg|csv|doc|docx|txt|pdf|xls|mov|mp4|PNG';
		$config['allowed_types'] = '*';
		
		$random = substr(md5(rand()),0,7);
		$config['file_name'] = $random."-".(strtolower($_FILES[$uploadFile]['name']));
		$config['overwrite'] = false;
		
		$this->load->library('upload', $config);  
		$this->upload->initialize($config);

		if($this->upload->do_upload($upload_name))
			$data = $this->upload->data();
		else
		{
			echo $this->upload->display_errors();
			exit;
		}
		//Upload thumb image
		$sourcePath = $data['full_path'];
		$thumbPath = $smallImgPath;
		$fileName = $data['file_name'];
		
		list($width, $height, $type, $attr) = getimagesize($bigImgPath.$fileName);
		
			if(!empty($thumb) && $thumb=='thumb'){
				if (!file_exists($smallImgPath)) {
					mkdir($bigImgPath, 0777);
				}
				
				$basename = explode('.', $_FILES[$uploadFile]['name']);
				$filename =$basename[0];
				//for create small image
				if($data['file_type'] == 'image/bmp' || $basename[1] == 'bmp')
				{
					$sourceImgBig = base_url().$bigImgPath.$fileName;
					copy($sourceImgBig,$smallImgPath.$filename.".jpeg"); 
					$imgurl = base_url().$smallImgPath.$filename.".jpeg";
					$width = 150;
					$this->make_thumb($imgurl,$smallImgPath.$fileName, $width);
					@unlink($smallImgPath.$filename.".jpeg");
				}
				else
				{
					$filename = $this->upload_small_image($sourcePath,$thumbPath,$fileName);							
				}


			return $fileName;
		}
	}
	//Upload thumb images
    public function upload_small_image($sourceImgPath,$thumbPath)
    {
		$configThumb = array();  
		$configThumb['image_library'] = 'gd2';
		$configThumb['thumb_marker'] = FALSE; 
		$configThumb['source_image'] = '';  
		$configThumb['create_thumb'] = TRUE;  
		$configThumb['maintain_ratio'] = FALSE;  
		$configThumb['width'] = 150;  
		$configThumb['height'] = 150;  
		$this->load->library('image_lib');
	
		$configThumb['source_image'] = $sourceImgPath; 
		$configThumb['new_image'] = $thumbPath;
		$this->image_lib->initialize($configThumb);  
		$this->image_lib->resize();
	}

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

}