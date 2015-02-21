<?php
//include("../config.php");
//require_once('ly_check.php');
?>
<html>
<style type="text/css">
#addstaff {
	font-weight: bold;
	text-align: center;
}
#addstaff {
	color: #0C0;
}
</style>
<body>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Student Dormitory Management System</title>
<link rel="stylesheet" href="images/css.css" type="text/css">

<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("mydb",$con);

$sql="select * from stafflist";
$rs=mysql_query($sql);

?>  

<table width="799" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table" >
      <tr>
        <td height="27" colspan="7" align="left" bgcolor="#FFFFFF" class="bg_tr">&nbsp;Staff List&nbsp;                 
        </td>
        
        
        
  </tr>
      
      <tr>
        <td width="25%" align="center" bgcolor="#FFFFFF">staffName</td>
        <td width="25%" align="center" bgcolor="#FFFFFF">buildingName</td>
        <td width="25%" align="center" bgcolor="#FFFFFF">function</td>
  </tr>
 
  <?php
	while($rows=mysql_fetch_assoc($rs))
	{
	?>
<tr align="center">

<td class="td_bg" width="25%" height="26"><?php echo $rows["staffName"]?></td>
<td class="td_bg" width="25%" height="26"><?php echo $rows["buildingName"]?></td>


<td class="td_bg" width="20%">



<a href="modify_staff_to_building.php?id=<?php echo $rows["staffName"] ?>" class="trlink">Reallocate</a>&nbsp;&nbsp;<a href="del_staff_from_building.php?id=<?php echo $rows["staffName"] ?>" class="trlink">Delete</a></td>
</tr>
<?php

	}
	 mysql_close($con);
?>
	    <tr>
      <th height="25" colspan="7" align="center" class="bg_tr"><a href="add_staff_to_building.php" class="trlink" > <span id="addstaff"> Add staff</span></a>
      
</table>

</body>
</html>


