<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/html/web-cs/config_init.php';

$mode		= $_REQUEST['mode'];
$ip			= $_SERVER['REMOTE_ADDR'];

extract($_POST);

switch($mode)
{
	case 'alogin':
		//mb_id=admin 은 g5_member 에만 있음.
		$DB_TABLE='g5_member';

		$tempLogin = 1;

		$sql="select a.* ";
		$sql=$sql." from `".$DB_TABLE."` a where `mb_id`='".$userid."' and `mb_level`=10 ";

		$rs_member=$conn->Execute($sql);

		// 오라클 이관 회원 확인//
		$tempUserId = str_replace("0","",sha1($userpwd));
		$tempDbId = str_replace("0","",$rs_member->fields['mb_password']);

		if( $tempUserId == $tempDbId )	$tempLogin = 1;   // 오라클 이관 회원 인증 O
		// 오라클 이관 회원 확인 end//

		// 그누보드 가입 회원 확인 //
		if($tempLogin == 0)
		{
			$tmp_pass_sql=" select password('".$userpwd."') as pass ";

			$rs_tmp_pass=$conn->Execute($tmp_pass_sql);

			if($rs_tmp_pass->fields['pass'] == $rs_member->fields['mb_password']) $tempLogin = 1;
		}

		// 가입된 회원이 아니다. 비밀번호가 틀리다. 라는 메세지를 따로 보여주지 않는 이유는
		// 회원아이디를 입력해 보고 맞으면 또 비밀번호를 입력해보는 경우를 방지하기 위해서입니다.
		// 불법사용자의 경우 회원아이디가 틀린지, 비밀번호가 틀린지를 알기까지는 많은 시간이 소요되기 때문입니다.
		if($rs_member->_numOfRows==0 || $tempLogin==0)
		{
			script_alert_replace('등록되지 않은 계정이거나 잘못된 비밀번호입니다.', $Admin_Login_Path);
		}

		// 차단된 아이디인가?
		if ($rs_member->fields['mb_intercept_date'] && $rs_member->fields['mb_intercept_date'] <= date("Ymd"))
		{
			$date = preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\1년 \\2월 \\3일", $rs_member->fields['mb_intercept_date']);
			script_alert_replace('회원님의 아이디는 접근이 금지되어 있습니다.\n처리일 : '.$date, $Admin_Login_Path);
		}

		// 탈퇴한 아이디인가?
		if ($rs_member->fields['mb_leave_date'] && $rs_member->fields['mb_leave_date'] <= date("Ymd"))
		{
			$date = preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\1년 \\2월 \\3일", $rs_member->fields['mb_leave_date']);
			script_alert_replace('탈퇴한 아이디이므로 접근하실 수 없습니다.\n탈퇴일 : '.$date, $Admin_Login_Path);
		}

		//관리자 로그인에서는 필요 없음. 추후 사용자 로그인에서 휴면해제 페이지 생성 후 사용
		//if($rs_member->fields['sleep_yn'] == "Y"){
		//	confirm("휴면회원 상태 해제가 필요한 회원입니다.", G5_BBS_URL.'/sleep_uxis.php?mb_id='.$mb_id."&urlencode=".$_POST['urlencode'], $url );
		//}

		// 회원아이디 세션 생성
		$_SESSION['ss_mb_id']=$rs_member->fields['mb_id'];
		// FLASH XSS 공격에 대응하기 위하여 회원의 고유키를 생성해 놓는다. 관리자에서 검사함 - 110106
		$_SESSION['ss_mb_key']=md5($rs_member->fields['mb_datetime'] . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);

		// 포인트 체크
		//포인트는 다 날린다고 했지만, 일단 추가. 근데 이거 왜 하는건지? 같은거 빼와서 업데이트?;;;;
		$point_sql = "select mb_point from ".$DB_TABLE." where mb_id = '".$userid."' ";
		$rs_point=$conn->Execute($sql);

		$sum_point = $rs_point->fields['mb_point'];

		$point_update_sql= " update ".$DB_TABLE." set mb_point = '".$sum_point."' where mb_id = '".$userid."' ";
		$rs_point_update=$conn->Execute($sql);

		// 3.26
		// 아이디 쿠키에 한달간 저장
		if ($auto_login)
		{
			setcookie('UserID', $rs_member->fields['mb_id'], time() + 86400 * 31, '/', '.busan.com');
			setcookie('UserName', $rs_member->fields['mb_name'], time() + 86400 * 31, '/', '.busan.com');
			setcookie('UserNO', $rs_member->fields['mb_no'], time() + 43200, '/', '.busan.com');

			// 3.27
			// 자동로그인 ---------------------------
			// 쿠키 한달간 저장
			$key = md5($_SERVER['SERVER_ADDR'] . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'] . $rs_member->fields['mb_password']);

			setcookie(md5('ck_mb_id'), base64_encode($rs_member->fields['mb_id']), time() + 86400 * 31, '/', '.busan.com');
			setcookie(md5('ck_auto'), base64_encode($key), time() + 86400 * 31, '/', '.busan.com');

			// 자동로그인 end ---------------------------
		}
		else
		{
			setcookie('UserID', $rs_member->fields['mb_id'], time() + 43200, '/', '.busan.com');
			setcookie('UserNO', $rs_member->fields['mb_no'], time() + 43200, '/', '.busan.com');
			setcookie('UserName', $rs_member->fields['mb_name'], time() + 86400 * 31, '/', '.busan.com');
			setcookie('isReader', $rs_member->fields['isreader'], time() + 43200, '/', '.busan.com');

			setcookie(md5('ck_mb_id'), '', time() , '/', '.busan.com');
			setcookie(md5('ck_auto'), '', time() , '/', '.busan.com');
		}

		//exit;

		//fix 사용 세션
		$_SESSION['_ADMIN_IDX']		= $rs_member->fields['mb_no'];
		$_SESSION['_ADMIN_ID']		= $rs_member->fields['mb_id'];
		$_SESSION['_ADMIN_NAME']	= $rs_member->fields['mb_name'];

		//$Admin_First_Path는 confit_init.php

		script_mov($Admin_First_Path);
		break;
	case 'alogout':
		session_destroy();
		script_mov($Web_URL.$Admin_Login_Path);  //script_mov($Admin_Login_Path);
		break;
	case 'logout':
	default :
		session_destroy();
		script_mov($Web_URL); //'/');
		break;
}
?>