<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <title>Home</title>
    <?php include_once 'base/head.php'; ?>
</head>

<body>
    <div id="app">
        <div class="w-100 h-screen flex flex-column justify-start content-center">
            <div class="flex flex-row justify-center mt-10">
                Admin Page
            </div>
            <div class="list-group flex flex-row justify-center content-center mt-4">
                <div class="w-3/4" aria-current="true" v-for="item in task_list">
                    <div class="w-100 h-100 flex flex-row justify-start content-center">
                        <div class="bg-gray-10">
                            {{
                            item
                        }}
                        </div>
                        <div class="h-100 flex felx-row justify-between content-center">
                            <button type="button" class="btn btn-primary w-20 h-10 mr-2 bg-blue-500">Confirm</button>
                            <button type="button" class="btn btn-danger w-20 h-10 bg-rose-500">Refuse</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    const {
        createApp,
    } = Vue

    const task_list = JSON.parse(
        `
        <?php
        include_once 'init.php';

        print(get_task_list_as_json());
        ?>
        `
    )

    console.log(task_list)

    createApp({
        data() {
            return {
                task_list
            }
        }
    }).mount('#app')
</script>

</html>

<?php
include_once 'init.php';

?>