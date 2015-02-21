
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

$sql="select * from stafflist where staffName='".$_GET["id"]."'";
//echo $sql;
$arr=mysql_query($sql,$con);
$rows=mysql_fetch_assoc($arr);

$sql3="select * from staff where staffName='".$_GET["id"]."'";
$arr3=mysql_query($sql3,$con);
$rows3=mysql_fetch_assoc($arr3);

$sql4="select * from building,building_has_staff where building.idbuilding=building_has_staff.building_idbuilding and building_has_staff.staff_idstaff='".$rows3["idstaff"]."'";
$arr4=mysql_query($sql4,$con);
$rows4=mysql_fetch_assoc($arr4);

?>


<body>
<form action="" method="post" >
      <table width="100%" height="173" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
        <tr>
          <td colspan="2" align="left" class="bg_tr">&nbsp;Staff List&nbsp;&gt;&gt;&nbsp;Staff Allocate</td>
        </tr>
        <tr>
          <td width="31%" align="right" class="td_bg">staffName：</td>
          <td width="69%" class="td_bg">
            <input name="staffName" type="text" id="staffName" value="<?php echo $_GET["id"];; ?>" size="15" maxlength="30" disabled="disabled"/>          </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">buildingName：</td>
          <td class="td_bg">
            <input name="buildingName" type="text" id="buildingName" value="<?php echo $rows4["buildingName"];; ?>" size="5" maxlength="15" />          </td>
        </tr>
        
        <tr>
          <td align="right" class="td_bg">
  			
            <input type="submit" name="submit" id="submit" value="Confirm" /></td>
          <td class="td_bg">　　
            <input type="reset" name="reset" id="button2" value="Reset"/></td>
        </tr>
      </table>
</form>

<?php 

if($_POST["submit"]=="Confirm"){

$sql1="select * from building where buildingName='".$_POST["buildingName"]."'";
//echo $sql1;
$arr1=mysql_query($sql1,$con);
$rows1=mysql_fetch_assoc($arr1);

$sql2="select * from staff where staff.staffName='".$_GET["id"]."'";
//echo $sql2;
$arr2=mysql_query($sql2,$con);
$rows2=mysql_fetch_assoc($arr2);

$sqlstr = "update building_has_staff set building_idbuilding =".$rows1["idbuilding"]." where staff_idstaff=".$rows2["idstaff"];
echo $sqlstr;
$arry=mysql_query($sqlstr,$con);

if ($arry){
				echo "<script> alert('Allocate successed！');location='list_staff.php';</script>";
			}
			else{
				echo "<script>alert('Allocate failed！');history.go(-1);</script>";
				}
}
		
?>

</body>
</html>

