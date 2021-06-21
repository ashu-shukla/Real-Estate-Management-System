<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style6 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: small; color: #FFFFFF;}
-->
</style>
<div class="leftpannel">

  <div class="search">
    <div class="search1"><h2>Login</h2></div>
	
        <form name="form1" method="post" action="login.php">
         <table width="100%" bgcolor="#666666">
         <tr>
           <td class="style6">User Name:</td>
         </tr>
         <tr>
           <td><span id="sprytextfield1">
             <label>
             <input type="text" name="txtUserName" id="txtUserName">
             </label>
           <span class="textfieldRequiredMsg">*</span></span></td>
         </tr>
         <tr>
           <td class="style6">Password:</td>
         </tr>
         <tr>
           <td><span id="sprytextfield2">
             <label>
             <input type="password" name="txtPassword" id="txtPassword">
             </label>
           <span class="textfieldRequiredMsg">*</span></span></td>
         </tr>
         <tr>
           <td class="style6">User Type:</td>
         </tr>
         <tr>
           <td height="33"><label>
             <select name="cmbUserType" id="cmbUserType">
               <option>Admin</option>
               <option>Customer</option>
             </select>
           </label></td>
         </tr>
         <tr>
           <td height="36"><div align="center">
             <input type="submit" name="button" id="button" value="Submit">
           </div></td>
         </tr>
         <tr>
         <td><label></label></td>
         </tr>
         </table>
        </form>
  </div>
        
      </div>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
//-->
</script>
