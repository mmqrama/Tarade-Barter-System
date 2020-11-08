<?php

if (isset($_POST["reset-password-submit"])){
  //Updates the password inside the database after user authentication
  $selector = $_POST["selector"];
  $validator = $_POST["validator"];
  $password = $_POST["pwd"];
  $passwordRepeat = $_POST["pwd-repeat"];
  
  //Checks if user didnt include a password in the password field
  if (empty($password) || (empty($passwordRepeat)){
    header("Location: ../newPass.php?newpwd=empty");
    exit();
  }else if($password != $passwordRepeat){
    header("Location: ../newPass.php?newpwd=pwdnotsame");
    exit();
  }
  //Check current date to check if token is expired or not
  $currentdate = date("U");

  require 'conn_db.php';

  //Selecting correct token from the database
  $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ? ;";
  $stmt = mysqli_stmt_init($conn);
    //check if stmt has errors
    if (!mysqli_stmt_prepare($stmt, $sql)){
       echo "There was an error!";
       exit(); 
    } else { 
        mysqli_stmt_bind_param($stmt, "s", $selector);
        mysqli_stmt_execute($stmt); 

        $currentdate;
        
        $result = mysqli_stmt_get_result($stmt);
          if (!$row = mysqli_fetch_assoc($result)){ 
            //grabs the data(in column names)and insert it in a associative array
            echo "You need to re-submit your reset request.";
            exit();
          } else {
            //Check if the token taken from database is matched in the form(in binary data) 
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);
            //
                if($tokenCheck == false){
                  echo "You need to re-submit your reset request.";
                  exit();
                } else if ($tokenCheck == true){
                  $tokenEmail = $row['pwdResetEmail'];

                  $sql = "SELECT FROM users WHERE email_add=?;";
                  $stmt = mysqli_stmt_init($conn);
                  //check if stmt has errors

                      if (!mysqli_stmt_prepare($stmt, $sql)){
                      echo "There was an error!";
                      exit(); 
                      }else{  
                        mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                            if (!$row = mysqli_fetch_assoc($result)){ 
                              //grabs the data(in column names)and insert it in a associative array
                              echo "There was an error!";
                              exit();
                            }else{ 
                                $sql = "UPDATE users SET pwd=? WHERE email_add=?";
                                //Updates user pw that matches users email of the user that is being processed
                                $stmt = mysqli_stmt_init($conn);
                                //check if stmt has errors

                                    if (!mysqli_stmt_prepare($stmt, $sql)){
                                      echo "There was an error!";
                                      exit(); 
                                    }else{  
                                      $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                                      mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                                      mysqli_stmt_execute($stmt);

                                          $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?";
                                          $stmt = mysqli_stmt_init($conn);
                                          if (!mysqli_stmt_prepare($stmt, $sql)){
                                            echo "There was an error!";
                                            exit(); 
                                          }else{ 
                                            mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                            mysqli_stmt_execute($stmt); 
                                            header("Location: ../login.php?newpwd=passwordupdated");
                                          }

                           }
                   }
          } 
    }

}else{
  eader("Location: ../login.php");
}
