<?
	error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
	//error_reporting(-1);

	session_cache_limiter("");
	session_start();

	if($no_cache_flag=='')
	{
		header("Pragma: no-cache");
	}

	date_default_timezone_set('Asia/Seoul');

	$KOR_Title_Name		= "부산일보 FUN BUSAN";
	$ENG_Title_Name		= "부산일보 FUN BUSAN";

	$Upload_Path		= "/UploadFolder/";

	//실제 도메인 연결시 바꿔야 됨
	$Web_URL			= 'https://test.busan.com';
	$Web_URLS			= 'https://test.busan.com';

	$Admin_Login_Path	= '/bsADmIn/';
	$Admin_Master_Path	= '/BSmaSTeR/';

	$Admin_First_Path		= $Admin_Master_Path.'?';

	$Editor_Img_Path		= $Upload_Path.'editor_img/';


	/*********************** Smarty Template 컴파일 기본설정 ************************************************************
	 * DEFINE ("CLASS_PATH", $_SERVER['DOCUMENT_ROOT']."/web-cs/") : CLASS_PATH 경로 지정후 맨끝에 '/' 사용
	 * 관리자용 경로 지정시 맨끝에 '/' 사용해야됨
	 * Template_PATH : 클라이언트 파일 및 관리자 파일을 구분 컴파일시 임시 저장 폴더 지정
	 * Compile_PATH  : 컴파일된 임시 파일 저장 장소 지정
	 */

	$db_host = "";
	$db_user = "";
	$db_pass = "";
	$db_name = "";

	$db_enc_key = '';//암호화 필드 암호화 키값(복호화 가능 필드)

	DEFINE ("CLASS_PATH", $_SERVER['DOCUMENT_ROOT']."/html/web-cs/");

	define ("Template_PATH", $_SERVER['DOCUMENT_ROOT']."/html/web-cs/");
	define ("Compile_PATH",  $_SERVER['DOCUMENT_ROOT']."/html/web-cs/template_c");

	/*********************** ADODB 환경설정 [normal connection = 0, persistent connection = 1] **************************
	 * connect_method = 0 : normal
	 * connect_method = 1 : persistent
	 * display_error  = 1 : 오류를 화면에 출력하지 않음
	 * display_error  = 0 : 오류를 화면에 출력함
	 * error_log_type = 1 : 에러 로그 타입 지정
	 *
	 * Smarty Template 환경설정
	 * smarty_debug   = 0 : 템플릿 디버깅 안함
	 * smarty_debug   = 1 : 템플릿 디버깅 함
	 *
	 * 오류츌력 지정
	 * ini_set("display_errors", $display_error)		: 오류화면 출력하지 않음
	 * define('ADODB_ERROR_LOG_TYPE', $error_log_type)	: 오류타입 설정
	 * define('ADODB_ERROR_LOG_DEST', $error_log_dir);  : 오류내용 저장할 파일명
	 */
	$connect_method = 0;
	$display_error  = 1;
	$error_log_type = 1;
	$smarty_debug   = 0;

	ini_set("display_errors", $display_error);
	define('ADODB_ERROR_LOG_TYPE', $error_log_type);
	//define('ADODB_ERROR_LOG_DEST', $error_log_dir);
	define('ADODB_FORCE_NULLS',1);

	/************************* INCLUDE FILE START *************************/

	require_once (CLASS_PATH."Common_File/_Function.php");				//기본 함수
	require_once (CLASS_PATH."Common_File/utill.php");					//함수1
	//require_once (CLASS_PATH."libs/adodb/adodb-exceptions.inc.php");	//예외 처리
	require_once (CLASS_PATH."libs/adodb/adodb.inc.php");				//DB 라이브러리
	require_once (CLASS_PATH."libs/adodb/adodb-errorhandler.inc.php");	//에러 라이브러리 설정
	require_once (CLASS_PATH."libs/adodb/config_db.php");				//conn 설정
	require_once (CLASS_PATH."libs/smarty/Smarty.class.php");			//템플릿 라이브러리
	require_once (CLASS_PATH."Common_File/common.function.php");
	require_once (CLASS_PATH."Common_File/class.image.php");			//이미지
	require_once (CLASS_PATH."Common_File/jwt.php");			//jwt
	/************************* INCLUDE FILE END **************************/

	/*********************** ADODB 환경설정
	 * DB 디버그 사용여부 설정
	 * $conn->debug = false : 사용안함, true 사용함
	 *
	 * 출력형식 지정 (하나만 선택)
	 * $ADODB_FETCH_MODE = ADODB_FETCH_NUM;		: 출력형식 array([0]->'1', [1]->'2')
	 * $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;	: 출력형식 array([필드1]->'1', [필드2]->'2')
	 * $conn->SetFetchMode(ADODB_FETCH_ASSOC);
	 */
	$conn->debug = false;
	$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

	$conn->Execute('set names utf8');
?>
