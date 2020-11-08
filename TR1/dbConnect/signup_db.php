<?php

    //Checks if User submit properly
    if(isset($_POST["submit"])){

        $name = $_POST["name"];
        $number = $_POST["contact_num"];   //[""] put the one in the name in the forms
        $email = $_POST["email_add"];
        $pass = $_POST["password"];
        $repass = $_POST["cpassword"];

        require_once 'conn_db.php';
        require_once 'func_db.php';	

            if(emptyInputSignup($name, $number, $email, $pass, $repass) !== false){
                header("location: ../signup.php?error=emptyinput");
                exit(); // stop running
            }
            if(invalidNumber($number) !== false){
                header("location: ../signup.php?error=invalidnumber&name=$name&email_add=$email");
                exit(); // stop running
            }
            if(invalidemail($email) !== false){
                header("location: ../signup.php?error=invalidemail&name=$name&contact_num=$number");
                exit(); // stop running
            }
            if(invalidname($name) !== false){
                header("location: ../signup.php?error=invalidname&contact_num=$number&email_add=$email");
                exit(); // stop running
            }
            if(pwdMatch($pass, $repass) !== false){
                header("location: ../signup.php?error=passworddontmatch&name=$name&contact_num=$number&email_add=$email");
                exit(); // stop running
            }
            if(emailExists($conn, $email) !== false){
                header("location: ../signup.php?error=emailtaken&name=$name&contact_num=$number");
                exit(); // stop running
            }
            if(numberExists($conn, $number) !== false){
                header("location: ../signup.php?error=numbertaken&name=$name&email_add=$email");
                exit(); // stop running
            }
            if(passwordweak($pass) !== false){
                header("location: ../signup.php?error=passwordisweak&name=$name&contact_num=$number&email_add=$email");
                exit(); // stop running
            }

            createUser($conn, $name, $number, $email, $pass);

        }
    else
    {
        header("location:../signup.php");
        exit();
    }