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
    <div class="innercontent" >
      <?php
	  include "left.php"
	  ?>

      <div class="rightpannel" style="height:450px">
        <div class="welcome">
          <div class="style3" style="height:30px; padding-bottom:5px; padding-top:10px">Welcome <?php echo $_SESSION['CustomerName'];?></div>
          <div style="width:573px; height:auto; font-size:12px; color:#3f3f3f; line-height:20px; text-align:justify"></div>
            <?php

$con = mysqli_connect("localhost","root");

mysqli_select_db($con,"pms");

$sql = "select * from customer_reg where CustomerId='".$_SESSION['CustomerId']."' ";

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
          <form id="form1" name="form1" method="post" action="UpdateProfile.php?Id=<?php echo $CustomerId;?>">
              <table width="100%" height="394" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="31" bgcolor="#DCDCDC"><span class="style5 style4 style11"><strong>ID:</strong></span></td>
                  <td bgcolor="#DCDCDC"><span class="style11"><?php echo $CustomerId;?></span></td>
                </tr>
                <tr>
                  <td height="37" bgcolor="#FFFFFF"><span class="style5 style4 style11"><strong>Name:</strong></span></td>
          <td bgcolor="#FFFFFF"><label>
                    <input type="text" name="txtName" id="txtName"  value="<?php echo $CustomerName;?>"/>
                  </label></td>
                </tr>
                <tr>
                  <td height="34" bgcolor="#DFDFDF"><span class="style5 style4 style11"><strong>Address:</strong></span></td>
                <td bgcolor="#DFDFDF"><span class="style11">
              <label>
                    <input name="txtAdd" type="text" id="txtAdress" value="<?php echo $Address;?>" />
                    </label>
                  </span></td>
                </tr>
                <tr>
                  <td height="37" bgcolor="#FFFFFF"><span class="style5 style4 style11"><strong>City:</strong></span></td>
              <td bgcolor="#FFFFFF"><span class="style11">
                    <label>
                    <input type="text" name="txtCity" id="txtCity" value="<?php echo $City;?>" />
                    </label>
                  </span></td>
                </tr>
                <tr>
                  <td height="34" bgcolor="#D6D6D6"><span class="style5 style4 style11"><strong>Mobile Number:</strong></span></td>
              <td bgcolor="#D6D6D6"><span class="style11">
                <label>
                    <input type="text" name="txtMobile" id="txtMobile" pattern="[0-9]{10}" value="<?php echo $MobileNo;?>" />
                    </label>
                  </span></td>
                </tr>
                <tr>
                  <td height="39" bgcolor="#FFFFFF"><span class="style5 style4 style11"><strong>EmailId:</strong></span></td>
              <td bgcolor="#FFFFFF"><span class="style11">
                    <label>
                    <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="txtEmail" id="txtEmail" value="<?php echo $EmailId;?>" />
                    </label>
                  </span></td>
                </tr>
                <tr>
                  <td height="34" bgcolor="#D8D8D8"><span class="style5 style4 style11"><strong>Gender:</strong></span></td>
              <td bgcolor="#D8D8D8"><span class="style11">
                <select name="cmbGender" id="cmbGender">
                      <option>Male</option>
                      <option>Female</option>
                    </select>
                  </span></td>
                </tr>
                <tr>
                  <td height="39" bgcolor="#FFFFFF"><span class="style5 style4 style11"><strong>BirthDate:</strong></span></td>
              <td bgcolor="#FFFFFF"><span class="style11">
                    <label>
                    <input type="date" name="txtDate" id="txtDate" value="<?php echo $BirthDate;?>" max='2002-12-31' />
                    </label>
                  </span></td>
                </tr>
                <tr>
                  <td height="36" bgcolor="#D4D4D4"><span class="style9">User Name:</span></td>
              <td bgcolor="#D4D4D4"><label>
                    <input type="text" name="txtUser" id="txtUser" value="<?php echo $UserName;?>" />
                  </label></td>
                </tr>
                <tr>
                  <td height="38" bgcolor="#FFFFFF"><span class="style9">Password:</span></td>
                <td bgcolor="#FFFFFF"><label>
                    <input type="password" name="txtPass" id="txtPass" value="<?php echo $Password;?>" />
                  </label></td>
                </tr>
                <tr>
                  <td><span class="style9"></span></td>
                  <td><label>
                    <input type="submit" name="Update Profile" id="Update Profile" value="Update Profile" />
                  </label></td>
                </tr>
              </table>
          </form>
            <?php

	mysqli_close($con);
?>
<br/>
<br/>

<br/>

<br/>
<br/>

<br/>

<br/>

<br/>

<br/>

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
