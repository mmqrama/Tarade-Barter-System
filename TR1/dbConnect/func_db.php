<?php

    //signup functions
    function emptyInputSignup($name, $number, $email, $pass, $repass){
        $result;
        if(empty($name) || empty($number) || empty($email) || empty($pass) || empty($repass)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function invalidname($name){
        $result;
        if(!preg_match("/^[a-zA-Z\s]+$/", $name)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    function invalidNumber($number){
        $result;
        if(!preg_match("/^(?:09|\+?639)(?!.*-.*-)(?:\d(?:-)?){9}$/", $number)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    function invalidemail($email){
        $result;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }
    function pwdMatch($pass, $repass){
        $result;
        if($pass !== $repass){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    function emailExists($conn, $email){
        $sql = "SELECT * FROM users WHERE email_add = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else{
            $result = false;
            return $result;
        }
        
        mysqli_stmt_close($stmt);

    }

    function numberExists($conn, $number){
        $sql = "SELECT * FROM users WHERE contact_num = ?;";
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "s", $number);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else{
            $result = false;
            return $result;
        }
        
        mysqli_stmt_close($stmt);

    }

    function passwordweak($pass){
        $result;
        if(!preg_match("/^(?=.*[0-9])(?=.*[A-Z]).{8,}$/", $pass)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    function createUser($conn, $name, $number, $email, $pass){
        $sql = "INSERT INTO users (fullname, contact_num, email_add, pwd) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }
        
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ssss", $name, $number, $email, $hash);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../signup.php?error=none");        
        exit();
    }

    //LoginFunctions
    
    function emptyInputLogIn($email, $pass){
        $result;
        if(empty($email) || empty($pass)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function loginUser($conn, $email, $pass){
        $emailExists = emailExists($conn, $email); //checks if the email exists
        
        if($emailExists === false){
            header("location: ../login.php?error=usernull");
            exit();
        }
 
        $checkpass = password_verify($pass, $emailExists["pwd"]);

        if($checkpass === true){
            session_start();
            $_SESSION["userid"] = $emailExists["id"];
            $_SESSION["username"] = $emailExists["fullname"];
            header("location: ../homepage.php");
            exit();
        }else{
            header("location: ../login.php?error=wronglogin");
            exit();
        }
    
    }