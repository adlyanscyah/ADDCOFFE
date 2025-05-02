<?php
require '../function.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="../CSS/loginadmin.css" />
    <title>Login Admin</title>
  </head>

  <body>
    <section>
      <div class="form-box">
        <div class="form-value">
        <form method="post">
            <h2>Login</h2>
            <div class="inputbox">
            <ion-icon name="log-in-outline"></ion-icon>
            <input type="text" name="username_admin" id="username_admin" required >
              <label for="username_admin">Username</label>
            </div>
            <div class="inputbox">
            <input type="password_admin" name="password_admin" id="password_admin" required >
              <label for="password_admin">Password</label>
            </div>
            <div class="forget">
                <label for=""><input type="checkbox">Remember Me</label>
            </div>
            <button type="submit" name="loginadmin">Login</button>
            </div>
            </div>
          </form>
        </div>
      </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>