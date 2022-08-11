<?php
function login_verify($username, $password)
{
    $data = array(
        'username' => $username,
        'password' => $password
    );

    $user = R::findOne('user', 'username = :username AND password = :password', $data);
    // print($username);
    // print($user);
    // exit();

    if (!empty($user)) {
        return true;
    } else {
        return false;
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


function get_current_username()
{
    if (!isset($_COOKIE["username"])) {
        return null;
    } else {
        return $_COOKIE["username"];
    }
}


function get_user_money($username)
{
    $data = array(
        'username' => $username,
    );

    $user = R::findOne('user', 'username = :username', $data);

    if (empty($user)) {
        return 0;
    } else {
        if (empty($user->money)) {
            return 0;
        } else {
            return $user->money;
        }
    }
}


function add_money_to_user($username, $quantity)
{
    $data = array(
        'username' => $username,
    );

    $user = R::findOne('user', 'username = :username', $data);
    // print($username);
    // exit();

    if (empty($user)) {
        return false;
    } else {
        try {
            if (is_string($quantity)) {
                $quantity = intval($quantity);
            }
            $user->money = $user->money + $quantity;
            R::store($user);
            return true;
        } catch (Exception $e) {
            console_log($e);
            return false;
        }
    }
}