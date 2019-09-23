<?php

session_start();

//Bot or not? ReCaptcha
$secret = "SECRET KEY";
		
$checkBot = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);

$result = json_decode($checkBot);

?>


<!doctype html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Admin Login Page</title>

<meta name="description" content="Admin Login Page">

<script src='https://www.google.com/recaptcha/api.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous" />
<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">
	<div class="d-flex justify-content-center h-100"> 
		<div class="card">
			<div class="card-body">
				<form action="list.php" method="post">

					<!-- Username -->
                    <div class="form-group">
                        <label for="formGroupExampleInput">Username</label>
                        <input type="text" class="form-control" name=username id="formGroupExampleInput" placeholder="Username">
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name=password id="exampleInputPassword1" placeholder="Password">
                    </div>

                    <!-- ReCaptcha -->
                    <div class="form-group g-recaptcha" data-sitekey="6LdK2rgUAAAAAOMUuU6-IEbNPqL56mN_Rn9AH4YN"></div>
                    
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary">Submit</button>    

				</form>
			</div>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha256-CjSoeELFOcH0/uxWu6mC/Vlrc1AARqbm/jiiImDGV3s=" crossorigin="anonymous"></script>


</body>
</html>