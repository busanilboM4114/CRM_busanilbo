<?
	include_once ($_SERVER['DOCUMENT_ROOT'].'/html/web-cs/config_init.php');
	header('meta http-equiv="Content-Type" content="text/html; charset=utf-8"');

	$idx		= intval($_REQUEST["idx"]);
	$no			= intval($_REQUEST["no"]);
	$tn			= 'fix_board_notice';
	$menu		= '010000_'.$tn;

	$sql="select count(*) as cnt from ".$tn." where idx='$idx'";

	@$result=$conn->Execute($sql);

	$total		= $result->fields['cnt'];

	if ( $total > 0 )
	{
		$rows	= $conn->Execute("select * from $tn where idx='$idx'");

		if($no)
		{
			$filename		= $rows->fields['filename'.$no];
			$filename_real	= $rows->fields['filename_real'.$no];
		}
		else
		{
			$filename		= $rows->fields['filename1'];
			$filename_real	= $rows->fields['filename_real1'];
		}
	}
	else
	{
		error_msg('파일을 찾을 수 없습니다.(DB)');
		exit;
	}

	$DirectoryPath		= $_SERVER['DOCUMENT_ROOT']."/UploadFolder/".$menu."/";
	$filedown			= $DirectoryPath.$filename;

	if( !is_file($filedown) || !$filename )
	{
		error_msg($filename_real.' 파일을 찾을 수 없습니다.(FOLDER)');
		exit;
	}

	if($filename)
	{
		if(preg_match("/(MSIE 5.5|MSIE 6.0|MSIE 7.0|MSIE 8.0|MSIE 9.0|MSIE 10.0|MSIE 11.0)/", $_SERVER["HTTP_USER_AGENT"]) || preg_match("/Trident\/5.0|Trident\/6.0|Trident\/7.0/", $_SERVER["HTTP_USER_AGENT"]))
		{
			header("Content-Type: file/unknown");
			header("Content-Disposition: attachment; filename=".iconv('utf-8', 'euc-kr', $filename_real));
			header("Content-Transfer-Encoding: binary");
			//header("Pragma: no-cache");
			header("Expires: 0");
		}
		else
		{
			Header("Content-type: file/unknown");
			Header("Content-Disposition: attachment; filename=$filename_real");
			header("Content-Transfer-Encoding: binary");
			//header("Pragma: no-cache");
			header("Expires: 0");
		}
		@readfile($filedown);
		exit;
	}

	$fp = fopen($filedown, "rb");
	if ( $fp )
	{
		if ( !fpassthru($fp) )
		fclose($fp);
	}
?>