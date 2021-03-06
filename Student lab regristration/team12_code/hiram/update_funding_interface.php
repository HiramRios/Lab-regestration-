<?php
session_start();
require_once('../../config.php');
require_once('../../validate_session.php');


if (isset($_GET['FdID'])) {
    $sid = $_GET['FdID'];
    $sql = "SELECT * FROM funding where FdID = $sid";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
}
else {
    echo "No user id received on request at update_student_interface get";
    die();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS4342 Funding Update</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
<div style="margin-top: 20px" class="container">
    <h1>Update User</h1>
    <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
    <!-- Displaying a form with the information of the user so values can be modified
         Note that the ID is not shown to be modified, only other attributes. -->

    <form action="update_funding.php" method="post">
        <input type="hidden" name="FdID" id="FdID" value="<?php echo $row['FdID'] ?>">
        <div class="form-group">
            <label for="FdGrantName">Funding Grant Name</label>
            <input class="form-control" type="text" id="FdGrantName" name="FdGrantName" value="<?php echo $row['FdGrantName'] ?>">
        </div>


        <div class="form-group">
            <input class="btn btn-primary" name='Submit' type="submit" value="Update">
        </div>
    </form>
    <div>
        <br>
        <a href="index.php">Back to  Menu</a></br>
    </div>

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
