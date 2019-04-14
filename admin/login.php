<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trunojoyo</title>
    <link href="../assets/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/assets/css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="col-md-4 col-md-offset-4 form-login">
        <div class="outter-form-login">
            <form action="cek_login.php" class="inner-login" method="post">
              <h3 class="text-center title-login">Log in</h3>
              <div class="form-group">
                  <input type="text" class="form-control" name="username" placeholder="Username" required>
              </div>

              <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
              </div>
              <input type="submit" name="submit" class="btn btn-block btn-custom-green" value="LOGIN" />
              <a class="btn btn-block btn-custom-green" href="../index.php">DASHBOARD</a>
            </form>
        </div>
    </div>
    <script src="../assets/assets/js/jquery.min.js"></script>
    <script src="../assets/assets/js/bootstrap.min.js"></script>
  </body>
</html>