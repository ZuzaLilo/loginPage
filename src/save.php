<?php

session_start();


if(isset($_POST['email']))
{
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if(empty($email))
    {
        //when given email was incorrect, save incorrect email to print error, go back to index.php
        $_SESSION['given_email'] = $_POST['email'];
        header('Location: index.php');
    }
    else
    {
        //database connection file
        require_once('./connect.php'); 
        
        //if the given email is correct, put in database
        $query = $connection->prepare('INSERT INTO user_table VALUES (NULL, :email)');
        $query->bindValue(':email'.$email, PDO::PARAM_STR);
        $query->execute();
    }
}
else
{
    header('Location: index.php');
    exit();
}