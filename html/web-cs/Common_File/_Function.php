<?php

/**************************** 페이지 함수 ****************************
 * page   = 10					  : 페이지당 출력 갯수
 * pagesu = ceil(전체 / 페이지)   : 페이지수를 구함
 * start  = (페이지 * 페이지번호) : 가져올 시작위치를 결정
 *
 *
 *
 */
 //$totla : 전체 글 수, $pagenum : 페이지번호(실제 표시 번호 -1), $search_select : 검색조건
 //$keyword : 검색어, $tablename : 테이블명, get으로 달고다닐때... tn값, $menu : 메뉴명
 //$limit : 한 목록당 게시글 수, $opt : get에 추가로 달고 다녀야 될 값(&부터 시작)
 //$flag : 숨겨야 될 것들 숨기는 구분(테이블 명 등..., 사용자 페이지에서 안 보이도록..., 단 해당 페이지에서 내부적으로 해당 값 처리해야 됨)
function PageModule($total, $pagenum, $search_select='', $keyword='', $tablename='', $menu='', $limit='', $opt='', $flag='')
{
	global $Admin_Login_Path, $Admin_Master_Path, $Admin_First_Path;

	//echo '$total:'.$total.'<br />';
	//echo '$limit:'.$limit;
	$first_img	= "처음";
	$prev_img	= "이전";
	$next_img	= "다음";
	$last_img	= "끝";

	$page=$limit;
	$pagesu=ceil($total/$page);
	if($pagesu<1)
	{
		$pagesu=1;
	}

	$keyword=urlencode($keyword);

	$start=($page*$pagenum);

	$self_url=isset($HTTP_ENV_VARS['PHP_SELF']);

	if($flag)
	{
		$opt=$opt."&tn=".$tablename."&menu=".$menu;
	}

	$pageviewsu=10; // 1 [2] [3] [4] [5] [6] [7] [8] [9] [10] [▶▶]  정함
	$pagegroup=ceil(($pagenum+1)/$pageviewsu); //페이지 그룹결정

	$pagestart=($pageviewsu*($pagegroup-1))+1; //시작페이지결정
	if($pagestart<1)
	{
		$pagestart=1;
	}

	$pageend=$pagestart+$pageviewsu-1; //종료페이지결정
	if($pageend<1)
	{
		$pageend=1;
	}

	if ( $pagenum > 0 ) {
		$strPagelist .= '<li class="paginate_button page-item previous"><a  class="page-link" href="'.$self_url.'?pagenum=0&search_select='.$search_select.'&keyword='.$keyword.$opt.'">'.$first_img.'</a></li>';
		$strPagelist .= '<li class="paginate_button page-item previous"><a class="page-link" href="'.$self_url.'?pagenum='.($pagenum-1).'&search_select='.$search_select.'&keyword='.$keyword.$opt.'">'.$prev_img.'</a></li>';
	} else {
		$strPagelist .= '<li class="paginate_button page-item previous disabled"><a href="#none" class="page-link" onclick="return false;">'.$first_img.'</a></li>';
		$strPagelist .= '<li class="paginate_button page-item previous disabled"><a href="#none" class="page-link" onclick="return false;">'.$prev_img.'</a></li>';
	}
	for($i=$pagestart;$i<=$pageend;$i++)
	{
		if($pagesu<$i){ $lastpage = $i; break;}
		$j=$i-1;

		if($j==$pagenum){
			$strPagelist .=  '<li class="paginate_button page-item active"><a href="#none" class="page-link" onclick="return false;">'.$i.'</a></li>';
		} else {
			$strPagelist .= '<li class="paginate_button page-item "><a href="'.$self_url.'?pagenum='.$j.'&search_select='.$search_select.'&keyword='.$keyword.$opt.'" class="page-link">'.$i.'</a></li>';
		}
		//if ( $pageend > 1 && $i < $pagesu ) { $strPagelist .= "&nbsp;"; }
	}

	if ( $pagenum<$pagesu-1 ) {
		$strPagelist .= '<li class="paginate_button page-item next"><a href="'.$self_url.'?pagenum='.($pagenum+1).'&search_select='.$search_select.'&keyword='.$keyword.$opt.'" class="page-link">'.$next_img.'</a></li>';
		$strPagelist .= '<li class="paginate_button page-item next"><a href="'.$self_url.'?pagenum='.($pagesu-1).'&search_select='.$search_select.'&keyword='.$keyword.$opt.'" class="page-link">'.$last_img.'</a></li>';
	} else {
		$strPagelist .= '<li class="paginate_button page-item next disabled"><a href="#none" class="page-link" onclick="return false;">'.$next_img.'</a></li>';
		$strPagelist .= '<li class="paginate_button page-item next disabled"><a href="#none" class="page-link" onclick="return false;">'.$last_img.'</a></li>';
	}

	return $strPagelist;
}

function cPageModule($total, $pagenum, $search_select='', $keyword='', $tablename='', $menu='', $limit='', $opt='', $flag='')
{
	$prev_img	= '<i class="fa-solid fa-chevron-left"></i>';
	$next_img	= '<i class="fa-solid fa-chevron-right"></i>';

	//echo '$total:'.$total.'<br />';
	//echo '$limit:'.$limit;
	$page=$limit;
	$pagesu=ceil($total/$page);
	if($pagesu<1)
	{
		$pagesu=1;
	}

	$search_select=$search_select;
	$keyword=$keyword;

	$start=($page*$pagenum);

	$self_url=isset($HTTP_ENV_VARS['PHP_SELF']);

	if($flag)
	{
		$opt=$opt."&tn=".$tablename."&menu=".$menu;
	}

	$pageviewsu=10; // 1 [2] [3] [4] [5] [6] [7] [8] [9] [10] [▶▶]  정함
	$pagegroup=ceil(($pagenum+1)/$pageviewsu); //페이지 그룹결정

	$pagestart=($pageviewsu*($pagegroup-1))+1; //시작페이지결정
	if($pagestart<1)
	{
		$pagestart=1;
	}

	$pageend=$pagestart+$pageviewsu-1; //종료페이지결정
	if($pageend<1)
	{
		$pageend=1;
	}

	$strPagelist='';

	if ( $pagenum > 0 ) {
		$strPagelist .= '<li class="button2"><a href="?pagenum='.($pagenum-1).'&search_select='.$search_select.'&keyword='.$keyword.$opt.'" onclick="return false;" class="board_button">'.$prev_img.'</a></li>';

	} else {
		$strPagelist .= '<li class="button2"><a href="#none" onclick="return false;" class="board_button">'.$prev_img.'</a></li>';
	}
	//echo $pagestart;
	//echo $pageend;
	//echo $pagenum;

	for($i=$pagestart;$i<=$pageend;$i++)
	{
		if($pagesu<$i){ $lastpage = $i; break;}
		$j=$i-1;

		//echo '$j:'.$j;
		//echo '$j==$pagenum:'."$j==$pagenum";

		if($j==$pagenum){
			$strPagelist .=  '<li><a href="#none" onclick="return false;" class="page-numbers current" title="'.$i.'페이지">'.$i.'</a></li>';
		} else {
			$strPagelist .= '<li><a href="?pagenum='.$j.'&search_select='.$search_select.'&keyword='.$keyword.$opt.'" class="page-numbers" title="'.$i.'페이지로 이동합니다.">'.$i.'</a></li>';
		}
		if ( $pageend > 1 && $i < $pagesu ) { $strPagelist .= ""; }
	}

	if ( $pagenum<$pagesu-1 ) {
		$strPagelist .= '<li class="button3"><a href="?pagenum='.($pagenum+1).'&search_select='.$search_select.'&keyword='.$keyword.$opt.'" class="board_button">'.$next_img.'</a></li>';
	} else {
		$strPagelist .= '<li class="button3"><a href="#none" onclick="return false;" class="board_button">'.$next_img.'</a></li>';
	}

	//$strPagelist.="</tr>
		//</table>";
	return $strPagelist;
}

########20091123 신영수 주임추가
function convdate ($day) {
	$tmpDay	= date( "w", $day );
	switch( $tmpDay )
	{
		case "0":	$return_str	= "일"; break;
		case "1":	$return_str	= "월"; break;
		case "2":	$return_str	= "화"; break;
		case "3":	$return_str	= "수"; break;
		case "4":	$return_str	= "목"; break;
		case "5":	$return_str	= "금"; break;
		case "6":	$return_str	= "토"; break;
	}
	return $return_str;
}
########20091123 신영수 주임추가
function substring($source, $size_to_cut) {
	if($size_to_cut >= strlen($source) || $size_to_cut < 1)	{
		return $source;
	} else {
		$str = '';

		for($pos = 0; $pos < $size_to_cut; $pos++) {
			$temp = substr($source, $pos, 1);

			// 코드값이 127보다 크면 2바이트 문자로 간주
			if(ord($temp) > 127) {

				// 자르고자 하는 수가 한글의 가운데 위치하는 경우 바로 앞글자까지 자름
				if(($pos + 1) < $size_to_cut) {
					$str .= substr($source, $pos, 2);
					$pos++;
				}
			} else {
				$str .= $temp;
			}
		}

		return $str . '. . .';
	}
}

//---------------------------------------------------------------------------------------------
// message prints
//
//---------------------------------------------------------------------------------------------
function error_msg($msg) {
	echo "
		<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
		<html lang=\"ko\" xml:lang=\"ko\" xmlns=\"http://www.w3.org/1999/xhtml\">
		<head>
		<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
		<script type=\"text/javascript\">
		alert(\"".$msg."\");
		history.back();
		</script>
		</head>
		<body>
		</body>
		</html>
		";
	exit;
}

function alert_replace($msg, $url) {
	echo "
		<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
		<html lang=\"ko\" xml:lang=\"ko\" xmlns=\"http://www.w3.org/1999/xhtml\">
		<head>
		<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
		<script type=\"text/javascript\">
		alert(\"".$msg."\");
		location.replace(\"".$url."\");
		</script>
		</head>
		<body>
		</body>
		</html>
		";
	exit;
}

function Encrypt($string)
{
	$crypted = crypt(md5($string), md5($string));
	return $crypted;
}


//string strip_tags ( string str,  [허용태그])
//$string = strip_tags($string, '<a><b><i><u>'); 와 같다
function safeHTML($text) {
       $text = stripslashes($text);
       $text = strip_tags($text, '<b><i><u><a><font><img>');
       $text = ereg_replace ("<a[^>]+href *= *([^ ]+)[^>]*>", "<a href=\\1>", $text);
       $text = ereg_replace ("<([b|i|u])[^>]*>", "<\\1>", $text);
       return $text;
}

//자동으로 링크 걸어준다 사용예는 http://www.pknu.ac.kr 로 해야 한다
function autolink($str) {
		// URL 치환
		$homepage_pattern = "/([^\"\'\=\>])(mms|http|HTTP|ftp|FTP|telnet|TELNET)\:\/\/(.[^ \n\<\"\']+)/";
		$str = preg_replace($homepage_pattern,"\\1<a href=\\2://\\3 target=_blank>\\2://\\3</a>", " ".$str);

		// 메일 치환
		$email_pattern = "/([ \n]+)([a-z0-9\_\-\.]+)@([a-z0-9\_\-\.]+)/";
		$str = preg_replace($email_pattern,"\\1<a href=mailto:\\2@\\3>\\2@\\3</a>", " ".$str);

		return $str;
}

// 문자열 끊기 (이상의 길이일때는 ... 로 표시)
function cut_str($msg,$cut_size, $add_str='.', $repeat_length=3) {
	mb_internal_encoding('utf-8');
	if($cut_size >= mb_strlen($msg))
	{
		return $msg;
	}
	else
	{
		$pointtmp =  mb_substr($msg,0,$cut_size).str_repeat($add_str,$repeat_length);
		return $pointtmp;
	}
}

//윤달 유무 확인
//윤달일경우 false
//윤달이 아닐경우 true
function isLeafYear($year,$month) {
	$mon_array=array(1=>31,2=>29,3=>31,4=>30,5=>31,6=>30,7=>31,8=>31,9=>30,10=>31,11=>30,12=>31);
	if(!checkdate($month,$mon_array[$month],$year)) return false;
	return true;
}

//X해의 Y달 마지막 날 구함
function getLastDay($year,$month) {
	$mon_array=array(1=>31,2=>29,3=>31,4=>30,5=>31,6=>30,7=>31,8=>31,9=>30,10=>31,11=>30,12=>31);
	if($month==2) {
		if(!checkdate($month,$mon_array[$month],$year)) {
			$mon_array[$month]=28;
		}
	}

	return $mon_array[$month];
}

//상단 메뉴 활성화
//2010-11-24 박창영
//fn_nav(총 상단 메뉴 개수 , 몇번째 메뉴)
function fn_nav($max, $tap)
{
	$nav_class = array();
	for($i=1;$i<=$max;$i++){
		if( $i == $tap ){
			$nav_class[$i] = "nav_on";
		}else{
			$nav_class[$i] = "nav_off";
		}
	}

	return $nav_class;
}

//좌측 메뉴 활성화
//2010-11-24 박창영
//fn_leftmenu(총 좌측 메뉴 개수 , 몇번째 메뉴)
function fn_leftmenu($max, $tap){
	$left_class = array();
	for($i=1;$i<=$max;$i++){
		if( $i == $tap ){
			$left_class[$i] = "left_on";
		}else{
			$left_class[$i] = "left_off";
		}
	}
	return $left_class;
}

//메뉴 활성화
//fn_menu(총 메뉴 개수 , 몇 번째 메뉴, 활성화 스타일, 비활성화 스타일)
function fn_menu($max, $on, $on_style, $off_style)
{
	for($i=1;$i<=$max;$i++)
	{
		if( $i == $on )
		{
			$menu_style[$i] = $on_style;
		}
		else
		{
			$menu_style[$i] = $off_style;
		}
	}

	return $menu_style;
}

//스크립트 페이지 이동
//2010-11-30 조영범
//함수 호출 후 페이지 종료 시 항상 exit 추가할것
function script_mov($url){
echo "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html lang=\"ko\" xml:lang=\"ko\" xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
<script type=\"text/javascript\">
location.href='".$url."';
</script>
</head>
<body>
</body>
</html>
";
}

//스크립트 페이지 이동(history 안 남음(브라우저 상의 뒤로 가기시 처리 페이지가 아닌 그 이전 페이지로 감)
//2010-12-14 조영범
//함수 호출 후 페이지 종료 시 항상 exit 추가할것
function script_replace($url){
echo "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html lang=\"ko\" xml:lang=\"ko\" xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
<script type=\"text/javascript\">
location.replace('".$url."');
</script>
</head>
<body>
</body>
</html>
";
}

//스크립트 메시지 후 페이지 이동(history 안 남음(브라우저 상의 뒤로 가기시 처리 페이지가 아닌 그 이전 페이지로 감)
//2010-12-20 조영범
//함수 호출 후 페이지 종료 시 항상 exit 추가할것
function script_alert_replace($msg, $url){
echo "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html lang=\"ko\" xml:lang=\"ko\" xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
<script type=\"text/javascript\">
alert(\"".$msg."\");
location.replace(\"".$url."\");
</script>
</head>
<body>
</body>
</html>
";
}


//스크립트 alert 후 창 닫기
//2010-12-7 조영범
//함수 호출 후 페이지 종료 시 항상 exit 추가할것
function script_alert_close($msg){
echo "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html lang=\"ko\" xml:lang=\"ko\" xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
<script type=\"text/javascript\">
alert(\"".$msg."\");
self.close();
</script>
</head>
<body>
</body>
</html>
";
}

//스크립트 부모창 url 이동 후 창 닫기
//2010-12-7 조영범
//함수 호출 후 페이지 종료 시 항상 exit 추가할것
function script_alert_mov_close($msg, $url){
echo "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html lang=\"ko\" xml:lang=\"ko\" xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
<script type=\"text/javascript\">
alert(\"".$msg."\");
opener.location.href=\"".$url."\");
self.close();
</script>
</head>
<body>
</body>
</html>
";
}

function script_alert_reload_close($msg){
echo "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html lang=\"ko\" xml:lang=\"ko\" xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
<script type=\"text/javascript\">
alert(\"".$msg."\");
opener.location.reload();
self.close();
</script>
</head>
<body>
</body>
</html>
";
}


//스크립트 부모창 url 이동 후 창 닫기
//2010-12-7 조영범
//함수 호출 후 페이지 종료 시 항상 exit 추가할것
function script_mov_close($url){
echo "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html lang=\"ko\" xml:lang=\"ko\" xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
<script type=\"text/javascript\">
opener.location.href=\"".$url."\";
self.close();
</script>
</head>
<body>
</body>
</html>
";
}

//스크립트 새로고침 후 창 닫기
//2011-03-28 조영범
//함수 호출 후 페이지 종료 시 항상 exit 추가할것
function script_opener_reload(){
echo "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html lang=\"ko\" xml:lang=\"ko\" xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
<script type=\"text/javascript\">
opener.location.reload();
self.close();
</script>
</head>
<body>
</body>
</html>
";
}

function script_parent_function($function){
echo "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html lang=\"ko\" xml:lang=\"ko\" xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
<script type=\"text/javascript\">
parent.".$function."();
</script>
</head>
<body>
</body>
</html>
";
}

function script_parent_replace($url){
echo "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html lang=\"ko\" xml:lang=\"ko\" xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
<script type=\"text/javascript\">
parent.location.replace(\"".$url."\");
</script>
</head>
<body>
</body>
</html>
";
}

function script_alert_parent_function($msg, $function){
echo "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html lang=\"ko\" xml:lang=\"ko\" xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
<script type=\"text/javascript\">
alert(\"".$msg."\");
parent.".$function."();
</script>
</head>
<body>
</body>
</html>
";
}

function script_reload_close(){
echo "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html lang=\"ko\" xml:lang=\"ko\" xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
<script type=\"text/javascript\">
opener.location.reload();
self.close();
</script>
</head>
<body>
</body>
</html>
";
}

function script_close(){
echo "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html lang=\"ko\" xml:lang=\"ko\" xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
<script type=\"text/javascript\">
self.close();
</script>
</head>
<body>
</body>
</html>
";
}

//디버깅용, val 전체 뿌려줌
function debug_fix($val, $flag)
{
	if($_SERVER['REMOTE_ADDR']=='115.94.180.37' || $_SERVER['REMOTE_ADDR']=='115.94.180.38')
	{
		print_r($val);
		echo '<br />';
		if($flag)
		{
			exit;
		}
	}
}

function get_error_msg($error_category, $error_no)
{
	global $conn, $FILE_FOLDER;
	$sql="select `error_msg`, `error_no` from `fix_error_msg` where `error_category`='".$error_category."' and `error_no`='".$error_no."'";
	$rs=$conn->Execute($sql);
	if(!$rs->fields['error_msg'])
	{
		error_msg('정의되지 않은 에러코드입니다.\\n에러코드['.$FILE_FOLDER.':'.$error_no.']');
		exit;
	}
	return $rs->fields;
}

//임시비밀번호
function RanPass() {
 $passcon = 'abcdefghijklmnopqrstuvwxyz';
 $passcon .= '23456789';
 $newpwd  = "";
    for ($i = 0; $i < 8; $i++) { $newpwd .= $passcon[(rand() % strlen($passcon))]; }
    return $newpwd;
}

//포스트 전송용
function post_submit($link, $val)
{
echo "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html lang=\"ko\" xml:lang=\"ko\" xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
</head>
<body>
<form name=\"submit_frm\" method=\"post\" action=\"".$link."\">
";
foreach($val as $key => $value)
{
	echo "<input type=\"hidden\" name=\"".$key."\" value=\"".$value."\" />";
}
echo "
</form>
<script type=\"text/javascript\">
document.submit_frm.submit();
</script>
</body>
</html>
";
}

//php json 지원하는 버전을 위해 함수명뒤에 2붙임
function json_encode2($data)
{
	switch (gettype($data))
	{
		case 'boolean':
			return $data?'true':'false';
		case 'integer':
		case 'double':
			return $data;
		case 'string':
			return '"'.strtr($data, array('\\'=>'\\\\','"'=>'\\"')).'"';
		case 'array':
			$rel = false; // relative array?
			$key = array_keys($data);
			foreach ($key as $v)
			{
				if (!is_int($v))
				{
					$rel = true;
					break;
				}
			}
			$arr = array();
			foreach ($data as $k=>$v)
			{
				$arr[] = ($rel?'"'.strtr($k, array('\\'=>'\\\\','"'=>'\\"')).'":':'').json_encode2($v);
			}
			return $rel?'{'.join(',', $arr).'}':'['.join(',', $arr).']';
		default:
			return '""';
	}
}

//php json 지원하는 버전을 위해 함수명뒤에 2붙임
if (!function_exists('json_decode2'))
{
	function json_decode2($content, $assoc=false)
	{
		require_once $_SERVER['DOCUMENT_ROOT'].'/html/web-cs/Common_File/JSON.php';
		if ($assoc)
		{
			$json = new Services_JSON(SERVICES_JSON_LOOSE_TYPE);
		}
		else
		{
			$json = new Services_JSON;
		}
		return $json->decode($content);
	}
}

//javascript escape 디코딩
function unescape($text){
	return urldecode(preg_replace_callback('/%u([[:alnum:]]{4})/', 'toString', $text));
}
function toString($text){
	return iconv('UTF-16LE', 'utf-8', chr(hexdec(substr($text[1], 2, 2))).chr(hexdec(substr($text[1], 0, 2))));
}

function iPadCheck() {
	$MobileArray  = array("ipad");


    $checkCount = 0;
        for($i=0; $i<sizeof($MobileArray); $i++){
            if(preg_match("/$MobileArray[$i]/", strtolower($_SERVER['HTTP_USER_AGENT']))){ $checkCount++; break; }
        }
   return ($checkCount >= 1) ? "Mobile" : "Computer";
}


function MobileCheck() {
    //global $HTTP_USER_AGENT;
	//echo $HTTP_USER_AGENT;
	//echo $_SERVER['HTTP_USER_AGENT'];
	$MobileArray  = array("iphone","lgtelecom","skt","mobile","samsung","nokia","blackberry","android","sony","phone");


    $checkCount = 0;
        for($i=0; $i<sizeof($MobileArray); $i++){
            if(preg_match("/$MobileArray[$i]/", strtolower($_SERVER['HTTP_USER_AGENT']))){ $checkCount++; break; }
        }
   return ($checkCount >= 1) ? "Mobile" : "Computer";
}

//utf-8메일, euc-kr일 경우 htmlMimeMail.php 사용
function sendSimpleMail($mailTo, $mailFrom, $subject, $message)
{
		$mailHeader = "from:{$mailFrom} \n";
		$mailHeader .= "Return-Path:{$mailFrom} \n";
		$mailHeader .= "Reply-To:{$mailFrom} \n";
		$mailHeader .= "MIME-Version:1.0 \n";
		$mailHeader .= "Content-Type: text/html;\n \tcharset=utf-8\n";

		$flag = mail($mailTo, $subject, $message, $mailHeader);
		return $flag;
}

function object2array($object)
{
	return @json_decode(@json_encode($object),1);
}

function getFileExt($name)
{
	$ExtSet  = array(
			'gif','jpg','jpeg','bmp','png','swf','fla','pds','ai','tif','pcx','ppj', //이미지,플래쉬
			'mid','wav','mp3', //사운드
			'asf','asx','avi','mpg','mpeg','wmv','wma','ra','ram','mov', //동영상
			'doc','docx','xls','xlsx','ppt','pptx','hwp','hlp','eml','pdf', //오피스
			'zip','tar','trz','gz','rar','alz','tgz', //압축
			'exe','dll','reg','ini', //실행
			'php','php3','class','java','htm','html','txt','cgi','pl','jsp','asp','xml'//web 총53개
		);

	$FileNameArr = explode('.', strtolower($name));
	$ext = $FileNameArr[count($FileNameArr)-1];

	if(in_array($ext, $FileNameArr))
	{
		return $ext;
	}
	else {
		return "unknown";
	}
}

function isHttpsRequest()
{
	if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443)
	{
		return true;
	}
	return false;
}

function mysqli_result($res,$row=0,$col=0)
{
	$nums=mysqli_num_rows($res);
	if($nums && $row<=($nums-1) && $row>=0)
	{
		mysqli_data_seek($res,$row);
		$resrow=(is_numeric($col))?mysqli_fetch_row($res):mysqli_fetch_assoc($res);
		if(isset($resrow[$col]))
		{
			return $resrow[$col];
		}
	}
	return false;
}

// 쿠키변수 생성
function set_cookie($cookie_name, $value, $expire){
	$arr_cookie_options = array (
		'expires' => time() + $expire,
		'path' => '/',
		'domain' => '.fixtest.co.kr', // leading dot for compatibility or use subdomain
		'secure' => false,     // or false
		'httponly' => false,    // or false
		'samesite' => 'None' // None || Lax  || Strict
	);
	setcookie(md5($cookie_name), base64_encode($value), $arr_cookie_options);
}
// 쿠키변수값 얻음
function get_cookie($cookie_name){
	$cookie = md5($cookie_name);
	if (array_key_exists($cookie, $_COOKIE))
		return base64_decode($_COOKIE[$cookie]);
	else
		return "";
}


function getBrowser() {
	$broswerList = array('MSIE', 'Edg', 'Whale', 'Chrome', 'Firefox', 'iPhone', 'iPad', 'Android', 'PPC', 'Safari', 'none');
	$browserName = 'none';

	//echo $_SERVER['HTTP_USER_AGENT'];

	foreach ($broswerList as $userBrowser){
		if($userBrowser === 'none') break;
		if(strpos($_SERVER['HTTP_USER_AGENT'], $userBrowser)) {
			$browserName = $userBrowser;
			break;
		}
	}
	return $browserName;
}

function search_text($site)
{
	$val = array();
	$site = parse_url($site);
	$val = explode("&",$site['query']);
	if(preg_match("/naver/",$site['host']))                        ## 네이버 "query="        ##
	{
		for($j=0;$j < count($val);$j++)
		{
			if(preg_match("/query=/",$val[$j]))
			{
				list($a,$b) = explode("=",$val[$j]);
				return urldecode($b);
			}
			if(preg_match("/q=/",$val[$j]))
			{
				list($a,$b) = explode("=",$val[$j]);
				return urldecode($b);
			}
		}
	}
	elseif(preg_match("/daum/",$site['host']))                        ## 다음 ##
	{
		for($j=0;$j < count($val);$j++)
		{
			if(preg_match("/q=/",$val[$j]))
			{
				list($a,$b) = explode("=",$val[$j]);
				return urldecode($b);
			}
		}
	}
	elseif(preg_match("/google/",$site['host']))                ## 구글 ##
	{
		for($j=0;$j < count($val);$j++)
		{
			if(preg_match("/q=/",$val[$j]))
			{
				list($a,$b) = explode("=",$val[$j]);
				return urldecode($b);
			}
		}
	}
	else
	{
		return 0;
	}
}
?>