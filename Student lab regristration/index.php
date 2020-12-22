<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 * Include your name here - ex. Modified by Villanueva for Assignment 2
 */
-->

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CS 4342 User Login</title>

  <!-- Bootstrap CSS library https://getbootstrap.com/ -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body style="background-color:orange;">
  <div style="margin-top: 20px" class="container">
    
    <h1 style="color:blue;" >DATA MINERS User Login</h1>
    <form action="index.php" method="post">
      <div class="form-group">
        <label for="username">UserName / Email</label>
        <input class="form-control" type="text" id="UserName" name="UserName">
      </div>
      <div class="form-group">
        <label for="password">ID</label>
        <input class="form-control" type="password" id="ID" name="ID">
      </div>

        <!-- Used to see if it is either a student or a faculty member-->
      <label class="radio-inline">
        <input name='Faculty-Student' type="radio" value="Faculty">
        <label for="Faculty">Faculty</label>
      </label>
      <label class="radio-inline">
        <input name='Faculty-Student' type="radio" value="Student" required>
        <label for="Student">Student</label>
      </label>

      <div class="form-group">
        <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
      </div>
    </form>
  </div>

  <!-- jQuery and JS bundle w/ Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>

</html>


<?php

session_start();
require_once("config.php");
$_SESSION['logged_in'] = false;

if (!empty($_POST)) {
  if (isset($_POST['Submit'])) {
    
    $user = $_POST['Faculty-Student'];
    //echo $user;
    //echo "<br>";

    if ($user == "Faculty") {
      echo "it is a faculty member!";
      $input_FacultyEmail = isset($_POST['UserName']) ? $_POST['UserName'] : " ";
      //$input_id = isset($_POST['ID']) ? $_POST['ID'] : " ";
  
      $queryUser = "SELECT * FROM FACULTY  WHERE FEmail='" . $input_FacultyEmail . "';";
      echo $queryUser;
      $resultUser = $conn->query($queryUser);
      
      if ($resultUser->num_rows > 0) {
        //if there is a result, that means that the user was found in the database
        $_SESSION['user'] = $input_FacultyEmail;
        $_SESSION['logged_in'] = true;
        
        echo "Session logged_in is: ".$_SESSION['logged_in'];
        
        // You can comment the next line (header) to check if the user was successfully logged in. 
        // But it will not redirect to the student_menu file automatically.
  
        //this could be a main menu
        header("Location: team12_code/faculty_main/faculty_main_menu.php");
      }
      die();
    }
    
    // for the student
    if ($user == "Student") {

      $input_studentName = isset($_POST['UserName']) ? $_POST['UserName'] : " ";
      $input_id = isset($_POST['ID']) ? $_POST['ID'] : " ";

      $queryUser = "SELECT * FROM STUDENT  WHERE SName='" . $input_studentName . "' AND SID ='" . $input_id . "';";
      $resultUser = $conn->query($queryUser);
    
     if ($resultUser->num_rows > 0) {
       //if there is a result, that means that the user was found in the database
       $_SESSION['user'] = $input_studentName;
        $_SESSION['logged_in'] = true;
      
        echo "Session logged_in is: ".$_SESSION['logged_in'];
      
       // You can comment the next line (header) to check if the user was successfully logged in. 
       // But it will not redirect to the student_menu file automatically.

       //this could be a main menu
       header("Location: team12_code/main_menu.php");
      }
      // else {
      //   echo "Student was not found.";
      // }
      die();
    }
    else {
      die();
    }
  }//end of the submit button post
}
?>