
<?php
function login_verify($username, $password)
{
    $data = array(
        'username' => $username,
        'password' => $password
    );

    // alert($username . $password);

    $user = R::findOne('user', 'username = :username AND password = :password', $data);

    // console_log($user);

    if (!empty($user)) {
        return true;
    } else {
        return false;
    }
}


function user_register($username, $password)
{
    $data = array(
        'username' => $username,
        'password' => $password
    );

    $user = R::findOne('user', 'usernmae = :username AND password = :password', $data);

    if (!empty($user)) {
        alert("This account has been taken!");
        return false;
    } else {
        // do the registion

        R::store(R::dispense([
            '_type' => 'user',
            'username' => $username,
            'password' => $password,
        ]));

        return true;
    }
}
?>