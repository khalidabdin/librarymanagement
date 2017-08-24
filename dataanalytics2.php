<?php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
$query  = "SELECT author, COUNT(*) as cnt FROM books GROUP BY author";
$result = $conn->query($query);
?>

<?php
  require_once 'login.php';
  $conn2 = new mysqli($hn, $un, $pw, $db);
  if ($conn2->connect_error) die($conn2->connect_error);
$query2  = "SELECT author, COUNT(*) as cnt2 FROM borrowed_books GROUP BY author";
$result2 = $conn2->query($query2);
?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
google.charts.setOnLoadCallback(drawChart1);
function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['books', 'author'],
      <?php
      if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "['".$row['author']."', ".$row['cnt']."],";
          }
      }
      ?>
    ]);
    
    var options = {
        title: 'Fig3: Percentage of the Books based on Authors',
        width: 500,
        height: 350,
    };
    
    var chart = new google.visualization.BarChart(document.getElementById('barchart'));
    
    chart.draw(data, options);
}
    function drawChart1() {

    var data = google.visualization.arrayToDataTable([
      ['borrowed_books', 'author'],
      <?php
      if($result2->num_rows > 0){
          while($row = $result2->fetch_assoc()){
            echo "['".$row['author']."', ".$row['cnt2']."],";
          }
      }
      ?>
    ]);
    
    var options = {
        title: 'Fig4: Percentage of the Borrowed Books based on Authors',
        width: 500,
        height: 350,
    };
    
    var chart = new google.visualization.BarChart(document.getElementById('barchart2'));
    
    chart.draw(data, options);
}
</script>
</head>
<body>
    <table class="columns" style="margin-top: 5%">
      <tr>
    <!-- Display the pie chart -->
    <td><div id="barchart" style="border: 1px solid #ccc"></div></td>
    <td><div id="barchart2" style="border: 1px solid #ccc"></div></td>
        </tr>
    </table>
</body>
</html>

<?php
$result->close();
$conn->close();
?>