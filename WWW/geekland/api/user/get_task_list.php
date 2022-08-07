
<?php
include_once '../../php/init.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        print(get_task_list_as_json());
    } catch (Exception $e) {
        print("error");
    }
}

// if (isset($_POST['order_id']) && $_POST['order_id'] != "") {
//     $result = json_decode($response);
// }
?>
