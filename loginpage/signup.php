<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="stylesheet" href="loginstyle.css">
</head>

<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <div class="khat">
    </div>
    <form action="../sending.php" method="POST">
      <div class="input-box">
        <input type="text" name="username" placeholder="Enter your name" required>
      </div>
      <div class="input-box">
        <input type="text" name="email" placeholder="Enter your email" required>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Create password" required>
      </div>
      <div class="policy">
        <input name="checkbox" type="checkbox">
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <input type="Submit" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="/loginpage/login.php">Login now</a></h3>

      </div>
      
    </form>
  </div>
  <!--?php
  $filecsv = fopen( '/files/logindata.csv', "r");
    $dataform = [];
    while (($datacsv = fgetcsv($filecsv, 1000, ";")) == true) {
      $dataform[] = $datacsv;
    }
    fclose($file);
  
  foreach ($dataform as $datacsv) {
    list($nameuser, $emailuser, $passuser) = $datacsv;
    echo "<h1>$nameuser" . " $emailuser" . "$passuser</h1>";
  }
  ?-->
  
</body>

</html>