<?
function getInfo($mAll, $index) {
	if ( $mAll == null ) return null;
	$temp = explode("|", $mAll);
	if ( $index == 0 and count($temp) >= 1 ) return $temp[0];
	else if ( $index == 1 and count($temp) >= 2 ) return $temp[1];
	else if ( $index == 2 and count($temp) >= 3 ) return $temp[2];
	else return "";
}

$siteName = "호텔홍단";

/* 새창 */
$newWin = " target='_blank' title='새창'";
$popUp = " onclick='window.open(this.href,\"\",\"width=400,height=500,scrollbars=yes,left=20,top=20\"); return false;' title='새창'";
//$mAll[1][1][0][0] = "메뉴명"."|"."링크주소"."|".$newWin;

//--1depth--
$mAll[1][0][0][0] = "OVERVIEW"."|"."../../html/01_overview/01.php";
	//--2depth--
	$mAll[1][1][0][0] = "INTRODUCE"."|"."../../html/01_overview/01.php";
	$mAll[1][2][0][0] = "LOCATION"."|"."../../html/01_overview/02.php";
	$mAll[1][3][0][0] = "FACILITY"."|"."../../html/01_overview/03.php";

//--1depth--
$mAll[2][0][0][0] = "OFFER"."|"."../../html/02_offer/01.php";
	//--2depth--
	$mAll[2][1][0][0] = "SIGNATURE"."|"."../../html/02_offer/01.php";
	$mAll[2][2][0][0] = "ART GALLERY"."|"."../../html/02_offer/02.php";
	$mAll[2][3][0][0] = "LOCAL AREA"."|"."../../html/02_offer/03.php";

//--1depth--
$mAll[3][0][0][0] = "ROOMS"."|"."../../html/03_rooms/01.php";
	//--2depth--
	$mAll[3][1][0][0] = "STANDARD"."|"."../../html/03_rooms/01.php";
	$mAll[3][2][0][0] = "DELUXE"."|"."../../html/03_rooms/02.php";
	$mAll[3][3][0][0] = "TWIN"."|"."../../html/03_rooms/03.php";
	$mAll[3][4][0][0] = "VIP A"."|"."../../html/03_rooms/04.php";
	$mAll[3][5][0][0] = "VIP B"."|"."../../html/03_rooms/04_1.php";

//--1depth--
$mAll[4][0][0][0] = "CUSTOMER"."|"."../../html/04_customer/01.php";
	//--2depth--
	$mAll[4][1][0][0] = "EVENT&NOTICE"."|"."../../html/04_customer/01.php";
	$mAll[4][2][0][0] = "FAQ"."|"."../../html/04_customer/02.php";

//--1depth--
$mAll[5][0][0][0] = "RESERVATION"."|"."../../html/05_reservation/01.php";
	//--2depth--
	$mAll[5][1][0][0] = "RESERVATION"."|"."../../html/05_reservation/01.php";
	$mAll[5][2][0][0] = "GUIDE"."|"."../../html/05_reservation/02.php";

//--1depth--
$mAll[6][0][0][0] = "GUIDE"."|"."../../html/06_etc/01.php";
	//--2depth--
	$mAll[6][1][0][0] = "TERMS OF USE"."|"."../../html/06_etc/01.php";
	$mAll[6][2][0][0] = "PIVATE POLICY"."|"."../../html/06_etc/02.php";
	$mAll[6][3][0][0] = "REFUSE UNAUTHORIZED E-MAIL COLLECTION"."|"."../../html/06_etc/03.php";

//--공통메뉴--

$mAll[0][0][0][0] = "홈"."|"."../../html/00_main/"; //홈 메인

//[상]사이트 메뉴
$mAll[0][1][1][0] = $mAll[0][0][0][0];//Home
$mAll[0][1][2][0] = ""."|"."";
$mAll[0][1][3][0] = ""."|"."";
$mAll[0][1][4][0] = ""."|"."";

//-공용코드--
//메뉴제목,링크주소,자바스크립트,title속성 할당

for ( $i = 0; $i <= count($mAll); $i++ ) {
	if ( $mAll[$i][0][0][0] == null ) continue;
	for ( $j = 0; $j <= count($mAll[$i]); $j++ ) {
		if ( $mAll[$i][$j][0][0] == null and $i <> 0 ) continue;
		for ( $k = 0; $k <= count($mAll[$i][$j]); $k++ ) {
			if ( $mAll[$i][$j][$k][0] == null and $i <> 0 ) continue;
			for ( $l = 0; $l <= count($mAll[$i][$j][$k]); $l++ ) {
				if ( $mAll[$i][$j][$k][$l] == null) continue;
				$mTitle[$i][$j][$k][$l] = getInfo($mAll[$i][$j][$k][$l], 0);
				$mLink[$i][$j][$k][$l] = getInfo($mAll[$i][$j][$k][$l], 1);
				$mClick[$i][$j][$k][$l] = getInfo($mAll[$i][$j][$k][$l], 2);
				$mMenu[$i][$j][$k][$l] = "<a href='" . $mLink[$i][$j][$k][$l] . "' " . $mClick[$i][$j][$k][$l] . ">" . $mTitle[$i][$j][$k][$l] . "</a>";
				$mAnchor[$i][$j][$k][$l] = "href='" . $mLink[$i][$j][$k][$l] . "'" . $mClick[$i][$j][$k][$l];
//				echo $mMenu[$i][$j][$k][$l] ."<br />";
			}
		}
	}
}

$d1menu = ""; $d2menu = ""; $d3menu = ""; $d4menu = "";

if($d1n!=0) $d1menu = $mTitle[$d1n][0][0][0];
if($d2n!=0) $d2menu = $mTitle[$d1n][$d2n][0][0];
if($d3n!=0) $d3menu = $mTitle[$d1n][$d2n][$d3n][0];
if($d4n!=0) $d4menu = $mTitle[$d1n][$d2n][$d3n][$d4n];

//title태그내용
$titleTag = $siteName;
if($d1menu && $d1menu!="") $titleTag = $d1menu . " | " . $titleTag;
if($d2menu && $d2menu!="") $titleTag = $d2menu . " | " . $titleTag;
if($d3menu && $d3menu!="") $titleTag = $d3menu . " | " . $titleTag;
if($d4menu && $d4menu!="") $titleTag = $d4menu . " | " . $titleTag;

//현재위치
$locationLink = "<a ".$mAnchor[0][0][0][0]." class='home'><img src='../../img/layout/btn_home.png' alt='home' align='absmiddle'></a>";
if($d1menu && $d1menu!="") $locationLink = $locationLink . "&nbsp; " . $mMenu[$d1n][0][0][0];
if($d2menu && $d2menu!="") $locationLink = $locationLink . " <span><img src='/img/layout/location_sep.png' alt=''></span> " . $mMenu[$d1n][$d2n][0][0];
if($d3menu && $d3menu!="") $locationLink = $locationLink . " <span><img src='/img/layout/location_sep.png' alt=''></span> " . $mMenu[$d1n][$d2n][$d3n][0];
if($d4menu && $d4menu!="") $locationLink = $locationLink . " <span><img src='/img/layout/location_sep.png' alt=''></span> " . $mMenu[$d1n][$d2n][$d3n][$d4n];

$d1nn = ""; $d2nn = ""; $d3nn = ""; $d4nn = "";
if($d1n<10) $d1nn="0" . $d1n; else $d1nn = $d1n;
if($d2n<10) $d2nn="0" . $d2n; else $d2nn = $d2n;
if($d3n<10) $d3nn="0" . $d3n; else $d3nn = $d3n;
if($d4n<10) $d4nn="0" . $d4n; else $d4nn = $d4n;
?>