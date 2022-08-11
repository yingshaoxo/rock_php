<?php
function create_a_message($username, $public_message, $private_message, $parent_message_id = null)
{
    if (is_null($username)) {
        $username = 'default_user';
    }

    $new_message_id = R::store(R::dispense([
        '_type' => 'message',
        'username' => $username,
        'public_message' => $public_message,
        'private_message' => $private_message,
        'date' => (new DateTime())->getTimestamp(),
        'likes' => 0,
        'comments' => my_json_encode(array()),
    ]));

    if ($parent_message_id != null) {
        $the_parent_message = get_message_by_id(id: $parent_message_id);
        if ($the_parent_message) {
            $comments_json_string = $the_parent_message->comments;
            $comments = my_json_decode($comments_json_string);
            array_push($comments, $new_message_id);
            $the_parent_message->comments = my_json_encode($comments);
            R::store($the_parent_message);
        }
    }
}


function get_message_list($username = null, $page_size = -1, $page_num = -1)
{
    $tasks = R::getALL("SELECT * FROM message ORDER BY date DESC" . get_sql_offset_and_limit_command_by_using_pagesize_and_pagenum(page_size: $page_size, page_num: $page_num));

    if (empty($tasks)) {
        return [];
    } else {
        return $tasks;
    }
}


function get_message_by_id($id)
{
    $data = array(
        'id' => $id,
    );

    $message = R::findOne('message', "id = :id", $data);

    if (empty($message)) {
        return null;
    } else {
        return $message;
    }
}