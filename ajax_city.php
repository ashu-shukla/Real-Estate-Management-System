<?php
function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }
    include('config.php');
    if(isset($_POST["CityName"])){
        //Get all state data
        $city_name = ($_POST["CityName"]);
        console_log($city_name);
        $query = "SELECT * FROM area_master WHERE CityName = '$city_name' ";
        $run_query = mysqli_query($con, $query);
        //Count total number of rows
        $count = mysqli_num_rows($run_query);
        //Display states list
        if($count > 0){
            echo '<option value="">Select Area</option>';
            while($row = mysqli_fetch_array($run_query)){
                $area_id=$row['AreaId'];
                $area_name=$row['AreaName'];
                echo "<option value='$area_name'>$area_name</option>";
            }
        }else{
            echo '<option value="">Areas not entered yet.</option>';
        }
      }

?>