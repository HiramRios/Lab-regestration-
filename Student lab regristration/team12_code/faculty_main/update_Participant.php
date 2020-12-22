
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
  $OPID = isset($_POST['OPID']) ? $_POST['OPID'] : " ";
  //echo $OPID;

  $PID = isset($_POST['PID']) ? $_POST['PID'] : " ";
  //echo $PID;
  $query = "DELETE from PARTICIPATES where FEmail = '".$FEmail."' AND PID = $OPID ";
  mysqli_query($conn, $query);

  $query_project  = "INSERT INTO PARTICIPATES (FEmail,PID) VALUES ('".$FEmail."', $PID);";
  //$query = "UPDATE PARTICIPATES SET PID = $PID WHERE FEmail = '".$FEmail."'";
  //echo $query;
  //echo "\n";

  if (mysqli_query($conn, $query_project)) {
    echo "Record updated successfully";
    header("Location: view_Participant.php");
  } else {
    //recovery
    $query_project  = "INSERT INTO PARTICIPATES (FEmail,PID) VALUES ('".$FEmail."', $OPID);";
    mysqli_query($conn, $query_project);
    echo "Error updating record: " . mysqli_error($conn);
    header("Location: view_Participant.php");
  }
    

}
else {
  echo "No project id received on request";
  die();
}

?>
