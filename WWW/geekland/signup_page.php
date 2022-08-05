<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <title>SignUP</title>
    <?php include 'base/head.php'; ?>
</head>

<script>
</script>

<body>
    <div class="flex flex-row justify-center">
        <form class="basis-1/2 mt-20" action='signup_page.php' method='POST'>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" aria-describedby="emailHelp" placeholder="">
            </div>
            <div class="form-group mt-4">
                <label>Password</label>
                <input type="text" class="form-control" name="password" placeholder="">
            </div>
            <div class="flex flex-row justify-center mt-8">
                <button type="submit" class="text-neutral-800 btn btn-primary">SignUP</button>
            </div>
        </form>
    </div>
</body>

<style>
</style>

</html>

<?php
include 'base/database.php';
include 'base/functions.php';
include 'functions/user.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    } else {
        alert("Name is empty OR Password is empty.\n\nPlease input the info and try again.");
        exit();
    }

    if (user_register($username, $password)) {
        alert("You just created a new user account: " . $username . "!");
        route_to('./home_page.php');
    } else {
        alert("Register Failed!\n\nTry it again.");
    };
}
?>