<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/html/web-cs/config_init.php';

$savedir	= '/UploadFolder/editor_img/';

$alt		= $_REQUEST['alt'];

$month_dir	= date('Ym');

$save_url	= $savedir.$month_dir.'/';
$savedir	= $SAVE_ROOT.$savedir.$month_dir.'/';

if(!file_exists($savedir))
{
	//@exec('mkdir '.$savedir);
	//@chmod($savedir, 0757);
	@mkdir($savedir, 0777);
}

$sFileInfo = '';
$headers = array();

foreach($_SERVER as $k => $v) {
	if(substr($k, 0, 9) == "HTTP_FILE") {
		$k = substr(strtolower($k), 5);
		$headers[$k] = $v;
	}
}

$file = new stdClass;
$file->name = str_replace("\0", "", rawurldecode($headers['file_name']));
$file->size = $headers['file_size'];
$file->content = file_get_contents("php://input");

$file_name = $file->name;
$ext = strtolower(substr($file_name, (strrpos($file_name, '.') + 1)));
if ('jpg' != $ext && 'jpeg' != $ext && 'gif' != $ext && 'png' != $ext)
{
	echo "NOTALLOW_".$file->name;
}
else
{
	$file_name			= date('YmdHis').'_'.rand(0, 1000);
	$file_name_ext		= $file_name.'.'.$ext;//hdd에 저장 될 이름

	$newPath = $savedir.$file_name_ext;

	if(file_put_contents($newPath, $file->content)) {
		$sFileInfo .= "&bNewLine=true";
		$sFileInfo .= "&sFileName=".$file_name_ext;
		$sFileInfo .= "&sFileURL=/UploadFolder/editor_img/".$month_dir."/".$file_name_ext;
	}

	echo $sFileInfo;
}
?>