<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- saved from url=(0057)DataMaintain.aspx -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>DataMaintain</title>
		
		<meta content="Microsoft Visual Studio 7.0" name="GENERATOR">
		<meta content="C#" name="CODE_LANGUAGE">
		<meta content="JavaScript" name="vs_defaultClientScript">
		<meta content="http://schemas.microsoft.com/intellisense/ie5" name="vs_targetSchema">
		<!--語法在網頁插入的開始-->
		<style type="text/css">.classFrRi82 { WIDTH: 180px; CLIP: rect(0px 180px 330px 0px); POSITION: absolute; HEIGHT: 330px }
	#FrRi82 { LEFT: 0px; VISIBILITY: hidden; TOP: 10px }
		</style>
		<script language="JavaScript">
<!--annietsai
// 樹狀選單設定如下:
// 選擇按下選單時的文字顏色與背景顏色＆背景顏色。(不需要時以 "" 表示。)
var kaiViRi82=1;
var foMeCoRi82="";   // 選擇按下選單時的文字顏色
var bgMeCoRi82="";   // 選擇按下選單時的背景顏色
var bgCoRi82="";     // 樹狀選單表格內背景顏色

// 樹狀選單的空白的大小＆假動作圖案。← (★★此部份的圖案你不用修改★★)
var kaiWRi82=5,kaiHRi82=5;   // 大小(寬與高度)
var kaiImDaRi82="images/btn.gif";    // 假動作圖案

// 樹狀選單圖案號碼與連結名稱的設定。
// 樹狀選單圖案的大小的高度建議你都設定相同尺寸 。
var foWRi82=5,foHRi82=5;        // 樹狀選單圖案的大小(寬與高度)
var foImRi82=new Array();
foImRi82[0]=new Array();          // foImRi82[0選單圖案號碼]=new Array(); 選單圖案號碼由0開始以此順序(是以一組為單位)
foImRi82[0][0]="images/btn.gif";       // 選擇按下選單前的圖案
foImRi82[0][1]="images/btn.gif";       // 選擇按下選單後的圖案
foImRi82[1]=new Array();
foImRi82[1][0]="images/btn.gif";
foImRi82[1][1]="images/btn.gif";

function anniejs() {
	// 樹狀選單設定部分。
	// tsaijs(選單號碼,父母選單號碼,是否有子選單嗎,"標題",文字大小,"URL","目標框架頁名稱","文字的顏色",選單圖案號碼)
	// (但是「樹狀選單首頁」的部份中最後表示「樹狀選單資料夾圖像,寬,高度」。)
	// 「樹狀選單首頁」部分的選單號碼以 -1 表示
	// (☆★選單號碼由 0 開始，依順序填寫★☆)。
	// 是否有子菜單嗎?以"yes"(表示有)、"no"(表示沒有)。
	// (框架頁目標的表示由以下選擇。
	//  框架名稱：要連結的框架頁名稱。
	//  _top： 整頁。
	//  _blank：開新窗口。
	//  _self： 相同框架。
	// Main： 你設定要連結的目標框架頁名稱。
	// 選單圖案號碼是以上面的 foImRi82[?][*]="～" 的 ? 號碼相對應配合。

	// tsaijs(選單號碼,父母選單號碼,是否有子選單嗎,"標題",文字大小,"URL","目標框架頁名稱","文字的顏色",選單圖案號碼)
	tsaijs(-1,"","","資料維護",3,"","Main","blue","images/btn.gif",5,5);
	// 商標
	// tsaijs(選單號碼,父母選單號碼,是否有子選單嗎,"標題",文字大小,"URL","目標框架頁名稱","文字的顏色",選單圖案號碼)
	tsaijs(0,-1,"yes","商標",3,"","","blue",1);
	tsaijs(1,0,"no","國內",2,"DataTrademark.php?CO=Tai","_self","red",1);
	tsaijs(2,0,"no","出口",2,"DataTrademark.php?CO=Out","_self","red",1);
	tsaijs(3,0,"no","進口",2,"DataTrademark.php?CO=In","_self","red",1);
    // 專利
	tsaijs(4,-1,"yes","專利",3,"","","blue",1);
	tsaijs(5,4,"no","國內",2,"DataPatent.php?CO=Tai","_self","red",1);
	tsaijs(6,4,"no","出口",2,"DataPatent.php?CO=Out","_self","red",1);
	tsaijs(7,4,"no","進口",2,"DataPatent.php?CO=In","_self","red",1);
	// 著作權
	tsaijs(8,-1,"yes","著作權",3,"","","blue",1);
	tsaijs(9,8,"no","國內",2,"DataCopyright.php?CO=Tai","_self","red",1);
	tsaijs(10,8,"no","出口",2,"DataCopyright.php?CO=Out","_self","red",1);
	tsaijs(11,8,"no","進口",2,"DataCopyright.php?CO=In","_self","red",1);
	// 法務
	tsaijs(12,-1,"yes","法務",3,"","","blue",1);
	tsaijs(13,12,"no","國內",2,"DataMoj.php?CO=Tai","_self","red",1);
	tsaijs(14,12,"no","出口",2,"DataMoj.php?CO=Out","_self","red",1);
	tsaijs(15,12,"no","進口",2,"DataMoj.php?CO=In","_self","red",1);
	// 其他
	tsaijs(16,-1,"yes","其他",3,"","","blue",1);
	tsaijs(17,16,"no","其他",3,"DataOtherCase.php?CO=Tai","_self","red",1);
}

var obFrRRi82,obFrRi82;
var i,kazRi82,htmlRi82,html0Ri82=new Array(),html1Ri82=new Array();
var kaiRi82=new Array(),visRi82=new Array(),visCRi82=new Array();
var setRi82=new Array(),foImFlRi82=new Array();
var urlTopRi82,targetTopRi82,urlRi82=new Array(),targetRi82=new Array();
anniejs();

function tsaijs(nu,seNu,fl,ti,si,ur,ta,fo,im,w,h) {
	if (nu!=-1) {
		var i,kIm="",u,im0,im1,li0,li1;
		kazRi82=nu;
		setRi82[nu]=seNu;
		if (seNu==-1) kaiRi82[nu]=0;
		else kaiRi82[nu]=kaiRi82[seNu]+1;
		if (kaiRi82[nu]==0) visRi82[nu]=true;
		else visRi82[nu]=false;
		if (fl=="yes") visCRi82[nu]=false;
		else visCRi82[nu]="no";
		urlRi82[nu]=ur,targetRi82[nu]=ta;
		foImFlRi82[nu]=im;
		kIm='<IMG SRC="'+kaiImDaRi82+'" ALIGN="bottom" WIDTH="'+(kaiWRi82*(kaiRi82[nu]+1))+'" HEIGHT="'+kaiHRi82+'">';
		im0='<IMG SRC="'+foImRi82[im][0]+'" ALIGN="bottom" BORDER="0" WIDTH="'+foWRi82+'" HEIGHT="'+foHRi82+'">';
		im1='<IMG SRC="'+foImRi82[im][1]+'" ALIGN="bottom" BORDER="0" WIDTH="'+foWRi82+'" HEIGHT="'+foHRi82+'">';

		li0='<FONT SIZE="'+si+'" COLOR="'+fo+'"><SPAN style="background-color:'+bgCoRi82+'">'+ti+'</SPAN></FONT>';
		li1='<FONT SIZE="'+si+'" COLOR="'+foMeCoRi82+'"><SPAN style="background-color:'+bgMeCoRi82+'">'+ti+'</SPAN></FONT>';
		if (ur=="") u='<A HREF="#" onClick="eewenchin('+nu+',false);return false">';
		else u='<A HREF="#" onClick="eewenchin('+nu+',true);return false">';
		html1Ri82[nu]=new Array();
		html1Ri82[nu][0]=kIm+u+im0+'</A> '+u+li0+'</A><BR>';
		html1Ri82[nu][1]=kIm+u+im1+'</A> '+u+li0+'</A><BR>';
		html1Ri82[nu][2]=kIm+u+im0+'</A> '+u+li1+'</A><BR>';
		html1Ri82[nu][3]=kIm+u+im1+'</A> '+u+li1+'</A><BR>';
		if (visRi82[nu]) {
			if (visCRi82[nu]==true) htmlRi82+=html1Ri82[nu][1];
			else htmlRi82+=html1Ri82[nu][0];
		}
	}
	else {
		urlTopRi82=ur,targetTopRi82=ta;
		li0='<FONT SIZE="'+si+'" COLOR="'+fo+'"><SPAN style="background-color:'+bgCoRi82+'">'+ti+'</SPAN></FONT>';
		li1='<FONT SIZE="'+si+'" COLOR="'+foMeCoRi82+'"><SPAN style="background-color:'+bgMeCoRi82+'">'+ti+'</SPAN></FONT>';
		if (ur=="") u='<A HREF="#" onClick="eewenchin('+nu+',false);return false">';
		else u='<A HREF="#" onClick="eewenchin('+nu+',true);return false">';
		html0Ri82[0]=u+'<IMG SRC="'+im+'" ALIGN="bottom" BORDER="0" WIDTH="'+w+'" HEIGHT="'+h+'"></A> '+u+li0+'</A><BR>';
		html0Ri82[1]=u+'<IMG SRC="'+im+'" ALIGN="bottom" BORDER="0" WIDTH="'+w+'" HEIGHT="'+h+'"></A> '+u+li1+'</A><BR>';
		htmlRi82=html0Ri82[0];
	}
}

function annie5344(obj,mes) {
	if (document.all || document.getElementById) obj.innerHTML=mes;
	else if (document.layers) {
		obj.document.open();
		obj.document.write(mes);
		obj.document.close();
	}
}

function ee5344(obj,flag) {
	if (document.all || document.getElementById) {
		if (flag) obj.style.visibility="visible";
		else obj.style.visibility="hidden";
	}
	else if (document.layers) {
		if (flag) obj.visibility="show";
		else obj.visibility="hide";
	}
}

function annietsai(obj,color) {
	if (document.all || document.getElementById) obj.style.backgroundColor=color;
	else if (document.layers) obj.bgColor=color;
}

function eewenchin(nu,fl) {
	if (document.all || document.getElementById || document.layers) {
		var i,f=true;
		if (nu!=-1 && visCRi82[nu]==false) {
			visCRi82[nu]=true;
			if (kaiRi82[nu]==0) {
				for (i=0;i<=kazRi82;i++) {
					if (visCRi82[i]!="no" && i!=nu) visCRi82[i]=false;
					if (kaiRi82[i]>0) visRi82[i]=false;
					if (i>nu) {
						if (kaiRi82[i]==0) f=false;
						if (f) {
							if (kaiRi82[i]<=kaiViRi82) {
								if (visCRi82[i]!="no" && kaiRi82[i]<kaiViRi82) visCRi82[i]=true;
								visRi82[i]=true;
							}
						}
					}
				}
			}
			else {
				for (i=nu+1;i<=kazRi82;i++) {
					if (kaiRi82[i]!=kaiRi82[nu]+1) f=false;
					if (f) visRi82[i]=true;
				}
			}
		}
		if (nu==-1) htmlRi82=html0Ri82[1];
		else htmlRi82=html0Ri82[0];
		for (i=0;i<=kazRi82;i++) {
			if (visRi82[i]) {
				if (nu==i) {
					if (visCRi82[i]==true) htmlRi82+=html1Ri82[i][3];
					else if (visCRi82[i]==false) htmlRi82+=html1Ri82[i][2];
					else htmlRi82+=html1Ri82[i][3];
				}
				else {
					if (visCRi82[i]==true) htmlRi82+=html1Ri82[i][1];
					else htmlRi82+=html1Ri82[i][0];
				}
			}
		}
		annie5344(obFrRi82,htmlRi82);
		if (fl) {
			var u,t;
			if (nu!=-1) u=urlRi82[nu],t=targetRi82[nu];
			else u=urlTopRi82,t=targetTopRi82;
			if (t=="_top") top.location.href=u;
			else if (t=="_self") self.location.href=u;
			else if (t=="_blank") {
				if (navigator.appVersion.indexOf("Mac")!=-1 && navigator.appName.indexOf("Internet Explore")!=-1) {
					window.open(u,"","toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,favorites=yes,resizable=yes");
				} else window.open(u);
			}
			else if (parent.frames[t]) parent.frames[t].location.href=u;
		}
	}
}

function tsaiwenchin() {
	if (document.all || document.getElementById || document.layers) {
		var i;
		if (document.all) {
			obFrRRi82=document.all("FrRRi82");
			obFrRi82=document.all("FrRi82");
		}
		else if (document.getElementById) {
			obFrRRi82=document.getElementById("FrRRi82");
			obFrRi82=document.getElementById("FrRi82");
			obFrRRi82.style.position="absolute";
		}
		else if (document.layers) {
			obFrRRi82=document.layers["FrRRi82"];
			obFrRi82=obFrRRi82.document.layers["FrRi82"];
		}
		if (bgCoRi82!="") annietsai(obFrRRi82,bgCoRi82);
		ee5344(obFrRi82,true);
	}
}
// annietsai-->
		</script>
	<style type="text/css"></style></head>
	<body>
		<form name="DataMaintain" method="post" action="./DataMaintain_files/DataMaintain.htm" id="DataMaintain">
<input type="hidden" name="__VIEWSTATE" value="dDwzNDg0NjM1NzE7Oz7vQXXPaBLqWchTjuAi4WOou/iyMA==">

			<table height="28" cellspacing="0" cellpadding="0" width="100%" bgcolor="#348834" border="0">
				<tbody>
					<tr>
						<td>&nbsp;<font color="#ffc900">
								<a id="HyperLink1" title="資料首頁" href="MainTest.php"><font color="Yellow">資料首頁</font></a>&gt;
								<a id="HyperLink2" title="資料維護" href="./DataMaintain_files/DataMaintain.htm"><font color="Yellow">資料維護</font></a></font></td>
					</tr>
				</tbody>
			</table>
			<br>
			<table cellspacing="0" cellpadding="2" width="100%" border="0">
				<tbody><tr>
					<td class="CONTENTTITLE" align="middle" width="100%" bgcolor="#d3c9c7">&nbsp;
					</td>
				</tr>
			</tbody></table>
			<div align="center">
				<table cellspacing="0" cellpadding="0" width="150" border="0">
					<tbody>
						<tr>
							<td width="180">
								<table cellspacing="0" cellpadding="0" border="0">
									<tbody><tr>
										<!--樹狀選單樣式的表示。WIDTH="180" HEIGHT="330"
    的寬與高度必須以【步驟1】<STYLE type=text/css>....</STYLE>相同 -->
										<td valign="top" width="180" height="330" align="left"><span class="classFrRi82" id="FrRRi82" style="position: absolute;"><span class="classFrRi82" id="FrRi82" style="visibility: visible;">
													<script language="JavaScript">
                   <!--
                      document.write(htmlRi82);
                        // tsai-->
													</script>
												</span><font face="新細明體"></font></span>
										</td>
									</tr>
								</tbody></table>
								<script language="JavaScript">
   <!--
tsaiwenchin();
     // tsai-->
								</script>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</form>
	

</body></html>