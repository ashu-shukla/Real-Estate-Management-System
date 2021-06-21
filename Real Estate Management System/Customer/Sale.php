<?php require_once('../Connections/PMS.php'); ?>
<?php
  if (!function_exists("GetSQLValueString")) {
    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = ""){
        $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

        $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

        switch ($theType) {
          case "text":
            $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
            break;    
          case "long":
          case "int":
            $theValue = ($theValue != "") ? intval($theValue) : "NULL";
            break;
          case "double":
            $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
            break;
          case "date":
            $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
            break;
          case "defined":
            $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
            break;
        }
        return $theValue;
    }
  }

  $con = mysqli_connect("localhost","root");
  mysqli_select_db($con,"pms");
  $query_Recordset1 = "SELECT * FROM category_master";
  $Recordset1 = mysqli_query($con,$query_Recordset1) or die(mysql_error());
  $row_Recordset1 = mysqli_fetch_assoc($Recordset1);
  $totalRows_Recordset1 = mysqli_num_rows($Recordset1);

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
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<style type="text/css">
</style>
<script type="text/javascript" src="jquery.min.js"></script>
<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function()
{	
    $(".country").live("change",function()
    {
      var stateID = $(this).val();
      console.log(stateID);
      if(stateID){
      $.ajax({
          type: "POST",
          url: "ajax_state.php",
          data: 'StateName='+stateID,
          success: function(html){
            $(".state").html(html);
            $('.city').html('<option value="">Select state first</option>'); 
        } 
      });
      }else{
        $(".state").html('<option value="">Select state first</option>');
        $('.city').html('<option value="">Select state/city first</option>');
      }
  });

  $('.state').live("change",function(){									   
    var dataString = $(this).val();
    console.log(dataString);
    if(dataString){
      $.ajax({
        type: "POST",
        url: "ajax_city.php",
        data: 'CityName='+dataString,
        success: function(html){
          $(".city").html(html);
        } 
      });
    }else{
      $('.city').html('<option value="">Select State/City first</option>');
    }
  });
});
</script>
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="main">
  <?php include "Headermenu.php" ?>
  
  <div class="content">
    <div class="innercontent">
      <?php include "left.php" ?>
      <div class="rightpannel" style="height:660px;padding-left:0px">
        <div class="welcome">
          <div class="style3" style="height:30px; padding-bottom:5px;padding-top:10px">Welcome <?php echo $_SESSION['CustomerName'];?></div>
 			
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>
                <form action="InsertProperty.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                  <table width="100%" height="388" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="22" colspan="2" bgcolor="#E0FFFF"><span class="style10">Upload Property</span></td>
                    </tr>
                    <tr>
                      <td height="38"><span class="style8">Select Category:</span></td>
                      <td>
                        <select name="cmbCat" id="cmbCat">
                        <?php do {  ?>
                        <option value="<?php echo $row_Recordset1['CategoryId']?>"><?php echo $row_Recordset1['CategoryName']?></option>
                        <?php
                          } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1));
                              $rows = mysqli_num_rows($Recordset1);
                              if($rows > 0) {
                                  mysqli_data_seek($Recordset1, 0);
                                  $row_Recordset1 = mysqli_fetch_assoc($Recordset1);
                              }
                        ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td height="35"><span class="style8">Select State:</span></td>
                      <td>
                      <span id="spryselect3">
                        <select name="country" class="country">
                          <option selected="selected">--Select State--</option>
                          <?php 
                            include('config.php');
                            $con = mysqli_connect ("localhost","root");
                            mysqli_select_db($con,"pms");
                            $query1 = "select * from State_Master order by StateId ASC";
                            $sql1=mysqli_query($con,$query1);
                            while($row=mysqli_fetch_array($sql1))
                              {
                                $stateid=$row['StateID'];
                                $statename=$row['StateName'];
                                echo "<option value='$statename'>$statename</option>";
                              } 
                            ?>
                        </select>
                        <span class="selectRequiredMsg">Please select an item.</span>
                      </td>
                    </tr>
                    <tr>
                      <td height="35"><span class="style8">Select City:</span></td>
                      <td>
                      <span id="spryselect2">
                        <select name="state" class="state">
                          <option selected="selected">--Select City--</option>
                        </select>
                        <span class="selectRequiredMsg">Please select an item.</span>
                      </td>
                    </tr>
                  <tr>
                    <td height="35"><span class="style8">Select Area:</span></td>
                    <td>
                    <span id="spryselect1">
                      <select name="city" class="city">
                        <option selected="selected">--Select Area--</option>
                      </select>
                      <span class="selectRequiredMsg">Please select an item.</span>
                    </td>
                  </tr>
                  <tr>
                    <td height="35"><span class="style8">Property Name:</span></td>
                    <td><label><span id="sprytextfield3">
                      <input type="text" name="txtName" id="txtName" />
                      <span class="textfieldRequiredMsg">A value is required.</span></span></label></td>
                  </tr>
                  <tr>
                    <td height="87"><span class="style8">Description:</span></td>
                    <td><label><span id="sprytextarea1">
                      <textarea name="txtDesc" id="txtDesc" cols="35" rows="3"></textarea>
                      <span class="textareaRequiredMsg">A value is required.</span></span></label></td>
                  </tr>
                  <tr>
                    <td height="38"><span class="style8">Upload Image:</span></td>
                    <td><label>
                      <input type="file" name="txtFile" id="txtFile" />
                    </label></td>
                  </tr>
                  <tr>
                    <td height="37"><span class="style8">Total Area:</span></td>
                    <td><label><span id="sprytextfield4">
                      <input type="text" name="txtArea" id="txtArea" />
                      <span class="textfieldRequiredMsg">A value is required.</span></span></label></td>
                  </tr>
                  <tr>
                    <td height="33"><span class="style8">Property Age:</span></td>
                    <td><label>
                    <span id="spryselect4">
                      <select name="cmbAge" id="cmbAge">
                        <option>1 Year</option>
                        <option>2 Year</option>
                        <option>3 Year</option>
                        <option>4 Year</option>
                        <option>5 Year</option>
                      </select>
                      <span class="selectRequiredMsg">Please select an item.</span>
                    </label></td>
                  </tr>
                  <tr>
                    <td height="36"><span class="style8">Total Rooms::</span></td>
                    <td><label>
                    <span id="spryselect5">
                      <select name="cmbRoom" id="cmbRoom">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                      <span class="selectRequiredMsg">Please select an item.</span>
                    </label></td>
                  </tr>
                  <tr>
                    <td height="38"><span class="style8">Is Furnished?</span></td>
                    <td><label>
                    <span id="spryselect6">
                      <select name="cmbFur" id="cmbFur">
                        <option>Yes</option>
                        <option>No</option>
                      </select>
                      <span class="selectRequiredMsg">Please select an item.</span>
                    </label></td>
                  </tr>
                  <tr>
                    <td height="38"><span class="style8">Parking Available?</span></td>
                    <td><label>
                    <span id="spryselect7">
                      <select name="cmbPark" id="cmbPark">
                        <option>Yes</option>
                        <option>No</option>
                      </select>
                      <span class="selectRequiredMsg">Please select an item.</span>
                    </label></td>
                  </tr>
                  <tr>
                    <td height="38"><span class="style8">Distance From Railway:</span></td>
                    <td><span id="sprytextfield2">
                      <label>
                      <input type="text" name="txtDist" id="txtDist" />
                      </label>
                      <span class="textfieldRequiredMsg">A value is required.</span></span>(Km)</td>
                  </tr>
                  <tr>
                    <td height="38"><span class="style8">Property Cost:</span></td>
                    <td><label><span id="sprytextfield5">
                      <input type="text" name="txtCost" id="txtCost" />
                      <span class="textfieldRequiredMsg">A value is required.</span></span></label></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><label>
                      <input type="submit" name="button" id="button" value="Upload" />
                    </label></td>
                  </tr>
                </table>
                            </form>              </td>
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
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3");
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4");
var spryselect5 = new Spry.Widget.ValidationSelect("spryselect5");
var spryselect6 = new Spry.Widget.ValidationSelect("spryselect6");
var spryselect7 = new Spry.Widget.ValidationSelect("spryselect7");

//-->
</script>
</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
