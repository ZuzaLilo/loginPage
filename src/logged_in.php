<?php

session_start();

//connect to a database connection file
require_once('./connect.php');



//testing lines:

//$conn = new PDO('mysql:host=database;dbname=mydb;charset=utf8mb4', 'myuser', 'secret');

//$databaseTest = ($conn->query('SELECT * FROM user_table'))->fetchAll(PDO::FETCH_OBJ);

//var_dump($_SERVER);


//get data from the form

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $_SESSION["username"] = "$username";
    $_SESSION["email"] = "$email";
    $_SESSION["password"] = "$password";
    

    //put the data into the database
    try
    {
        $connection = new PDO('mysql:host=database;dbname=mydb;charset=utf8mb4', 'myuser', 'secret');

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO `user_table` (`id`, `username`, `email`,`password`) VALUES
        (NULL, '$username', '$email', '$password')";

        // use exec() because no results are returned
        $connection->exec($sql);

        //let me know
        echo "New record created successfully";

    }catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }

    //close connection
    $connection = null;


?>


<!doctype html>
<html lang="eng">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Welcome</title>

<meta name="description" content="Welcome">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous" />
<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">
	<div class="d-flex justify-content-center h-100"> 
		<div class="card">
			<div class="card-body">

            <h1>Hello, <?php echo $username ?>!</h1>

            <a href="login.php" class="btn btn-secondary" name="log_out_button" >Log out</a>

			</div>
		</div>
	</div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha256-CjSoeELFOcH0/uxWu6mC/Vlrc1AARqbm/jiiImDGV3s=" crossorigin="anonymous"></script>



</body>
</html>
