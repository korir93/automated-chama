<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
$session = $_SESSION['username'];
$conn = mysqli_connect('localhost','root','','mychama');
/*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
$result = mysqli_query($conn,'select * from mychama_users where email = "'.$session.'"') or die(mysqli_error($conn));
while ($row=mysqli_fetch_assoc($result)) {
    $names=$row['g_name'];
}}
else{
  header("refresh: 0.1; url=login.php");
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Graph</title>
</head>
<body>
  <br><br>
  <center>
    <a href="deposit.php" class="btn btn-default btn-sm">back</a>
  </center>
  <div id="visualization" style="width: 100%; height: 500px;"></div>
  <?php
  $conn=mysqli_connect('localhost','root','','mychama') or die(mysql_error());
  /*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
  $result = mysqli_query($conn,"select * from payments where chama = '".$session."'") or die(mysqli_error($conn));
  $num_results = $result->num_rows;
  if( $num_results > 0){
  ?>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['corechart']});
    </script>
    <script type="text/javascript">
        function drawVisualization() {
          var data = google.visualization.arrayToDataTable([
            ['PL', 'Ratings'],
            <?php
              while( $row = $result->fetch_assoc() ){
                extract($row);
                echo "['Kshs $payment_gross - $item_name - $name', {$payment_gross}],";
              }
            ?>
          ]);
          new google.visualization.PieChart(document.getElementById('visualization')).
          draw(data, {title:"<?php echo $names. "'s group conrtibutions"; ?>"});
        }
        google.setOnLoadCallback(drawVisualization);
    </script>
  <?php
    }else{
        echo "Empty database.";
    }
  ?>
</body>
</html>