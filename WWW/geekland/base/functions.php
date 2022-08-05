

<?php
function route_to($url)
{
    header('Location: ' . $url);
}

function alert($msg)
{
    echo "<script type='text/javascript'>alert(`$msg`);</script>";
}

function console_log($msg)
{
    echo "<script type='text/javascript'>console.log(`$msg`);</script>";
}
?>