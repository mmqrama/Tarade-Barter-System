<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>Tarade! · Reset Password</title>
</head>
<html>
     <div class="center">
       <h1>Reset Your Password</h1>
       <p class="para">An email will be send to you with instructions on how to reset your password.</p>
       <form action="dbConnect/reset_request.php" method="POST"> 
         <div class="txt_field">
            <input type="text" name="email" placeholder="Enter your email address">
         </div>
         <input type="submit" name="reset-pass-submit" value="Reset Password">
         <br>

       </form>

       <?php
          // success message for checking reset if it gets equal parameters to success
          if (isset($_GET["reset"])){
              if ($_GET["reset"] == "success"){
                  echo '<p class= "signupsuccess">Check your email!</p>'; 
              }
          }
       ?>
   </div>
</html>
