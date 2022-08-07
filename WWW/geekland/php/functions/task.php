
<?php
// task_type: '',  # it could be a string
// task_paramaters: '', # it is a json string, contains the paramater the program need for performing a certain task
// status: '', # waiting, working, done, pending; for simplifying, waiting and done
// username: '' # indicate who this task belong to


function get_a_task($task_type, $username)
{
    $data = array(
        'task_type' => $task_type,
        'username' => $username,
        'status' => 'waiting',
    );

    $task = R::findOne('task', 'task_type = :task_type AND username = :username AND status = :status', $data);

    if (empty($task)) {
        return null;
    } else {
        return $task;
    }
}

function get_task_list_as_json($task_type = null)
{
    $status = "waiting";
    if (is_null($task_type)) {
        $tasks = R::getALL("SELECT * FROM task WHERE status='$status'");
    } else {
        $tasks = R::getALL("SELECT * FROM task WHERE task_type='$task_type' AND status='$status'");
    }

    // $tasks = R::findAll('task');

    if (empty($tasks)) {
        return json_encode([]);
    } else {
        return json_encode($tasks);
    }
}

function add_non_duplicate_task($task_type, $task_paramaters, $username)
{
    $task_we_found = get_a_task($task_type, $username);
    if ($task_we_found != null) {
        return false;
    } else {
        if (is_array($task_paramaters)) {
            $task_paramaters = json_encode($task_paramaters);
        }
        R::store(R::dispense([
            '_type' => 'task',
            'task_type' => $task_type,
            'task_paramaters' => $task_paramaters,
            'status' => 'waiting',
            'username' => $username
        ]));
        return true;
    }
}

function finish_a_task($task_type, $username)
{
    $task_we_found = get_a_task($task_type, $username);
    if ($task_we_found == null) {
        return false;
    } else {
        $task_we_found->status = 'done';
        R::store($task_we_found);
        return true;
    }
}
?>