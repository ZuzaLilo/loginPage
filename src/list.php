<?php

session_start();

if(isset($_POST['username']))
{
    $login = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    echo $login." ".$password;
}
else{
    header('Location: admin.php');
    exit();
}

?>