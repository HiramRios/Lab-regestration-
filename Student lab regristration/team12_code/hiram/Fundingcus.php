<?php
/*
* Reference for tables: https://getbootstrap.com/docs/4.5/content/tables/
*/

session_start();
require_once('../../config.php');
require_once('../../validate_session.php');
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS4342 Create User Account</title>

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
    <h1>Funding Amount  </h1>
    <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
    <form action=" " method="post">
        <div class="form-group">
            <label for="FdGrantName">Funding Name  </label>
            <input class="form-control" type="text" id="FdGrantNameName" name="FdGrantName">
        </div>

        <div class="form-group">
            <label for="FdAmount">Funding Amount </label>
            <input class="form-control" type="text" id="FdAmount" name="FdAmount">
        </div>

        <div class="form-group">
            <input class="btn btn-secondary" name='Submit' type="submit" value="Submit">
        </div>
    </form>
    <div>

    </div>


    <?php


    if (isset($_POST['Submit'])){


        /**
         * Grab information from the form submission and store values into variables.
         */

        $SName = isset($_POST['FdGrantName']) ? $_POST['FdGrantName'] : " ";
        $SAmount = isset($_POST['FdAmount']) ? $_POST['FdAmount'] : " ";

        //Insert into Student table;

        $queryAmount  = "INSERT INTO amount (FdGrantName, FdAmount)
                        VALUES ('".$SName."', '".$SAmount."');";


        // The query sent to the DB can be printed by not commenting the following row
        //echo $queryStudent;
        if ($conn->query($queryAmount) === TRUE) {




        } else {
            echo "<br> The record was not created, the query: <br>" . $queryAmount . "  <br> Generated the error <br>" . $conn->error;
        }

        // To redirect the page to the student menu right after the query is executed, use the following statement

    }
    ?>


    <?php $sql = "SELECT * FROM amount";
    if ($result = $conn->query($sql)) {
        ?>
        <table class="table table-striped" width=50%>
            <thead>
            <td> FdGrantName </td>
            <td> FdAmount </td>


            </thead>
            <tbody>
            <?php
            while ($row = $result->fetch_row()) {
                ?>
                <tr>
                    <td><?php printf("%s", $row[0]); ?></td>
                    <td><?php printf("%s", $row[1]); ?></td>


                    <td><a href="update_fundingcus_interface.php?FdAmount=<?php echo $row[1] ?>">Update</a></td>
                    <td><a href="delete_fundingCuz.php?FdAmount=<?php echo $row[1] ?>">Delete</a></td>
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




    <br>
    <a style="color:  #808080" href="../main_menu.php">Return to the back pages </a></br>

</div>
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>




</body>

</html>
<?php

