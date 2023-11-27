function top2menuView(a)
{
	if(this.id){
		eidStr = this.id;
		eidNum=eidStr.substring(eidStr.lastIndexOf("m",eidStr.length)+1,eidStr.length);
		a = parseInt(eidNum);
	}
	top2menuHideAll();
	top1Menu = document.getElementById("gnb1m"+a);
	top2Menu = document.getElementById("gnb2m"+a);
	ann = (a<10)? "0"+a : ""+a;
	if(a==0){ 
	}else{
		if (top1Menu){ top1Menu.parentNode.className="on";
			//if(top1Menu.childNodes[0].src) top1Menu.childNodes[0].src="/img/gnb/gnb1m"+ann+"on.png";
			//if (top2Menu) { top2Menu.style.display = "inline"; }
		}
	}
}
function top2menuHide(a) 
{
	if(this.id){
		eidStr = this.id;
		eidNum=eidStr.substring(eidStr.lastIndexOf("m",eidStr.length)+1,eidStr.length);
		a = parseInt(eidNum);
	}
	//top2menuHideAll();
	top1Menu = document.getElementById("gnb1m"+a);
	top2Menu = document.getElementById("gnb2m"+a);
	top1MenuCurr = document.getElementById("gnb1m"+d1n);
	top2MenuCurr = document.getElementById("gnb2m"+d1n);
	ann = (a<10)? "0"+a : ""+a;
	if (top1Menu) { top1Menu.parentNode.className=""	;
		//if(top1Menu.childNodes[0].src) top1Menu.childNodes[0].src="/img/gnb/gnb1m"+ann+".png";
		if(top2Menu){ 
			//top2Menu.style.display = "none";
		}
		if(top1MenuCurr){ top1MenuCurr.parentNode.className="on";
			//if(top1MenuCurr.childNodes[0].src) top1MenuCurr.childNodes[0].src="/img/gnb/gnb1m"+d1nn+"on.png";
		}
		//if (top2MenuCurr) { top2MenuCurr.style.display = "inline"; }
	}
}
function top2menuHideAll() 
{
	top1menuEl = document.getElementById("gnbinner").childNodes;
	for (i=1;i<=11;i++)
	{
		top1Menu = document.getElementById("gnb1m"+i);
		top2Menu = document.getElementById("gnb2m"+i);
		inn = (i<10)? "0"+i : ""+i;
		if(top1Menu){ top1Menu.parentNode.className="";
			//if(top1Menu.childNodes[0].src) top1Menu.childNodes[0].src="/img/gnb/gnb1m"+inn+".png";
			//if (top2Menu) { top2Menu.style.display = "none"; }
		}
	}
}
function initTopMenu(d1,d2,d3) {
	d1n=d1; d2n=d2; 
	d1nn = (d1n<10)? "0"+d1n : ""+d1n;
	d2nn = (d2n<10)? "0"+d2n : ""+d2n;
 	top1menuEl = document.getElementById("gnbinner").childNodes;
	for (i=1;i<=11;i++) 
	{
		top1Menu = document.getElementById("gnb1m"+i);
		top2Menu = document.getElementById("gnb2m"+i);
		if (top1Menu) {
			//var spanEl = document.createElement("span");
			//top1Menu.insertBefore(spanEl,top1Menu.childNodes[0]);
			inn = (i<10)? "0"+i : ""+i;
			
			if(top1Menu.firstChild.tagName != "IMG"){
				//top1Menu.innerHTML = '<img src="/img/gnb/gnb1m'+inn+'.png" alt="'+top1Menu.innerHTML+'" />';
			}
			
			top1Menu.style.textIndent = "0";
			top1Menu.onmouseover = top1Menu.onfocus = top2menuView;
			top1Menu.onmouseout = top2menuHide;
			if (top2Menu) {
				//top2Menu.style.display = "none";
				
				
				/* 1차 메뉴의 깜빡꺼림 문제 아래두줄을 주석으로 처리하거나 1차 메뉴를 0이 아닌 다른것으로 처리*/
				top2Menu.onmouseover = top2Menu.onfocus = top2menuView;
				top2Menu.onmouseout = top2Menu.onblur = top2menuHide;
				top2MenuAs = top2Menu.getElementsByTagName("a");
				
			}
		}
	}

	top2MenuCurrAct = document.getElementById("gnb2m"+d1+"m"+d2);
	if (top2MenuCurrAct) { top2MenuCurrAct.getElementsByTagName("a")[0].className="on"; 
		//alert(top2MenuCurrAct.getElementsByTagName("img")[0].src );
		
	}
	top2menuHide(d1);

	top3MenuCurrAct = document.getElementById("gnb3m"+d1+"m"+d2+"m"+d3);
	//alert("gnb2m"+d1+"m"+d2+"m"+d3);
	if (top3MenuCurrAct) {
		top3MenuCurrAct.getElementsByTagName("a")[0].className="on";
	}
}


function initD2MenuImg(){
	for (var i=1;i<=5;i++){
		for(var j=1;j<=10;j++){
			d2Menu = document.getElementById("gnb2m"+i+"m"+j);
			if(d2Menu){ 
				d2MenuImg = d2Menu.getElementsByTagName("img")[0];
				if(d2MenuImg){
					d2MenuImg.onmouseover = menuOver;
					d2MenuImg.onmouseout = menuOut;
				}
			}
		}
	}
}