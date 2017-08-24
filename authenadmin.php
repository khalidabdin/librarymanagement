<?php
  require_once 'login.php';
  $connection = new mysqli($hn, $un, $pw, $db);

  if ($connection->connect_error) die($connection->connect_error);

  $rec_ai = $_POST['adminid'];
  $rec_pw = $_POST['password'];
  if (isset($_POST['adminid']) && isset($_POST['password']))
{  
    $ai_temp = mysql_entities_fix_string($connection, $rec_ai);
    $pw_temp = mysql_entities_fix_string($connection, $rec_pw);
    $query = "SELECT * FROM administrator WHERE adminID like'$ai_temp'";
     
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
if ($token == $row[1]) 
		{
			session_start();
			$_SESSION['adminid'] = $ai_temp;
			$_SESSION['password'] = $pw_temp;
            header('Location:admindash.php');
		}
		else die("Invalid username/password combination");
        
        
	}
else die("Invalid username/password combination");
  
}
else
{
header('Location:adminLogin.php');    
  
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
