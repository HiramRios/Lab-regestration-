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
    $sql = "SELECT * FROM DEVICE_ISSUED where  DDeviceID = $DDeviceID"; //UPDATE
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
}
else {
    echo "No Student id received on request at update_device_interface get";
    die();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS4342 Device Update Interface</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Update Device</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <form action="update_device.php" method="post">
            <input type="hidden" name="DDeviceID" id="DDeviceID" value="<?php echo $row['DDeviceID'] ?>">
            <div class="form-group">
                <label for="borrow">Date Borrow (Enter in the form of YYYY-MM-DD) </label>
                <input class="form-control" type="text" id="borrow" name="borrow" value="<?php echo $row['DDateBorrow'] ?>">
            </div>
            <div class="form-group">
                <label for="return">Date Return (Enter in the form of YYYY-MM-DD) </label>
                <input class="form-control" type="text" id="return" name="return" value="<?php echo $row['DDateReturn'] ?>">
            </div>
            <div class="form-group">
                <label for="name">Device Name</label>
                <input class="form-control" type="text" id="name" name="name" value="<?php echo $row['DName'] ?>">
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