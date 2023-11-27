<?php
$pagenum			= intval($_REQUEST['pagenum']);
$search_select		= $_REQUEST['search_select'];
$keyword			= $_REQUEST['keyword'];//검색어

$idx				= intval($_REQUEST['idx']);//기본키
$board_idx			= $_REQUEST['board_idx'];

switch($search_select)
{
	case '':
	case 'title':
	case 'contents':
	case 'all':
		break;
	default :
		$search_select= $_REQUEST['keyword']=='' ? '' : 'title';
		break;
}

//삭제한 게시물
$append=" `isdel`=0 ";

//해당 게시판만
//일단 사이트는 구분x
//$append=$append." and `board_idx`='".$board_idx."' ";

//공지 제외
$append2=$append2." and `notice`=0";

//공지만
$append3=$append3." and `notice`=1";

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
$sql=$sql." a.*, ";
$sql=$sql." (select `title` from `board_config` where `isdel`=0 and `idx`=a.`board_idx`) as board_title ";
$sql=$sql." from `".$DB_TABLE."` ";
$sql=$sql." a where ".$append;
$sql=$sql." and a.`idx`='".$idx."'";

@$rs_board = $conn->Execute($sql);

if(!$rs_board)
{
	debug_fix($sql, 1);
	error_msg('DB 정보 질의가 실패했습니다.\\n에러코드[r001]');
	$rs_board->close();
	exit;
}

if($rs_board->_numOfRows)
{
	if($FILE_SKIN=='_c')
	{
		$sql="update `".$DB_TABLE."` set `hits`=`hits`+1 where `idx`='".$idx."'";
		@$rs_hit=$conn->Execute($sql);
		$rs_hit->close();
	}

	foreach($rs_board->fields as $key => $value)
	{
		$value=stripslashes($value);

		if($key=='reg_date')
		{
			$value=explode(' ', str_replace('-', '.', $value));
		}
		if($key=='hits' && $FILE_SKIN=='_c')
		{
			$value=$value+1;
		}
		if($key=='contents')
		{
		}
		$fix_rows[$key]=$value;
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
$sql=$sql." where `isdel`='0' and `idx` > '" .$idx. "'".$append;
//공지일땐 공지 이전글
if($fix_rows['notice'])
{
	$sql=$sql.$append3;
}
else
{
	$sql=$sql.$append2;
}
$sql=$sql." order by `idx` asc";
$sql=$sql." limit 0, 1";
@$pre = $conn->Execute($sql);
if(!$pre)
{
	error_msg('DB 정보 질의가 실패했습니다.\\n에러코드['.$menu.':002]');
	exit;
}
$p_idx = $pre->fields['idx'];
$p_title = stripslashes($pre->fields['title']);

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
$sql=$sql." where `isdel`='0' and `idx` < '" .$idx. "'".$append;
//공지일땐 공지 이전글
if($fix_rows['notice'])
{
	$sql=$sql.$append3;
}
else
{
	$sql=$sql.$append2;
}
$sql=$sql." order by `idx` desc";
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
$n_idx = $next->fields['idx'];
$n_title = stripslashes($next->fields['title']);

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
$etc['search_select']	= $search_select;
$etc['keyword']			= @htmlspecialchars($keyword);
$etc['pagenum']			= $pagenum;

$etc['pre_s']			= $pre_s;
$etc['next_s']			= $next_s;
$etc['board_idx']		= $board_idx;

##스마티에 변수 담기#################
$smarty = new Smarty;
$smarty->compile_check	= true;
$smarty->compile_dir	= Compile_PATH;
$smarty->template_dir	= ROOT_Template_PATH;
$smarty->debugging		= 0;

$smarty->assign("L", $fix_rows);//글목록
$smarty->assign("board_config", $board_config);//게시판 목록

$smarty->assign("etc", $etc);//기타, 페이징 변수

##템플릿 페이지 연결#################
$main_contents = $SKIN_PREFIX.$board_config['board_type']."_read.tpl.htm";
$smarty->clearCompiledTemplate();
$smarty->display($main_contents);
?>