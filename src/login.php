<?php

session_start();

//database connection file
require_once('./connect.php');

if(isset($_POST['email']))
{
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if(empty($email))
    {}
    else
    {
        echo $_POST['email'].$email;
    }
}
else
{
    header('Location: index.php');
    exit();
}

//get data from the form

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $_SESSION["username"] = "$username";
    $_SESSION["email"] = "$email";
    $_SESSION["password"] = "$password";


    

    try
    {
        $connection = new PDO('mysql:host=database;dbname=mydb;charset=utf8mb4', 'myuser', 'secret', 
        [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        
        $stmt = $connection->prepare("SELECT * FROM user_table");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll()as $k=>$v) {
            echo $v;
        }
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    //close connection
    $connection = null;

?>
