<?php

session_start();

if(isset($_POST['username']))
{
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    //echo $login." ".$password;

    require_once('./connect.php');

    $userInput = $connection->prepare("SELECT * FROM user_table where username = :username");
    $userInput->bindValue(':username', $username, PDO::PARAM_STR);
    $userInput->execute();

    echo $userInput->rowCount();
}
else{
    header('Location: admin.php');
    exit();
}

?>