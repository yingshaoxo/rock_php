<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <title>Me</title>
    <?php include_once 'base/head.php'; ?>
</head>

<script>
</script>

<body>
    <div class="w-screen h-screen flex flex-col justify-start items-center">
        <div class="mt-4 text-2xl">Me</div>
        <div class="flex flex-col justify-between w-[250px] mt-[25px]">
            <div>
                <div>
                    <span>Username:</span>
                    <span class="text-rose-600">
                        <?php
                        include_once 'init.php';
                        print(get_current_username());
                        ?>
                    </span>
                </div>
            </div>
            <div class="mt-2 flex flex-row justify-between items-center">
                <div>
                    <span>Money:</span>
                    <span class="text-rose-600">
                        <?php
                        include_once 'init.php';
                        print(get_user_money(username: get_current_username()))
                        ?>
                    </span>
                </div>
                <form action="personal_page.php" method="post">
                    <button type="submit" name="deposit"
                        class="btn btn-outline-primary h-[30px] flex flex-row justify-center items-center">deposit</button>
                </form>
            </div>
        </div>
    </div>
</body>

<style>
</style>

</html>

<?php
include_once 'init.php';

route_control(auth_only: true);

if (
    $_SERVER['REQUEST_METHOD'] == "POST"
    and
    isset($_POST['deposit'])
) {
    route_to('./deposit_page.php');
}
?>