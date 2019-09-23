<?php

$host = "database";
$db_user = "myuser";
$db_password = "secret";
$db_name = "mydb";

try
    {
        $connection = new PDO('mysql:host=database;dbname=mydb;charset=utf8mb4', 'myuser', 'secret', 
        [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit('Database error');
    }

?>
