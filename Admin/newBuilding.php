<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
  </head>
  <body>

    <form action="addBuilding.php" method="post">

      <div class="adminField">
        <label for="buildingCode">Campus Building Code: </label><br>
        <input id="buildingCode" type="text" name="buildingCode" placeholder='i.e. 123' required><br>
      </div><br>

      <div class="adminField">
        <label for="buildingName">Full Building Name: </label><br>
        <input id="buildingName" type="text" name="buildingName" required><br>
      </div><br>

      <div class="adminField">
        <label for="initials">Building initials: </label><br>
        <input id="initials" type="text" name="initials" placeholder='i.e. ABC' required><br>
      </div><br>

      <input type="button" name="back" value="Go Back" onclick="location.href = 'adminOptions.html';">
      <input type="reset" name="clear" value="Clear">
      <input type="submit" name="submit" value="Submit">

    </form>

    <!-- JavaScripts -->
    <script src="buildingConfirm.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  </body>
</html>
