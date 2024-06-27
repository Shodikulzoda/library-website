<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="loginstyle.css">
</head>

<?php
require_once '../functions.php';
?>

<body>
  <div class="wrapper">
    <h2>Login</h2>
    <div class="khat"></div>
    <form action="" method="post">
      <div class="input-box">
        <input type="email" class="inputemail" name="emaillogin" placeholder="Enter your email" required>
      </div>
      <div class="input-box">
        <input type="password" class="inputemail" name="passwordlogin" placeholder="Enter your password" required>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $emaillogin = $_POST['emaillogin'];
          $passwordlogin = $_POST['passwordlogin'];
          $filename = '../files/logindata.csv';

          if (($filepath = fopen($filename, 'r')) == true) {
            $found = false;
            while (($data = fgetcsv($filepath, 1000, ';')) == true) {
              list($name, $email, $password) = $data;
              if ($email === $emaillogin && $password === $passwordlogin) {
                $found = true;
                break;
              }
            }
            fclose($filepath);
            if ($found) {
              echo "<p style='color:green;'>Login hast</p>";
              header('Location: ../index.php');
              exit();
            } else {
              echo "<p style='color:red;'>login or password is incorrect </p>";
            }
          }
        }
        ?>
      </div>
      <div class="policy">
        <input type="checkbox">
        <h3>Remember me</h3>
      </div>
      <div class="input-box button">
        <input type="submit" value="Login">
      
      </div>
      <div class="text">
        <h3>Don't have an account? <a href="/loginpage/signup.php">Sign up</a></h3>
      </div>
    </form>


  </div>
</body>

</html>