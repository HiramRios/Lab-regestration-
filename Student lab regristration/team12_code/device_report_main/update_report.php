
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

if (isset($_POST['rid'])){

    $RID = isset($_POST['rid']) ? $_POST['rid'] : " ";
    $PID = isset($_POST['pid']) ? $_POST['pid'] : " ";
    $DDeviceID = isset($_POST['device_id']) ? $_POST['device_id'] : " ";
    $RName = isset($_POST['rname']) ? $_POST['rname'] : " ";
    $RType = isset($_POST['rtype']) ? $_POST['rtype'] : " ";
    $RDesc = isset($_POST['rdesc']) ? $_POST['rdesc'] : " ";

    $query = "UPDATE REPORT SET RName= '$RName' , RType= '$RType' , RDesc = '$RDesc' WHERE RID = $RID AND PID = $PID AND DDeviceID = $DDeviceID";
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: view_report.php");
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

}
else {
  echo "No Report id received on request at update device";
  die();
}

?>
