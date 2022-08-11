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

    try {
        switch ($command) {
            case "get_message_list":
                $page_size = get_value("page_size", $data);
                $page_num = get_value("page_num", $data);
                return_data(get_message_list(page_size: $page_size, page_num: $page_num));
            case "create_message":
                $public_message = get_value('public_message', $data);
                $private_message = get_value('private_message', $data);
                create_a_message(username: get_current_username(), public_message: $public_message, private_message: $private_message);
                return_data('ok');
            case "get_message_by_id":
                $id = get_value('id', $data);
                $comment = get_message_by_id(id: $id);
                return_data($comment);
            case "create_a_comment":
                $parent_id = get_value('parent_id', $data);
                $public_message = get_value('public_message', $data);
                $private_message = get_value('private_message', $data);
                create_a_message(username: get_current_username(), public_message: $public_message, private_message: $private_message, parent_message_id: $parent_id);
                return_data('ok');
        }
    } catch (Exception $e) {
        print(json_encode(array(
            'error' => $e->getMessage()
        )));
        exit();
    }
}