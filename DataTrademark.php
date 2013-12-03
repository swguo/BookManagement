<?php
	include_once('../sql/mysql.php');
	if($_GET['CO']=="In"){
		$ReferType="進口";
	}elseif($_GET['CO']=="Out"){
		$ReferType="出口";
	}elseif($_GET['CO']=="Tai"){
		$ReferType="國內";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>DataTrademark</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<style type="text/css"></style>
		<script>
			function DTDel(IDD){
				var trID="#tr"+IDD;
				if(confirm("是否刪除此筆資料？")){
					$.post("DataTrademarkDel.php",{"IDD":IDD},function(back){
						if(back=="OK"){
							$(trID).remove();
						}else{
							alert("系統錯誤");
						}
					});
				}
			}
			function DataTrademarkAdd(){
				location.href='DataTrademarkAdd.php?CO=<?php echo $_GET['CO'];?>';
			}
			function OpenDetail(IDD){
				window.open("SeaTrademark.php?IDD="+IDD+"&CO=<?php echo $_GET['CO'];?>","addclass" ,'stoolbar=no, menubar=no, scrollbars=yes, resizable=no,location=n o, status=no');
			}
			$(function(){
				
			});
		</script>
	</head>
	<body>
			<table height="28" cellspacing="0" cellpadding="0" width="100%" bgcolor="#348834" border="0">
				<tbody>
					<tr>
						<td>&nbsp;
							<font color="#ffc900">
							<a id="HyperLink1" title="資料首頁" href="MainTest.php"><font color="Yellow">資料首頁</font></a>&gt;
							<a id="HyperLink2" title="資料維護" href="DataMaintain.php"><font color="Yellow">資料維護</font></a>&gt;
							<span id="lblCO"><b><?php echo $ReferType;?></b></span><a id="Hyperlink3" title="商標" href="DataTrademark.php"><font color="Yellow">商標</font></a>
							</font>
						</td>
					</tr>
				</tbody>
			</table>
		<form name="DataTrademark" method="post" action="DataTrademark.php?CO=<?php echo $_GET['CO'];?>" id="DataTrademark">
			<table cellspacing="0" cellpadding="2" width="100%" border="0" bgcolor="#ccff66">
				<tbody>
					<tr>
						<td align="left" valign="center" width="20%">
						</td>
						<td align="left" valign="center" width="40%">
							<input name="txtSearch" type="text" id="txtSearch">
							<input type="submit" name="lblSearch" value="尋找" id="lblSearch" title="Search">
						</td>
						<td align="left" valign="center" width="20%">
							<input type="button" name="btnInsert" value="新增" id="btnInsert" title="新增" onClick="DataTrademarkAdd();">
						</td>
						<td align="left" valign="center" width="20%"></td>
					</tr>
				</tbody>
			</table>
		</form>
			<table id="PanPage" cellpadding="0" cellspacing="0" border="0" height="15" width="100%"><tbody><tr><td>
	
				<table cellspacing="0" cellpadding="2" width="100%" border="0">
					<tbody><tr>
						<td nowrap="" align="left" width="35%"><font size="-1">目前共有&nbsp;
								<span id="lblMessage"><font color="Blue">6</font></span>&nbsp;筆資料 
								&nbsp;&nbsp;每頁筆數：
								<span id="lblPageNo"><font color="Blue">10</font></span></font></td>
						<td nowrap="" align="right" width="65%"><font size="-1">頁次：
								<span id="lblCurrentPage"><font color="Blue">1</font></span>/
								<span id="lblPage"><font color="Blue">1</font></span>&nbsp;頁&nbsp; 
								｜
								<select name="selPage" onChange="__doPostBack('selPage','')" language="javascript" id="selPage">
		<option value="快速換頁">快速換頁</option>
		<option value="第1頁">第1頁</option>

	</select>｜
								<a id="lBtn_MoveFirst" href="javascript:__doPostBack('lBtn_MoveFirst','')"><font color="Blue">第１頁</font></a>｜
								<a id="lBtn_MoveLast" href="javascript:__doPostBack('lBtn_MoveLast','')"><font color="Blue">最末頁</font></a>｜
								<a id="lBtn_MovePrev" href="javascript:__doPostBack('lBtn_MovePrev','')"><font color="Blue">上一頁</font></a>｜
								<a id="lBtn_MoveNext" href="javascript:__doPostBack('lBtn_MoveNext','')"><font color="Blue">下一頁</font></a></font></td>
					</tr>
				</tbody></table>
			
</td></tr></tbody></table>
			
			<table cellspacing="0" cellpadding="2" rules="rows" bordercolor="Silver" border="1" id="theDataGrid" bgcolor="White" width="100%">
	<tbody><tr align="Left" valign="Middle" bgcolor="Silver">
		<td><font color="White"><b>案件編號</b></font></td>
		<td><font color="White"><b>案件名稱</b></font></td>
		<td><font color="White"><b>&nbsp;</b></font></td>
		<td><font color="White"><b>&nbsp;</b></font></td>
		<td><font color="White"><b><?php if($_GET['CO']!="Tai"){echo "國家";}else{echo "&nbsp;";}?></b></font></td>
		<td><font color="White"><b>申請案號</b></font></td>
		<td><font color="White"><b>註冊號</b></font></td>
		<td><font color="White"><b>公告號</b></font></td>
		<td><font color="White"><b>商標種類</b></font></td>
		<td><font color="White"><b>送件日</b></font></td>
		<td><font color="White"><b>客戶</b></font></td>
		<td><font color="White"><b>申請日</b></font></td>
		<td><font color="White"><b>公告日</b></font></td>
		<td><font color="White"><b>&nbsp;</b></font></td>
		<td><font color="White"><b>&nbsp;</b></font></td>
		<td><font color="White"><b>&nbsp;</b></font></td>
	</tr>
	<?php
		if(isset($_POST['txtSearch'])){
			$QueryMark=mysql_query("select * from trademark where IDD like'%".$Rep."%' and ReferType='".$ReferType."'");
		}
		if($QueryMark!=null){

			while($Row=mysql_fetch_assoc($QueryMark)){
	?>
		<tr bgcolor="White" id="tr<?php echo $Row['IDD'];?>">
			<td><font color="#333333"><?php echo $Row['IDD'];?></font></td>
			<td><font color="#333333"><a href="javascript:OpenDetail('<?php echo $Row['IDD'];?>')"><font color="#333333"><?php echo $Row['CaseName'];?></font></a></font></td>
			<td>
					<form action="DataTrademarkEdit.php?act=Edit&CO=<?php echo $_GET['CO'];?>" method="post" style="margin-bottom: 0;">
						<input type="hidden" value="<?php echo $Row['IDD'];?>" name="pIDD"/>
						<input type="submit" value="編輯"/>
					</form>
			</td>
			<td>
				<font color="#333333">
					<input type="button" id="DelBon<?php echo $Row['IDD'];?>" value="刪除" onClick="DTDel('<?php echo $Row['IDD']?>')"/>
				</font>
			</td>
			<?php
				if($_GET['CO']!="Tai"){
					$Country=mysql_fetch_assoc(mysql_query("select CountryName from country where IDD='".$Row['Country']."'"));
				}
			?>
			<td><font color="#333333"><?php echo $Country['CountryName'];?></font></td>
			<td><font color="#333333"><?php echo $Row['ApplyNo'];?></font></td>
			<td><font color="#333333"><?php echo $Row['RegisterNo'];?></font></td>
			<td><font color="#333333"><?php echo $Row['BullNo'];?></font></td>
			<td><font color="#333333"><?php echo $Row['TrademarkClass'];?></font></td>
			<td><font color="#333333"><?php echo substr($Row['InPaperDate'],0,10);?></font></td>
			<td><font color="#333333"><a href="javascript:__doPostBack('theDataGrid$_ctl3$_ctl3','')"><font color="#333333"></font>客戶</a></font></td>
			<td><font color="#333333"><?php echo substr($Row['ApplyDate'],0,10);?></font></td>
			<td><font color="#333333"><?php echo substr($Row['BullDate'],0,10);?></font></td>
			<td><font color="#333333"><a href="DriftAdd.php?IDD=<?php echo $Row['IDD'];?>&SubName=trademark"><font color="#333333">辦案流程</font></a></font></td>
			<td><font color="#333333"><a href="PayIncome.php?IDD=<?php echo $Row['IDD'];?>&SubName=trademark"><font color="#333333">請款作業</font></a></font></td>
			<td><font color="#333333"><a href="PayOutput.php?IDD=<?php echo $Row['IDD'];?>&SubName=trademark"><font color="#333333">付款作業</font></a></font></td>
		</tr>
	<?php
			}
		}
	?>
	
</tbody></table>
	

</body></html>