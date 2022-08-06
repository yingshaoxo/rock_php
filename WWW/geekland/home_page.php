<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <title>Home</title>
    <?php include_once 'base/head.php'; ?>
</head>

<body>

    <div id="app">
        <div class="w-100 h-screen flex flex-row justify-center">
            <div class="flex flex-column justify-center">Welcome Home!</div>
        </div>
    </div>

</body>

<script>
    const {
        createApp
    } = Vue

    createApp({
        data() {
            return {
                // message: 'Hello Vue!'
            }
        }
    }).mount('#app')
</script>

</html>

<?php
include_once 'init.php';

route_control();
?>