<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <title>Deposit</title>
    <?php include_once 'base/head.php'; ?>
</head>

<script>
</script>

<body>
    <div class="flex flex-row justify-center">
        <form class="basis-1/2 mt-20" action='deposit_page.php' method='POST'>
            <div class="form-group">
                <label>Deposit Money Quantity</label>
                <input type="text" class="form-control" name="money_quantity" aria-describedby="emailHelp"
                    placeholder="" value="100">
            </div>
            <div class="form-group mt-4">
                <label>Proof(Transferring ID)</label>
                <input type="text" class="form-control" name="transferring_id" placeholder="">
            </div>
            <div class="flex flex-row justify-center mt-8">
                <button type="submit" class="text-neutral-800 btn btn-outline-primary">Confirm</button>
            </div>
        </form>
    </div>
</body>

<style>
</style>

</html>

<?php
include_once 'init.php';

route_control(true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['money_quantity']) && !empty($_POST['transferring_id'])) {
        $money_quantity = $_POST['money_quantity'];
        $transferring_id = $_POST['transferring_id'];
        if (!is_numeric($money_quantity)) {
            alert("money_quantity should be a number!");
            exit();
        }
    } else {
        alert("money_quantity is empty OR transferring_id is empty.\n\nPlease input the info and try again.");
        exit();
    }

    add_non_duplicate_task(
        'deposit',
        array(
            "username" => get_current_username(),
            "money_quantity" => $money_quantity,
            "transferring_id" => $transferring_id
        ),
        get_current_username()
    );

    add_money_to_user(get_current_username(), $money_quantity);
    alert(
        "Great! Now you have $money_quantity in your pocket!",
        "./home_page.php"
    );
}
?>