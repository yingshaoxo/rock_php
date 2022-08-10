<?php
include_once '../../php/init.php';


if (!$development) {
    // we do check only for php side, not vite side
    $cookie_username = "username";
    $cookie_password = "password";

    if (!isset($_COOKIE[$cookie_username]) || !isset($_COOKIE[$cookie_password])) {
        // no username and password found, redirect to login page
        return_error("You should login to call those functions.");
    } else {
        // username and password found, do a verifying
        $username = $_COOKIE[$cookie_username];
        $password = $_COOKIE[$cookie_password];

        if (login_verify($username, $password)) {
            // auto login successful, redirect to hone page
        } else {
            // password wrong, redirect to login page
            return_error("You should login to call those functions.");
        }
    }
}