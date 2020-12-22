
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

  $RID = isset($_POST['RID']) ? $_POST['RID'] : " ";

  $query = "UPDATE FACULTY_Reports SET RID = $RID WHERE FEmail = '".$FEmail."'";
  echo $query;

  if (mysqli_query($conn, $query)) {
    echo "Record updated successfully";
    header("Location: view_F_to_RID.php");
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
    

}
else {
  echo "No student id received on request at update student";
  die();
}

?>
