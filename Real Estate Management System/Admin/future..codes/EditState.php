<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Real Estate</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/style1.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style3 {color: #869629}
.style8 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: small; font-weight: bold; }
.style10 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: small; font-weight: bold; color: #FFFFFF; }
-->
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
      <div>
      <br/>
<table width="100%" height="209" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="33" bgcolor="#D36101"><span class="style10">Edit Record</span></td>
  </tr>
  <tr>
    <td>
    <?php
$Id=$_GET['StateId'];
// Establish Connection with Database
$con = mysqli_connect("localhost","root");
// Select Database
mysqli_select_db($con,"pms");
// Specify the query to execute
$sql = "select * from State_Master where Stateid=".$Id."";
// Execute query
$result = mysqli_query($con,$sql);
// Loop through each records 
while($row = mysqli_fetch_array($result))
{
$Id=$row['StateId'];
$Name=$row['StateName'];
}
?>
<form Method="POST" Action="UpdateState.php">
<table width="100%" border="0">
<tr>
<td height="32"><span class="style8">State Id</span></td>
<td><span id="sprytextfield1">
  <label>
  <input name="txtStateId" type="text" id="txtStateId" value="<?php echo $Id;?>" />
  </label>
  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
</tr>
<tr>
<td height="36"><span class="style8">State Name:</span></td>
<td><span id="sprytextfield2">
  <label>
  <input name="txtStateName" type="text" id="txtStateName" value="<?php echo $Name;?>" />
  </label>
  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
</tr>
<tr>
<td></td>
<td> <input type="submit" Name="submit" value="Update Record" /></td>
</tr>
</table>
</form>
<?php
// Close the connection
mysqli_close($con);
?>
</table>

    </td>
  </tr>
</table>
<h2 class="style3">&nbsp;</h2>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
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
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
//-->
</script>
</body>
</html>
