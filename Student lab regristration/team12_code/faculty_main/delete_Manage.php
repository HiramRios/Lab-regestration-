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

if (isset($_GET['PK'])){

    $splitPK = explode(",",$_GET['PK']);
    $email = $splitPK[0];
    $PID = $splitPK[1];
    
    $query = "DELETE from MANAGES where FEmail = '".$email."' AND PID = $PID ";

    if ($conn->query($query) === TRUE) {
        echo "Project Manager was seleted deleted successfuly";
        header("Location: view_Manage.php");
     } else {
         echo "Error: " . $query . "<br>" . $conn->error;
     }
} else{
    echo "No Pid received";
    header("Location: view_Manage.php");
}

?>