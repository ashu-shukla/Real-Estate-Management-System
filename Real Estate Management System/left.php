<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style6 {font-size: small; color: #1d1160;}
input,select,textarea{
  border: 1px solid #ccc;
  border-radius: 10px;
  box-sizing: border-box;
  font-family: 'JetBrains Mono', monospace;
}
-->
</style>
<div class="leftpannel">

  <div class="search">
    <div class="search1">
      <h2 style="color:#452c63;text-align:center;padding-top: 10px;margin-top: 0px;">Login</h2>
    </div>
	
        <form name="form1" method="post" action="login.php">
         <table style="text-align:center !important" width="100%" bgcolor="#E6E6FA">
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
           <td class="style6" height="33"><label>
             <select name="cmbUserType" id="cmbUserType">
               <option>Admin</option>
               <option>Customer</option>
             </select>
           </label></td>
         </tr>
         <tr>
           <td class="style6" height="36"><div align="center">
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
