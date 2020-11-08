<?php

    if(isset($_POST["submit"])){

        $email = $_POST["email_add"];
        $pass = $_POST["password"];
        
        require_once 'conn_db.php';
        require_once 'func_db.php';

        if(emptyInputLogIn($email, $pass) !== false){
            header("location: ../login.php?error=emptyinput");
            exit();
        }

        loginUser($conn, $email, $pass);


    }else{
        header("location: ../login.php");
        exit();
    }
