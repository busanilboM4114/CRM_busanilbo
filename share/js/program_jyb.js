//문장 끝 공백제거
String.prototype.trim = function() { return this.replace(/(^\s+)|(\s+$)/g, ''); }

//폼 체크(클래스)
//체크하는 함수에서 return true일 경우 추가 체크
//아닐 경우 return false;
//셀렉트박스/text/textarea만 가능(checkbox, radio 체크 불가)
function frm_chk(obj, layer_flag)
{
	flag=1;
	$(obj).find('.required').each(function(){
		if($(this).hasClass('input_select') || $(this).hasClass('input_radio') || $(this).hasClass('input_checkbox'))
		{
			msg='선택';
		}
		else
		{
			msg='입력';
		}
		if($(this).hasClass('input_radio'))
		{
			tmp_name=$(this).attr('name');
			if(!$("input:radio[name='"+tmp_name+"']").is(':checked'))
			{
				if(layer_flag)
				{
					$('.pop-layer1').html('['+$(this).attr('title')+']을(를) '+msg+'하세요.');
					$("#focus_obj_id").val($(this).attr('id'));
					view_patient();
				}
				else
				{
					alert('['+$(this).attr('title')+']을(를) '+msg+'하세요.');
				}

				$(this).focus();
				flag=0;
				return false;
			}
		}
		else if($(this).hasClass('input_checkbox'))
		{
			tmp_name=$(this).attr('name');
			if(!$("input:checkbox[name='"+tmp_name+"']").is(':checked'))
			{
				if(layer_flag)
				{
					$('.pop-layer1').html('['+$(this).attr('title')+']을(를) '+msg+'하세요.');
					$("#focus_obj_id").val($(this).attr('id'));
					view_patient();
				}
				else
				{
					alert('['+$(this).attr('title')+']을(를) '+msg+'하세요.');
				}
				
				$(this).focus();
				flag=0;
				return false;
			}
		}
		else
		{
			if($(this).val().trim()=='')
			{
				if(layer_flag)
				{
					$('.pop-layer1').html('['+$(this).attr('title')+']을(를) '+msg+'하세요.');
					$("#focus_obj_id").val($(this).attr('id'));
					view_patient();
				}
				else
				{
					alert('['+$(this).attr('title')+']을(를) '+msg+'하세요.');
				}

				$(this).focus();
				flag=0;
				return false;
			}
		}
	});
	if(flag==0)
	{
		return false;
	}
	$(obj).find('.isnum').each(function(){
		if(!numValue($(this).val()))
		{
			if(layer_flag)
			{
				$('.pop-layer1').html('['+$(this).attr('title')+']은/는 숫자만 가능합니다.');
				$("#focus_obj_id").val($(this).attr('id'));
				view_patient();
			}
			else
			{
				alert('['+$(this).attr('title')+']은/는 숫자만 가능합니다.');
			}
			
			$(this).focus();
			flag=0;
			return false;
		}
	});
	if(flag)
	{
		return true;
	}
	else
	{
		return false;
	}
}

//새창
//url : 열릴 url, win_name : 창이름, width : 가로크기, height : 세로크기,
//top : 상하위치, left : 좌우위치, scroll 스크롤유무, center : 새창 가운데 뜨게
//center true 일 경우 top, left 무시
//예시 : <a href="/html/01_fcs/" onclick="win_open(this.href, '', '800', '700', '', '', '1', '1');return false;">
// '/html/01_fcs/' 를 새창에서 가로 800, 세로 700, 가운데로 띄움
function win_open(url, win_name, width, height, top, left, scroll, center)
{
	if(top)
	{
		p_top=top;
	}
	else
	{
		p_top=0;
	}
	if(left)
	{
		p_left=left;
	}
	else
	{
		p_left=0;
	}
	if(center)
	{
		p_top=(screen.height - height) / 2;
		p_left=(screen.width - width) / 2;
	}
	win=window.open(url, win_name, "width="+width+", height="+height+", top="+p_top+", left="+p_left+", scrollbars="+scroll);
	win.window.focus();
}

//확인 메시지 후 이동
function confirm_link(msg, link)
{
	tmp=confirm(msg);
	if(tmp)
	{
		location.href=link;
	}
}

//숫자확인
function numValue(f)
{
	if (isNaN(f))
	return false;
	else 
	return true; 
}

//쓸때 숫자만 되도록
function isNumnic(numchar)
{
	len = numchar.value.length ;
	ch = numchar.value.charAt(len - 1) ;
	if ( ( ch < '0' ) || ( ch > '9') )
	{
		str = numchar.value ;
		for ( i = 0 ; i < len ; i ++ )
		{
			numchar.value = str.substr(0, len - 1) ;
		}
	}
}

function addcomma(str)
{
	const n1 = str;
	const cn1 = n1.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");

	return cn1;
}

function disable_toggle(obj, flag)
{
	if(flag=="1")
	{
		obj.disabled=true;
	}
	else
	{
		obj.disabled=false;
	}
}

function readonly_toggle(obj, flag)
{
	if(flag=='1')
	{
		obj.readOnly=true;
	}
	else
	{
		obj.readOnly=false;
	}
}

function valid_email(email)
{
	if(email.value == "")
	{
		return false;
	}
	if(email.match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+([\.][a-z0-9]+)+$") == null)
	{
		return false;
	}
	return true;
}

function addZero(n)
{
	return n < 10 ? "0" + n : n;
}

//날짜검사
function checkDate(val, flag)
{
	var d = new Date();
	var sss = val;
	var input_date = sss.split("-");

	var cur_year = d.getFullYear();
	var cur_month = addZero(d.getMonth()+1);
	var cur_date = addZero(d.getDate());

	var date1 = new Date(cur_year,cur_month,cur_date).valueOf();
	var date2 = new Date(input_date[0],input_date[1],input_date[2]).valueOf();

	if(flag=="1")
	{
		if (date2 - date1 < 1)
		{
			//alert('입력날짜는 현재날짜보다 하루 이후 날짜부터 가능합니다.');
			return false;
		}
		else
		{
			return true;
		}
	}
	else
	{
		if (date2 - date1 < 0)
		{
			//alert('입력날짜는 현재날짜보다 이전일 수 없습니다.');
			return false;
		}
		else
		{
			return true;
		}
	}
}

//특정 영역 프린트
// <div id="Print_page" > 프린트 영역 </div>
// <img alt="" src="/img/icon_print.gif" /><a href="#" onclick="printArea('제목입력')" >프린트</a>
	var initBody;
	var print_title;
	function beforePrint(){
		initBody = document.body.innerHTML;
		document.body.innerHTML = "<h3>"+print_title+"<h3><br />"+Print_page.innerHTML;
	}
	function afterPrint(){
		document.body.innerHTML = initBody;
	}
	function printArea(title) {
		print_title = title;
		window.onbeforeprint = beforePrint;
		window.onafterprint = afterPrint;
		window.print();
	}

//사업자등록번호
function check_BizRegNo(bizID)
{
	var checkID = new Array(1, 3, 7, 1, 3, 7, 1, 3, 5, 1);
	var i, Sum=0, c2, remander;

	bizID = bizID.replace(/-/gi,'');

	for (i=0; i<=7; i++)
	{
		Sum += checkID[i] * bizID.charAt(i);
	}

	c2 = "0" + (checkID[8] * bizID.charAt(8));
	c2 = c2.substring(c2.length - 2, c2.length);

	Sum += Math.floor(c2.charAt(0)) + Math.floor(c2.charAt(1));

	remander = (10 - (Sum % 10)) % 10 ;

	if(bizID.length != 10)
	{
		return false;
	}
	else if (Math.floor(bizID.charAt(9)) != remander)
	{
		return false;
	}
	else
	{
		return true;
	}
}



function ScreenSizeAlert(idname,maxheight) { //마우스오버아웃함수할당
	//alert(maxheight+idname);
	maxheight = maxheight+50
	document.getElementById(idname).style.width=maxheight+"px";
}

function juminChk(jumin_num)
{
	var totalNum = 0;
	var sumNum = 0;
	arrNum = new Array(13);               //잘라낸 수의 원본 값
	arrNum2 = new Array(12);      //잘라낸 수에 곱셈을 해준 값

	var totalnum = jumin_num;

	for(var i = 0 ; i < 14 ; i++)
	{
		arrNum[i] = totalnum.charAt(i);
	}

	arrNum2[0] = arrNum[0] * 2;
	arrNum2[1] = arrNum[1] * 3;
	arrNum2[2] = arrNum[2] * 4;
	arrNum2[3] = arrNum[3] * 5;
	arrNum2[4] = arrNum[4] * 6;
	arrNum2[5] = arrNum[5] * 7;
	arrNum2[6] = arrNum[6] * 8;
	arrNum2[7] = arrNum[7] * 9;
	arrNum2[8] = arrNum[8] * 2;
	arrNum2[9] = arrNum[9] * 3;
	arrNum2[10] = arrNum[10] * 4;
	arrNum2[11] = arrNum[11] * 5;

	for(var a = 0 ; a < 12 ; a++)
	{
		sumNum = sumNum + arrNum2[a];
	}

	sumNum = (11 - (sumNum % 11)) % 10;

	if(sumNum == arrNum[12])
	{
		return true;
		//document.frm1.txt_result.value = "올바른 주민등록번호입니다.";
	}
	else
	{
		return false;
		//document.frm1.txt_result.value = "잘못된 주민등록번호입니다.";
	}
}

function date_format(date)
{
	var y = date.getFullYear();
	var m = date.getMonth()+1;
	var d = date.getDate();
	return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
}
function date_parser(s)
{
	if (!s) return new Date();
	var ss = (s.split('-'));
	var y = parseInt(ss[0],10);
	var m = parseInt(ss[1],10);
	var d = parseInt(ss[2],10);
	if (!isNaN(y) && !isNaN(m) && !isNaN(d))
	{
		return new Date(y,m-1,d);
	}
	else
	{
		return new Date();
	}
}

function CheckPassword(upw, obj, layer_flag)
{
	//if(!/^[a-zA-Z0-9]{6,20}$/.test(upw) || upw.indexOf(' ') > -1) //이줄에 추가적인 조건을 넣었습니다.
	if(!/^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{6,20}$/.test(upw))
	{
		if(layer_flag)
		{
			$('.pop-layer1').html('비밀번호는 숫자, 영문자, 특수문자 조합으로 6~20자리를 사용해야 합니다.');
			$("#focus_obj_id").val('password');
			view_patient();
		}
		else
		{
			alert('비밀번호는 숫자,영문자,특수문자 조합으로 6~20자리를 사용해야 합니다.');
		}

		return false;
	}
	var chk_num = upw.search(/[0-9]/g);
	var chk_eng = upw.search(/[a-z]/ig);

	if(chk_num < 0 || chk_eng < 0)
	{
		if(layer_flag)
		{
			$('.pop-layer1').html('비밀번호는 숫자와 영문자를 혼용하여야 합니다.');
			$("#focus_obj_id").val('password');
			view_patient();
		}
		else
		{
			alert('비밀번호는 숫자와 영문자를 혼용하여야 합니다.');
		}

		return false;
	}

	if(/(\w)\1\1\1/.test(upw))
	{
		if(layer_flag)
		{
			$('.pop-layer1').html('비밀번호에 같은 문자를 4번 이상 사용하실 수 없습니다.');
			$("#focus_obj_id").val('password');
			view_patient();
		}
		else
		{
			alert('비밀번호에 같은 문자를 4번 이상 사용하실 수 없습니다.');
		}

		return false;
	}
	return true;
}

/*
	전화번호 - 자동 입력
	일반전화 및 휴대폰 자동 체크
*/
function addDash(obj) 
{
	/*
		'-'를 제거한 번호를 저장하는 변수
	*/
	var sNoDashNumber = "" ;
	sNoDashNumber	= removeDash(obj);
	var iLen		= getLeng(sNoDashNumber);
	var iType 		= "";
	
	if ( iLen > 1 )
	{
		iType = sNoDashNumber.substring(2,1);
	}
	if (event.keyCode != 8) 
	{
		if ( iType == 2 )
		{
			var iLen2 = iLen - 5;
			switch (iLen) {
				case 0:
				case 1:
				case 2:
					break;
				case 3:
				case 4:
				case 5:
					obj.value  = sNoDashNumber.substring(0,2) + "-" + sNoDashNumber.substr(2,3);
					break;
				case 6:					
				case 7:
				case 8:
				case 9:
					obj.value  = sNoDashNumber.substring(0,2) + "-" + sNoDashNumber.substr(2,3) + "-" + sNoDashNumber.substr(5, iLen2) ;
					break;
				case 10:
					obj.value  = sNoDashNumber.substring(0,2) + "-" + sNoDashNumber.substr(2,4) + "-" + sNoDashNumber.substr(6,4) ;
					break;
				
				default :
					/*
						"없는 번호입니다. 다시 입력해 주세요"
					*/
					alert(NO_NUMBER_RE_INPUT);
					obj.value  = sNoDashNumber.substring(0,2) + "-" + sNoDashNumber.substr(2,4) + "-" + sNoDashNumber.substr(6,4) ;
					break;
			}
		}
		else
		{
			var iLen2 = iLen - 6;
			switch (iLen) {
				case 0:
				case 1:
				case 2:
					break;
				case 3:
				case 4:
				case 5:
				case 6:
					obj.value  = sNoDashNumber.substring(0,3) + "-" + sNoDashNumber.substr(3,3);
					break;
				case 7:
				case 8:
				case 9:
				case 10:
					obj.value  = sNoDashNumber.substring(0,3) + "-" + sNoDashNumber.substr(3,3) + "-" + sNoDashNumber.substr(6, iLen2) ;
					break;
				case 11:
					obj.value  = sNoDashNumber.substring(0,3) + "-" + sNoDashNumber.substr(3,4) + "-" + sNoDashNumber.substr(7,4) ;
					break;
				
				default :
					/*
						"없는 번호입니다. 다시 입력해 주세요"
					*/
					alert(NO_NUMBER_RE_INPUT);
					obj.value  = sNoDashNumber.substring(0,3) + "-" + sNoDashNumber.substr(3,4) + "-" + sNoDashNumber.substr(7,4) ;
					break;
			}
		}
	}
}

/*
	dash를 제거한다.
*/
function removeDash(obj) 
{

	// '-'을 제거한 번호를 저장할 변수
	var sNoDashNumber = "";
	var i = 0;

	for (i = 0; i < obj.value.length; i++) 
	{
		if ((obj.value).charAt(i) != "-") 
		{
			sNoDashNumber += (obj.value).charAt(i);
		}
	}

	return sNoDashNumber;
}

/*
	스트링값을 받아서 바이트 수를 체크한다.
*/
function getLeng(sMessage) 
{
	var iCount = 0 ;													//메시지의 바이트를 저장하는 변수

	// 0-127 1byte, 128~ 2byte
	for (var i = 0; i < sMessage.length; i++) 						
	{							
		if ( sMessage.charCodeAt(i) > 127) 
		{
			iCount += 2;
		}
		else {
			iCount++;
		}
	}
	return iCount;
}

//레이어 팝업창.
function view_patient() {
	$('.layer-wrap1').fadeIn();
};
function close_patient(){
	$('.layer-wrap1').fadeOut();
	if($("#focus_obj_id").val()!='')
	{
		$("#"+$("#focus_obj_id").val()).focus();
	}
};