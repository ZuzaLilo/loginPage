<?php

session_start();

//database connection file
require_once('./connect.php');

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
        //if the given email is correct, put in database
        echo $_POST['email'].$email;
    }
}
else
{
    header('Location: index.php');
    exit();
}