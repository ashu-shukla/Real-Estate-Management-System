<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
$UserName=$_POST['txtUserName'];
$Password=$_POST['txtPassword'];
$UserType=$_POST['cmbUserType'];
if($UserType=="Customer")
{
$con = mysqli_connect("localhost","root");
mysqli_select_db($con,"PMS");
$sql = "select * from customer_reg where UserName='".$UserName."' and Password='".$Password."'";
$result = mysqli_query($con,$sql);
$records = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
echo $records;
if ($records==0)
{
echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'index.php\';</script>';
header("location:index.php");
}
else
{
session_start();
$_SESSION['CustomerId']=$row['CustomerId'];
$_SESSION['CustomerName']=$row['CustomerName'];

header("location:Customer\index.php");
} 
mysqli_close($con);
}
else
{
$con = mysqli_connect("localhost","root");
mysqli_select_db($con,"PMS");
$sql = "select * from login_master where UserName='".$UserName."' and Password='".$Password."'";
$result = mysqli_query($con,$sql);
$records = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
if ($records==0)
{
echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'index.php\';</script>';
}
else
{
session_start();
$_SESSION['MM_Username']=$row['UserName'];
header("location:Admin\index.php");
} 
mysql_close($con);
}

?>
</body>
</html>
