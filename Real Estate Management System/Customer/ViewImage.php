<?php
if (!isset($_SESSION)) 
{
  session_start();
  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Real Estate</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../css/style1.css" rel="stylesheet" type="text/css" />
<style type="text/css">
</style>
</head>
<body>
<div class="main">
  <?php
  include "Headermenu.php"
  ?>
  
  <div class="content">
    <div class="innercontent">
      <?php
	  include "left.php"
	  ?>
      <div class="rightpannel">
        <div class="welcome">
          <div class="style3" style="height:30px; padding-bottom:5px">Welcome <?php echo $_SESSION['CustomerName'];?></div>
          <p>
            <?php
$a=$_GET['PId'];

$con = mysqli_connect("localhost","root");
mysqli_select_db($con,"pms");
$sql = "SELECT * from property_image where PropertyId='".$a."'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result))
{
$Title=$row['Title'];
$ImagePath=$row['ImagePath'];


?>
          </p>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="28" bgcolor="#669933" class="style4 style5"><?php echo $Title;?></td>
            </tr>
            <tr>
              <td><img src="../upload/<?php echo $ImagePath;?>" width="150" height="150" /></td>
            </tr>
          </table>
           <?php
}

mysqli_close($con);
?>
          <p>&nbsp;  </p>
        </div>
       
      </div>
    </div>
  </div>
  <div>
   <?php
   include "footer.php"
   ?>
  </div>
</div>
</body>
</html>
