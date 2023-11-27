<?
	$conn = &ADONewConnection('mysqli');

	if($connect_method)
	{
		$conn->Connect($db_host, $db_user, $db_pass, $db_name); // 주소, 사용자, 비번, 테이블명 - normal 컨넥션
	}
	else
	{
		$conn->Connect($db_host, $db_user, $db_pass, $db_name); // 주소, 사용자, 비번, 테이블명  - persistent 컨넥션
	}

	$conn_ = $conn;

	$mysqli_conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
?>
