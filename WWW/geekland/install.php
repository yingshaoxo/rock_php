<?php

require './php/base/database.php';

function user_register($username, $password)
{
    $data = array(
        'username' => $username,
        'password' => $password,
    );

    $user = R::findOne('user', 'username = :username AND password = :password', $data);

    if (!empty($user)) {
        alert("This account has been taken!");
        return false;
    } else {
        // do the registion

        R::store(R::dispense([
            '_type' => 'user',
            'username' => $username,
            'password' => $password,
            'money' => 0,
        ]));

        return true;
    }
}

function does_user_exists($username)
{
    $user = R::findOne('user', 'username = :username', array('username' => $username));

    if (!empty($user)) {
        return true;
    } else {
        return false;
    }
}

print("test start\n");
print(false);
print(true);
print("\ndoes yingshaoxo exist?\n");
print(does_user_exists("yingshaoxo"));
print("\ntest end\n");

if (!does_user_exists("default_user")) {
    user_register(username: "default_user", password: "default_user");
}



function route_to($url)
{
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (str_contains($url, "./")) {
        if (!str_contains($actual_link, substr($url, 2))) {
            header('Location: ' . $url);
        }
        return;
    }
    header('Location: ' . $url);
}

route_to("./php/home_page.php");

#
/*
$servername = "db";
$username = "root";
$password = "123456";

try {
  $conn = new PDO("mysql:host=$servername;dbname=geekland", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
 */