
<?php
//include("../config.php");
//require_once('ly_check.php');
?>
<html>
<body>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Student Dormitory Management System</title>
<link rel="stylesheet" href="images/css.css" type="text/css">
</head>

<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("mydb",$con);

//$sql="select * from stafflist where staffName='".$_GET["id"]."'";
//echo $sql;
//$arr=mysql_query($sql,$con);
//$rows=mysql_fetch_row($arr);


?>


<?php 

if($_POST["action"]=="modify"){

$sql1="select idbuilding from building where buildingName='".$_POST["buildingName"]."'";
$arr1=mysql_query($sql1,$con);
$rows1=mysql_fetch_assoc($arr1);

$sql2="select idstaff from staff where staff.staffName='".$_POST["staffName"]."'";
$arr2=mysql_query($sql2,$con);
$rows2=mysql_fetch_assoc($arr2);

$sqlstr1 = "insert into staff（idstaff,staffName） values ('','".$_POST["staffName"]."')";
$arry1=mysql_query($sqlstr1,$con);

$sqlstr2 = "insert into building_has_staff（building_idbuilding,staff_idstaff） values ('".$rows1["idbuilding"]."','".$rows2["idstaff"]."')";
$arry2=mysql_query($sqlstr2,$con);

if ($arry){
				echo "<script> alert('Allocate successed！');location='list_staff.php';</script>";
			}
			else{
				echo "<script>alert('Allocate failed！');history.go(-1);</script>";
				}
}
		
?>

<body>
<form id="myform" name="myform" method="post" action=""  >
      <table width="100%" height="173" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
        <tr>
          <td colspan="2" align="left" class="bg_tr">&nbsp;Staff List&nbsp;&gt;&gt;&nbsp;Add new staff</td>
        </tr>
        <tr>
          <td width="31%" align="right" class="td_bg">staffName：</td>
          <td width="69%" class="td_bg">
            <input name="staffName" type="text" id="staffName" value="" size="15" maxlength="30" /> </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">buildingName：</td>
          <td class="td_bg">
            <input name="buildingName" type="text" id="buildingName" value="" size="5" maxlength="15" />          </td>
        </tr>
        
        <tr>
          <td align="right" class="td_bg">
  			<input type="hidden" name="action" value="modify"/>
            <input type="submit" name="button" id="button" value="Confirm" /></td>
          <td class="td_bg">　　
            <input type="reset" name="button2" id="button2" value="Reset"/></td>
        </tr>
      </table>
</form>
</body>
</html>

