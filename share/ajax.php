<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/html/web-cs/config_init.php';

$mode		= $_REQUEST['mode'];

switch($mode)
{
	case 'business_no_chk':
		$DB_TABLE	= 'member';

		$business_no	= $_REQUEST['business_no'];

		if($business_no)
		{
			if(strlen($business_no)<10)
			{
				$cont='0|사업자 등록번호 10자리 숫자를 입력하세요.';
			}
			else
			{
				$sql="select count(`idx`) as `cnt` from `".$DB_TABLE."` where `isdel`=0 and `business_no`='".$business_no."'";
				$rs=$conn->Execute($sql);

				if($rs->fields['cnt'])
				{
					$cont='0|이미 가입된 사업자 등록번호 입니다.';
				}
				else
				{
					$cont='1|';
				}
			}
		}
		else
		{
			$cont='0|사업자 등록번호를 입력하세요.';
		}
		break;
	case 'id_chk':
		$DB_TABLE	= 'member';

		$user_id	= $_REQUEST['user_id'];

		if($user_id)
		{
			if(strlen($user_id)<5)
			{
				$cont='0|아이디는 5글자 이상 입력하세요.';
			}
			else
			{
				$sql="select count(`idx`) as `cnt` from `".$DB_TABLE."` where `isdel`=0 and `user_id`='".$user_id."'";
				$rs=$conn->Execute($sql);

				if($rs->fields['cnt'])
				{
					$cont='0|이미 사용중인 아이디 입니다.';
				}
				else
				{
					$cont='1|사용 가능한 아이디 입니다.';
				}
			}
		}
		else
		{
			$cont='0|아이디를 입력하세요.';
		}
		break;
	case 'admin_id_chk':
		$DB_TABLE	= 'member_admin';

		$user_id	= $_REQUEST['user_id'];

		if($user_id)
		{
			if(strlen($user_id)<5)
			{
				$cont='0|아이디는 5글자 이상 입력하세요.';
			}
			else
			{
				$sql="select count(`idx`) as `cnt` from `".$DB_TABLE."` where `isdel`=0 and `user_id`='".$user_id."'";
				$rs=$conn->Execute($sql);

				if($rs->fields['cnt'])
				{
					$cont='0|<span class="red">이미 사용중인 아이디 입니다.</span>';
				}
				else
				{
					$cont='1|<span calss="blue">사용 가능한 아이디 입니다.</span>';
				}
			}
		}
		else
		{
			$cont='0|<span class="red">아이디를 입력하세요.</span>';
		}
		break;
	case 'set_statistics_rand_data':

		for($i=0;$i<10;$i++)
		{
			//$year=rand(2015, date('Y'));
			$year=date('Y');
			$month=rand(1, 12);
			$monthn=$month<10 ? '0'.$month : $month;
			$day=rand(1, 28);//2월 29일 등 윤달처리의 이유로 28일까지만
			$dayn=$dayn<10 ? '0'.$day : $day;
			$hour=rand(0, 23);
			$hourn=$hour<10 ? '0'.$hour : $hour;
			$minutn=rand(0, 59);
			$minutn=$minut<10 ? '0'.$minut : $minut;
			$second=rand(0, 59);
			$secondn=$second<10 ? '0'.$second : $second;

			$dow=date('w', strtotime($year.'-'.$monthn.'-'.$second));

			//$browser=getBrowser();
			$browser=array('Edg', 'Whale', 'Chrome', 'Firefox', 'none');
			$selected_browser=$browser[rand(0, (count($browser)-1))];

			$keyword=array('부산일보', '부산', '부산 신문', '부산 뉴스', '', 'BIFF', '산은 이전', '통영', '롯데', '롯데 야구');

			$selected_keyword=$keyword[rand(0, (count($keyword)-1))];

			if($selected_keyword=='')
			{
				$selected_ref='직접입력또는즐겨찾기';
			}
			else
			{
				$ref=array(
						'https://search.naver.com/search.naver?where=nexearch&sm=top_hty&fbm=0&ie=utf8&query=',
						'https://search.daum.net/search?w=site&nil_search=btn&DA=PGD&enc=utf8&lpp=10&q=',
						'https://www.google.com/'
					);
				$selected_ref=$ref[rand(0, (count($ref)-1))];
				if($selected_ref!='https://www.google.com/')
				{
					$selected_ref=$selected_ref.$selected_keyword;
				}
			}

			$sql="INSERT INTO `bs_log` (`full_date_time`, `year`, `month`, `day`, `time`, `dow`, `browser`, `ref`, `keyword`) VALUES ('".$year."-".$monthn."-".$dayn." ".$hourn.":".$minutn.":".$secondn."', '".$year."', '".$month."', '".$day."', '".$hourn.":".$minutn.":".$secondn."', '".$dow."', '".$selected_browser."', '".$selected_ref."', '".$selected_keyword."')";

			@$rs=$conn->Execute($sql);
		}

		$cont='1|';

		break;
	case 'set_newsletter_statistics_rand_data':

		for($i=0;$i<10;$i++)
		{
			$sql=" select `mb_no` from `newsletter_mapping` group by `mb_no` order by rand() limit 1 ";
			$rs=$conn->Execute($sql);
			$mb_no=$rs->fields['mb_no'];

			$year=date('Y');
			$month=rand(1, 10);
			$monthn=$month<10 ? '0'.$month : $month;
			$day=rand(1, 28);//2월 29일 등 윤달처리의 이유로 28일까지만
			$dayn=$dayn<10 ? '0'.$day : $day;
			$newsletter_group_idx=rand(1, 4);
			$onoff=rand(0, 1);

			$sql="INSERT INTO `bs_newsletter_log` (`mb_no`, `full_date_time`, `year`, `month`, `day`, `newsletter_group_idx`, `onoff`) VALUES ('".$mb_no."', '".$year."-".$monthn."-".$dayn." ".$hourn.":".$minutn.":".$secondn."', '".$year."', '".$month."', '".$day."', '".$newsletter_group_idx."', '".$onoff."')";

			@$rs=$conn->Execute($sql);
		}

		$cont='1|';

		break;
}

echo $cont;
?>