<?php

session_start();

//database connection file
require_once('./connect.php');


//get data from the form

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $_SESSION["username"] = "$username";
    $_SESSION["email"] = "$email";
    $_SESSION["password"] = "$password";

    echo "<table style='border: solid 1px black;'>";
    echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

    class TableRows extends RecursiveIteratorIterator {
        function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
        }

        function current() {
            return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
        }

        function beginChildren() {
            echo "<tr>";
        }

        function endChildren() {
            echo "</tr>" . "\n";
        }
    }


    try
    {
        $connection = new PDO('mysql:host=database;dbname=mydb;charset=utf8mb4', 'myuser', 'secret');

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $connection->prepare("SELECT * FROM user_table");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
            echo $v;
        }
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    //close connection
    $connection = null;

?>
