<html>
<head>
    <title>Weight Tracker</title>
</head>
<body>
<?php
include_once ("../masterpage/header.php");

$hostname = 'localhost';
$username = 'root';
$password = '';
$_database = 'ecommerce';
$entry="";
//connect to database
$conn = mysqli_connect($hostname, $username, $password,$_database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//select database
//execute query
$result = mysqli_query($conn," SELECT name,(SELECT COUNT(DISTINCT user_id) AS Expr1 FROM mywishlist WHERE (product_id = temp.id)) AS Total_likes FROM product AS temp");
//fetch data
while ($row = mysqli_fetch_array($result)) {
    $entry .= "['".$row['name']."',".$row['Total_likes']."],";
}
//close the connection
mysqli_close($conn);
?>

<div id="chart_div" style="width: 40%; height: 500px; display: inline-block;"></div>
<div id="chart_div2" style="width: 40%; height: 500px; display: inline-block;"></div>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Number of likes',  'Product Name'],
        <?php echo $entry ?>
    ]);
        var options = {
            title: 'Line chart of liked products',
            legend: { position: 'bottom' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
        var data2 = google.visualization.arrayToDataTable([
        ['Number of likes',  'Product Name'],
        <?php echo $entry ?>
    ]);
        var options2 = {
            title: 'Pie chart of liked products',
            legend: { position: 'bottom' }
        };
        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart.draw(data2, options2);
    }
    
</script>

</body>
</html>