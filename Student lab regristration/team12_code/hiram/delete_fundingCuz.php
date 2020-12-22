<?php

session_start();
require_once('../../config.php');
require_once('../../validate_session.php');


if (isset($_GET['FdAmount'])){

    $userid = $_GET['FdAmount'];
    $query = "DELETE from Amount where FdAmount = $userid";

    if ($conn->query($query) === TRUE) {
        echo "Student deleted successfuly";
        header("Location: Fundingcus.php");
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
} else{
    echo "No Sid received";
    header("Location: Fundingcus.php");
}

?>