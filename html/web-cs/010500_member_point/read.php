<?php
$pagenum			= intval($_REQUEST['pagenum']);
//$search_select	= $_REQUEST['search_select'];//검색범위. a.php / c.php 에 있음
$keyword		= $_REQUEST['keyword'];//검색어

$idx			= intval($_REQUEST['idx']);//기본키

if($keyword)
{
	if($search_select=='all')
	{
		$append=$append." and (`title` like '%".addslashes($keyword)."%' or `contents` like '%".addslashes($keyword)."%') ";
	}
	else
	{
		$append=$append." and `".$search_select."` like '%".addslashes($keyword)."%'";
	}
}

$sql="select ";
$sql=$sql." a.* ";
$sql=$sql." from `".$DB_TABLE."` a ";
$sql=$sql." where a.`mb_no`='".$idx."'";

@$rs_board = $conn->Execute($sql);

if(!$rs_board)
{
	debug_fix($sql, 1);
	error_msg('DB 정보 질의가 실패했습니다.\\n에러코드['.$menu.':001]');
	$rs_board->close();
	exit;
}

if($rs_board->_numOfRows)
{
	foreach($rs_board->fields as $key => $value)
	{
		$value=stripslashes($value);

		if($key=='mb_today_login' || $key=='mb_datetime')
		{
			$value=explode(' ', str_replace('-', '.', $value));
		}
		if($key=='mb_certify')
		{
			if($value=='')
			{
				$value='미인증';
			}
			if($value=='ipin')
			{
				$value='아이핀';
			}
			if($value=='hp')
			{
				$value='휴대폰';
			}
		}
		if($key=='mb_adult')
		{
			if($value==0)
			{
				$value='아니오';
			}
			else
			{
				$value='예';
			}
		}
		if($key=='mb_mailling')
		{
			if($value=='1')
			{
				$value='예';
			}
			else
			{
				$value='아니오';
			}
		}
		if($key=='mb_sms')
		{
			if($value=='1')
			{
				$value='예';
			}
			else
			{
				$value='아니오';
			}
		}
		$fix_rows[$key]=$value;
	}

	if($fix_rows['mb_leave_date'])
	{
		$leave_msg = '<span class="mb_leave_msg">탈퇴함</span>';
	}
	else if ($fix_rows['mb_intercept_date'])
	{
		$intercept_msg = '<span class="mb_intercept_msg">차단됨</span>';
	}

	if($leave_msg || $intercept_msg)
	{
		$fix_rows['status_msg']=$leave_msg.' '.$intercept_msg;
	}
	else
	{
		$fix_rows['status_msg']='정상';
	}

}
else
{
	error_msg('존재하지 않은 자료입니다.');
	exit;
}
$rs_board->close();

################이전글 ################
$sql="select ";
$sql=$sql." a.* ";
$sql=$sql." from `".$DB_TABLE."` a ";
$sql=$sql." where `mb_no` > '" .$idx. "'".$append;
$sql=$sql." order by `mb_no` asc";
$sql=$sql." limit 0, 1";
@$pre = $conn->Execute($sql);
if(!$pre)
{
	error_msg('DB 정보 질의가 실패했습니다.\\n에러코드['.$menu.':002]');
	exit;
}
$p_idx = $pre->fields['mb_no'];
$p_title = stripslashes($pre->fields['mb_name']);

if ( $p_idx )
{
	if($FILE_SKIN=='_a')
	{
		$pre_s		= "<a href=\"?menu=".$menu."&tn=".$tn."&mode=".$mode."&idx=".$p_idx."&search_select=".$search_select."&keyword=".@htmlspecialchars($keyword)."&pagenum=".$pagenum."\">".$p_title."</a>";
	}
	else
	{
		$pre_s		= '<a class="lh_12" href="?mode='.$mode.'&idx='.$p_idx.'&search_select='.$search_select.'&keyword='.@htmlspecialchars($keyword).'&pagenum='.$pagenum.'&category_idx='.$category_idx.'"><img src="/img/board/read_prev.png" alt="" class="vam mgr_20" /></a>';
	}
}
else
{
	if($FILE_SKIN=='_a')
	{
		$pre_s		= '<a href="#none" onclick="return false;">없음.</a>';
	}
	else
	{
		$pre_s		= '';
	}
}
$pre->close();
################이전글 여기까지########
################다음글 ################
$sql="select ";
$sql=$sql." a.* ";
$sql=$sql." from `".$DB_TABLE."` a ";
$sql=$sql." where `mb_no` < '" .$idx. "'".$append;
$sql=$sql." order by `mb_no` desc";
$sql=$sql." limit 0, 1";
@$next = $conn->Execute($sql);
if(!$next)
{
	//echo $sql;
	//print_r($e);
	//exit;
	error_msg('DB 정보 질의가 실패했습니다.\\n에러코드['.$menu.':003]');
	exit;
}
$n_idx = $next->fields['mb_no'];
$n_title = stripslashes($next->fields['mb_name']);

if ( $n_idx )
{
	if($FILE_SKIN=='_a')
	{
		$next_s		= "<a href=\"?menu=".$menu."&tn=".$tn."&mode=".$mode."&idx=".$n_idx."&search_select=".$search_select."&keyword=".@htmlspecialchars($keyword)."&pagenum=".$pagenum."\">".$n_title."</a>";
	}
	else
	{
		$next_s		= '<a class="lh_12" href="?mode='.$mode.'&idx='.$n_idx.'&search_select='.$search_select.'&keyword='.@htmlspecialchars($keyword).'&pagenum='.$pagenum.'&category_idx='.$category_idx.'"><img src="/img/board/read_next.png" alt="" class="vam mgl_20" /></a>';
	}
}
else
{
	if($FILE_SKIN=='_a')
	{
		$next_s		= '<a href="#none" onclick="return false;">없음.</a>';
	}
	else
	{
		$next_s		= '';
	}
}
$next->close();

//스마티 변수 할당
$etc['Admin_Login_Path']	= $Admin_Login_Path;
$etc['Admin_Master_Path']	= $Admin_Master_Path;
$etc['Admin_First_Path']	= $Admin_First_Path;

$etc['board_title']		= $board_title;
$etc['menu']			= $menu;
$etc['tn']				= $tn;

$etc['search_select']	= $search_select;
$etc['keyword']			= @htmlspecialchars($keyword);
$etc['pagenum']			= $pagenum;
$etc['pageclick']		= $pageclick;

$etc['pre_s']			= $pre_s;
$etc['next_s']			= $next_s;

##스마티에 변수 담기#################
$smarty = new Smarty;
$smarty->compile_check	= true;
$smarty->compile_dir	= Compile_PATH;
$smarty->template_dir	= Template_PATH.$FILE_FOLDER;
$smarty->debugging		= 0;

$smarty->assign("L", $fix_rows);//글

$smarty->assign("etc", $etc);//기타
##템플릿 페이지 연결#################
$main_contents = $FILE_SKIN."read.tpl.htm";
$smarty->clearCompiledTemplate();
$smarty->display($main_contents, '', $FILE_FOLDER);
?>