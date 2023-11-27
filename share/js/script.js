function getElementsByClassName(clsName) { 
var arr = new Array(); 
	var elems = document.getElementsByTagName("*");
	for ( var i = 0; ( elem = elems[i] ); i++ ) {
		if ( elem.className == clsName ) {
			arr[arr.length] = elem;
		}
	}
	return arr;
}

function imgOver(imgEl){//ex) oneEl.onmouseover = imgOver("ImageID");
	if(imgEl){
		_imgtype = imgEl.src.substr(imgEl.src.length-3,imgEl.src.length-1);
		var where = imgEl.src.indexOf("on."+_imgtype,0);
		if(where==-1) imgEl.src = imgEl.src.replace("."+_imgtype,"on."+_imgtype);
	}
}

function imgOut(imgEl){//ex) oneEl.onmouseover = imgOut("ImageID");
	if(imgEl){
		_imgtype = imgEl.src.substr(imgEl.src.length-3,imgEl.src.length-1);
		var where = imgEl.src.indexOf("on."+_imgtype,0);
		if(where!=-1) imgEl.src = imgEl.src.replace("on."+_imgtype,"."+_imgtype);
	}
}

function menuOver(){//ex) imgEl.onmouseover = menuOver; aEl.onfocus = menuOver;
	var imgEl = (this.src)? this: this.getElementsByTagName("img")[0];
	if(imgEl) {
		_imgtype = imgEl.src.substr(imgEl.src.length-3,imgEl.src.length-1);
		var where = imgEl.src.indexOf("on."+_imgtype,0);
		if(where==-1) imgEl.src = imgEl.src.replace("."+_imgtype,"on."+_imgtype);
	}
}

function menuOut(){//ex) imgEl.onmouseout = menuOver; aEl.onblur = menuOut;
	var imgEl = (this.src)? this: this.getElementsByTagName("img")[0];
	if(imgEl) {
		_imgtype = imgEl.src.substr(imgEl.src.length-3,imgEl.src.length-1);
		var where = imgEl.src.indexOf("on."+_imgtype,0);
		if(where!=-1) imgEl.src = imgEl.src.replace("on."+_imgtype,"."+_imgtype);
	}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function MM_openBrWindow(theURL,winName,features,scroll) { //v2.0
  window.open(theURL,winName,features);
}

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  if(targ=='blank')
  {
	  window.open(selObj.options[selObj.selectedIndex].value);
  }
  else
  {
	eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
	if (restore) selObj.selectedIndex=0;
  }
}

function setPng24(obj) {
obj.width=obj.height=1;
obj.className=obj.className.replace(/\bpng24\b/i,'');
obj.style.filter =
"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+ obj.src +"',sizingMethod='image');"
obj.src=''; 
return '';
}


function pop_open()
	{
		window.open('/html/main/p_email.jsp','','width=352,height=280');
	}


function objflash(URL,wid,hei,mode,LT,scale)
{
document.write("<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0' width='"+wid+"' height='"+hei+"'>");
document.write("<param name='movie' value='"+URL+"'>");
document.write("<param name='quality' value='high'>");
document.write("<param name='wmode' value='"+mode+"'>");
document.write("<param name='salign' value='"+LT+"'>");
document.write("<param name='scale' value='" + scale + "'>");
document.write("<embed src='"+URL+"' width='"+wid+"' height='"+hei+"' quality='high' wmode='"+mode+"' scale='"+scale+"' salign='"+LT+"' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash'></embed>");
document.write("</object>");
}

function objflash2(URL,wid,hei,mode,LT,scale,Fid)
{
document.write("<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0' width='"+wid+"' height='"+hei+"' id='"+Fid+"'>");
document.write("<param name='movie' value='"+URL+"'>");
document.write("<param name='quality' value='high'>");
document.write("<param name='WMODE' value='"+mode+"'>");
document.write("<param name='salign' value='"+LT+"'>");
document.write("<param name='scale' value='" + scale + "'>");
document.write("<embed id='"+Fid+"' src='"+URL+"' width='"+wid+"' height='"+hei+"' quality='high' wmode='"+mode+"' scale='"+scale+"' salign='"+LT+"' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash'></embed>");
document.write("</object>");
}



//ex) initMoving("idname",884,500);
function initMoving(id,xleft,ytop) {
	target = document.getElementById(id);
	if (!target) return false;
	var obj = target;
	obj.initLeft = xleft;
	obj.initTop = ytop;
	obj.bottomLimit = document.documentElement.scrollHeight-370;
	obj.topLimit = 370;
	obj.style.position = "absolute";
	obj.top = obj.initTop;
	obj.left = obj.initLeft;
	obj.style.top = obj.top + "px";
	obj.style.right = obj.left + "px";
	obj.getTop = function() {
		if (document.documentElement.scrollTop) {			
			return document.documentElement.scrollTop;
		} else if (window.pageYOffset) {
			alert("pageYOffset")
			return window.pageYOffset;
		} else {
			return -50;
		}
	}
	obj.getHeight = function() {
		if (self.innerHeight) {
			return self.innerHeight;
		} else if(document.documentElement.clientHeight) {
			return document.documentElement.clientHeight;
		} else {
			return 0;
		}
	}
	obj.move = setInterval(function() {
		//alert("move")
		pos = obj.getTop() + obj.getHeight() / 2 - 15;
		if (pos > obj.bottomLimit)
			pos = obj.bottomLimit
		if (pos < obj.topLimit)
			pos = obj.topLimit
		interval = obj.top - pos;
		obj.top = obj.top - interval / 3;
		obj.style.top = obj.top + "px";
	}, 40)
}

function tab4on(d)
{
	ctab4MenuCurr = document.getElementById("tab4on" + d);
	ctab4MenuCurr.src = ctab4MenuCurr.src.replace(".gif", "_ov.gif");
}

function initContentTabMenu2(d)
{
	var obj = document.getElementById("content_tabmenu").getElementsByTagName("li");
	for (i=0; i<obj.length; i++) {
	ctab4Menu = document.getElementById("ctab4m_"+(i+1));
	ctab4MenuA = ctab4Menu.getElementsByTagName("a")[0];
	ctab4MenuImg = ctab4Menu.getElementsByTagName("img")[0];
		if(ctab4Menu){
			ctab4MenuA.style.color="#fff";
			ctab4Menu.style.backgroundPosition="0 0";
			ctab4MenuA.style.backgroundPosition="100% 0";
			if(ctab4MenuImg){ ctab4MenuImg.src = ctab4MenuImg.src.replace("on.gif", ".gif");	}
		}
	}
	ctab4MenuCurr = document.getElementById("ctab4m_" + d);
	ctab4MenuCurrA = ctab4MenuCurr.getElementsByTagName("a")[0];
	ctab4MenuCurrImg = ctab4MenuCurr.getElementsByTagName("img")[0];
	if(ctab4MenuCurr){
		ctab4MenuCurrA.style.color="#4a5664";
//		ctab4MenuCurrA.style.background="#6295ca";
//		ctab4MenuCurr.style.borderColor="#6295ca";
		ctab4MenuCurr.style.backgroundPosition="0 -100px";
		ctab4MenuCurrA.style.backgroundPosition="100% -100px";
		if(ctab4MenuCurrImg){ ctab4MenuCurrImg.src = ctab4MenuCurrImg.src.replace(".gif", "on.gif");	}
	}
}

function displaydiv(divID) {
	var divContent = document.getElementById(divID);
	if(divContent.style.display == "block") {
		divContent.style.display = "none";
	}else{
		divContent.style.display = "block";
	}
}

function startCateScrollScroll(target) {
 setTimeout("slideCateScroll('"+target+"')", 10);
}

function slideCateScroll(target) {
 if(target == "language-site-view") {
  var Sel_Height=50;
 }else{
  var Sel_Height=260;
 }
 //var Sel_Height=50;
  el = document.getElementById(target);
 if (el.heightPos == null || (el.isDone && el.isOn == false)) {
  el.isDone = false;
  el.heightPos = 1;
  el.heightTo = Sel_Height;
 } else if (el.isDone && el.isOn){
  el.isDone = false;
  el.heightTo = 1;
 }
 if (Math.abs(el.heightTo - el.heightPos) > 1) {
  el.style.display = 'block';
  el.heightPos += (el.heightTo - el.heightPos) / 10;
  el.style.height = el.heightPos + "px";
  startCateScrollScroll(target);
 } else {
 if (el.heightTo == Sel_Height) {
  el.isOn = true;
 } else {
  el.isOn = false;
  el.style.display = 'none';
 }
  el.heightPos = el.heightTo;
  el.style.height = el.heightPos + "px";
  el.isDone = true;
 }
}


function resizeHeight(id) {
  var the_height = document.getElementById(id).contentWindow.document.body.scrollHeight;
  document.getElementById(id).height = the_height + 30;
}



function leftquickOn(aa,bb,cc) {

	if(document.getElementById("leftquickOn").style.display == "block" ) {
		tabOn(aa,1,cc);
		document.getElementById("leftquickOn").style.display = "none"; 
	}else{
		document.getElementById("leftquickOn").style.display = "block"; 
		tabOn(aa,bb,cc);
	}

}

function leftquickOff() {
	tabOn(2,1,'leftquick')
	tabOn(3,1,'leftquick')
	document.getElementById("leftquickOn").style.display = "none"; 
}



function tabOn(tabid,a,path) {
	//alert(tabid+"/"+a+"/"+path);
	for (i=1;i<=3;i++) {
		if(i<10){inn="0"+i;} else {inn=""+i;}
		tabMenu = document.getElementById("tab"+tabid+"m"+i);
		tabContent = document.getElementById("tab"+tabid+"c"+i);
		if (tabMenu) { //객체가존재하면
			if (tabMenu.tagName=="IMG") { tabMenu.src="/img/"+path+"/"+"tab"+tabid+"m"+inn+".gif"; } //이미지일때
			if (tabMenu.tagName=="A") { //앵커일때
				tabMenu.style.background="transparent url(/img/main/tab"+tabid+"mbg.gif) no-repeat";
				tabMenu.style.padding=" 0";
				tabMenu.style.fontWeight="normal";
				}
		}
		if (tabContent) { tabContent.style.display="none"; }
		if (i==a)  { tabContent.style.display="block"; }
	}
	if(a<10){ann="0"+a;} else {ann=""+a;}
	tabMenu = document.getElementById("tab"+tabid+"m"+a);
	tabContent = document.getElementById("tab"+tabid+"c"+a);
//	alert(tabMenu.tagName);
	if (tabMenu) { //객체가존재하면
		if (tabMenu.tagName=="IMG") { tabMenu.src="/img/"+path+"/"+"tab"+tabid+"m"+ann+"on.gif"; } //이미지일때
		if (tabMenu.tagName=="A") { //앵커일때
			tabMenu.style.background="transparent url(/img/main/tab"+tabid+"mbgon.gif) no-repeat";
			tabMenu.style.padding="0";
			tabMenu.style.fontWeight="bold";
			}
	}
	if (tabContent) { tabContent.style.display="block"; }
	tabMore = document.getElementById("tab"+tabid+"more");
	if (tabMore) { 
		tabMore.href = moreLink[tabid-1][a-1];
		tabMore.onclick = moreClick[tabid-1][a-1];
	}
}


/* 연혁 탭 */
// 호출방법<a onkeypress="this.onclick();" onclick="tabChClass7(3,3)" href="#m">image </a> 

function tabChClass1(num,num2){
	var i;

	for(i=1;i<=num2;i++){
			//alert ("vision_"+i);
		if(i==num){
			//document.getElementById("img_list_"+i).className = "img_list_on";
			document.getElementById("tab_on_"+i).src = "/img/01_sogae/history_tab_on_"+ i + ".gif";
			document.getElementById("vision_"+i).style.display = "";			
		}else{
			//document.getElementById("txt_list_"+i).className = "";
			document.getElementById("tab_on_"+i).src = "/img/01_sogae/history_tab_off_"+ i + ".gif";
			document.getElementById("vision_"+i).style.display = "none";
		}
	}
}
 




/* 기구표 탭 */
// 호출방법<a onkeypress="this.onclick();" onclick="tabChClass7(3,3)" href="#m">image </a> 

function tabChClass2(num,num2){
	var i;

	for(i=1;i<=num2;i++){
			//alert ("content_"+i);
		if(i==num){
			//document.getElementById("img_list_"+i).className = "img_list_on";
			document.getElementById("tab_on_"+i).src = "/img/01_sogae/org_tab_on_"+ i + ".gif";
			document.getElementById("content_"+i).style.display = "";			
		}else{
			//document.getElementById("txt_list_"+i).className = "";
			document.getElementById("tab_on_"+i).src = "/img/01_sogae/org_tab_off_"+ i + ".gif";
			document.getElementById("content_"+i).style.display = "none";
		}
	}
}



/* 전자규정 탭 */
// 호출방법<a onkeypress="this.onclick();" onclick="tabChClass7(3,3)" href="#m">image </a> 

function tabChClass3(num,num2){
	var i;

	for(i=1;i<=num2;i++){
			//alert ("content_"+i);
		if(i==num){
			//document.getElementById("img_list_"+i).className = "img_list_on";
			document.getElementById("tab_on_"+i).src = "/img/01_sogae/list_tab_on_"+ i + ".gif";
			document.getElementById("content_"+i).style.display = "";			
		}else{
			//document.getElementById("txt_list_"+i).className = "";
			document.getElementById("tab_on_"+i).src = "/img/01_sogae/list_tab_off_"+ i + ".gif";
			document.getElementById("content_"+i).style.display = "none";
		}
	}
}



/* 예결산공고 탭 */
// 호출방법<a onkeypress="this.onclick();" onclick="tabChClass7(3,3)" href="#m">image </a> 

function tabChClass4(num,num2){
	var i;

	for(i=1;i<=num2;i++){
			//alert ("content_"+i);
		if(i==num){
			//document.getElementById("img_list_"+i).className = "img_list_on";
			document.getElementById("tab_on_"+i).src = "/img/01_sogae/b01_tab_on_"+ i + ".gif";
			document.getElementById("content_"+i).style.display = "";			
		}else{
			//document.getElementById("txt_list_"+i).className = "";
			document.getElementById("tab_on_"+i).src = "/img/01_sogae/b01_tab_off_"+ i + ".gif";
			document.getElementById("content_"+i).style.display = "none";
		}
	}
}



/* 예결산공고 탭 */
// 호출방법<a onkeypress="this.onclick();" onclick="tabChClass7(3,3)" href="#m">image </a> 

function tabChClass5(num,num2){
	var i;

	for(i=1;i<=num2;i++){
			//alert ("content_"+i);
		if(i==num){
			//document.getElementById("img_list_"+i).className = "img_list_on";
			document.getElementById("tab_on_"+i).src = "/img/05_plaza/tab01_on_"+ i + ".gif";
			document.getElementById("content_"+i).style.display = "";			
		}else{
			//document.getElementById("txt_list_"+i).className = "";
			document.getElementById("tab_on_"+i).src = "/img/05_plaza/tab01_off_"+ i + ".gif";
			document.getElementById("content_"+i).style.display = "none";
		}
	}
}




/* 성폭력관련정보 탭 */
// 호출방법<a onkeypress="this.onclick();" onclick="tabChClass7(3,3)" href="#m">image </a> 

function tabChClass6(num,num2){
	var i;

	for(i=1;i<=num2;i++){
			//alert ("content_"+i);
		if(i==num){
			//document.getElementById("img_list_"+i).className = "img_list_on";
			document.getElementById("tab_on_"+i).src = "/img/04_life/s_tab_on_"+ i + ".gif";
			document.getElementById("counsel_"+i).style.display = "";			
		}else{
			//document.getElementById("txt_list_"+i).className = "";
			document.getElementById("tab_on_"+i).src = "/img/04_life/s_tab_off_"+ i + ".gif";
			document.getElementById("counsel_"+i).style.display = "none";
		}
	}
}


/* 새로보는 성과 사랑 탭 */
// 호출방법<a onkeypress="this.onclick();" onclick="tabChClass7(3,3)" href="#m">image </a> 

function tabChClass7(num,num2){
	var i;

	for(i=1;i<=num2;i++){
			//alert ("content_"+i);
		if(i==num){
			//document.getElementById("img_list_"+i).className = "img_list_on";
			document.getElementById("tab_on_"+i).src = "/img/04_life/s2_tab_on_"+ i + ".gif";
			document.getElementById("counsel_"+i).style.display = "";			
		}else{
			//document.getElementById("txt_list_"+i).className = "";
			document.getElementById("tab_on_"+i).src = "/img/04_life/s2_tab_off_"+ i + ".gif";
			document.getElementById("counsel_"+i).style.display = "none";
		}
	}
}




function roadchange(param) {
	imageArray = ["../../img/main/conloca.jpg","../../img/main/conloca2.jpg"]
	if (param == 1) {
	$("#mbu").removeClass("dpn")
	$("#mgi").addClass("dpn")
	}else{
	$("#mbu").addClass("dpn")
	$("#mgi").removeClass("dpn")	
	}
	
	$("#roadpic").fadeOut(500, function(){

	$("#roadpic").attr('src','' );
	$("#roadpic").attr('src',imageArray[param-1] );

	$("#roadpic").fadeIn(500);
	});
}


function allmenuview(divID) {
	var divContent = $("#"+divID);
	

	if(divContent.css("display") == "block") {
		divContent.css("display","none");
		divContent.css("height","0px");

	}else{
		divContent.css("display","block");
		divContent.css("height","1200px");
	}

}