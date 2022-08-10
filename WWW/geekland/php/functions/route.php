<?php
include_once 'user.php';

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

function route_control($auth_only = false)
{
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

            $money_of_user = get_user_money($username);
            if ($money_of_user == 0) {
                route_to('./deposit_page.php');
                return;
            } else {
                if (!$auth_only) {
                    route_to('./home_page.php');
                }
            }
        } else {
            // password wrong, redirect to login page
            route_to('./login_page.php');
        }
    }
}