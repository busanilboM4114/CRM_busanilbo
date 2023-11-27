<?
class Util{
	############################## 9 ##################################
	# 파일 업로드할때 호출하면 된다.
	# file : form 의 file객체명
	# savedir : 저장할 경로 주의 : 디렉토리는 자동생성되지 않고, 권한 역시 777로 변경
	################################################################
	function upload($file, $file_name, $savedir) {
		if($file != "none") {
			$pos = strpos($file_name,".");
			$name = substr($file_name,0,$pos);
			$ext = substr($file_name,$pos+1);
			$ext_file=array("php","php3","inc","pl","cgi","asp");
			for($i=0;$i<sizeof($ext_file);$i++) {
				if($ext==$ext_file[$i]) {
					$this->alertBack("확장자가 $ext 인 화일은 업로드 하실수 없습니다.");
					exit;
				}
			}

			######## 빈칸 없애기
		    $file_name = str_replace(" ","_", $file_name);

			######## 같은파일이름 업로드시 공백처리 안되서 2008년 06월 04일 신영수 추가.
		    $name = str_replace(" ","_", $name);
			$filename = $savedir.$file_name;
			$i = 1;
			while(file_exists("$filename")) {
				$filename = $savedir.$name."_".$i.".".$ext;
				$i++;
			}

			######## 파일 저장 위치가 존재하지 않을 경우 디렉토리 생성
			if( !is_dir( $savedir ) ) {
				exec("mkdir -p " . $savedir );
				@chmod($savedir,0777);
			}

			######## 파일 저장/실패 시 에러메세지
			if(!move_uploaded_file($file, $filename) ) {
				$this->alertBack("파일 업로드를 실패했습니다.");
				exit;
			}

			@chmod($filename,0644); //정태훈 추가
			$file_name = str_replace($savedir,"",$filename);
			return $file_name;
		}
	}
	function alertBack($msg)
	{
		echo $file;
		echo $filename;
		echo $msg;
	}
	##############################10##################################
	# 파일을 삭제할때 호출하면 된다.
	# file_name : 삭제할 화일명
	# savedir : 저장되어 있는 경로
	################################################################
	function fileDelete($file_name,$savedir){
		$file = $savedir.$file_name;
		if(file_exists($file)) { unlink($file); return true; }
		else { return false; }
    }

	################################################################
	# 썸네일 이미지생성.
	################################################################
	function smallFileCopy($save_dir, $copy_file_name, $xsize, $ysize) {
		//파일명 분리
		//	$file_name =  str_replace($this->str_tmp, "", $copy_file_name);  //경로명을 빼고 파일명만 추출
		$img_size = getimagesize($save_dir.$copy_file_name);
		if ($xsize && ($xsize < $img_size[0])) {
			$pos		= strpos($copy_file_name, ".");
			$name		= substr($copy_file_name, 0, $pos);
			$ext		= substr($copy_file_name, $pos + 1);  //확장자 확인
			//$dest_file		= $save_dir."TMP/".$name . "_s." . $ext;
			$dest_file		= $save_dir.$name . "_s." . $ext;
			$small_img_name = $name . "_s." . $ext;
			$copy_file_name	= $save_dir.$copy_file_name;
			//echo $copy_file_name."<br>";
			//echo $dest_file;
			//exit;
			if(!copy($copy_file_name, $dest_file)) {
				echo($copy_file_name);
				$this->error("파일을 복사하지 못했음");
			}
				@chmod($dest_file,0766);
			if( file_exists( $dest_file) )	{
				$src_image	=  $dest_file;
				$dst_image	=  $dest_file;
				$image_quality	= 100;		//선명도
				$addborder		= 0;		//이미지윤곽
				$max_height		= $xsize;   //조정할 이미지 크기
				$max_width		= $ysize;	//조정할 이미지 크기

				// 이미지 조정 주코드
				if(strtolower($ext) == "jpg" || strtolower($ext) == "jpeg") {
					$src_img = @ImageCreateFromJpeg($src_image);
				} else if (strtolower($ext) == "gif") {
					$src_img = @ImageCreateFromGif($src_image);
				} else if (strtolower($ext) == "png") {
					$src_img = @ImageCreateFromPng($src_image);
				}

				$orig_x = @ImageSX($src_img);
				$orig_y = @ImageSY($src_img);
				$new_y = $max_height;
				$new_x = $orig_x/($orig_y/$max_height);

				if ($new_x > $max_width) {
				//	$new_x = $max_width+216;					//380 맞춤
				//	$new_y = $orig_y/($orig_x/$max_width)+171;	//240 맞춤
					$new_x = $max_width;
					$new_y = $orig_y/($orig_x/$max_width);
				}

				$dst_img = @ImageCreateTrueColor($new_x,$new_y);
				@ImageCopyResampled($dst_img, $src_img, 0, 0, 0, 0, $new_x, $new_y, $orig_x, $orig_y);
				@ImageJpeg($dst_img, $dst_image, $image_quality);
				@ImageDestroy($src_img);
				@ImageDestroy($dst_img);
			}
				//return $name . "_s." . $ext;
		  } else {
				$small_img_name = $copy_file_name;
		  }
				return $small_img_name;

	}


	//이미지 리사이즈/크롭
	function img_resize($srcimg, $dstimg, $imgpath, $rewidth, $reheight, $crop_flag)
	{
		if($crop_flag)
		{
			// The file
			$filename = $imgpath.'/'.$srcimg;

			// Set a maximum height and width
			$width = $rewidth;
			$height = $reheight;

			list($width_orig, $height_orig, $img_type) = getimagesize($filename);

			$ratio_orig = $width_orig/$height_orig;

			//가로사진
			if($ratio_orig>1)
			{
				//세로가 기준 2배 초과일때
				//리사이즈 후 크롭
				if($height_orig/2>$height)
				{
					$percent = 0.5;

					$new_width = $width_orig * $percent;
					$new_height = $height_orig * $percent;

					//리사이즈 후 크롭
					$image_p = imagecreatetruecolor($new_width, $new_height);

					switch($img_type)
					{
						case '1':
							$image = ImageCreateFromGIF($filename);
							break;
						case '2':
							$image = imagecreatefromjpeg($filename);
							break;
						case '3':
							$image = ImageCreateFromPNG($filename);
							break;
					}

					imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width_orig, $height_orig);

					Imagejpeg($image_p,$imgpath.'/tmp_'.$dstimg,100);
					imageDestroy($image);

					$filename=$imgpath.'/tmp_'.$dstimg;

					// Resample
					$image_p = imagecreatetruecolor($width, $height);
					$image = imagecreatefromjpeg($filename);
					imagecopyresampled($image_p, $image, 0, 0, ($new_width/2-($width/2)), ($new_height/2-($height/2)), $width, $height, $width, $height);

					Imagejpeg($image_p,$imgpath.'/'.$dstimg,100);
					imageDestroy($image);

					@unlink($filename);
				}
				//아닐경우 바로 크롭
				else
				{
					$image_p = imagecreatetruecolor($width, $height);

					switch($img_type)
					{
						case '1':
							$image = ImageCreateFromGIF($filename);
							break;
						case '2':
							$image = imagecreatefromjpeg($filename);
							break;
						case '3':
							$image = ImageCreateFromPNG($filename);
							break;
					}
					//바로 크롭
					imagecopyresampled($image_p, $image, 0, 0, ($width_orig/2-($width/2)), ($height_orig/2-($height/2)), $width, $height, $width, $height);

					Imagejpeg($image_p,$imgpath.'/'.$dstimg,100);
					imageDestroy($image);
				}
			}
			//1:1사진
			else if($ratio_orig==1)
			{
				//아무 축이나 기준 2배 초과 일때
				//리사이즈 후 크롭
				if($heignt_orig/2>$height)
				{
					$percent = 0.5;

					$new_width = $width_orig * $percent;
					$new_height = $height_orig * $percent;

					//리사이즈 후 크롭
					$image_p = imagecreatetruecolor($new_width, $new_height);

					switch($img_type)
					{
						case '1':
							$image = ImageCreateFromGIF($filename);
							break;
						case '2':
							$image = imagecreatefromjpeg($filename);
							break;
						case '3':
							$image = ImageCreateFromPNG($filename);
							break;
					}

					imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width_orig, $height_orig);

					Imagejpeg($image_p,$imgpath.'/tmp_'.$dstimg,100);
					imageDestroy($image);

					$filename=$imgpath.'/tmp_'.$dstimg;

					// Resample
					$image_p = imagecreatetruecolor($width, $height);
					$image = imagecreatefromjpeg($filename);
					imagecopyresampled($image_p, $image, 0, 0, ($new_width/2-($width/2)), ($new_height/2-($height/2)), $width, $height, $width, $height);

					Imagejpeg($image_p,$imgpath.'/'.$dstimg,100);
					imageDestroy($image);

					@unlink($filename);
				}
				else
				{
					$image_p = imagecreatetruecolor($width, $height);

					switch($img_type)
					{
						case '1':
							$image = ImageCreateFromGIF($filename);
							break;
						case '2':
							$image = imagecreatefromjpeg($filename);
							break;
						case '3':
							$image = ImageCreateFromPNG($filename);
							break;
					}
					//바로 크롭
					imagecopyresampled($image_p, $image, 0, 0, ($width_orig/2-($width/2)), ($height_orig/2-($height/2)), $width, $height, $width, $height);

					Imagejpeg($image_p,$imgpath.'/'.$dstimg,100);
					imageDestroy($image);
				}
			}
			//세로사진
			else
			{
				//가로가 기준 2배 초과일때
				//리사이즈 후 크롭
				if($width_orig/2>$width)
				{
					$percent = 0.5;

					$new_width = $width_orig * $percent;
					$new_height = $height_orig * $percent;

					//리사이즈 후 크롭
					$image_p = imagecreatetruecolor($new_width, $new_height);

					switch($img_type)
					{
						case '1':
							$image = ImageCreateFromGIF($filename);
							break;
						case '2':
							$image = imagecreatefromjpeg($filename);
							break;
						case '3':
							$image = ImageCreateFromPNG($filename);
							break;
					}

					imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width_orig, $height_orig);

					Imagejpeg($image_p,$imgpath.'/tmp_'.$dstimg,100);
					imageDestroy($image);

					$filename=$imgpath.'/tmp_'.$dstimg;

					// Resample
					$image_p = imagecreatetruecolor($width, $height);
					$image = imagecreatefromjpeg($filename);
					imagecopyresampled($image_p, $image, 0, 0, ($new_width/2-($width/2)), ($new_height/2-($height/2)), $width, $height, $width, $height);

					Imagejpeg($image_p,$imgpath.'/'.$dstimg,100);
					imageDestroy($image);

					@unlink($filename);
				}
				else
				{
					$image_p = imagecreatetruecolor($width, $height);

					switch($img_type)
					{
						case '1':
							$image = ImageCreateFromGIF($filename);
							break;
						case '2':
							$image = imagecreatefromjpeg($filename);
							break;
						case '3':
							$image = ImageCreateFromPNG($filename);
							break;
					}
					//바로 크롭
					imagecopyresampled($image_p, $image, 0, 0, ($width_orig/2-($width/2)), ($height_orig/2-($height/2)), $width, $height, $width, $height);

					Imagejpeg($image_p,$imgpath.'/'.$dstimg,100);
					imageDestroy($image);
				}
			}
		}
		//크롭 아닐때
		//퍼온거 원본
		else
		{
			$src_info = getimagesize("$imgpath/$srcimg");

			if($rewidth < $src_info[0] || $reheight < $src_info[1] ){
				if(($src_info[0]-$rewidth) > ($src_info[1]-$reheight)){
					$reheight = round(($src_info[1]*$rewidth)/$src_info[0]);
				}else{
					$rewidth = round(($src_info[0]*$reheight)/$src_info[1]);
				}
			}else{
				copy($imgpath."/".$srcimg, $imgpath."/".$dstimg);
				chmod($imgpath."/".$dstimg, 0606);
				return;
			}

			$dst = imageCreatetrueColor($rewidth,$reheight);

			if($src_info[2] == 1){

				$src = ImageCreateFromGIF("$imgpath/$srcimg");
				imagecopyResampled($dst, $src,0,0,0,0,$rewidth,$reheight,ImageSX($src),ImageSY($src));
				Imagejpeg($dst,"$imgpath/$dstimg",100);
				chmod($imgpath."/".$dstimg, 0606);

			}else if($src_info[2] == 2){

				$src = ImageCreateFromJPEG("$imgpath/$srcimg");
				imagecopyResampled($dst, $src,0,0,0,0,$rewidth,$reheight,ImageSX($src),ImageSY($src));
				Imagejpeg($dst,"$imgpath/$dstimg",100);
				chmod($imgpath."/".$dstimg, 0606);

			}else if($src_info[2] == 3){

				$src = ImageCreateFromPNG("$imgpath/$srcimg");
				imagecopyResampled($dst, $src,0,0,0,0,$rewidth,$reheight,ImageSX($src),ImageSY($src));
				Imagepng($dst,"$imgpath/$dstimg",100);
				chmod($imgpath."/".$dstimg, 0606);

			}

			imageDestroy($src);
			imageDestroy($dst);
		}
	}
}
?>