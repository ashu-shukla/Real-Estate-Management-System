<?php require_once('Connections/PMS.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
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

mysqli_select_db($PMS,$database_PMS);
$query_Recordset1 = "SELECT * FROM city_master";
$Recordset1 = mysqli_query($PMS,$query_Recordset1) or die(mysqli_error($PMS));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Real Estate</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/style1.css" rel="stylesheet" type="text/css" />
<style type="text/css">
</style>

<style type="text/css">

.ds_box {
	background-color: #FFF;
	border: 1px solid #000;
	position: absolute;
	z-index: 32767;
}

.ds_tbl {
	background-color: #FFF;
}

.ds_head {
	background-color: #333;
	color: #FFF;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	font-weight: bold;
	text-align: center;
	letter-spacing: 2px;
}

.ds_subhead {
	background-color: #CCC;
	color: #000;
	font-size: 12px;
	font-weight: bold;
	text-align: center;
	font-family: Arial, Helvetica, sans-serif;
	width: 32px;
}

.ds_cell {
	background-color: #EEE;
	color: #000;
	font-size: 13px;
	text-align: center;
	font-family: Arial, Helvetica, sans-serif;
	padding: 5px;
	cursor: pointer;
}

.ds_cell:hover {
	background-color: #F3F3F3;
} /* This hover code won't work for IE */

</style>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
</head>
<body>

<table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
<tr><td id="ds_calclass">
</td></tr>
</table>


</head>
<body>
<SCRIPT language="JavaScript1.2" src="gen_validation.js"></SCRIPT>
<SCRIPT language="JavaScript1.2">
var arrFormValidation=
             [
			 		[//Name
						  ["minlen=1",
		"Please Enter Name "
						  ] 
					
                     ],
                   [//Address
						   ["minlen=1",
		"Please Enter Address "
						  ] 
						  
                   ],
				   [//City
						  
						  
                   ],
				   [//Mobile
						  
						  ["num",
		"Please Enter valid Mobile "
						  ],
						  ["minlen=10",
		"Please Enter valid Mobile "
						  ]
						 				  
                   ],
				   [//Email
						   ["minlen=1",
		"Please Enter Email "
						  ], 
						  ["email",
		"Please Enter valid email "
						  ]
						  
                   ],
				   [//Gender
						  
						  
                   ],
				   [//Birthdate
						  
						  ["minlen=1",
		"Please Select BirthDate "
						  ]
						  
                   ],
				   [//UserName
						  
					 ["minlen=1",
		"Please Enter UserName "
						  ]	
                   ],
				   [//Password
						  
						 ["minlen=1",
		"Please Enter Password "
						  ] 
						  
                   ]
            ];
</SCRIPT>

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
      <h2 class="style3">Registration Form</h2>
    
    
      <form id="form2" name="form2" method="post" action="InsertCustomer.php" onSubmit="return validateForm(this,arrFormValidation);">
        <table width="100%" height="377" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style10">Customer Name:</span></td>
            <td><span id="sprytextfield3">
              <label>
              <input type="text" name="txtName" id="txtName" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr>
            <td height="106"><span class="style10">Address:</span></td>
            <td><span id="sprytextarea1">
              <label>
              <textarea name="txtAddress" id="txtAddress" cols="35" rows="4"></textarea>
              </label>
              <span class="textareaRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr>
            <td><span class="style10">City:</span></td>
            <td><label>
              <select name="cmbCity" id="cmbCity">
                <?php
do {  
?>
                <option value="<?php echo $row_Recordset1['CityName']?>"><?php echo $row_Recordset1['CityName']?></option>
                <?php
} while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1));
  $rows = mysqli_num_rows($Recordset1);
  if($rows > 0) {
      mysqli_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysqli_fetch_assoc($Recordset1);
  }
?>
              </select>
            </label></td>
          </tr>
          <tr>
            <td><span class="style10">Mobile Number:</span></td>
            <td><span id="sprytextfield4">
              <label>
              <input type="tel" pattern="[0-9]{10}"  name="txtMobile" id="txtMobile" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr>
            <td><span class="style10">Email Id:</span></td>
            <td><span id="sprytextfield5">
              <label>
              <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  name="txtEmail" id="txtEmail" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr>
            <td><span class="style10">Gender:</span></td>
            <td><label>
              <select name="cmbGender" id="cmbGender">
                <option>Male</option>
                <option>Female</option>
              </select>
            </label></td>
          </tr>
          <tr>
            <td><span class="style10">BirthDate:</span></td>
            <td><span id="sprytextfield6">
              <label>
              <input type="date" name="txtBirthDate" id="txtBirthDate" value="2002-01-01" max="2002-12-31"/>
			  
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr>
            <td><span class="style10">User Name:</span></td>
            <td><span id="sprytextfield7">
              <label>
              <input type="text" name="txtUserName2" id="txtUserName2" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr>
            <td><span class="style10">Password:</span></td>
            <td><span id="sprytextfield8">
              <label>
              <input type="password" name="txtPassword2" id="txtPassword2" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><label>
              <input type="submit" name="button2" id="button2" value="Submit" />
            </label></td>
          </tr>
        </table>
          </form>
      <p>&nbsp;</p>
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
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
//-->
</script>
</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>


