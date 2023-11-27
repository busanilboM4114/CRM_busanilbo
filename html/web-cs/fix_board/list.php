<?php
$pagenum			= intval($_REQUEST['pagenum']);
$search_select		= $_REQUEST['search_select'];
$keyword			= $_REQUEST['keyword'];//검색어

$board_idx			= $_REQUEST['board_idx'];

if($FILE_SKIN=='_a')
{
	$page		= 20; ##하단 페이져의 페이징 단위
	$limit		= 20; ##페이지당 게시물수
}
else
{
	switch($board_config['board_type'])
	{
		case 'normal':
			$page		= 10; ##하단 페이져의 페이징 단위
			$limit		= 10; ##페이지당 게시물수
			break;
		case 'review_horizontal':
			$page		= 3; ##하단 페이져의 페이징 단위
			$limit		= 3; ##페이지당 게시물수
			break;
		case 'review_vertical':
			$page		= 8; ##하단 페이져의 페이징 단위
			$limit		= 8; ##페이지당 게시물수
			break;
		case 'gallery':
			$page		= 8; ##하단 페이져의 페이징 단위
			$limit		= 8; ##페이지당 게시물수
			break;
		case 'faq':
			$page		= 10; ##하단 페이져의 페이징 단위
			$limit		= 10; ##페이지당 게시물수
			break;
		case 'qna':
			$page		= 10; ##하단 페이져의 페이징 단위
			$limit		= 10; ##페이지당 게시물수
			break;
		default:
			$page		= 10; ##하단 페이져의 페이징 단위
			$limit		= 10; ##페이지당 게시물수
			break;
	}
}

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

$list_count = 0;

//삭제한 게시물
$append=" `isdel`=0 ";

//해당 게시판만
//일단 사이트는 구분x
//$append=$append." and `board_idx`='".$board_idx."' ";

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
$sql="select count(`idx`) as `cnt` from `".$DB_TABLE."` where ".$append.$append2;
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
$sql=$sql." (select `title` from `board_config` where `isdel`=0 and `idx`=a.`board_idx`) as board_title ";
$sql=$sql." from `".$DB_TABLE."` ";
$sql=$sql." a where ".$append;
$sql=$sql." order by a.`idx` desc ";
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
		if($key=='reg_date')
		{
			$value=explode(' ', str_replace('-', '.', $value));
		}

		if($key=='contents')
		{
			//여타 암들과 달리 유방암의 발생률은 20년간 꾸준히 증가하고 있고, 발병 연령대도 낮아지는 추세다. 좋은문화병원 유방센터 유동원 소장이 내원 ...
			switch($board_config['board_type'])
			{
				case 'review_horizontal':
					$short_desc=cut_str(strip_tags($value), 150, '.', 3);
					break;
				case 'review_vertical':
					$short_desc=cut_str(strip_tags($value), 82, '.', 3);
					break;
				default:
				case 'normal':
				case 'gallery':
				case 'faq':
				case 'qna':
					break;
			}
		}
		$fix_rows[$rs_board->_currentRow][$key]=$value;
	}
	$fix_rows[$rs_board->_currentRow]['no']=$listnum--;
	$fix_rows[$rs_board->_currentRow]['short_desc']=$short_desc;

	$rs_board->MoveNext();
}

$rs_board->close();

$sql=" select ";
$sql=$sql." a.*, ";
$sql=$sql." 0 as dummy ";
$sql=$sql." from ";
$sql=$sql." `board_config` a";
$sql=$sql." where ";
$sql=$sql." `isdel`=0 ";

@$rs_board_config=$conn->Execute($sql);

if(!$rs_board_config)
{
	error_msg('DB 질의가 실패했습니다.\\n에러코드[l010]');
	exit;
}

while(!$rs_board_config->EOF)
{
	foreach($rs_board_config->fields as $key => $value)
	{
		$value=stripslashes($value);
		if($key=='reg_date')
		{
			$value=explode(' ', str_replace('-', '.', $value));
		}
		$board_config[$rs_board_config->_currentRow][$key]=$value;
	}

	$rs_board_config->MoveNext();
}

##페이징펑션#################
//$total : 전체 글 수, $pagenum : 페이지번호(실제 표시 번호 -1), $search_select : 검색조건
//$keyword : 검색어, $tablename : 테이블명, get으로 달고다닐때... tn값, $menu : 메뉴명
//$limit : 한 목록당 게시글 수, $opt : get에 추가로 달고 다녀야 될 값(&부터 시작)
//$flag : 숨겨야 될 것들 숨기는 구분(테이블 명 등..., 사용자 페이지에서 안 보이도록..., 단 해당 페이지에서 내부적으로 해당 값 처리해야 됨)
if($FILE_SKIN=='_a')
{
	$opt='&board_idx='.$board_idx;
	$pageclick = PageModule($total_count, $pagenum, $search_select, $keyword, $DB_TABLE, $menu, $page, $opt, 1);
}
else
{
	$opt='&board_idx='.$board_idx;
	$pageclick = cPageModule($total_count, $pagenum, $search_select, @htmlspecialchars($keyword), $DB_TABLE, $menu, $page, $opt, 0);
}

//스마티 변수 할당
$etc['search_select']		= $search_select;
$etc['keyword']				= @htmlspecialchars($keyword);
$etc['pagenum']				= $pagenum;
$etc['pageclick']			= $pageclick;
$etc['total_count']			= $total_count;
$etc['board_idx']			= $board_idx;

##스마티에 변수 담기#################
$smarty = new Smarty;
$smarty->compile_check = true;
$smarty->compile_dir = Compile_PATH;
$smarty->template_dir = ROOT_Template_PATH;
$smarty->debugging = 0;

$smarty->assign("L", $fix_rows);//글목록
$smarty->assign("board_config", $board_config);//게시판 목록

$smarty->assign("etc", $etc);//기타, 페이징 변수

##템플릿 페이지 연결#################
$main_contents = $SKIN_PREFIX.$board_config['board_type']."_list.tpl.htm";
$smarty->clearCompiledTemplate();
$smarty->display($main_contents);
?>