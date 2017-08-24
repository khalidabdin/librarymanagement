<?php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
$query  = "SELECT publisher, COUNT(*) as cnt FROM books GROUP BY publisher";
$result = $conn->query($query);
?>

<?php
  require_once 'login.php';
  $conn2 = new mysqli($hn, $un, $pw, $db);
  if ($conn2->connect_error) die($conn2->connect_error);
$query2  = "SELECT publisher, COUNT(*) as cnt2 FROM borrowed_books GROUP BY publisher";
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
      ['books', 'publisher'],
      <?php
      if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "['".$row['publisher']."', ".$row['cnt']."],";
          }
      }
      ?>
    ]);
    
    var options = {
        title: 'Fig5: Percentage of the Books based on Publishers',
        width: 500,
        height: 350,
        pieHole: 0.4,
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    
    chart.draw(data, options);
}
    
    function drawChart1() {

    var data = google.visualization.arrayToDataTable([
      ['borrowed_books', 'publisher'],
      <?php
      if($result2->num_rows > 0){
          while($row = $result2->fetch_assoc()){
            echo "['".$row['publisher']."', ".$row['cnt2']."],";
          }
      }
      ?>
    ]);
    
    var options = {
        title: 'Fig6: Percentage of the Borrowed Books based on Publishers',
        width: 500,
        height: 350,
        pieHole: 0.4,
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('donutchart2'));
    
    chart.draw(data, options);
}
</script>
</head>
<body>
    <table class="columns" style="margin-top: 5%">
      <tr>
    <!-- Display the pie chart -->
    <td><div id="donutchart" style="border: 1px solid #ccc"></div></td>
    <td><div id="donutchart2" style="border: 1px solid #ccc"></div></td>
        </tr>
    </table>
</body>
</html>

<?php
$result->close();
$conn->close();
?>