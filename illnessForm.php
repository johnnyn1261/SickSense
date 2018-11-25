<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
  </head>
  <body>

    <form action="collectData.php" method="post">

      <div class="dropDowns">
        <label for="building">Building: </label>

        <select id="building" name="building" required>
          <?php
            // Include the database login credentials file.
            require("dbLogin.php");

            // Connect to the database.
            $db_connection = new mysqli($host, $user, $password, $database);

            // Query the database for the list of buildings.
            $query = "select Name from buildings;";
            $results = mysqli_query($db_connection, $query);

            // Display the buildings from the database.
            while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){
              print ("<option>".$row['Name']."</option>");
            }

            // Close the connection.
            $db_connection->close();
          ?>
        </select><br><br>

        <label for="illness">Illness: </label>
        <select id="illness" name="illness"><br>
          <option>Enock-itis</option>
          <option>Israel-itis</option>
          <option>Jeff-itis</option>
          <option>John-itis</option>
          <option>Kasim-itis</option>
          <option selected>Richard-itis</option>
        </select>
      </div><br>

      <div id="duration" class="radioGroup">
        <label for="duration">Duration of Illness: </label><br>
        <input type="radio" name="duration" value='1 to 2 Days' required> 1 to 2 Days<br>
        <input type="radio" name="duration" value='3 to 4 Days'> 3 to 4 Days<br>
        <input type="radio" name="duration" value='5+ Days'> 5+ Days<br>
      </div><br>

      <div id="doctor" class="radioGroup">
        <label for="doctor">Doctor Verified? </label><br>
        <input type="radio" name="doctor" value='Yes' required> Yes<br>
        <input type="radio" name="doctor" value='No'> No<br>
      </div><br>

      <div id="date">
        <label for="datepicker">Date of Building Entry: </label><br>
        <?php
          $date = date('m/d/Y', time());
          echo "<input type='text' name='date' id='datepicker' value='$date'>";
        ?>
      </div><br>

      <div>
        <label for="exampleFormControlTextarea1">Additional Comments: </label><br>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <br>

      <input type="button" name="back" value="Go Back" onclick="location.href = 'index.html';">
      <input type="reset" name="clear" value="Clear">
      <input type="submit" name="submit" value="Submit">

    </form>

    <!-- JavaScripts -->
    <script src="js/illnessConfirm.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
      $( function() {
        $("#datepicker").datepicker();
      });
    </script>

  </body>
</html>
