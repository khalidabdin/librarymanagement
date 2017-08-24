<?php include('includes/headerdash.php');?>

<?php 
  session_start();
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);

  if ($conn->connect_error) die($conn->connect_error);

  if (isset($_POST['delete']))
  {
    $_POST['ids'];
    foreach($_POST['ids'] as $book) { 
    $query  = "DELETE FROM books WHERE isbn=$book";
    $result = $conn->query($query);
    if (!$result) echo "DELETE failed: $query<br>" .
    $conn->error . "<br><br>";
  }
}

if (isset($_POST['author']) && isset($_POST['isbn']) && isset($_POST['title']) && isset($_POST['category']) && isset($_POST['edition']) && isset($_POST['publisher']) && isset($_POST['year_pub']) && isset($_POST['sub_name'])) {
     $author = get_post($connection, 'author');
     $isbn = get_post($connection, 'isbn');
     $title = get_post($connection, 'title'); 
     $category = get_post($connection, 'category'); 
     $edition = get_post($connection, 'edition'); 
     $publisher = get_post($connection, 'publisher');
     $year_pub = get_post($connection, 'year_pub'); 
     $sub_name = get_post($connection, 'sub_name');
     $query = "INSERT INTO books VALUES"."('$author', '$isbn', '$title', '$category', '$edition', '$publisher', '$year_pub', '$sub_name')"; 
     $result = $conn->query($query);   
     if (!$result) echo "INSERT failed: $query<br>" . $conn->error . "<br><br>";  
}

echo' 
<form action=" admindash.php" method="post" style= "margin-top: 5%">
<pre> Author <input type="text" name = "author">
ISBN <input type="text" name="isbn"> 
Title <input type="text" name="title"> 
Category <input type="text" name="category">
Edition <input type="text" name="edition">
Publisher <input type="text" name="publisher">
Year Published <input type="text" name="year_pub"> 
Sub Name <input type="text" name="sub_name"> 
<input type="submit" value="ADD RECORD"> </pre></form>';

  $query  = "SELECT * FROM books";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);
  $rows = $result->num_rows;

echo '<form action = "admindash.php" method="post"> <table> <thead> <tr><td>Author</td><td>ISBN</td><td>Title</td><td>Category</td><td>Edition</td><td> Publisher</td><td>Year Published</td><td>Sub Name</td> <td><input type="checkbox" onclick="check_all()"name="all"/></td></tr></thead> <tbody>';
for ($j = 0 ; $j < $rows ; ++$j)
  { echo '<tr>';
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    echo '<td>' . $row['Author'] . '</td>';
    echo '<td>' . $row['ISBN'] . '</td>';
    echo '<td>' . $row['Title'] . '</td>';
    echo '<td>' . $row['Category'] . '</td>';
    echo '<td>' . $row['Edition'] . '</td>';
    echo '<td>' . $row['Publisher'] . '</td>';
    echo '<td>' . $row['Year_Pub'] . '</td>';
    echo '<td> ' . $row['Sub_Name'] . '</td>';
    echo '<td> <input type="checkbox" name="ids[]" value=" ' . $row['ISBN'] . '"> </td>';
    echo '</tr>';
  }
 echo '<input type="submit" name="delete" value="DELETE"/> </form> ';
 echo '</tbody> </table>';
  $result->close();
  $conn->close();
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
?>

<?php include('dataanalytics1.php');?>
<?php include('dataanalytics2.php');?>
<?php include('dataanalytics3.php');?>
