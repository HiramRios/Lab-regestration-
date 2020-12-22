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
    <title>CS4342 Find Report with Student Internship</title><!--Change Title -->

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Find Report with associated Student Interruptions</h1>
        <h5 style="color:red;">Note* Records not found will display a table with no rows</h5>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <form action="search_r6.php" method="post">  <!--CHANGE ACTION-->
        <div class="form-group">
                <label for="report_id">Report ID (Must Exist in the system)</label> <!--CHANGE for= -->
                <input class="form-control" type="text" id="report_id" name="report_id"> <!--CHANGE id= and name=-->
            </div>
            <div class="form-group">
                <label for="did">Device ID (Must Exist in the system)</label> <!--CHANGE for= -->
                <input class="form-control" type="text" id="did" name="did"> <!--CHANGE id= and name=-->
            </div>
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
            </div>
        </form>
 
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
            $RID = isset($_POST['report_id']) ? $_POST['report_id'] : " ";  
            $DDeviceID = isset($_POST['did']) ? $_POST['did'] : " ";

            $con=mysqli_connect("ilinkserver.cs.utep.edu","aazambrano2","dataMiners!@4342","f20pm_team12");
            // Check connection
            if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
           
            
            //output table
            
            $queryReport  = mysqli_query($con,"SELECT * FROM REPORT, INTERNSHIPS WHERE SID = (SELECT SID FROM DEVICE WHERE DDeviceID = $DDeviceID) AND RID = $RID");
            ?>
            <table class="table" width=50%>
                <thead>
                    <td> Report_ID</td>
                    <td> Project_ID</td>
                    <td> Device_ID</td>
                    <td> Report_Name </td>
                    <td> Report_Type</td>
                    <td> Report_Description </td>
                    <td> Student_ID </td>
                    <td> Internship </td>
                </thead>
                <tbody>
                    <?php
                    while ($table = mysqli_fetch_array($queryReport)) {
                    ?>
                        <tr>
                        <td><?php printf("%s", $table[0]); ?></td>
                            <td><?php printf("%s", $table[1]); ?></td>
                            <td><?php printf("%s", $table[2]); ?></td>
                            <td><?php printf("%s", $table[3]); ?></td>
                            <td><?php printf("%s", $table[4]); ?></td>
                            <td><?php printf("%s", $table[5]); ?></td>
                            <td><?php printf("%s", $table[6]); ?></td>
                            <td><?php printf("%s", $table[7]); ?></td>
                            <br>
                            <br>
                            <br>
                        </tr>
                    <?php
                        }
                      
                    ?>
                </tbody>
            </table>
        <?php
        }
        ?>
        <!-- Link to return to student_menu-->
        <a href="report_menu.php">Back to Report Menu</a><br>
        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>