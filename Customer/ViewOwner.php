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
      <div class="rightpannel" style="height:360px">
        <div class="welcome">
          <div class="style3" style="height:30px; padding-bottom:5px; padding-top:10px">Welcome <?php echo $_SESSION['CustomerName'];?></div>
           <?php
$con = mysqli_connect("localhost","root");
mysqli_select_db($con,"pms");
$sql = "select * from customer_reg where CustomerId='".$_GET['CustId']."' ";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result))
{
$CustomerId=$row['CustomerId'];
$CustomerName=$row['CustomerName'];
$Address=$row['Address'];
$City =$row['City'];
$MobileNo=$row['Mobile'];
$EmailId=$row['Email'];
$Gender =$row['Gender'];
$BirthDate=$row['BirthDate'];
$UserName  =$row['UserName'];
$Password =$row['Password'];
}
			?>
				<table width="100%" height="141" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="35" bgcolor="#DFDFDF"><span class="style5 style4 style11"><strong>ID:</strong></span></td>
                    <td bgcolor="#DFDFDF"><span class="style5 style4 style11"><strong><?php echo $CustomerId;?></strong></span></td>
                  </tr>
                  <tr>
                    <td height="37" bgcolor="#FFFFFF"><span class="style5 style4 style11"><strong>Name:</strong></span></td>
                    <td bgcolor="#FFFFFF"><span class="style5 style4 style11"><strong><?php echo $CustomerName;?></strong></span></td>
                  </tr>
                 
                  
                  <tr>
                    <td height="32" bgcolor="#E7E7E7"><span class="style5 style4 style11"><strong>Mobile:</strong></span></td>
                    <td bgcolor="#E7E7E7"><span class="style5 style4 style11"><strong><?php echo $Address;?></strong></span></td>
                  </tr>
                   <tr>
                    <td height="32" bgcolor="#FFFFFF"><span class="style5 style4 style11"><strong>City:</strong></span></td>
                    <td bgcolor="#FFFFFF"><span class="style5 style4 style11"><strong><?php echo $City;?></strong></span></td>
                  </tr>
                   <tr>
                    <td height="32" bgcolor="#E0E0E0"><span class="style5 style4 style11"><strong>Mobile Number:</strong></span></td>
                    <td bgcolor="#E0E0E0"><span class="style5 style4 style11"><strong><?php echo $MobileNo;?></strong></span></td>
                  </tr>
                   <tr>
                    <td height="32" bgcolor="#FFFFFF"><span class="style5 style4 style11"><strong>EmailId:</strong></span></td>
                    <td bgcolor="#FFFFFF"><span class="style5 style4 style11"><strong><?php echo $EmailId;?></strong></span></td>
                  </tr>
                    <tr>
                    <td height="32" bgcolor="#E7E7E7"><span class="style5 style4 style11"><strong>Gender:</strong></span></td>
                    <td bgcolor="#E7E7E7"><span class="style5 style4 style11"><strong><?php echo $Gender;?></strong></span></td>
                  </tr>
                    <tr>
                    <td height="32" bgcolor="#FFFFFF"><span class="style5 style4 style11"><strong>BirthDate:</strong></span></td>
                    <td bgcolor="#FFFFFF"><span class="style5 style4 style11"><strong><?php echo $BirthDate;?></strong></span></td>
                  <tr>
                    <td><span class="style9"></span></td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
<?php
mysqli_close($con);
?>
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
