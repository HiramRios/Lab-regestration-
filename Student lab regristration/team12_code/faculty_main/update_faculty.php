
<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 */
-->

<?php

// Accessing the information for the DB connection from the configuration file and validating that a user is logged in.
session_start();
require_once('../../config.php');
require_once('../../validate_session.php');

if (isset($_POST['FEmail'])){

    //key to update
    $FEmail = isset($_POST['FEmail']) ? $_POST['FEmail'] : " ";

    $FFirstName = isset($_POST['first_name']) ? $_POST['first_name'] : " ";
    $FMiddleName = isset($_POST['middle_name']) ? $_POST['middle_name'] : " ";
    $FLastName = isset($_POST['last_name']) ? $_POST['last_name'] : " ";

    if($FMiddleName){
      $FFullName = $FFirstName." ".$FMiddleName." ".$FLastName;

      $query = "UPDATE FACULTY SET  FFullName='$FFullName', FFirstName='$FFirstName', FMiddleName='$FMiddleName', FLastName='$FLastName' WHERE FEmail = '".$FEmail."'";
      echo $query;

      if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: view_faculty.php");
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

    }
    else {
      
      $FFullName = $FFirstName." ".$FLastName;

      $query = "UPDATE FACULTY SET  FFullName='$FFullName', FFirstName='$FFirstName', FLastName='$FLastName' WHERE FEmail = '".$FEmail."'";
      echo $query;

      if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: view_faculty.php");
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }
    
    }

}
else {
  echo "No student id received on request at update student";
  die();
}

?>
