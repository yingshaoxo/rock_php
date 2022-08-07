

<?php
// for php page
function alert($msg, $route_to = null)
{
    if (is_null($route_to)) {
        echo "<script type='text/javascript'>alert(`$msg`);</script>";
    } else {
        echo "<script type='text/javascript'>alert(`$msg`); route_to('$route_to');</script>";
    }
}

function console_log($msg)
{
    echo "<script type='text/javascript'>console.log(`$msg`);</script>";
}


// for general functions
function get_value($key, $object)
{
    //get_value_by_key_from_object
    if (!is_array($object)) {
        if (gettype($object) == "object") {
            if (isset($object->$key)) {
                return $object->$key;
            }
        }
        return null;
    } else {
        if (!isset($object[$key])) {
            return null;
        } else {
            return $object[$key];
        }
    }
}


// for restful api
function return_data($data)
{
    $data = array(
        'data' => $data
    );
    print(json_encode($data));
    exit();
}

function return_error($e)
{
    if (!is_string($e) && $e != null) {
        $e = $e->getMessage();
    }
    $data = array(
        'error' => $e
    );
    print(json_encode($data));
    exit();
}

?>