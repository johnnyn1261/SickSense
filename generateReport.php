<?php
require_once "support.php";

$bottomPart = "";
if (isset($_POST["submitInfoButton"])) {
    $days = trim($_POST["days"]);
    //calculate the filter date
    $date = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d")-$days, date("Y")));

    require "dbLogin.php";

    // Connect to the database.
    $db_connection = new mysqli($host, $user, $password, $database);

    // Query the database for the list of buildings.
    $query = "SELECT *,SUM(Severity) as total FROM Buildings,records
              WHERE Building.code = records.code AND records.date >= $date
              GROUP BY records.code ORDER BY total desc
               ;";

    $results = mysqli_query($db_connection, $query);

    $bottomPart .= "<h2>Report</h2>";

    $bottomPart .= "<table border=\"1\">
        <tr>
          <th>Rank</th>
          <th>Building Code</th>
          <th>Building Name</th>
          <th>Total Severity score</th>
        </tr>";

    $count = 1;

    // Display the buildings from the database.
    while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
        $bottomPart .= "<tr><td>{$count}</td><td>{$row['Code']}</td><td>{$row['Name']}</td><td>{$row['total']}</td></tr>";
        $count ++;
    }

    $bottomPart .="</tr></table><br><br>";

    // Close the connection.
    $db_connection->close();

}

$topPart = <<<EOBODY
		<form action="{$_SERVER["PHP_SELF"]}" method="post">
		<strong>Days back: </strong><input type="text" name="days" value="5" /><br><br>

			<input type="submit" name="submitInfoButton" /><br>
		</form>
EOBODY;
$body = $topPart . $bottomPart;

$page = generatePage($body);
echo $page;
?>