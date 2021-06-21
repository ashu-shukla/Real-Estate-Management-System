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
      <div class="rightpannel"style="padding-left:0px">
      <div>
      <h2>User Management</h2>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="27" bgcolor="#CCCCFF"><span class="style4">Create New User</span></td>
        </tr>
        <tr>
          <td height="26"><form id="form1" name="form1" method="post" action="InsertUser.php">
            <table width="100%" height="95" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="35"><span class="style10">User Name:</span></td>
                <td><span id="sprytextfield1">
                  <label>
                  <input type="text" name="txtUserName" id="txtUserName" />
                  </label>
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
              </tr>
              <tr>
                <td><span class="style10">Password:</span></td>
                <td><span id="sprytextfield2">
                  <label>
                  <input type="text" name="txtPassword" id="txtPassword" />
                  </label>
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><label>
                  <input type="submit" name="button" id="button" value="Submit" />
                </label></td>
              </tr>
            </table>
                    </form>            </td>
        </tr>
        <tr>
          <td height="25" bgcolor="#E0FFFF"><span class="style3">User List</span></td>
        </tr>
        <tr>
          <td>
          <table width="100%" >
<tr bgcolor='#B0C4DE'>
<th height="32" bgcolor="" class="style3"><div align="left" class="style9 style5"><strong>Id</strong></div></th>
<th bgcolor="" class="style3"><div align="left" class="style9 style5"><strong>UserName</strong></div></th>
<th bgcolor="" class="style3"><div align="left" class="style9 style5"><strong>Edit</strong></div></th>
<th bgcolor="" class="style3"><div align="left" class="style12">Delete</div></th>
</tr>
<?php

$con = mysqli_connect("localhost","root");

mysqli_select_db($con,"pms");

$sql = "select * from Login_Master";

$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result))
{
$Id=$row['UserId'];
$UserName=$row['UserName'];

?>
<tr>
<td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Id;?></strong></div></td>
<td class="style3"><div align="left" class="style9 style5"><strong><?php echo $UserName;?></strong></div></td>
<td class="style3"><div align="left" class="style9 style5"><strong><a href="EditUser.php?UserId=<?php echo $Id;?>">Edit</a></strong></div></td>
<td class="style3"><div align="left" class="style9 style5"><strong><a href="DeleteUser.php?UserId=<?php echo $Id;?>">Delete</a></strong></div></td>
</tr>
<?php
}

$records = mysqli_num_rows($result);
?>
<tr>
<td colspan="4" class="style3"><div align="left" class="style12"><?php echo "Total ".$records." Records"; ?> </div></td>
</tr>
<?php


mysqli_close($con);
?>
</table>
          </td>
        </tr>
      </table>
     
     
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

<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
//-->
</script>
</body>
</html>

