<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <title>Login</title>
    <?php include_once 'base/head.php'; ?>
</head>

<script>
</script>

<body>
    <div class="flex flex-row justify-center">
        <form class="basis-1/2 mt-20" action='login_page.php' method='POST'>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" aria-describedby="emailHelp" placeholder="">
            </div>
            <div class="form-group mt-4">
                <label>Password</label>
                <input type="text" class="form-control" name="password" placeholder="">
            </div>
            <div class="flex flex-row justify-center mt-8">
                <button type="submit" class="text-neutral-800 btn btn-primary">Login</button>
            </div>
        </form>
    </div>

    <div class="signupRow" onclick="route_to('./signup_page.php')">
        <div class="signUpButton w-full mt-4 flex flex-row justify-start">
            <div class="mt-9 ml-8">
                SignUP
            </div>
        </div>
    </div>
</body>

<style>
    .signupRow {
        position: absolute;
        right: -100px;
        top: -50px;
    }

    .signUpButton {
        width: 200px;
        height: 100px;
        background-color: #FFE082;
        border-bottom-left-radius: 110px;
        border-bottom-right-radius: 110px;
        border: 3px solid #EF9A9A;

        font-weight: bold;
        color: #90A4AE;
        cursor: pointer;
    }
</style>

</html>

<?php
include_once 'init.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    } else {
        alert("Name is empty OR Password is empty.\n\nPlease input the info and try again.");
        exit();
    }

    if (login_verify($username, $password)) {
        // save username and password to cookie, so next time, it will auto login
        $expire_time = time() + (86400 * 30); // 86400 = 1 day, so 30 days
        setcookie("username", $username, $expire_time, "/"); // 86400 = 1 day
        setcookie("password", $password, $expire_time, "/"); // 86400 = 1 day

        route_to('./home_page.php');
    } else {
        alert("Login Failed!\n\nTry again or do an registion for a new account.");
    };
}
?>