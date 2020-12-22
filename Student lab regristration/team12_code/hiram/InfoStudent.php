<?php


session_start();
require_once('../../config.php');
require_once('../../validate_session.php');
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS4342 All student info</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>









<body>

<nav class="navbar navbar-dark bg-dark">
    <ul class="nav nav-pills mb-3 sm-white">
        <li class="nav-item">
            <a style="color: #FFFFFF" class="nav-link " href="student.php">Student</a>
        </li>
        <li class="nav-item">
            <a style="color: #FFFFFF" class="nav-link " href="Funding.php">Funding</a>
        </li>
        <li class="nav-item">
            <a style="color: #FFFFFF" class="nav-link" href="studentCus.php">Student Custom</a>
        </li>
        <li class="nav-item">
            <a style="color: #FFFFFF" class="nav-link " href="Fundingcus.php">Funding Custom</a>
        </li>
        <li class="nav-item">
            <a style="color: #FFFFFF" class="nav-link " href="InfoStudent.php">Student info</a>
        </li>
    </ul>
</nav>




<div style="background-color:#eceff1">



<div style="margin-top: 20px" class="container">
    <h1>Student Info  </h1>
    <br>
    <br>
    <br>

    <h2>Students Information   </h2>


    <?php $sql = "SELECT * FROM r11";
    if ($result = $conn->query($sql)) {
        ?>
        <table class="table table-striped" width=50%>
            <thead>
            <td> Name</td>
            <td> Awards </td>
            <td> Publications </td>
            <td> Internships </td>


            </thead>
            <tbody>
            <?php
            while ($row = $result->fetch_row()) {
                ?>
                <tr>
                    <td><?php printf("%s", $row[0]); ?></td>
                    <td><?php printf("%s", $row[1]); ?></td>
                    <td><?php printf("%s", $row[2]); ?></td>
                    <td><?php printf("%s", $row[3]); ?></td>



                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
    }
    ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h2>Students Funds and Grants Amount </h2>
    <?php $sql = "SELECT * FROM r12";
    if ($result = $conn->query($sql)) {
        ?>
        <table class="table table-striped" width=50%>
            <thead>
            <td> Name</td>
            <td> Id </td>
            <td> Amount </td>



            </thead>
            <tbody>
            <?php
            while ($row = $result->fetch_row()) {
                ?>
                <tr>
                    <td><?php printf("%s", $row[0]); ?></td>
                    <td><?php printf("%s", $row[1]); ?></td>
                    <td><?php printf("%s", $row[2]); ?></td>



                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
    }
    ?>











    <br>
    <a style="color:  #808080" href="../main_menu.php">Return to the back pages </a></br>
</div>
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>




</body>

</html>
<?php

