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
    <title>CS4342 Create Device</title><!--Change Title -->

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Create Device</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <form action="create_device.php" method="post">  <!--CHANGE ACTION-->
        <div class="form-group">
                <label for="id">ID</label> <!--CHANGE for= -->
                <input class="form-control" type="text" id="id" name="id"> <!--CHANGE id= and name=-->
            </div>
            <div class="form-group">
                <label for="borrow">Date Borrowed (Enter in the form of YYYY-MM-DD)</label> <!--CHANGE for= -->
                <input class="form-control" type="text" id="borrow" name="borrow"> <!--CHANGE id= and name=-->
            </div>
            <div class="form-group">
                <label for="return">Date Returned (Enter in the form of YYYY-MM-DD)</label>
                <input class="form-control" type="text" id="return" name="return">
            </div>
            <div class="form-group">
                <label for="device_name">Device Name</label>
                <input class="form-control" type="text" id="device_name" name="device_name">
            </div>
            
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
            </div>
        </form>
        <div>
            <br>
            <a href="device_menu.php">Back to Device Menu</a></br> <!--change href -->
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
            $DDeviceID = isset($_POST['id']) ? $_POST['id'] : " ";  
            $DDateBorrow = isset($_POST['borrow']) ? $_POST['borrow'] : " ";
            $DDateReturn = isset($_POST['return']) ? $_POST['return'] : " ";
            $DName = isset($_POST['device_name']) ? $_POST['device_name'] : " ";
            
            //Insert into Student table;
            
            $queryDevice  = "INSERT INTO DEVICE_ISSUED (DDeviceID, DDateBorrow, DDateReturn, DName)
                        VALUES ('".$DDeviceID."', '".$DDateBorrow."', '".$DDateReturn."', '".$DName."');";

            // The query sent to the DB can be printed by not commenting the following row
            //echo $queryStudent;
            if ($conn->query($queryDevice) === TRUE) {
            echo "<br> New record created successfully for Device id ".$DDeviceID;
            } else {
                echo "<br> The record was not created, the query: <br>" . $queryDevice . "  <br> Generated the error <br>" . $conn->error;
            }

            // To redirect the page to the student menu right after the query is executed, use the following statement 
            // header("Location: student_menu.php");
}
?>


</body>

</html>