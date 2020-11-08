<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>Tarade! · Reset Password</title>
</head>
<body>
    <main>
     <div class="center">
       
       <?php>
        //getting the tokens
        $selector = $_GET["selector"];
        $validator = $_GET["validator"];

        //extra safety precaution for the tokens
        if (empty($selector) || (empty($validator)){
           echo "Could not validate your request!";
        } else { 
            //for verification if the token is in hexadecimal format 
            if(ctype_xdigit($selector)!== false && ctype_xdigit($validator)!== false ) { 
                //close php to open a HTML Form
                ?> 
                <div class="center">
                <form action="dbConnect/reset_password.php" method="POST">
                 <input type="hidden" name="selector" value="<?php> echo $selector ?>">
                 <input type="hidden" name="validator" value="<?php> echo $validator ?>">
                 <input type="password" name="pwd" placeholder="Enter new password">
                 <!-- Another password for verification to avoid accepting typo errors as the new password -->
                 <input type="password" name="pwd-repeat" placeholder="Confirm new password">
                 <input type="submit" name="reset-password-submit" value="Reset Password">

                <?php>
            }

        }
        ?>
   </div>
</body>
</html>
