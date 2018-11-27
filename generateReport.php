<?php
require_once "support.php";

$bottomPart = "";
if (isset($_POST["submitInfoButton"]) || isset($_POST["submitInfo2"])) {
    $days = trim($_POST["days"]);
    //calculate the filter date
    $date = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d")-$days, date("Y")));

    require "dbLogin.php";

    //for pie chart
    $dataPoints = array();

    // Connect to the database.
    $db_connection = new mysqli($host, $user, $password, $database);

    if (isset($_POST["submitInfoButton"])){

    // Query the database for specific dates and properties +
    $query = "SELECT *,SUM(Severity) as total, Buildings.name as k FROM Buildings,records
              WHERE Buildings.code = records.code AND records.date >= $date
              GROUP BY records.code ORDER BY total desc
               ;";



    } else{

    // Query the database for specific dates and properties +
    $query = "SELECT *,COUNT(Illness) as total, records.Illness as k FROM Buildings,records
              WHERE Buildings.code = records.code AND records.date >= $date
              GROUP BY records.Illness ORDER BY total desc
               ;";


    }


    $bottomPart .= "<h2>Report</h2>";

    $bottomPart .= "<table border=\"1\">
        <tr>
          <th>Rank</th>
          <th>Building Code</th>
          <th>Building Name</th>
          <th>Total score</th>
        </tr>";

    $count = 1;
    $results = mysqli_query($db_connection, $query);
    // List entry of the query
    while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)) {
      $bottomPart .= "<tr><td>{$count}</td><td>{$row['Code']}</td><td>{$row['k']}</td><td>{$row['total']}</td></tr>";
      array_push($dataPoints,array("label"=> $row['k'], "y"=> $row['total']));
      $count ++;
     }

     // Close the connection.
    $db_connection->close();


    $bottomPart .="</tr></table><br><br>";
    $bottomPart .="<button type='button' onclick='pieChart()' class='mainOption btn-primary' style='margin: 5px'>More Information</button>";
    $bottomPart .= "<div id='chartContainer'style='height: 370px; width: 100%;'></div>
    <script src='https://canvasjs.com/assets/script/canvasjs.min.js'></script>";

}

$topPart = <<<EOBODY
		<form action="{$_SERVER["PHP_SELF"]}" method="post">
    <strong>Days back: </strong><input type="number" name="days" required /><br><br>
      <button type="submit" class="mainOption btn-primary" name="submitInfoButton" style="margin: 5px">Generate Building Stats</button>
      <button type="submit" class="mainOption btn-primary" name="submitInfo2" style="margin: 5px">Generate Illness Report</button>
      <button type="button" class="mainOption btn-primary" onclick="location.href = 'index.html';" name="back" style="margin: 5px">
            <a href="index.html" style="text-decoration: none; color: #fff;">Home</a>
      </button>

      <br><br>
		</form>
EOBODY;
$body = $topPart . $bottomPart;

$page = generatePage($body);
echo $page;
?>

 <script>
      function pieChart() {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            title:{
                text: "SickSense Statistaics"
            },
            subtitles: [{
                text: "More info for the report "
            }],
            data: [{
                type: "pie",
                showInLegend: "true",
                legendText: "{label}",
                indexLabelFontSize: 16,
                indexLabel: "{label} - #percent%",
                yValueFormatString: "฿#,##0",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

        }
   </script>
