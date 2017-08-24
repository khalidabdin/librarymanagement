<?php include('includes/headerdash.php');?>

<?php
  session_start();  
 if (isset($_POST['universityid']) && isset($_POST['password']))
     {
      $_SESSION['universityid'] = $_POST['universityid'];
      $_SESSION['password'] = $_POST['password'];
      $query = "SELECT * FROM client_ident where universityid = '$universityid'";
      $result = $conn->query($query);
      $row = $result->fetch_array(MYSQLI_NUM);
      if($rows >= 1){
       $_SESSION['fname'] = $rows['fname'];
       $_SESSION['lname'] = $rows['lname'];
       $universityid = $_SESSION['universityid'];;
       $password = $_SESSION['password'];
       echo "Welcome '$fname' '$lname'"; }
       else // not logged-in
       echo "Please <a href='clientLogin.php'>click here</a> to log in.";
   }


require_once 'borrowbook.php';
?>

<?php
echo'
   <div class="SearchBar" style="margin-top: 8%">
     <form name="ajax" onsubmit="return false;">
       <input type="text" placeholder="Book Titles.." required name="sub_name" id="sub_name" onkeyup="searchtitle();">
     </form>
  </div>
 ';
require_once 'table_div1.php';
?>


