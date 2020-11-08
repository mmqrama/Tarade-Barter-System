<?php

if (isset($_POST["reset-pass-submit"])) {

    //variable for generation of random bytes and convert it to hexadecimal for tokens
    $selector = bin2hex(random_bytes(8));
     //variable that responsible for authentication of the user
    $token = random_bytes(32);
   
    //creation of token in url
    $url = "www.tarade.ph/newPass.php?selector=" . $selector . "&validator=". bin2hex($token);
    
    //token expiration
    //U format for generic format of the date in seconds
    $expires = date("U") + 1800;

    require 'conn_db.php';

    $userEmail = $_POST["email"];

    //Deletion of existing token to create a new one to avoid having multiple tokens
    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail = ?";
    //Initialize connection to database file
    $stmt = mysqli_stmt_init($conn);
    //check if stmt has errors
    if (!mysqli_stmt_prepare($stmt, $sql)){
       echo "There was an error!";
       exit(); 
    } else { 
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt); 
    }

    $sql = "INSERT INTO pwdrReset (pwdResetEmail, pwsResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    //if statement for errors
    if (!mysqli_stmt_prepare($stmt, $sql)){
       echo "There was an error!";
       exit(); 
    } else { 
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        // There are 4 placeholders(line 34) that's why there is 4 "ssss" for parameters (line 42)
        mysqli_stmt_execute($stmt); 
    }

  // close left out statements which is the $stmt
  mysqli_stmt_close($stmt);
  mysqli_close($conn); //closed connections

  //sending the password recovery email
  $to = $userEmail;
  //subject for password recovery email
  $subject = 'Tarade Account Password Reset';
  $message = '<p>Tarade receive a password reset request. The link to your password is below. If you did not
  make this request, you can ignore this email<p>';
  $message .= '<p> Here is your password reset link: </br>';
  $message .= '<a href = "'. $url . '">' . $url . '</a></p>';
  //used .= in line 67 to continue p in line 65-66

  //Headers of the password recovery email
  $headers = "From: Tarade <taratrade@gmail.com>\r\n"; // enter legit email of tarade site inside of <>
  $headers = "Reply-To: taratrade@gmail.com\r\n"; // do the same thing you did in line 72 and change taratrade....com 
  $headers = "Content-type: text/html\r\n";

  mail($to, $subject, $message, $headers);
  
  header("Location: ../forgotPass.php?reset=success");


} else{
    header("Location: ../login.php");
}