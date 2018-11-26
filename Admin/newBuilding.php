<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SickSense</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="html5, css3, bootstrap, php, js, firebase">
    <meta name="author" content="Van-Nhan, Jeff, Israel, Kasim, Enock">

    <link rel="shortcut icon" type="image/png" href="../sickSense.png">

    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
  </head>
  <body>

    <br>
    <h1>SickSense</h1>
    <div class="card">
    <div class="card-body">
    <h5 class="card-title">Adding Building</h5>
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

      <button type="button" class="mainOption btn-primary" onclick="location.href = 'adminOptions.html';" name="back" style="margin: 5px">
            <a href="adminOptions.html" style="text-decoration: none; color: #fff;">Go Back</a>
      </button>

      <button type="reset" class="mainOption btn-primary" name="clear" style="margin: 5px">Clear</button>

      <button type="submit" class="mainOption btn-primary" name="submit" style="margin: 5px">Submit</button>

      <button type="button" class="mainOption btn-primary" onclick="location.href = '../index.html';" name="main" style="margin: 5px">
            <a href="../index.html" style="text-decoration: none; color: #fff;">Main Page</a>
      </button>

    </form>
  </div>
  </div>

    <!-- JavaScripts -->
    <script src="buildingConfirm.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  </body>
</html>
