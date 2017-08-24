<?php include('includes/header.php');?>

<!--Login-->
<?php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

echo <<<_END
<div>
<form action="authenclient.php" method="POST" onsubmit=" validate_matching();" style="margin-top: 15%">
    <h1>Login</h1>
<div>
 <label for="universityid"><b>University ID: </b></label>
<input type="text" name="universityid" id="universityid">
</div>
<div>
    <label for="passwordd"><b>Password: </b></label>
<input type="password" id="password" name="password" onkeyup="showHint()">
</div>
<p><span id="txtHint"></span></p>
<div>
  <input type="submit" value="Login" style="margin-left: 4%"\> 
</div>
</form>
</div>
<form method="post" action="registernewuser.php">
<div>
  <input type="submit" value="Register" id="register"\> 
</div>
</form>
_END;
?>
<?php include('includes/footer.php');?>