<?php
  function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }
  include('config.php');

  if(isset($_POST["StateName"])){
    //Get all state data
    $state_id = ($_POST["StateName"]);
    console_log($state_id);
    $query = "SELECT * FROM city_master WHERE StateName = '$state_id' ";
    $run_query = mysqli_query($con, $query);
    //Count total number of rows
    $count = mysqli_num_rows($run_query);
    //Display states list
    if($count > 0){
        echo '<option value="">Select City</option>';
        while($row = mysqli_fetch_array($run_query)){
            $city_id=$row['CityId'];
            $city_name=$row['CityName'];
            echo "<option value='$city_name'>$city_name</option>";
        }
    }else{
        echo '<option value="">Cities not entered yet.</option>';
    }
  }
?>