
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

	$Name=$_POST['txtStateName'];
	$con = mysqli_connect ("localhost","root");
	mysqli_select_db($con,"pms");
	$sql = "insert into State_Master 	(StateName) 	values('".$Name."')";
	mysqli_query ($con,$sql);
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("New State Inserted Succesfully");window.location=\'State.php\';</script>';

?>
</body>
</html>
