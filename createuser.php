<?php 
  require_once 'login.php';
 
     if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['universityid']) && isset($_POST['password'])) {
         
     $fname = get_post($connection, $_POST['fname']);
     $lname = get_post($connection, $_POST['lname']); 
     $universityid = get_post($connection, $_POST['universityid']); 
     $password = get_post($connection, $_POST['password']);
     $salt1 = "qm&h*";
     $salt2 = "!%#@";
     $token = hash('ripemd128', "$salt1$password$salt2");
     $query  = "INSERT INTO client_ident(fname, lname, universityid, password) VALUES('$fname', '$lname', '$universityid', '$token')"; 
     $result = $connection -> query($query);   
     if (!$result) {echo "INSERT failed: $query<br>". $connection->error . "<br><br>";
            header('Location:registernewuser.php');
            }else{
             echo "this has been inserted";
            header('Location:clientdash.php');
         } 
     $unID = 'SELECT universityid FROM `client_ident WHERE universityid = "'.$universityid.'"`';
     $result2 = $connection -> query($unID);
    if (!$result2) {echo "INSERT failed: $query<br>". $connection->error . "<br><br>";
    $rows = $result2->num_rows;
    $hint = "University ID already exists login to your account";
    if ($rows == 1)
        $hint = "ok";
    echo $hint;
    }
} 
 $connection -> close();
 function get_post($connection, $var) {    
     return $connection -> real_escape_string($var);
  }
function mysql_entities_fix_string($string)
  {
    return htmlentities(mysql_fix_string($string));
  }	

  function mysql_fix_string($string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return $connection->real_escape_string($string);
  }
                  
?> 