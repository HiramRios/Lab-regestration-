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

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS 4342 FACULTY Menu</title>

    <!-- Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body style="background-color:#003366">
    <!-- Displaying a menu for CRUD operations in Student table -->
    <div style="background-color:white;" class="container">
        <h1>
        <style type='text/css'>
        body{ color: black; background-color: red;}
        </style> FACULTY MAIN MENU: </h1>

        <!--Add your reference to your php file here-->
        <br><h5> Faculty: </h5>
        <a href="create_faculty.php">Create New Faculty Memeber</a><br>
        <a href="view_faculty.php">View, Delet, and Update Faculty Memeber</a><br>
        <a href="R5.php">View Faculty Memebers Email and Full Name</a><br>
        
        <br><h5> Faculty Email to Report ID: </h5>
        <a href="create_F_to_RID.php">Assign Faculty to Report</a><br>
        <a href="view_F_to_RID.php">View, Delet, and Update Faculty to RID</a><br>

        <br><h5> Faculty to Added Student: </h5>
        <a href="create_A_SID.php">Add new Student</a><br>
        <a href="view_A_SID.php">View, Delet, and Update Faculty to Student</a><br>
        <a href="R4.php">Faculty and thier added Students</a><br>

        <br><h5> Project Managers: </h5>
        <a href="create_Manage.php">Add new Project Manager</a><br>
        <a href="view_Manage.php">View, Delet, and Update Project Manager</a><br>
        <a href="R3pt1.php">Projects & Managers</a><br>

        <br><h5> Faculty Participants: </h5>
        <a href="create_Participant.php">Add new Participant</a><br>
        <a href="view_Participant.php">View, Delet, and Update Participants to Projects</a><br>
        <a href="R3pt2.php">Projects & Participants</a><br>

        <br><h5> Student Lookup </h5>
        <a href="R1.php">Lookup Student Info</a><br>

        <?php
            // session_start();
            // require_once('../config.php');
            // require_once('../validate_session.php');
            // echo $_SESSION['user'] ;
        ?>
        
    </div>

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>