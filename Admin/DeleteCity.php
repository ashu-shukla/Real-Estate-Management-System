
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

	$Id=$_GET['CityId'];
	
	$con = mysqli_connect ("localhost","root");
	mysqli_select_db($con,"pms");
	$sql = "delete from City_Master where CityId='".$Id."'";
	mysqli_query ($con,$sql);
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("City Deleted Succesfully");window.location=\'City.php\';</script>';

?>
</body>
</html>
