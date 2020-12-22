<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * This file deletes a record  from the table Student of your DB.
 */
-->


<?php 

session_start();
require_once('../../config.php');
require_once('../../validate_session.php');

if (isset($_GET['DDeviceID'])){

    $DDeviceID = $_GET['DDeviceID'];
    $SID = $_GET['SID'];
    $RID = $_GET['RID'];
    $query = "DELETE from DEVICE where DDeviceID = $DDeviceID AND SID = $SID AND RID = $RID";

    if ($conn->query($query) === TRUE) {
        echo "Device row deleted successfuly";
        header("Location: view_devrepstu.php");
     } else {
         echo "Error: " . $query . "<br>" . $conn->error;
     }
} else{
    echo "No Device ID received";
    header("Location: view_device_issued.php");
}

?>