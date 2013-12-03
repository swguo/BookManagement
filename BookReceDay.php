<?php
	include_once('../sql/mysql.php');
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>BookReceDay</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<style type="text/css"></style>
		
	</head>
	<body>
			<table height="28" cellspacing="0" cellpadding="0" width="100%" bgcolor="#348834" border="0">
				<tbody>
					<tr>
						<td>&nbsp;
							<font color="#ffc900">
							<a id="HyperLink1" title="資料首頁" href="MainTest.php"><font color="Yellow">資料首頁</font></a>&gt;
							<a id="HyperLink2" title="日常作業" href="BookManagement.php"><font color="Yellow">日常作業</font></a>&gt;<a id="Hyperlink3" title="請款管理" href="BookReceDay.php"><font color="Yellow">請款管理</font></a>
							</font>
						</td>
					</tr>
				</tbody>
			</table>
		<form action="BookReceDay.php" name="BookReceDay" id="BookReceDay" method="post"  >
			<table cellspacing="0" cellpadding="2" width="100%" border="0" bgcolor="#ccff66">
				<tbody>
					<tr>
						<td width="20%" colspan="2" align="left" valign="center">
						</td>
						<td width="40%" colspan="2" align="left" valign="center">
							<input name="txtSearch" type="text" id="txtSearch">
						</td>
						<td align="left" valign="center" width="20%">
							<input type="submit" name="lblSearch" value="查詢" id="lblSearch" title="Search">
						</td>
						<td align="left" valign="center" width="20%"></td>
					</tr>
					<tr>
                    
					  <td align="left" valign="center" width="10%"><label >選擇 : </label></td>
					  <td align="left" valign="center"><input name="txtSearch2" type="text" id="txtSearch2"></td>
					  <td align="left" valign="center"><input type="button" name="btnInsert2" value="全選" id="btnInsert2" title="全選" onClick="DataTrademarkAdd();"></td>
					  <td align="left" valign="center"><input type="button" name="btnInsert3" value="反向選擇" id="btnInsert3" title="反向選擇" onClick="DataTrademarkAdd();"></td>
					  <td align="left" valign="center"><input type="button" name="btnInsert4" value="列印" id="btnInsert4" title="列印" onClick="DataTrademarkAdd();"></td>
					  <td align="left" valign="center"></td>
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
		<td><font color="White"><b>案件別</b></font></td>
		<td><font color="White"><b>部門別</b></font></td>
		<td><font color="White"><b>案件編號</b></font></td>
		<td><font color="White"><b>應收單能</b></font></td>
		<td><font color="White"><b>案件名稱</b></font></td>
		<td><font color="White"><b>申請暗號</b></font></td>
		<td><font color="White"><b>承辦人</b></font></td>
		<td><font color="White"><b>處理人</b></font></td>
		<td><font color="White"><b>請款日期</b></font></td>
		<td><font color="White"><b>請款內容</b></font></td>
		<td><font color="White"><b>收訖日</b></font></td>
		<td><font color="White"><b>收款金額</b></font></td>
		<td><font color="White"><b>應收金額</b></font></td>
		<td><font color="White"><b>未收金額</b></font></td>
		<td><font color="White"><b>已收金額</b></font></td>
	</tr>
	<?php
		if(isset($_POST['txtSearch'])){
			$QueryMark=mysql_query("select * from trademark where IDD like'%".$Rep."%' and ReferType='出口'");
		}
		if($QueryMark!=null){

			while($Row=mysql_fetch_assoc($QueryMark)){
	?>
		<tr bgcolor="White" id="tr<?php echo $Row['IDD'];?>">
			<td><font color="#333333"><?php echo $Row['IDD'];?></font></td>
			<td><font color="#333333"><a href="javascript:OpenDetail('<?php echo $Row['IDD'];?>')"><font color="#333333"><?php echo $Row['CaseName'];?></font></a></font></td>
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