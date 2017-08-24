<?php
    ini_set("DISPLAY_ERRORS",0);
error_reporting(0);
     require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) 
      die($conn->connect_error);
 
  $subname = $_REQUEST['sub_name'];
  
  
  $query  = "SELECT * FROM books where Sub_Name like '%$subname%'";
  $result = $conn->query($query);
  if (!$result) die($conn->error);
  $rows = $result->num_rows;
  echo '<body> <div id="table_ajax"> <table> <thead> <tr> <td>';
  echo 'Author</td><td> ISBN </td>  <td> Title</td> <td> Category</td><td> Edition</td><td> Year Published</td></tr></thead> <tbody>';
  for ($j = 0 ; $j < $rows ; ++$j){ 
    echo '<tr>';
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);
     echo '<td>' . $row['Author'] . '</td>'; 
    echo '<td>' . $row['ISBN'] . '</td>';
    echo '<td>' . $row['Title'] . '</td>';
    echo '<td>'. $row['Category'] . '</td>';
    echo '<td>' . $row['Edition'] . '</td>';
    echo '<td>' . $row['Year_Pub'] . '</td>';
    echo '</tr>';
  }
 echo '</div> </tbody> </table>'; 
  $result->close();
  $conn->close();
?>
