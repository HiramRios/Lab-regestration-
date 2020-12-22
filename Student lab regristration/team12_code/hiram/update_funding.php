<?php

// Accessing the information for the DB connection from the configuration file and validating that a user is logged in.
session_start();
require_once('../../config.php');
require_once('../../validate_session.php');
if (isset($_POST['FdID'])){

    $sid = isset($_POST['FdID']) ? $_POST['FdID'] : " ";
    $firstName = isset($_POST['FdGrantName']) ? $_POST['FdGrantName'] : " ";

    $query = "UPDATE funding SET FdGrantName='$firstName' WHERE FdID = $sid";
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: Funding.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

}
else {
    echo "No student id received on request at update student";
    die();
}

?>

