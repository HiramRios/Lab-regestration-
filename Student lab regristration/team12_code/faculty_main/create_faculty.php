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
    <title>CS4342 Create Faculty</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Create Faculty</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <form action="create_faculty.php" method="post">
            <div class="form-group">
                <label for="rmail">Email</label>
                <input class="form-control" type="text" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input class="form-control" type="text" id="first_name" name="first_name">
            </div>
            <div class="form-group">
                <label for="middle_name">Middle Name</label>
                <input class="form-control" type="text" id="middle_name" name="middle_name">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input class="form-control" type="text" id="last_name" name="last_name">
            </div>
            
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
            </div>
        </form>
        <div>
            <br>
            <a href="faculty_main_menu.php">Back to Faculty Menu</a></br>
        </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    
    
    <?php
        session_start();
        require_once('../../config.php');
        require_once('../../validate_session.php');
        if (isset($_POST['Submit'])){

    
            /**
             * Grab information from the form submission and store values into variables.
             */
            $FEmail = isset($_POST['email']) ? $_POST['email'] : " ";  
            $FFirstName = isset($_POST['first_name']) ? $_POST['first_name'] : " ";
            $FMiddleName = isset($_POST['middle_name']) ? $_POST['middle_name'] : " ";
            $FLastName = isset($_POST['last_name']) ? $_POST['last_name'] : " ";
            
            //Insert into Student table;

            if($FMiddleName){
                $FFullName = $FFirstName." ".$FMiddleName." ".$FLastName;

                $query_faculty  = "INSERT INTO Faculty (FEmail,FFullName,FFirstName,FMiddleName,FLastName)
                VALUES ('".$FEmail."', '".$FFullName."', '".$FFirstName."', '".$FMiddleName."', '".$FLastName."');";
            }
            else {
                $FFullName = $FFirstName." ".$FLastName;

                $query_faculty  = "INSERT INTO Faculty (FEmail,FFullName,FFirstName,FLastName)
                VALUES ('".$FEmail."', '".$FFullName."', '".$FFirstName."','".$FLastName."');";
            }

            // The query sent to the DB can be printed by not commenting the following row
            //echo $query_faculty;
            if ($conn->query($query_faculty) === TRUE) {
            echo "<br> New record created successfully for faculty email ".$FEmail;
            } else {
                echo "<br> The record was not created, the query: <br>" . $query_faculty . "  <br> Generated the error <br>" . $conn->error;
            }

            // To redirect the page to the student menu right after the query is executed, use the following statement 
            // header("Location: student_menu.php");
}
?>


</body>

</html>