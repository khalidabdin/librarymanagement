 <?php

 function destroy_session_and_data()
  {
    $_SESSION = array();
    setcookie(session_name(), '', time() - 255900, '/');
    session_destroy();
 }

header("location:index.php");
?>