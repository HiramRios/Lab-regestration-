<?php

// Accessing the information for the DB connection from the configuration file and validating that a user is logged in.
session_start();
require_once('../../config.php');
require_once('../../validate_session.php');
if (isset($_POST['FdAmount'])){

    $sid = isset($_POST['FdAmount']) ? $_POST['FdAmount'] : " ";
    $firstName = isset($_POST['FdAmount']) ? $_POST['FdAmount'] : " ";

    $query = "UPDATE Amount SET FdAmount ='$firstName' WHERE FdAmount = $sid";
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: Fundingcus.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

}
else {
    echo "No student id received on request at update student";
    die();
}

?>

