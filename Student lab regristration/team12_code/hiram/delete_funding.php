<?php

session_start();
require_once('../../config.php');
require_once('../../validate_session.php');


if (isset($_GET['FdID'])){

    $userid = $_GET['FdID'];
    $query = "DELETE from funding where FdID = $userid";

    if ($conn->query($query) === TRUE) {
        echo "Student deleted successfuly";
        header("Location: Funding.php");
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
} else{
    echo "No Sid received";
    header("Location: Funding.php");
}

?>