
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

if (isset($_POST['device_id'])){

    $DDeviceID = isset($_POST['device_id']) ? $_POST['device_id'] : " ";
    $SID = isset($_POST['sid']) ? $_POST['sid'] : " ";
    $RID = isset($_POST['rid']) ? $_POST['rid'] : " ";
    $student = isset($_POST['student_id']) ? $_POST['student_id'] : " ";
    $report = isset($_POST['report_id']) ? $_POST['report_id'] : " ";


    $query = "UPDATE DEVICE SET SID= $SID , RID = $RID  WHERE DDeviceID = $DDeviceID AND SID = $student AND RID = $report";
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: view_devrepstu.php");
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

}
else {
  echo "No device id received on request at update device";
  die();
}

?>
