<?php
  require_once 'login.php';
  $connection = new mysqli($hn, $un, $pw, $db);
  if ($connection->connect_error) die($connection->connect_error);
  $rec_ui = $_POST['universityid'];
  $rec_pw = $_POST['password'];
  if (isset($_POST['universityid']) && isset($_POST['password']))
{  
    $ui_temp = mysql_entities_fix_string($connection, $rec_ui);
    $pw_temp = mysql_entities_fix_string($connection, $rec_pw);
    $query = "SELECT * FROM client_ident WHERE universityid like'$ui_temp'";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    elseif ($result->num_rows)
	{
		$row = $result->fetch_array(MYSQLI_NUM); 
		$result->close();
		$salt1 = "qm&h*";
		$salt2 = "pg!@";
        $token = hash('ripemd128', "$salt1$pw_temp$salt2");
        echo $token;
        echo '<br>'.$row[1];
        echo '<br>';
        echo $token;
    if ($token == $row[1]) {
        session_start();
        $_SESSION['universityid'] = $ui_temp;
        $_SESSION['password'] = $pw_temp;
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        header('Location:continue.php');
    }
    else die("Invalid username/password combination");  
    }
else die("Invalid username/password combination");
}
else
{
header('Location:clientLogin.php');    
$connection->close();
}
function mysql_entities_fix_string($connection, $string)
{
    return htmlentities(mysql_fix_string($connection, $string));
}	
function mysql_fix_string($connection, $string)
{
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return $connection->real_escape_string($string);
}
?> 