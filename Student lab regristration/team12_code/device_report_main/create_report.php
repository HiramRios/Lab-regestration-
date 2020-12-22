<!--
/**
 * CS 4342 Database Management
 * @author Instruction team with contribution from L. Garnica and K. Apodaca
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * This file inserts a new record  into the table Student of your DB.
 */
-->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS4342 Create Project Report</title><!--Change Title -->

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Create Project Report</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <form action="create_report.php" method="post">  <!--CHANGE ACTION-->
        <div class="form-group">
                <label for="rid">Report ID</label> <!--CHANGE for= -->
                <input class="form-control" type="text" id="rid" name="rid"> <!--CHANGE id= and name=-->
            </div>
            <div class="form-group">
                <label for="pid">Project ID (must have a existing project id)</label> <!--CHANGE for= -->
                <input class="form-control" type="text" id="pid" name="pid"> <!--CHANGE id= and name=-->
            </div>
            <div class="form-group">
                <label for="device_id">Device ID associated to Report (must have a existing device id) </label> <!--CHANGE for= -->
                <input class="form-control" type="text" id="device_id" name="device_id"> <!--CHANGE id= and name=-->
            </div>
            <div class="form-group">
                <label for="rname">Report Name</label> <!--CHANGE for= -->
                <input class="form-control" type="text" id="rname" name="rname"> <!--CHANGE id= and name=-->
            </div>
            <div class="form-group">
                <label for="rtype">Report Type</label>
                <input class="form-control" type="text" id="rtype" name="rtype">
            </div>
            <div class="form-group">
                <label for="rdesc">Report Desc</label> <!--CHANGE for= -->
                <input class="form-control" type="text" id="rdesc" name="rdesc"> <!--CHANGE id= and name=-->
            </div>
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
            </div>
        </form>
        <div>
            <br>
            <a href="report_menu.php">Back to Report Menu</a></br> <!--change href -->
        </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!--Update php code-->
    <?php
        session_start();
        require_once('../../config.php');
        require_once('../../validate_session.php');
        if (isset($_POST['Submit'])){

    
            /**
             * Grab information from the form submission and store values into variables.
             */
            $RID = isset($_POST['rid']) ? $_POST['rid'] : " ";  
            $PID = isset($_POST['pid']) ? $_POST['pid'] : " "; 
            $DDeviceID = isset($_POST['device_id']) ? $_POST['device_id'] : " "; 
            $RName = isset($_POST['rname']) ? $_POST['rname'] : " ";
            $RType = isset($_POST['rtype']) ? $_POST['rtype'] : " ";
            $RDesc = isset($_POST['rdesc']) ? $_POST['rdesc'] : " ";
            
            //Insert into Student table;
            
            $queryReport  = "INSERT INTO REPORT (RID, PID, DDeviceID, RName, RType, RDesc)
                        VALUES ('".$RID."', '".$PID."', '".$DDeviceID."', '".$RName."' , '".$RType."', '".$RDesc."');";

            // The query sent to the DB can be printed by not commenting the following row
            //echo $queryStudent;
            if ($conn->query($queryReport) === TRUE) {
            echo "<br> New record created successfully for Report id ".$RID;
            } else {
                echo "<br> The record was not created, the query: <br>" . $queryReport . "  <br> Generated the error <br>" . $conn->error;
            }

            // To redirect the page to the student menu right after the query is executed, use the following statement 
            // header("Location: student_menu.php");
}
?>


</body>

</html>