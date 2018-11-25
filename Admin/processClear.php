<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="adminOptions.html" method='post'>

      <?php
        require("../dbLogin.php");
        $db_connection = new mysqli($host, $user, $password, $database);
        if ($db_connection->connect_error) {
          echo "<b>ERROR: Connection to database failed</b>";
          die($db_connection->connect_error);
        }

        // Insert the new building into the database.
        $date = $_POST["date"];
        $dateArray = explode("/", $date);
        $date = $dateArray[2]."-".$dateArray[0]."-".$dateArray[1];

        $querySelect = "select * from Records where date < '$date';";
        $result = $db_connection->query($querySelect);

        $queryDelete = "delete from Records where date < '$date';";
        $result2 = $db_connection->query($queryDelete);
        $num_rows = $result->num_rows;

        if (!$result2 || $num_rows == 0) {
          echo "<b>ERROR: No records exist with the given contraint.</b><br>";
        } else {
          echo "<h1>The following records have been removed from the database:</h1>";
          echo "<table border='1'>";
          echo "<tr><th>Building Code</th><th>Severity</th><th>Illness</th><th>Verified</th><th>Date</th></tr>";
          if ($num_rows != 0) {
            for ($row_index = 0; $row_index < $num_rows; $row_index++) {
              $result->data_seek($row_index);
              $row = $result->fetch_array(MYSQLI_ASSOC);
              print("<tr><td>".$row['Code']."</td>");
              print("<td>".$row['Severity']."</td>");
              print("<td>".$row['Verified']."</td>");
              print("<td>".$row['Illness']."</td>");
              print("<td>".$row['Date']."</td></tr>");
            }
          }

          echo "</table><br><br>";
        }

        // Close the connection.
        $db_connection->close();
      ?>

      <input type="submit" value="OK">
    </form>
  </body>
</html>
