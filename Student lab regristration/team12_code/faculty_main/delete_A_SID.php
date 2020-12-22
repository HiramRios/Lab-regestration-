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
    $SID = $splitPK[1];
    
    $query = "DELETE from ADDS where FEmail = '".$email."' AND SID = $SID ";

    if ($conn->query($query) === TRUE) {
        echo "Faculty member deleted successfuly";
        header("Location: view_A_SID.php");
     } else {
         echo "Error: " . $query . "<br>" . $conn->error;
     }
} else{
    echo "No Sid received";
    header("Location: view_faculty.php");
}

?>