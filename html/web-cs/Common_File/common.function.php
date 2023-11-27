<?php
class common
{
	//$code_gb_name : 코드구분명
	//$code_gb_idx : 코드구분 기본키
	//$code_gb_idx가 있을 경우 해당 값으로, 없을 경우 구분명으로
	function code($code_gb_name, $code_gb_idx)
	{
		global $conn;
		if($code_gb_idx)
		{
			$sql="select * from `code` where `isdel`=0 and `code_use`=1 and `code_gb_idx`=(select `idx` from `code_gb` where `idx`='".$code_gb_idx."')";
		}
		else
		{
			$sql="select * from `code` where `isdel`=0 and `code_use`=1 and `code_gb_idx`=(select `idx` from `code_gb` where `code_gb_name`='".$code_gb_name."')";
		}
		$sql=$sql." order by `sort`, `code_name`";
		$rs_code=$conn->Execute($sql);
		if(!$rs_code)
		{
			error_msg('DB 질의가 실패했습니다.\\n에러코드[common.function.code():001]');
			exit;
		}

		if($rs_code->_numOfRows)
		{
			while(!$rs_code->EOF)
			{
				foreach($rs_code->fields as $key => $value)
				{
					$value=stripslashes($value);
					$code[$rs_code->_currentRow][$key]=$value;
				}
				$rs_code->MoveNext();
			}
		}
		else
		{
			$code=0;
		}
		$rs_code->close();
		return $code;
	}

	//$code_idx : 코드 기본키
	function code_info($idx)
	{
		global $conn;
		$sql="select * from `code` where `isdel`=0 and `idx`='".$idx."'";
		$rs_code=$conn->Execute($sql);
		if(!$rs_code)
		{
			error_msg('DB 질의가 실패했습니다.\\n에러코드[common.function.code_info():001]');
			exit;
		}

		if($rs_code->_numOfRows)
		{
			foreach($rs_code->fields as $key => $value)
			{
				$value=stripslashes($value);
				$code[$key]=$value;
			}
		}
		else
		{
			$code=0;
		}
		$rs_code->close();
		return $code;
	}

	//desc
	//$tb : 테이블
	function desc($tb)
	{
		global $conn;
		$sql="desc `".$tb."`";
		$rs=$conn->Execute($sql);
		if(!$rs)
		{
			error_msg('DB 질의가 실패했습니다.\\n에러코드[common.function.desc():001]');
			exit;
		}

		if($rs->_numOfRows)
		{
			while(!$rs->EOF)
			{
				$desc[]=$rs->fields['Field'];
				$rs->MoveNext();
			}
		}
		else
		{
			$desc=0;
		}
		$rs->close();
		return $desc;
	}
}
?>