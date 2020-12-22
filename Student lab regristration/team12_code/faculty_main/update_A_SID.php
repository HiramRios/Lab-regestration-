
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
  $OSID = isset($_POST['OSID']) ? $_POST['OSID'] : " ";
  //echo $OSID;

  $SID = isset($_POST['SID']) ? $_POST['SID'] : " ";
  //echo $SID;
  $query = "DELETE from ADDS where FEmail = '".$FEmail."' AND SID = $OSID ";
  mysqli_query($conn, $query);

  $query_faculty  = "INSERT INTO Adds (FEmail,SID) VALUES ('".$FEmail."', $SID);";
  //$query = "UPDATE ADDS SET SID = $SID WHERE FEmail = '".$FEmail."'";
  //echo $query;
  //echo "\n";

  if (mysqli_query($conn, $query_faculty)) {
    echo "Record updated successfully";
    header("Location: view_A_SID.php");
  } else {
    //recovery
    $query_faculty  = "INSERT INTO Adds (FEmail,SID) VALUES ('".$FEmail."', $OSID);";
    mysqli_query($conn, $query_faculty);
    echo "Error updating record: " . mysqli_error($conn);
    //header("Location: view_A_SID.php");
  }
    

}
else {
  echo "No student id received on request at update student";
  die();
}

?>
