<?php

session_start();


if(isset($_POST['email']))
{
    //get data from the form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $_SESSION["username"] = "$username";
    $_SESSION["email"] = "$email";
    $_SESSION["password"] = "$password";

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
        $query = $connection->prepare("INSERT INTO `user_table` 
        (`id`, `username`, `email`,`password`) VALUES
        (NULL, '$username', '$email', '$password')");
        
        $query->bindValue(':email'.$email, PDO::PARAM_STR);
        $query->bindValue(':username'.$username, PDO::PARAM_STR);
        $query->bindValue(':password'.$password, PDO::PARAM_STR);
        $query->execute();

        //let me know it worked
        header('Location: login.php');
    }
}
else
{
    header('Location: index.php');
    exit();
}

?>