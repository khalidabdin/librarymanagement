<?php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
$query  = "SELECT category, COUNT(*) as cnt FROM books GROUP BY category";
$result = $conn->query($query);
?>

<?php
  require_once 'login.php';
  $conn2 = new mysqli($hn, $un, $pw, $db);
  if ($conn2->connect_error) die($conn2->connect_error);
  $query2  = "SELECT category, COUNT(*) as cnt FROM borrowed_books GROUP BY category";
  $result2 = $conn->query($query2);
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
      ['books', 'category'],
      <?php
      if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "['".$row['category']."', ".$row['cnt']."],";
          }
      }
      ?>
    ]);
    
    var options = {
        title: 'Fig1: Percentage of the Books based on Category',
        width: 500,
        height: 350,
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    
    chart.draw(data, options);
}
    
function drawChart1() {

    var data = google.visualization.arrayToDataTable([
      ['borrowed_books', 'category'],
      <?php
      if($result2->num_rows > 0){
          while($row = $result2->fetch_assoc()){
            echo "['".$row['category']."', ".$row['cnt']."],";
          }
      }
      ?>
    ]);
    
    var options = {
        title: 'Fig2: Percentage of the Books Borrowed based on Category',
        width: 500,
        height: 350,
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
    
    chart.draw(data, options);
}
</script>
</head>
<body>
    <table class="columns" style="margin-top: 5%">
      <tr>
    <!-- Display the pie chart -->
    <td><div id="piechart" style="border: 1px solid #ccc"></div></td>
    <td><div id="piechart3" style="border: 1px solid #ccc"></div></td>
        </tr>
    </table>
</body>
</html>
<?php
$result->close();
$conn->close();
?>