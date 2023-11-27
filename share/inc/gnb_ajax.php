<?php
include_once 'menu_all.php';

/*editplus 인코딩 유지용*/
$mode		= $_REQUEST['mode'];

switch($mode)
{
	case 'get_submenu':
		$idx	= $_REQUEST['idx'];

		switch($idx)
		{
			default:
			case '1':
				$cont='<ul class="depth02">
						<li class="col-sm-2">'.$mMenu[1][1][0][0].'</li>
						<li class="col-sm-2">'.$mMenu[1][2][0][0].'</li>
						<li class="col-sm-2">'.$mMenu[1][3][0][0].'</li>
						<li class="col-sm-2">'.$mMenu[1][4][0][0].'</li>
						<li class="col-sm-2">'.$mMenu[1][5][0][0].'</li>
						<li class="col-sm-2">'.$mMenu[1][6][0][0].'</li>
					</ul>
					';
				break;
			case '2':
				$cont='<ul class="depth02">
						<li class="col-sm-2">'.$mMenu[2][1][0][0].'</li>
					</ul>
					';
				break;
			case '3':
				$cont='<ul class="depth02">
						<li class="col-sm-2">'.$mMenu[3][1][0][0].'</li>
						<li class="col-sm-2">'.$mMenu[3][2][0][0].'</li>
						<li class="col-sm-2">'.$mMenu[3][3][0][0].'
					</ul>
					';
				break;
			case '4':
				$cont='<ul class="depth02">
						<li class="col-sm-2">'.$mMenu[4][1][0][0].'</li>
						<li class="col-sm-2">'.$mMenu[4][2][0][0].'</li>
						<li class="col-sm-2">'.$mMenu[4][3][0][0].'</li>
						<li class="col-sm-2">'.$mMenu[4][4][0][0].'</li>
					</ul>
					';
				break;
			case '5':
				$cont='<ul class="depth02">
						<li class="col-sm-2">'.$mMenu[5][1][0][0].'</li>
						<li class="col-sm-2">'.$mMenu[5][2][0][0].'</li>
						<li class="col-sm-2">'.$mMenu[5][3][0][0].'</li>
						<li class="col-sm-2">'.$mMenu[5][4][0][0].'</li>
						<li class="col-sm-2">'.$mMenu[5][5][0][0].'</li>
						<li class="col-sm-2">'.$mMenu[5][6][0][0].'</li>
						<li class="col-sm-2">'.$mMenu[5][7][0][0].'</li>
						<li class="col-sm-2">'.$mMenu[5][8][0][0].'</li>
						<li class="col-sm-2">'.$mMenu[5][9][0][0].'</li>
					</ul>
					';
				break;
		}

		break;
}

echo $cont;
?>