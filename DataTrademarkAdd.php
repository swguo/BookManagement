<?php
	include_once('sql/mysql.php');
	include_once('sql/tool.php');
	if($_GET['CO']=="In"){
		$ReferType="進口";
	}elseif($_GET['CO']=="Out"){
		$ReferType="出口";
	}elseif($_GET['CO']=="Tai"){
		$ReferType="國內";
	}
	if($_GET['act']=="Txtid"){
		if($_POST['txtID']!=null){
			$TempQuery=mysql_fetch_assoc(mysql_query("select IDD from trademark where IDD='".$_POST['txtID']."'"));
			if($TempQuery['IDD']!=null){
				js_alert("編號重複!!! 請重新輸入編號","DataTrademarkAdd.php?CO=".$_GET['CO']);
			}else{
				$ReferType=$_POST['CO']=="In"?"進口":($_POST['CO']=="Out"?"出口":"國內");
				mysql_query("insert into trademark (IDD,ReferType) values('".$_POST['txtID']."','".$ReferType."')");
				$txtID=$_POST['txtID'];
			}
		}else{
			js_alert("編號不可空白!!","DataTrademarkAdd.php?CO=".$_GET['CO']);
		}
	}elseif($_GET['act']=="PostDetail"){
		if($_POST['txtCaseName']==null){
			js_alert("案件名稱不可以為空白!!","DataTrademark.phpCO=".$_GET['CO']);
		}else if($_POST['txtCaseNameENU']==null){
			js_alert("案件名稱(英)不可以為空白!!","DataTrademark.php?CO=".$_GET['CO']);
		}else{
			$_POST['selCountry']=$_POST['selCountry']==null?"TW":$_POST['selCountry'];
			$UpString="`Serial`='".$_POST['txtSerial']."',`CustomerCaseNo`='".$_POST['txtCustomerCaseNo']."',`InPaperNo`='".$_POST['txtInPaperNo']."',`Department`='".$_POST['txtDepartment']."',`RelationCase`='".$_POST['txtRelationCase']."',`RelationCaseNo`='".$_POST['txtRelationCaseNo']."',`CaseName`='".$_POST['txtCaseName']."',`CaseNameENU`='".$_POST['txtCaseNameENU']."',";
			$UpString1="`Declarant`='".$_POST['txtDeclarantID']."',`Class`='".$_POST['txtClass']."',`DistinctClass`='".$_POST['txtDistinctClass']."',`TrademarkClass`='".$_POST['txtTrademarkClass']."',`TrademarkName`='".$_POST['txtTrademarkName']."',`TrademarkNo`='".$_POST['txtBrandNo']."',`Priority`='".$_POST['txtPriority']."',";
			$UpString2="`InPaperDate`='".$_POST['txtInPaperDate']."',`OutPaperDate`='".$_POST['txtOutPaperDate']."',`ApplyDate`='".$_POST['txtApplyDate']."',`OutsideAgentNo`='".$_POST['txtOutsideAgentNo']."',`OutsideAgent`='".$_POST['txtOutsideAgentID']."',`Country`='".$_POST['selCountry']."',";
			$UpString3="`ApplyNo`='".$_POST['txtApplyNo']."',`PrivateName`='".$_POST['txtPrivateName']."',`Remember`='".$_POST['txtRemember']."',`Remark`='".$_POST['txtRemaker']."',`TractileStartDate`='".$_POST['txtTractileStartDate']."'";
			mysql_query("update trademark set ".$UpString.$UpString1.$UpString2.$UpString3." where IDD='".$_POST['IDD']."'");
			js_go("DataTrademark.php?CO=".$_GET['CO']);
		}
	}else{
		
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>DataTrademarkAdd</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<style type="text/css"></style>
	
	
	
		<script>
			function cgCountry(){
				var thisVall=$('#selCountry').val();
				$("#lblCountry").text(thisVall);
				$("#txtCountryID").val(thisVall);
			}
			function Declarant(){
				var varName=$("#txtDeclarant").val();
				$.post("ajax/SearchDeclarant.php",{"Declarant":varName},function(result){
					$Var=result.split(":");
					$("#txtDeclarantID").val($Var[0]);
					$("#txtDeclarantName").val($Var[1]);
				});
			}
			function btnCancel(){
				if(confirm('確定要取消新增資料嗎?')){
					var ThisIDD=$('#IDD').val();
					$.post("ajax/DataDel.php?type=Trademark",{"IDD":ThisIDD},function(result){
						if(result=="OK"){
							location.href='DataTrademark.php';
						}else{
							alert("ERROR");
							location.href='DataTrademark.php';
						}
					});
					
				}
			}
			function btnOk(){
				if($("#txtCaseName").val()==""){
					alert("案件名稱不可以為空白!!");
					$("#txtCaseName").focus();
				}else if($("#txtCaseNameENU").val()==""){
					alert("案件名稱(英)不可以為空白!!");
					$("#txtCaseNameENU").focus();
				}else{
					$("#DataTrademarkAdd").submit();
				}
				
			}
			function KeyCountry(){
				var thisVall=$("#txtCountryID").val().toUpperCase();
				$("#txtCountryID").val(thisVall);
				$('#selCountry').val(thisVall);
			}
			function OutsideAgent(){
				var varName=$("#txtOutsideAgent").val();
				$.post("ajax/SearchOutsideAgent.php",{"OutsideAgent":varName},function(result){
					$Var=result.split(":");
					$("#txtOutsideAgentID").val($Var[0]);
					$("#txtOutsideAgentName").val($Var[1]);
				});
			}
			function DataTrademarkAdd(){
				location.href='DataTrademarkAdd.php?CO=<?php echo $_GET['CO'];?>';
			}
			function btnReset(){
				
			}
		</script>
	
	
	
	</head>
	<body>
			<table height="28" cellspacing="0" cellpadding="0" width="100%" bgcolor="#348834" border="0">
				<tbody>
					<tr>
						<td>&nbsp;<font color="#ffc900">
								<a id="HyperLink1" title="資料首頁" href="MainTest.php"><font color="Yellow">資料首頁</font></a>&gt;
								<a id="HyperLink2" title="資料維護" href="DataMaintain.php"><font color="Yellow">資料維護</font></a>&gt;
								<span id="lblCO"><b><?php echo $ReferType;?></b></span><span id="Label20" title="商標"><b>商標</b></span>&gt;
								<span id="Label21" title="新增"><b>新增</b></span>
								</font>
						</td>
					</tr>
				</tbody>
			</table>
			<?php if($_GET['act']=="Txtid" && isset($txtID)){?>
			<form name="DataTrademarkAdd" method="post" action="DataTrademarkAdd.php?CO=<?php echo $_GET['CO'];?>&act=PostDetail" id="DataTrademarkAdd">
			<table cellspacing="0" cellpadding="2" width="100%" border="0" bgcolor="#ccff66">
				<tbody>
					<tr>
						<td align="left" valign="center" width="20%">
							<span id="lblToday">
								<?php
									$NowTime=time();
									echo date("Y年m月d日 星期",$NowTime);
									switch(date("w",$NowTime)){
										case 0:echo "日";break;
										case 1:echo "一";break;
										case 2:echo "二";break;
										case 3:echo "三";break;
										case 4:echo "四";break;
										case 5:echo "五";break;
										case 6:echo "六";break;
									}
								?>
							</span>
						</td>
						<td align="left" valign="center" width="20%">
							<input type="submit" name="btnViewCust" value="客戶及聯絡人" onclick="if (typeof(Page_ClientValidate) == 'function') Page_ClientValidate(); " language="javascript" id="btnViewCust" title="客戶及聯絡人">
						</td>
					</tr>
				</tbody>
			</table>
			<table border="0" width="100%" cellpadding="3" cellspacing="0" bgcolor="#f3ffda">
				<tbody><tr>
					<td bgcolor="#99cc00" align="middle" width="23"><font color="#ffffff" face="arial" size="+1"><b>1</b></font></td>
					<td width="490"><b>輸入基本資料</b></td>
				</tr>
			</tbody></table>
			<table border="0" cellpadding="2" cellspacing="0" width="100%">
				<tbody><tr>
					<td align="right" valign="center" style="WIDTH: 136px"><span id="lblLabel1" title="電腦編號">電腦編號</span>
						：</td>
					<td align="left" valign="center">
						<span id="lblID">
							<font color="Red"><?php echo $txtID;?></font>
							<input type="hidden" value="<?php echo $txtID;?>" id="IDD" name="IDD"/>
						</span>
					</td>
				</tr>
				<tr>
					<td align="right" valign="middle" style="WIDTH: 136px"><span id="Label1" title="案件編號">案件編號</span>
						：</td>
					<td align="left" valign="middle">
						<input name="txtSerial" type="text" value="<?php echo $txtID;?>" maxlength="30" id="txtSerial">
					</td>
				</tr>
				<tr>
					<td align="right" valign="middle" style="WIDTH: 136px"><span id="Label2" title="客戶案件編號">客戶案件編號</span>
						：</td>
					<td align="left" valign="middle">
						<input name="txtCustomerCaseNo" type="text" maxlength="30" id="txtCustomerCaseNo">
					</td>
				</tr>
				<tr>
					<td align="right" valign="center" style="WIDTH: 136px"><span id="lblInPaperNoTitle" title="收文號：">收文號：</span>
					</td>
					<td align="left" valign="center" style="HEIGHT: 29px"><input name="txtInPaperNo" type="text" maxlength="25" id="txtInPaperNo">
					</td>
				</tr>
				<tr>
					<td align="right" valign="center" style="WIDTH: 136px"><span id="lblDepartmentTitle" title="部門編號：">部門編號：</span>
					</td>
					<td align="left" valign="center" style="HEIGHT: 29px"><input name="txtDepartment" type="text" maxlength="30" id="txtDepartment">
					</td>
				</tr>
				<tr>
					<td align="right" valign="top" style="WIDTH: 136px"><span id="lbl" title="相關案件">相關案件</span>
						：</td>
					<td valign="center"><textarea name="txtRelationCase" rows="3" id="txtRelationCase"></textarea>
					</td>
				</tr>
				<tr>
					<td align="right" valign="center" style="WIDTH: 136px"><span id="lblRelationCaseNoTitle" title="相關文號：">相關文號：</span>
					</td>
					<td valign="center"><input name="txtRelationCaseNo" type="text" maxlength="50" id="txtRelationCaseNo">
					</td>
				</tr>
				<tr>
					<td align="right" valign="top" style="WIDTH: 136px"><span id="Label3" title="案件名稱">案件名稱</span>
						：</td>
					<td valign="center"><textarea name="txtCaseName" rows="3" id="txtCaseName"></textarea><font style="FONT-SIZE: x-small; COLOR: navy" face="新細明體">必須填入資料</font>
					</td>
				</tr>
				<tr>
					<td align="right" valign="top" style="WIDTH: 136px"><span id="Label12" title="案件名稱(英)">案件名稱(英)</span>
						：</td>
					<td valign="middle"><textarea name="txtCaseNameENU" rows="3" id="txtCaseNameENU"></textarea><font style="FONT-SIZE: x-small; COLOR: navy" face="新細明體">必須填入資料</font>
					</td>
				</tr>
			</tbody></table>
			<table border="0" width="100%" cellpadding="3" cellspacing="0" bgcolor="#f3ffda">
				<tbody><tr>
					<td bgcolor="#99cc00" align="middle" width="23"><font color="#ffffff" face="arial" size="+1"><b>2</b></font></td>
					<td width="490"><b>輸入指定資料</b></td>
				</tr>
			</tbody></table>
			<table border="0" cellpadding="2" cellspacing="0" width="100%">
				<tbody><tr>
					<td align="right" valign="top" style="WIDTH: 136px"><span id="Label29" title="申請人">申請人</span>
						：</td>
					<td valign="center" style="HEIGHT: 27px">
						<input name="txtDeclarant" type="text" maxlength="10" onchange="Declarant();" language="javascript" id="txtDeclarant">
						<input name="txtDeclarantID" type="text" readonly="readonly" id="txtDeclarantID">
						<input name="txtDeclarantName" type="text" readonly="readonly" id="txtDeclarantName">
					</td>
				</tr>
				<tr>
					<td align="right" valign="top" style="WIDTH: 136px"><span id="Label8" title="類別">類別</span>
						：</td>
					<td valign="center"><textarea name="txtClass" rows="3" id="txtClass"></textarea>
					</td>
				</tr>
				<tr>
					<td align="right" valign="top" style="WIDTH: 136px"><span id="Label9" title="性質">性質</span>
						：</td>
					<td valign="center"><input name="txtDistinctClass" type="text" maxlength="10" id="txtDistinctClass">
					</td>
				</tr>
				<tr>
					<td align="right" valign="top" style="WIDTH: 136px"><span id="Label10" title="商標種類">商標種類</span>
						：</td>
					<td valign="center"><input name="txtTrademarkClass" type="text" maxlength="6" id="txtTrademarkClass">
					</td>
				</tr>
				<tr>
					<td align="right" valign="top" style="WIDTH: 136px"><span id="Label18" title="指定商標名稱">指定商標名稱</span>
						：</td>
					<td valign="center"><textarea name="txtTrademarkName" rows="5" id="txtTrademarkName"></textarea>
					</td>
				</tr>
				
				<?php if($_GET['CO']!="Tai"){?>
				<tr>
					<td align="right" valign="center" style="WIDTH: 136px"><span id="Label13" title="國家：">國家：</span>
					</td>
					<td valign="center">
						<input name="txtCountryID" type="text" maxlength="3" onchange="KeyCountry();" id="txtCountryID">
						<select name="selCountry" id="selCountry" onchange="cgCountry()">
							<option value="">未選擇</option>
							<?php
								$QueryDB=mysql_query("select * from country");
								while($ThisRow=mysql_fetch_assoc($QueryDB)){
									echo "<option value=\"".$ThisRow['IDD']."\">".$ThisRow['CountryName']."</option>";
								}
							?>
						</select>
						<span id="lblCountry"></span>
					</td>
				</tr>
				<?php }?>
				<tr>
					<td align="right" valign="center" style="WIDTH: 136px"><span id="Label5" title="正商標號">正商標號</span>
						：</td>
					<td valign="center"><input name="txtBrandNo" type="text" maxlength="16" id="txtBrandNo">
					</td>
				</tr>
				<tr>
					<td align="right" valign="top" style="WIDTH: 136px"><span id="Label4" title="優先權">優先權</span>
						：</td>
					<td valign="center"><textarea name="txtPriority" rows="3" id="txtPriority"></textarea>
					</td>
				</tr>
				<?php
				?>
				<tr>
					<td align="right" valign="top" style="WIDTH: 136px"><span id="lblInPaperDateTitle" title="收文日：">收文日：</span>
					</td>
					<td valign="center"><input name="txtInPaperDate" value="<?php echo date("Y-m-d",time());?>" type="text" maxlength="10" id="txtInPaperDate">
					</td>
				</tr>
				<tr>
					<td align="right" valign="top" style="WIDTH: 136px"><span id="Label7" title="送件日">送件日</span>
						：</td>
					<td valign="center"><input name="txtOutPaperDate" type="text" maxlength="10" id="txtOutPaperDate">
					</td>
				</tr>
				<tr>
					<td align="right" valign="top" style="WIDTH: 136px"><span id="Label11" title="申請日">申請日</span>
						：</td>
					<td valign="center"><input name="txtApplyDate" type="text" maxlength="10" id="txtApplyDate">
					</td>
				</tr>
				<tr>
					<td align="right" valign="center" style="WIDTH: 136px"><span id="Label14" title="申請案號">申請案號</span>
						：</td>
					<td valign="center"><input name="txtApplyNo" type="text" maxlength="16" id="txtApplyNo">
					</td>
				</tr>
				<tr>
					<td align="right" valign="center" style="WIDTH: 136px"><span id="Label15" title="專用權人">專用權人</span>
						：</td>
					<td valign="center"><input name="txtPrivateName" type="text" maxlength="50" id="txtPrivateName">
					</td>
				</tr>
				<tr>
					<td align="right" valign="top" style="WIDTH: 136px"><span id="Label17" title="備註">備註</span>
						：</td>
					<td valign="center"><textarea name="txtRemember" rows="3" id="txtRemember"></textarea>
					</td>
				</tr>
				<?php if($_GET['CO']!="Tai"){?>
				<tr>
					<td align="right" valign="top" style="WIDTH: 136px"><span id="Label6" title="代理人案號：">代理人案號：</span>
					</td>
					<td valign="middle"><input name="txtOutsideAgentNo" type="text" maxlength="30" id="txtOutsideAgentNo">
					</td>
				</tr>
				<tr>
					<td align="right" valign="top" style="WIDTH: 136px"><span id="lblOutsideAgentTitle" title="國外代理人：">國外代理人：</span>
					</td>
					<td valign="center">
						<input name="txtOutsideAgent" type="text" maxlength="10" onchange="OutsideAgent();" id="txtOutsideAgent">
						<input name="txtOutsideAgentID" type="text" readonly="readonly" id="txtOutsideAgentID">
						<input name="txtOutsideAgentName" type="text" readonly="readonly" id="txtOutsideAgentName">
					</td>
				</tr>
				<?php }?>
				<?php if($_GET['CO']=="In"){?>
				<tr>
					<td align="right" valign="top" style="WIDTH: 136px"><span id="lblTractileStartDate" title="辦理延展起始日：">辦理延展起始日：</span>
					</td>
					<td valign="middle"><input name="txtTractileStartDate" type="text" maxlength="10" id="txtTractileStartDate">
					</td>
				</tr>
				<?php }?>
				<tr>
					<td align="right" valign="top" style="WIDTH: 136px"><span id="lblRemaker" title="消滅：">消滅：</span>
					</td>
					<td valign="center"><input name="txtRemaker" type="text" maxlength="1" id="txtRemaker">
					</td>
				</tr>
			</tbody></table>
			<p>
				<input type="button" onclick="btnOk();" name="btnOK" value="確定新增" language="javascript" id="btnOK" title="確定新增">
				<input type="button" name="btnCancel" value="取消新增" onclick="btnCancel();" language="javascript" id="btnCancel" title="取消新增">
				<input type="reset" name="btnReset" value="清除重填" language="javascript" id="btnReset" title="清除重填">
				<input style="Z-INDEX: 101; WIDTH: 76px; POSITION: absolute; HEIGHT: 24px" onclick="JavaScript:history.back()" type="button" value="取消">
			</p>
		</form>
			<?php }else{?>
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
								<input type="button" name="btnInsert" value="新增" id="btnInsert" title="新增" onclick="DataTrademarkAdd();">
							</td>
							<td align="left" valign="center" width="20%"></td>
						</tr>
					</tbody>
				</table>
			</form>
			<form name="DataTrademarkAdd" method="post" action="DataTrademarkAdd.php?CO=<?php echo $_GET['CO'];?>&act=Txtid" id="DataTrademarkAdd">
			<table id="Panel1" cellpadding="0" cellspacing="0" border="0" height="155" width="432"><tbody><tr><td>
	
				<table cellspacing="0" cellpadding="2" width="100%" border="0">
					<tbody><tr>
						<td align="middle" width="100%" bgcolor="#d3c9c7"><font style="FONT-WEIGHT: bold" face="新細明體" color="#3300cc">
								<span id="lblCoName" title="新增商標">新增<?php echo $ReferType;?>商標</span></font></td>
					</tr>
				</tbody></table>
				<br>
				<table cellspacing="0" cellpadding="2" width="100%" border="0">
					<tbody><tr>
						<td style="WIDTH: 106px" valign="center" align="right">
							<span id="Label2" title="案件編號">案件編號</span>：</td>
						<td>
							<input name="txtID" type="text" maxlength="10" id="txtID">
							<input name="CO" type="hidden" maxlength="10" id="txtID" value="<?php echo $_GET['CO'];?>">
							<span id="lblOLDID"></span>&nbsp;
						</td>
					</tr>
				</tbody></table>
				<br>
				<table cellspacing="0" cellpadding="2" width="100%" border="0">
					<tbody><tr>
						<td style="WIDTH: 60%" valign="top" align="right">
							<input type="submit" name="btnIns" value="確定新增" id="btnIns" title="確定新增"></td>
						<td style="WIDTH: 40%" valign="top" align="left">
							<input type="button" name="btnDel" value="取消" id="btnDel" title="取消" onclick="location.href='DataTrademark.php'"></td>
					</tr>
				</tbody></table>
				</td>
				</tr>
				</tbody>
				</table>
			</form>
			<?php }?>

</body></html>