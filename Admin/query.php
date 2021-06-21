 <?php 
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"pms");
$sql = "select * from property_master where CategoryId=1";
$result = mysqli_query($con,$sql);
?>

<table width="100%" border="3" cellpadding="3" cellspacing="3" bordercolor="#000000">

  
  <tr>
    <th>PropertyId    </th>
    <th>CityName   </th>
    <th>PropertyName    </th>
    <th>PropertyDesc    </th>
     <th>TotalArea   </th>
    <th>DistRail   </th>
	  
  
  </tr>
  
  <?php

while($row=mysqli_fetch_array($result))
{
	
$PropertyId=$row['PropertyId'];
$CityName=$row['CityName'];
$PropertyName=$row['PropertyName'];
$PropertyDesc=$row['PropertyDesc'];
$TotalArea=$row['TotalArea'];
$DistRail=$row['DistRail'];
?>

   

<tr>
 <td><?php echo $PropertyId;?>   </td>
    <td><?php echo $CityName;?>     </td>
    <td><?php echo $PropertyName;?>    </td>
    <td><?php echo $PropertyDesc;?>     </td>
      <td><?php echo $TotalArea;?>    </td>
    <td><?php echo $DistRail;?>   </td>  
</tr>
<?php 
}
$records = mysqli_num_rows($result);
mysqli_close($con);

?>
</table>

<p>&nbsp;</p>

</body>
</html>
<?php

?>
