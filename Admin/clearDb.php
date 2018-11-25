<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
  </head>
  <body>

    <form action="processClear.php" method="post">

      <div>
        <label for="datepicker">Delete all records starting from: </label><br>
        <?php
          $month = date('m', time());
          $day = date('d', time());
          $year = date('Y', time());
          if ($month == 12) {
            $month = 1;
          } else {
            $month -= 1;
          }
          echo "<input type='text' name='date' id='datepicker' required value=$month/$day/$year>";
        ?>
      </div><br>

      <input type="button" name="back" value="Go Back" onclick="location.href = 'index.html';">
      <input type="reset" name="clear" value="Clear">
      <input type="submit" name="submit" value="Submit">

    </form>

    <!-- JavaScripts -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
      $(function() {
        $("#datepicker").datepicker();
      });

      window.onsubmit = validateDate;
      function validateDate() {
        if (window.confirm("Are you sure you want to remove records that match this constraint?")) {
          return true;
        } else {
          return false;
        }
      }
    </script>
  </body>
</html>
