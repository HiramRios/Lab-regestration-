
<?php
session_start();
require_once('../../config.php');
require_once('../../validate_session.php');


if (isset($_GET['FdAmount'])) {
    $sid = $_GET['FdAmount'];
    $sql = "SELECT * FROM Amount where FdAmount = $sid";
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
    <title>CS4342 Amount Update</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
<div style="margin-top: 20px" class="container">
    <h1>Update Amount</h1>
    <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
    <!-- Displaying a form with the information of the user so values can be modified
         Note that the ID is not shown to be modified, only other attributes. -->

    <form action="update_fundingcus.php" method="post">
        <input type="hidden" name="FdGrantName" id="FdGrantName" value="<?php echo $row['FdGrantName'] ?>">
        <div class="form-group">
            <label for="FdAmount">Amount</label>
            <input class="form-control" type="text" id="FdAmount" name="FdAmount" value="<?php echo $row['FdAmount'] ?>">
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
