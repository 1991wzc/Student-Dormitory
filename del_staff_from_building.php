<?php
//include("../config.php");
//require_once('ly_check.php');
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("mydb",$con);

$sql1="select * from staff where staffName='".$_GET["id"]."'";
//echo $sql1;
$arry1=mysql_query($sql1,$con);
$rows1=mysql_fetch_assoc($arry1);


$sql="delete from staff where idstaff='".$rows1["idstaff"]."'";
//echo $sql;
$arry=mysql_query($sql,$con);
if($arry){
echo "<script> alert('Delete successed!');location='list_staff.php';</script>";
}
else
echo "Delete failed!";
?>