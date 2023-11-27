<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/html/web-cs/config_init.php';

header('Content-Type:text/html; charset=utf-8');

$savedir	= $Editor_Img_Path;

$month_dir	= date('Ym');

$save_url	= $savedir.$month_dir.'/';
$savedir	= $_SERVER['DOCUMENT_ROOT'].$savedir.$month_dir.'/';

$alt		= $_REQUEST['alt'];
$id			= $_REQUEST['id'];

if(!file_exists($savedir))
{
	//@exec('mkdir '.$savedir);
	//@chmod($savedir, 0757);
	@mkdir($savedir, 0757);
}
//echo $savedir;
//exit;

//업로드
if( $_FILES['Filedata']['tmp_name'] )
{
	$file_name = $_FILES['Filedata']['name'];
	$ext = strtolower(substr($file_name, (strrpos($file_name, '.') + 1)));
	if ('jpg' != $ext && 'jpeg' != $ext && 'gif' != $ext && 'png' != $ext)
	{
		echo 'jpg, gif, png 형식의 이미지만 업로드 가능합니다.';
		return false;
	}

	if($alt=='')
	{
		//$alt=$file_name;
	}
	else
	{
		$alt=str_replace('"', '', stripslashes($alt));
	}

	$file				= $_FILES['Filedata']['tmp_name'];
	$file_name			= date('YmdHis').'_'.rand(0, 1000);
	$file_name_ext		= $file_name.'.'.$ext;//hdd에 저장 될 이름

	if ($file_name_ext)
	{
		if(move_uploaded_file($file, $savedir.$file_name_ext))
		{
			$save_url=$save_url.$file_name_ext;
			//echo $save_url;
			//exit;
			//echo "<img src=". $save_url ." alt=".$alt.">";
			//exit;
			//echo '<script>window.opener.tinyMCE.execCommand(\'mceInsertContent\', false, \'<img src="'.$save_url.'" alt="'.$alt.'">\'); window.close();</script>';
?>
			<script type="text/javascript">
			var sHTML = '<img src="<?=$save_url?>" alt="<?=$alt?>" />';
			var id = '<?=$id?>';
			opener.parent.parent.pasteHTML(id, sHTML);
			self.close();
			</script>
<?php
		}
		else
		{
			echo '파일 업로드가 실패했습니다.';
			return false;
		}
		@chmod($savedir.$file_name_ext, 0757);
	}
}
?>