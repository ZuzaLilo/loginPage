<?php

    session_start();


    //----------------------
    //user validation tests
    //----------------------

    if (isset($_POST['email']))
    {
        $everythingOk = true;

        //Bot or not? ReCaptcha
        $secret = "6LdK2rgUAAAAAAT0wVBv45UP8UD0uLHyjJm2pdUK";
                
        $checkBot = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);

        $result = json_decode($checkBot);

        if ($result->success==false)
                {
                    $everythinOk=false;
                    $_SESSION['e_bot']="Prove you are human!";
                }
    }      
    


    //check for disposable email address
    $API_KEY = 'YOUR_API_KEY_HERE';
    $email = $_SESSION["email"];

    $data = file_get_contents('https://api.debounce.io/v1/?api='.$API_KEY.'&email='.$email);
    $response = json_decode($data, true);
    
    $error = $response['debounce']['error'];
    $validation_result = $response['debounce']['send_transactional'];

    if($error!=''){
        echo 'Error: '.$error;
        var_dump($response);
    }elseif($validation_result=='1'){
        echo 'You can send transactional emails to '.$email;
    }else{
        echo 'You cannot send transactional emails to '.$email;
    }



    //if everything works
    if ($everythingOk==true)
    {
    header('Location: logged_in.php');
    }

?>