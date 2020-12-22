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


<?php
session_start();
require_once('../../config.php');
require_once('../../validate_session.php');

if (isset($_GET['DDeviceID'])) {
    $DDeviceID = $_GET['DDeviceID'];
    $SID = $_GET['SID'];
    $RID = $_GET['RID'];
    $sql = "SELECT * FROM DEVICE where  DDeviceID = $DDeviceID AND SID = $SID AND RID = $RID"; //UPDATE
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
}
else {
    echo "No Student id received on request at update_devrepstu_interface get";
    die();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS4342 Device SID and RID Update</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Update Device Row</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <form action="update_devrepstu.php" method="post">
            <input type="hidden" name="device_id" id="device_id" value="<?php echo $row['DDeviceID'] ?>">
            <input type="hidden" name="student_id" id="student_id" value="<?php echo $row['SID'] ?>">
            <input type="hidden" name="report_id" id="report_id" value="<?php echo $row['RID'] ?>">
            <div class="form-group">
                <label for="sid">Student ID (Student ID must already exist in the system) </label>
                <input class="form-control" type="text" id="sid" name="sid" value="<?php echo $row['SID'] ?>">
            </div>
            <div class="form-group">
                <label for="rid">Report ID (Report ID must already exist in the system) </label>
                <input class="form-control" type="text" id="rid" name="rid" value="<?php echo $row['RID'] ?>">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Update">
            </div>
        </form>
        <div>
            <br>
            <a href="device_menu.php">Back to Device Menu</a></br>
        </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>