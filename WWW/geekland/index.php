<!DOCTYPE html>
<html lang="zh-CN">

<head>
  <title>GeekLand</title>
  <?php include 'base/head.php'; ?>
</head>

<body></body>

</html>

<?php
include 'base/database.php';
include 'base/functions.php';
include 'functions/user.php';

// $cookie_name = "user";
// $cookie_value = "John Doe";
// setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

$cookie_username = "username";
$cookie_password = "password";

if (!isset($_COOKIE[$cookie_username]) || !isset($_COOKIE[$cookie_password])) {
  // no username and password found, redirect to login page
  route_to('./login_page.php');
} else {
  // username and password found, do a verifying
  $username = $_COOKIE[$cookie_username];
  $password = $_COOKIE[$cookie_password];

  if (login_verify($username, $password)) {
    // auto login successful, redirect to hone page
    route_to('./home_page.php');
  } else {
    // password wrong, redirect to login page
    route_to('./login_page.php');
  }
}
?>