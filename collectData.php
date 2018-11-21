<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      require_once "dbLogin.php";

      session_start();
      echo "<br>";

      $building = $_POST["building"];
      $illness = $_POST["illness"];
      $duration = $_POST["duration"];
      $doctor = $_POST["doctor"];




      // Below is just code from project 3 - needs to be modified
      $query = "'$name', '$email', $gpa, $year, '$gender', '$pwd'";

      $db_connection = new mysqli($host, $user, $password, $database);
      if ($db_connection->connect_error) {
        echo "<b>ERROR: Connection to database failed</b>";
        die($db_connection->connect_error);
      }

      $queryInsert = "insert into applicants values ($query)";
      $result = $db_connection->query($queryInsert);
      //echo $queryInsert; echo "<br><br>";

      //if (false) {
      if (!$result) {
        echo "<b>ERROR: Email is not unique</b><br>";
        //die("Insertion failed: " . $db_connection->error);
      } else {

        //echo "Insertion completed.<br>";
        echo "<h4 style=\"padding-top: 15px;\">The following entry has been added to the database:</h4>";

        echo "<strong>Name: </strong> $name<br>";
        echo "<strong>Email: </strong> $email<br>";
        echo "<strong>Gpa: </strong> $gpa<br>";
        echo "<strong>Year: </strong> $year<br>";
        echo "<strong>Gender: </strong> $gender<br>";
      }


      $db_connection->close();

    ?>
  </body>
</html>
