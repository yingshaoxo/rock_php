<?php
include_once '../../php/init.php';
include_once '../auth_gate.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $json_string = file_get_contents('php://input');
    $json_obj = json_decode($json_string, true);

    if (!isset($json_obj['command']) || !isset($json_obj['data'])) {
        return_error("You need to give me at least 'command' and 'data'.");
    }

    $command = $json_obj['command'];
    $data = $json_obj['data'];

    $id = get_value('id', $data);

    $task = get_a_task_by_id($id);
    $task_type = get_value('task_type', $task);
    $task_paramaters = json_decode(get_value('task_paramaters', $task));

    // if ($command != 'get_task_list') {
    //     return_data($task_type);
    // }

    try {
        switch ($command) {
            case "get_task_list":
                return_data(get_task_list());
            case "confirm":
                switch ($task_type) {
                    case 'deposit':
                        $username = get_value('username', $task_paramaters);
                        $money_quantity = get_value('money_quantity', $task_paramaters);
                        $transferring_id = get_value('transferring_id', $task_paramaters);
                        add_money_to_user($username, $money_quantity);
                        break;
                }
                finish_a_task($id);
                return_data('ok');
            case "refuse":
                delete_a_task($id);
                return_data('ok');
        }
    } catch (Exception $e) {
        print(json_encode(array(
            'error' => $e->getMessage()
        )));
        exit();
    }
}