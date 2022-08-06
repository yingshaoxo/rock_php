

<?php
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
?>