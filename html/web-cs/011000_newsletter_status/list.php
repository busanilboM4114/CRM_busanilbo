<?php
$pagenum				= intval($_REQUEST['pagenum']);
//$search_select		= $_REQUEST['search_select'];//검색범위. a.php / c.php 에 있음
$keyword				= $_REQUEST['keyword'];//검색어

$newsletter_group_idx	= intval($_REQUEST['newsletter_group_idx']);

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
$append=" a.`idx`!=0 ";

if($keyword)
{
	if($search_select=='all')
	{
		$append=$append." and (`title` like '%".addslashes($keyword)."%' or `contents` like '%".addslashes($keyword)."%') ";
	}
	else
	{
		$append=$append." and b.`".$search_select."` like '%".addslashes($keyword)."%'";
	}
}

if($newsletter_group_idx!='' && $newsletter_group_idx!='0')
{
	$append=$append." and `newsletter_group_idx`='".$newsletter_group_idx."' ";
}

//게시글 수
$sql="select count(a.`idx`) as `cnt` from `".$DB_TABLE."` a join `g5_member_new` b on a.`mb_no`=b.`mb_no` where ".$append.$append2;
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
$sql=$sql." a.*, ";
$sql=$sql." b.`mb_id`, b.`mb_name`, b.`mb_nick` ";
$sql=$sql." from `".$DB_TABLE."` a ";
$sql=$sql." join ";
$sql=$sql." `g5_member_new` b ";
$sql=$sql." on a.`mb_no`=b.`mb_no` ";
$sql=$sql." where ".$append;
$sql=$sql." order by a.`idx` desc ";
$sql=$sql." limit ".$offset.", ".$limit;

@$rs_board = $conn->Execute($sql);

if(!$rs_board)
{
	debug_fix($sql, 1);
	error_msg('DB 질의가 실패했습니다.\\n에러코드[l005]');
	exit;
}

while(!$rs_board->EOF)
{
	foreach($rs_board->fields as $key => $value)
	{
		$value=stripslashes($value);

		if($key=='newsletter_group_idx')
		{
			switch($value)
			{
				case '1':
					$value='B-read';
					$newsletter_icon='<img src="./img/b-read.png" width="15" height="15" />';
					break;
				case '2':
					$value='경건한 주말';
					$newsletter_icon='<img src="./img/weekend.png" width="15" height="15" />';
					break;
				case '3':
					$value='Week&Joy';
					$newsletter_icon='<img src="./img/wandj.png" width="15" height="15" />';
					break;
				case '4':
					$value='논설위원의 뉴스 요리';
					$newsletter_icon='<img src="./img/news-cook.png" width="15" height="15" />';
					break;
				default:
					$value='오류[미지정]';
					break;
			}
		}

		$fix_rows[$rs_board->_currentRow][$key]=$value;
	}
	$fix_rows[$rs_board->_currentRow]['no']=$listnum--;

	$fix_rows[$rs_board->_currentRow]['newsletter_icon']=$newsletter_icon;

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
	$opt='&newsletter_group_idx='.$newsletter_group_idx;
	$pageclick = PageModule($total_count, $pagenum, $search_select, $keyword, $DB_TABLE, $menu, $page, $opt, 1);
}
else
{
	$opt='&category_idx='.$category_idx;
	$pageclick = cPageModule($total_count, $pagenum, $search_select, @htmlspecialchars($keyword), $DB_TABLE, $menu, $page, $opt, 0);
}

//스마티 변수 할당
$etc['Admin_Login_Path']		= $Admin_Login_Path;
$etc['Admin_Master_Path']		= $Admin_Master_Path;
$etc['Admin_First_Path']		= $Admin_First_Path;

$etc['board_title']				= $board_title;
$etc['menu']					= $menu;
$etc['tn']						= $tn;

$etc['search_select']			= $search_select;
$etc['keyword']					= @htmlspecialchars($keyword);
$etc['pagenum']					= $pagenum;
$etc['pageclick']				= $pageclick;
$etc['category_idx']			= $category_idx;
$etc['total_count']				= $total_count;
$etc['newsletter_group_idx']	= $newsletter_group_idx;

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