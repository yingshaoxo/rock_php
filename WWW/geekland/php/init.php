<?php
include_once 'base/database.php';
include_once 'base/functions.php';
include_once 'functions/user.php';
include_once 'functions/route.php';
include_once 'functions/task.php';
include_once 'functions/message.php';

// for CROS
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

// debug settings
$development = true;
if ($development) {
    if (!does_user_exists("default_user")) {
        user_register(username: "default_user", password: "default_user");
    }
}