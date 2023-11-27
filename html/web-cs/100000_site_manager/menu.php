<?php
$pagenum		= intval($_REQUEST['pagenum']);
//$search_select	= $_REQUEST['search_select'];//검색범위. a.php / c.php 에 있음
$keyword		= $_REQUEST['keyword'];//검색어
$idx			= intval($_REQUEST['idx']);//기본키
$site_idx		= intval($_REQUEST['site_idx']);//
$modes			= $_REQUEST['modes'];//동작 구분

$sql="select ";
$sql=$sql." a.* ";
$sql=$sql." from `".$DB_TABLE."` a ";
$sql=$sql." where a.`isdel`='0' and a.`idx`='".$site_idx."'";

@$rs_board = $conn->Execute($sql);

if(!$rs_board)
{
	debug_fix($sql, 1);
	error_msg('DB 정보 질의가 실패했습니다.\\n에러코드[m001]');
	$rs_board->close();
	exit;
}

if($rs_board->_numOfRows)
{
	foreach($rs_board->fields as $key => $value)
	{
		$value=stripslashes($value);
		$fix_rows['site'][$key]=$value;
	}

}
else
{
	error_msg('존재하지 않은 사이트입니다.');
	exit;
}
$rs_board->close();


$sql=" select ";
$sql=$sql." a.*, ";
$sql=$sql." 0 as dummy ";
$sql=$sql." from ";
$sql=$sql." `site_menu` a";
$sql=$sql." where ";
$sql=$sql." `isdel`=0 ";
$sql=$sql." and `site_idx`='".$site_idx."' ";
$sql=$sql." order by `sort`, `idx` desc ";

@$rs_menu=$conn->Execute($sql);

if(!$rs_menu)
{
	debug_fix($sql, 1);
	error_msg('DB 질의가 실패했습니다.\\n에러코드[m005]');
	exit;
}

while(!$rs_menu->EOF)
{
	foreach($rs_menu->fields as $key => $value)
	{
		$value=stripslashes($value);
		if($key=='reg_date')
		{
			$value=explode(' ', str_replace('-', '.', $value));
		}
		$fix_rows['menu'][$rs_menu->_currentRow][$key]=$value;
	}
	$rs_menu->MoveNext();
}

$rs_menu->close();


//스마티 변수 할당
$etc['Web_URLS']		= $Web_URLS;
$etc['board_title']		= $board_title;
$etc['menu']			= $menu;
$etc['tn']				= $tn;
$etc['mode']			= $mode;
$etc['modes']			= $modes;

$etc['search_select']	= $search_select;
$etc['keyword']			= @htmlspecialchars($keyword);
$etc['pagenum']			= $pagenum;
$etc['pageclick']		= $pageclick;
$etc['site_idx']		= $site_idx;

##스마티에 변수 담기#################
$smarty = new Smarty;
$smarty->compile_check	= true;
$smarty->compile_dir	= Compile_PATH;
$smarty->template_dir	= Template_PATH.$FILE_FOLDER;
$smarty->debugging		= 0;

$smarty->assign("L", $fix_rows);
$smarty->assign("etc", $etc);//기타

##템플릿 페이지 연결#################
$main_contents = $FILE_SKIN."menu.tpl.htm";
$smarty->clearCompiledTemplate();
$smarty->display($main_contents, '', $FILE_FOLDER);
?>