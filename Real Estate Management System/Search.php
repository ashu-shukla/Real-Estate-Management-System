<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Real Estate</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/style1.css" rel="stylesheet" type="text/css" />
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
      <div>
      <br/>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>
			
              </td>
            </tr>
            <tr>
              <td>
              <?php
$a=$_GET['StateName'];
$b=$_GET['CityName'];
$c=$_GET['AreaName'];
$d=$_GET['CatId'];

$con = mysqli_connect("localhost","root");

mysqli_select_db($con,"pms");
$sql = "SELECT category_master.CategoryName, property_master.PropertyId, property_master.StateName, property_master.CityName, property_master.AreaName, property_master.PropertyName, property_master.PropertyImage, property_master.PropertyDesc, property_master.TotalArea, property_master.PropertyAge, property_master.TotalRoom, property_master.PropertyCost, property_master.Status, property_master.CustomerId
FROM  category_master, property_master
WHERE category_master.CategoryId=property_master.CategoryId AND property_master.StateName='".$a."' AND property_master.CityName='".$b."' AND property_master.AreaName='".$c."' AND property_master.CategoryId='".$d."'";
$result = mysqli_query($con,$sql);
$records = mysqli_num_rows($result);
echo $records." Property Found";


while($row = mysqli_fetch_array($result))
{
$PId=$row['PropertyId'];
$CategoryName=$row['CityName'];
$StateName=$row['StateName'];
$CityName=$row['CityName'];
$AreaName=$row['AreaName'];
$PropertyName=$row['PropertyName'];
$Area=$row['TotalArea'];
$Room=$row['TotalRoom'];
$Age=$row['PropertyAge'];
$Cost=$row['PropertyCost'];
$Status=$row['Status'];
$Description=$row['PropertyDesc'];
$Image1=$row['PropertyImage'];
$CID=$row['CustomerId'];

?>
			
              <table width="100%" height="344" border="0" cellpadding="0" cellspacing="0">
                
                    <?php 
$records = mysqli_num_rows($result);

			  ?>
                  </span></td>
                  </tr>
                
                
                <tr>
                  <td valign="middle"><div align="center"><img src="upload/<?php echo $Image1;?>" alt="" width="200" height="200" border="3" /></div></td>
                  <td colspan="3" valign="top"><table width="100%" height="251" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><span class="style9 style10">Property Code:</span></td>
                      <td><span class="style9 style10"><?php echo $PId ;?></span></td>
                    </tr>
                    <tr>
                      <td><span class="style9 style10">Property Name:</span></td>
                      <td><span class="style9 style10"><?php echo $PropertyName ;?></span></td>
                    </tr>
                    <tr>
                      <td><span class="style9 style10">Area:</span></td>
                      <td><span class="style9 style10"><?php echo $Area ;?></span></td>
                    </tr>
                    <tr>
                      <td><span class="style9 style10">Cost:</span></td>
                      <td><span class="style9 style10"><?php echo $Cost ;?></span></td>
                    </tr>
                    <tr>
                      <td><span class="style9 style10">Total Rooms:</span></td>
                      <td><span class="style9 style10"><?php echo $Room ;?></span></td>
                    </tr>
                    <tr>
                      <td><span class="style9 style10">Property Age:</span></td>
                      <td><span class="style9 style10"><?php echo $Age ;?></span></td>
                    </tr>
                  </table></td>
                  </tr>
                <tr>
                  <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><span class="style11">Owner Detail:</span></td>

                      <td><a href="register.php?CustId=<?php echo $CID;?>" class="style11">View</a></td>
                     
                     
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td colspan="4" bgcolor="#FFFFFF"><hr/></td>
                  </tr>

              </table>
              <?php
}

mysqli_close($con);
?>
              </td>
            </tr>
          </table>
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
