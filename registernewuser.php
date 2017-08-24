<?php include('includes/header.php');?>
<!--New Registration--> 
<?php
echo'
<div>   
<form action="createuser.php" method="post" style="margin-top: 10%; maring-bottom: 10%" onsubmit=" validate_matching();">
    <h1><strong>Create a New Profile</strong></h1>
<div >
 <label for="fname">First Name:</label>
<input type="text" name="fname" id="fname" required>
</div>
<div >
 <label for="lname">Last Name:</label>
<input type="text" name="lname" id="lname" required>
</div>
    <div >
 <label for="universityid">University ID:</label>
<input type="text" name="universityid" id="universityid"  required>
</div>
<p><span id="txtHint"></span></p>
<div>
    <label for="password">Password:</label>
<input type="password" id="password" name="password" required>
</div>
<div>
  <input type="submit"  onkeyup="showhint()" value="Register" id="register"\> 
</div>
</form>
</div>'
?>

<?php include('includes/footer.php');?>