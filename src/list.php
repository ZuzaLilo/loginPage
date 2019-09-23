<?php

session_start();

//connect to database
require_once('./connect.php');

//check if user is logged in
if (!isset($_SESSION['logged_id'])){

    //check if user has input anything in the form
    if(isset($_POST['username']))
    {
        //get values from post
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        //fetch from database
        $userInput = $connection->prepare("SELECT * FROM user_table where username = :username");
        $userInput->bindValue(':username', $username, PDO::PARAM_STR);
        $userInput->execute();

        $user = $userInput->fetch();


        if ($user && ($password == $user['password']))
        {
            $_SESSION['logged_id'] = $user['id'];
            unset($_SESSION['bad_attempt']);
        }
        else
        {
            $_SESSION['bad_attempt'] = true;
            header('Location: admin.php');
            exit();
        }

    }
    else{
        header('Location: admin.php');
        exit();
    }
}

$usersQuery = $connection->query('SELECT * FROM user_table');
$users = $usersQuery->fetchAll();


?>

<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>User list</title>

<meta name="Users" content="Users">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous" />
<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="container">
	<div class="d-flex justify-content-center h-100"> 
		<div class="card">
			<div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    foreach($users as $user)
                    {
                        echo 
                        "<tr>
                            <td>{$user['id']}</td>
                            <td>{$user['username']}</td>
                            <td>{$user['email']}</td>
                            <td>{$user['password']}</td>
                        </tr>";
                    }
                    ?>
                </tbody>
                </table>
			</div>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha256-CjSoeELFOcH0/uxWu6mC/Vlrc1AARqbm/jiiImDGV3s=" crossorigin="anonymous"></script>


</body>
</html>