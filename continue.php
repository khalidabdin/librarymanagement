<?php
session_start();
if (isset($_SESSION['universityid'])) { 
      $universityid = $_SESSION['universityid'];
      $password = $_SESSION['password'];
      $fname = $_SESSION['fname'];
      $lname  = $_SESSION['lname'];
      destroy_session_and_data();
      echo "Welcome back '$forename'"; 
  }
else {
    echo "Please <a href='authenclient.php'>click here</a> to log in.";
    }
function destroy_session_and_data()
  {
    $_SESSION = array();
    setcookie(session_name(), '', time() - 1, '/');
    session_destroy();
  }
?>
