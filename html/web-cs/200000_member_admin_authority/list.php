<?php
$pagenum			= intval($_REQUEST['pagenum']);
//$search_select	= $_REQUEST['search_select'];//검색범위. a.php / c.php 에 있음
$keyword			= $_REQUEST['keyword'];//검색어

$join_type			= $_REQUEST['join_type'];

if($FILE_SKIN=='_a')
{
	$page		= 20; ##하단 페이져의 페이징 단위
	$limit		= 20; ##페이지당 게시물수
}
else
{
	$page		= 6; ##하단 페이져의 페이징 단위
	$limit		= 6; ##페이지당 게시물수
}

$list_count = 0;

//삭제한 게시물
$append=" `mb_no`!=0 ";

//슈퍼관리자만
$append=$append." and `member_type`='90' ";

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

if($join_type)
{
	if($join_type=='busan')
	{
		$append=$append." and `mb_id` not like 'naver%' and `mb_id` not like 'kakao%' ";
	}
	else
	{
		$append=$append." and `mb_id` like '".$join_type."%' ";
	}
}

//게시글 수
$sql="select count(`mb_no`) as `cnt` from `".$DB_TABLE."` where ".$append.$append2;
@$rs=$conn->Execute($sql);
if(!$rs)
{
	debug_fix($sql, 1);
	error_msg('DB 질의가 실패했습니다.\\n에러코드[l001]');
	exit;
}

$total_count=$rs->fields['cnt'];
$pagesu		= ceil($total_count/$page);

if($pagenum>($pagesu-1) && $pagesu!=0)
{
	$pagenum=$pagesu-1;
}

$listnum	= $total_count - $pagenum * $page;

$offset=$limit*$pagenum;

if($offset<0)
{
	$offset = 0;
}

$rs->close();

//게시판 기본
$sql="select ";
$sql=$sql." a.* ";
$sql=$sql." from `".$DB_TABLE."` ";
$sql=$sql." a where ".$append;
$sql=$sql." order by a.`mb_no` desc ";
$sql=$sql." limit ".$offset.", ".$limit;

@$rs_board = $conn->Execute($sql);

if(!$rs_board)
{
	error_msg('DB 질의가 실패했습니다.\\n에러코드[l005]');
	exit;
}

while(!$rs_board->EOF)
{
	foreach($rs_board->fields as $key => $value)
	{
		$value=stripslashes($value);
		if($key=='member_admin_date')
		{
			$value=explode(' ', str_replace('-', '.', $value));
		}
		if($key=='mb_id')
		{
			$join_type_icon=explode('_', $value);
		}
		$fix_rows[$rs_board->_currentRow][$key]=$value;
	}
	$fix_rows[$rs_board->_currentRow]['no']=$listnum--;

	$rs_board->MoveNext();
}

$rs_board->close();

##페이징펑션#################
//$total : 전체 글 수, $pagenum : 페이지번호(실제 표시 번호 -1), $search_select : 검색조건
//$keyword : 검색어, $tablename : 테이블명, get으로 달고다닐때... tn값, $menu : 메뉴명
//$limit : 한 목록당 게시글 수, $opt : get에 추가로 달고 다녀야 될 값(&부터 시작)
//$flag : 숨겨야 될 것들 숨기는 구분(테이블 명 등..., 사용자 페이지에서 안 보이도록..., 단 해당 페이지에서 내부적으로 해당 값 처리해야 됨)
if($FILE_SKIN=='_a')
{
	$opt='&join_type='.$join_type;
	$pageclick = PageModule($total_count, $pagenum, $search_select, $keyword, $DB_TABLE, $menu, $page, $opt, 1);
}
else
{
	$opt='&category_idx='.$category_idx;
	$pageclick = cPageModule($total_count, $pagenum, $search_select, @htmlspecialchars($keyword), $DB_TABLE, $menu, $page, $opt, 0);
}

//스마티 변수 할당
$etc['Admin_Login_Path']	= $Admin_Login_Path;
$etc['Admin_Master_Path']	= $Admin_Master_Path;
$etc['Admin_First_Path']	= $Admin_First_Path;

$etc['board_title']			= $board_title;
$etc['menu']				= $menu;
$etc['tn']					= $tn;

$etc['search_select']		= $search_select;
$etc['keyword']				= @htmlspecialchars($keyword);
$etc['pagenum']				= $pagenum;
$etc['pageclick']			= $pageclick;
$etc['category_idx']		= $category_idx;
$etc['total_count']			= $total_count;
$etc['join_type']			= $join_type;

##스마티에 변수 담기#################
$smarty = new Smarty;
$smarty->compile_check = true;
$smarty->compile_dir = Compile_PATH;
$smarty->template_dir = Template_PATH.$FILE_FOLDER;
$smarty->debugging = 0;

$smarty->assign("L", $fix_rows);//글목록
$smarty->assign("L2", $fix_rows2);//공지목록

$smarty->assign("etc", $etc);//기타, 페이징 변수
$smarty->assign("category", $category);

##템플릿 페이지 연결#################
$main_contents = $FILE_SKIN."list.tpl.htm";
$smarty->clearCompiledTemplate();
$smarty->display($main_contents, '', $FILE_FOLDER);
?>