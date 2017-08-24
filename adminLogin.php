<?php include('includes/header.php');?>
<?php

echo <<<_END

<div>

<form action="authenadmin.php" method="post" style="margin-top: 15%">
<div id="add_err2"></div>
    <h1>Login</h1>

<div>
 <label for="adminid"><b>Administrator ID: </b></label>
<input type="text" name="adminid" id="adminid">
</div>
<div>
    <label for="password"><b>Password: </b></label>
<input type="password" id="password" name="password">
</div>
<div>
  <input type="submit" id ="login" name ="login" value="Login" \> 
</div>
</form>
</div>
_END;

?>

<?php include('includes/footer.php');?>