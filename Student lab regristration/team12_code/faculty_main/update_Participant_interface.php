<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * This file provides an example of how to separate the interface for the user , e.g., PhP from from the program logic, e.g., PhP statements.
 */
-->

<!--CHANGE THIS-->
<?php
session_start();
require_once('../../config.php');
require_once('../../validate_session.php');

if (isset($_GET['PK'])){

    $splitPK = explode(",",$_GET['PK']);
    $email = $splitPK[0];
    $PID = $splitPK[1];
    
    $sql = "SELECT * FROM PARTICIPATES where FEmail = '".$email."' AND PID = $PID;";
    //echo $sql;
    $result = $conn->query($sql);
    //echo $result;
    $row = mysqli_fetch_array($result);
    //echo $row;
}
else {
    //echo "No user id received on request at update_student_interface get";
    die();
}

?>
<!--CHANGE THIS-->

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS4342 Project Participants Update</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Update Project ID:</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <!-- Displaying a form with the information of the user so values can be modified 
             Note that the ID is not shown to be modified, only other attributes. -->

        <form action="update_Participant.php" method="post"><!--CHANGE THIS-->

            <input type="hidden" name="FEmail" id="Femail" value="<?php echo $row['FEmail'] ?>">
            <input type="hidden" name="OPID" id="OPID" value="<?php echo $row['PID'] ?>">
            <div class="form-group">
                <label for="PIDs">PID (Note: There must be an PID already created & no dublicates)</label>
                <input class="form-control" type="text" id="PID" name="PID" value="<?php echo $row['PID']?>">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Update">
            </div>
        </form>
        <div>
            <br>
            <a href="view_Participant.php">Back to View Participants</a></br>
        </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>