<?
	$conn = &ADONewConnection('mysqli');

	if($connect_method)
	{
		$conn->Connect($db_host, $db_user, $db_pass, $db_name); // �ּ�, �����, ���, ���̺�� - normal ���ؼ�
	}
	else
	{
		$conn->Connect($db_host, $db_user, $db_pass, $db_name); // �ּ�, �����, ���, ���̺��  - persistent ���ؼ�
	}

	$conn_ = $conn;

	$mysqli_conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
?>
