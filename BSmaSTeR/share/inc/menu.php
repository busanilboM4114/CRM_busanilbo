<?php
switch($_REQUEST["menu"])
{
	case '':
		$menu_block_0000=' active';
		break;
	case '010000_member':
		$menu_block_0100					= ' active';
		$menu_block_0100_ul_show			= ' show';
		$menu_block_0100_ul_li_active_01	= ' active';
		break;
	case '010500_member_point':
		$menu_block_0100					= ' active';
		$menu_block_0100_ul_show			= ' show';
		$menu_block_0100_ul_li_active_05	= ' active';
		break;
	case '011000_newsletter_status':
		$menu_block_0100					= ' active';
		$menu_block_0100_ul_show			= ' show';
		$menu_block_0100_ul_li_active_10	= ' active';
		break;
	case '050000_statistics':
		$menu_block_0500					= ' active';
		$menu_block_0500_ul_show			= ' show';
		$menu_block_0500_ul_li_active_01	= ' active';
		break;
	case '050500_statistics':
		$menu_block_0500					= ' active';
		$menu_block_0500_ul_show			= ' show';
		$menu_block_0500_ul_li_active_05	= ' active';
		break;
	case '051000_statistics':
		$menu_block_0500					= ' active';
		$menu_block_0500_ul_show			= ' show';
		$menu_block_0500_ul_li_active_10	= ' active';
		break;
	case '051500_statistics':
		$menu_block_0500					= ' active';
		$menu_block_0500_ul_show			= ' show';
		$menu_block_0500_ul_li_active_15	= ' active';
		break;
	case '052000_statistics':
		$menu_block_0500					= ' active';
		$menu_block_0500_ul_show			= ' show';
		$menu_block_0500_ul_li_active_20	= ' active';
		break;
	case '052500_statistics':
		$menu_block_0500					= ' active';
		$menu_block_0500_ul_show			= ' show';
		$menu_block_0500_ul_li_active_25	= ' active';
		break;
	case '100000_site_manager':
		$menu_block_1000					= " active";
		$menu_block_1000_ul_show			= ' show';
		$menu_block_1000_ul_li_active_01	= ' active';
		break;
	case '150000_board_manager':
		$menu_block_1500					= " active";
		$menu_block_1500_ul_show			= ' show';
		$menu_block_1500_ul_li_active_01	= ' active';
		break;
	case '200000_member_admin_authority':
		$menu_block_2000					= " active";
		$menu_block_2000_ul_show			= ' show';
		$menu_block_2000_ul_li_active_01	= ' active';
		break;
	case '200500_member_point_config':
		$menu_block_2000					= " active";
		$menu_block_2000_ul_show			= ' show';
		$menu_block_2000_ul_li_active_05	= ' active';
		break;
	case 'funbusan-stamp'://설정/펀부산/스템프설정
		$menu_block_2500					= " active";
		$menu_block_2500_ul_show			= ' show';
		$menu_block_2500_ul_li_active_05	= ' active';
		break;
	case '300000_member_member_partner':
		$menu_block_3000					= ' active';
		break;
	case 'funbusan-stamp'://펀부산/스템프관리
		$menu_block_1005=' active';
		break;
	case 'funbusan-badge':
		$menu_block_1010=" active";
		break;
	case 'funbusan-medal':
		$menu_block_1015=" active";
		break;
	case 'funbusan-reservation':
		$menu_block_1020="active";
		break;
	case '550000_fix_board':
		$menu_block_5500					= " active";
		break;
	case 'funbusan-board-reple':
		$menu_block_1030="active";
		break;
	case 'happyzone':
		$menu_block_1500=" active";
		break;
	case 'config-funbusan':
		$menu_block_2500=" active";
		break;
	case '999999_code_gb':
	case '999998_code':
		$menu_block_9900=" active";
		break;
	default :
		break;
}
?>
<nav id="sidebar" class="sidebar js-sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="<?=$Admin_Master_Path?>">
			<span class="sidebar-brand-text align-middle">
				부산일보 CRM
		</a>

		<div class="sidebar-user">
			<div class="d-flex justify-content-center">
				<div class="flex-shrink-0">
					<img src="<?=$Admin_Master_Path?>/img/profile.jpg" class="avatar img-fluid rounded me-1" alt="부산일보" />
				</div>
				<div class="flex-grow-1 ps-2">
					<a class="sidebar-user-title dropdown-toggle" href="#" data-bs-toggle="dropdown">
						<?//=$_SESSION['_ADMIN_NAME']?>
						부산일보
					</a>
					<div class="dropdown-menu dropdown-menu-start">
						<a class="dropdown-item" href="/login/login_process.php?mode=alogout"><i class="align-middle" data-feather="log-out"></i> 로그아웃</a>
					</div>

					<div class="sidebar-user-subtitle">Admin</div>
				</div>
			</div>
		</div>

		<ul class="sidebar-nav">
			<li class="sidebar-header">
				CRM
			</li>
			<li class="sidebar-item<?=$menu_block_0000?>">
				<a class="sidebar-link" href="?">
					<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">대시보드</span>
				</a>
			</li>

			<li class="sidebar-item<?=$menu_block_0100?>">
				<a data-bs-target="#members" data-bs-toggle="collapse" class="sidebar-link collapsed">
					<i class="align-middle" data-feather="user"></i> <span class="align-middle">회원관리</span>
				</a>
				<ul id="members" class="sidebar-dropdown list-unstyled collapse<?=$menu_block_0100_ul_show?>" data-bs-parent="#sidebar">
					<li class="sidebar-item<?=$menu_block_0100_ul_li_active_01?>"><a class="sidebar-link" href="?menu=010000_member&tn=">회원관리</a></li>
					<li class="sidebar-item<?=$menu_block_0100_ul_li_active_05?>"><a class="sidebar-link" href="?menu=010500_member_point&tn=">포인트관리</a></li>
					<li class="sidebar-item<?=$menu_block_0100_ul_li_active_10?>"><a class="sidebar-link" href="?menu=011000_newsletter_status&tn=">뉴스레터</a></li>
				</ul>
			</li>
			<li class="sidebar-item<?=$menu_block_0500?>">
				<a data-bs-target="#charts" data-bs-toggle="collapse" class="sidebar-link collapsed">
					<i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">통계</span>
				</a>
				<ul id="charts" class="sidebar-dropdown list-unstyled collapse<?=$menu_block_0500_ul_show?>" data-bs-parent="#sidebar">
					<li class="sidebar-item<?=$menu_block_0500_ul_li_active_01?>"><a class="sidebar-link" href="?menu=050000_statistics&tn=">접속통계</a></li>
					<li class="sidebar-item<?=$menu_block_0500_ul_li_active_05?>"><a class="sidebar-link" href="?menu=050500_statistics&tn=">로그인통계</a></li>
					<li class="sidebar-item<?=$menu_block_0500_ul_li_active_10?>"><a class="sidebar-link" href="?menu=051000_statistics&tn=">회원가입/탈퇴 통계</a></li>
					<li class="sidebar-item<?=$menu_block_0500_ul_li_active_15?>"><a class="sidebar-link" href="?menu=051500_statistics&tn=">회원 로그인 기사통계</a></li>
					<li class="sidebar-item<?=$menu_block_0500_ul_li_active_20?>"><a class="sidebar-link" href="?menu=052000_statistics&tn=">콘텐츠별 통계</a></li>
					<li class="sidebar-item<?=$menu_block_0500_ul_li_active_25?>"><a class="sidebar-link" href="?menu=052500_statistics&tn=">뉴스레터 수집통계</a></li>
				</ul>
			</li>

			<li class="sidebar-item">
				<a class="sidebar-link" href="https://log.busan.com" target="_blank">
					<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">전체사이트 접속통계</span>
				</a>
			</li>

			<li class="sidebar-item">
				<a class="sidebar-link" href="https://smart.busan.com" target="_blank">
					<i class="align-middle" data-feather="bar-chart"></i> <span class="align-middle">맞춤형 추천 통계</span>
				</a>
			</li>

			<li class="sidebar-header">
				사이트빌더
			</li>
			<li class="sidebar-item<?=$menu_block_1000?>">
				<a data-bs-target="#site_manager" data-bs-toggle="collapse" class="sidebar-link collapsed">
					<i class="align-middle" data-feather="sidebar"></i> <span class="align-middle">사이트관리</span>
				</a>
				<ul id="site_manager" class="sidebar-dropdown list-unstyled collapse<?=$menu_block_1000_ul_show?>" data-bs-parent="#sidebar">
					<li class="sidebar-item<?=$menu_block_1000_ul_li_active_01?>"><a class="sidebar-link" href="?menu=100000_site_manager&tn=">사이트관리</a></li>
					<li class="sidebar-item<?=$menu_block_1000_ul_li_active_05?>"><a class="sidebar-link" href="?menu=100500_site_manager_layout&tn=" data-bs-toggle="modal" data-bs-target="#centeredModalPrimary">레이아웃관리(준비중)</a></li>
					<li class="sidebar-item<?=$menu_block_1000_ul_li_active_10?>"><a class="sidebar-link" href="#none" onclick="alert('준비중입니다.');return false;">권한관리(준비중)</a></li>
				</ul>
			</li>
			<li class="sidebar-item<?=$menu_block_1500?>">
				<a data-bs-target="#board_settings" data-bs-toggle="collapse" class="sidebar-link collapsed">
					<i class="align-middle" data-feather="table"></i> <span class="align-middle">게시판설정</span>
				</a>
				<ul id="board_settings" class="sidebar-dropdown list-unstyled collapse<?=$menu_block_1500_ul_show?>" data-bs-parent="#sidebar">
					<li class="sidebar-item<?=$menu_block_1500_ul_li_active_01?>"><a class="sidebar-link" href="?menu=150000_board_manager&tn=">목록</a></li>
					<li class="sidebar-item<?=$menu_block_1500_ul_li_active_05?>"><a class="sidebar-link" href="#none" onclick="alert('준비중입니다.');return false;">레이아웃관리(준비중)</a></li>
					<li class="sidebar-item<?=$menu_block_1500_ul_li_active_10?>"><a class="sidebar-link" href="#none" onclick="alert('준비중입니다.');return false;">권한관리(준비중)</a></li>
					<li class="sidebar-item<?=$menu_block_1500_ul_li_active_15?>"><a class="sidebar-link" href="#none" onclick="alert('준비중입니다.');return false;">포인트세부설정(준비중)</a></li>
				</ul>
			</li>

			<li class="sidebar-header">
				설정
			</li>
			<li class="sidebar-item<?=$menu_block_2000?>">
				<a data-bs-target="#crm_settings" data-bs-toggle="collapse" class="sidebar-link collapsed">
					<i class="align-middle" data-feather="settings"></i> <span class="align-middle">CRM</span>
				</a>
				<ul id="crm_settings" class="sidebar-dropdown list-unstyled collapse<?=$menu_block_2000_ul_show?>" data-bs-parent="#sidebar">
					<li class="sidebar-item<?=$menu_block_2000_ul_li_active_01?>"><a class="sidebar-link" href="?menu=200000_member_admin_authority&tn=">회원권한설정</a></li>
					<li class="sidebar-item<?=$menu_block_2000_ul_li_active_05?>"><a class="sidebar-link" href="?menu=200500_member_point_config&tn=">회원포인트설정</a></li>
				</ul>
			</li>
			<li class="sidebar-item<?=$menu_block_2500?>">
				<a data-bs-target="#funbusan_settings" data-bs-toggle="collapse" class="sidebar-link collapsed">
					<i class="align-middle" data-feather="settings"></i> <span class="align-middle">펀부산</span>
				</a>
				<ul id="funbusan_settings" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
					<li class="sidebar-item"><a class="sidebar-link" href="#none" onclick="alert('준비중입니다.');return false;">스탬프설정(준비중)</a></li>
				</ul>
			</li>

			<li class="sidebar-header">
				펀부산
			</li>
			<li class="sidebar-item<?=$menu_block_3000?>">
				<a class="sidebar-link" href="?menu=300000_member_member_partner">
					<i class="align-middle" data-feather="users"></i> <span class="align-middle">파트너관리</span>
				</a>
			</li>
			<li class="sidebar-item<?=$menu_block_1005?>">
				<a data-bs-target="#stamps" data-bs-toggle="collapse" class="sidebar-link collapsed">
					<i class="align-middle" data-feather="check-circle"></i> <span class="align-middle">스템프 관리(준비중)</span>
				</a>
				<ul id="stamps" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
					<li class="sidebar-item"><a class="sidebar-link" href="#none" onclick="alert('준비중입니다.');return false;">스탬프 현황(준비중)</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#none" onclick="alert('준비중입니다.');return false;">스탬프 인증(준비중)</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#none" onclick="alert('준비중입니다.');return false;">스탬프 교환(준비중)</a></li>
				</ul>
			</li>
			<li class="sidebar-item<?=$menu_block_1010?>">
				<a data-bs-target="#badges" data-bs-toggle="collapse" class="sidebar-link collapsed">
					<i class="align-middle" data-feather="award"></i> <span class="align-middle">뱃지 관리</span>
				</a>
				<ul id="badges" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
					<li class="sidebar-item"><a class="sidebar-link" href="#none" onclick="alert('준비중입니다.');return false;">뱃지 현황(준비중)</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#none" onclick="alert('준비중입니다.');return false;">뱃지 인증(준비중)</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#none" onclick="alert('준비중입니다.');return false;">뱃지 교환(준비중)</a></li>
				</ul>
			</li>
			<li class="sidebar-item<?=$menu_block_1015?>">
				<a data-bs-target="#medal" data-bs-toggle="collapse" class="sidebar-link collapsed">
					<i class="align-middle" data-feather="gift"></i> <span class="align-middle">메달 관리</span>
				</a>
				<ul id="medal" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
					<li class="sidebar-item"><a class="sidebar-link" href="#none" onclick="alert('준비중입니다.');return false;">메달 현황(준비중)</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#none" onclick="alert('준비중입니다.');return false;">메달 인증(준비중)</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#none" onclick="alert('준비중입니다.');return false;">메달 교환(준비중)</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#none" onclick="alert('준비중입니다.');return false;">왕관 현황(준비중)</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#none" onclick="alert('준비중입니다.');return false;">왕관 인증(준비중)</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#none" onclick="alert('준비중입니다.');return false;">왕관 교환(준비중)</a></li>
				</ul>
			</li>
			<li class="sidebar-item<?=$menu_block_1020?>">
				<a data-bs-target="#reservations" data-bs-toggle="collapse" class="sidebar-link collapsed">
					<i class="align-middle" data-feather="calendar"></i> <span class="align-middle">예약관리</span>
				</a>
				<ul id="reservations" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
					<li class="sidebar-item"><a class="sidebar-link" href="#none" onclick="alert('준비중입니다.');return false;">예약목록(준비중)</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#none" onclick="alert('준비중입니다.');return false;">예약현황(준비중)</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#none" onclick="alert('준비중입니다.');return false;">예약취소(준비중)</a></li>
				</ul>
			</li>

			<li class="sidebar-item<?=$menu_block_5500?>">
				<a class="sidebar-link" href="?menu=550000_fix_board&tn=">
					<i class="align-middle" data-feather="edit"></i> <span class="align-middle">게시물관리</span>
				</a>
			</li>

			<li class="sidebar-item<?=$menu_block_1030?>">
				<a class="sidebar-link" href="#none" onclick="alert('준비중입니다.');return false;">
					<i class="align-middle" data-feather="message-square"></i> <span class="align-middle">댓글 관리(준비중)</span>
				</a>
			</li>

			<li class="sidebar-header">
				<a class="" href="http://happyzone.busan.com/" target="_blank">해피존</a>
			</li>

		</ul>
	</div>
</nav>

<div class="modal fade" id="centeredModalPrimary" tabindex="-1" style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">확인</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body m-3">
				<p class="mb-0">준비중입니다.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
			</div>
		</div>
	</div>
</div>