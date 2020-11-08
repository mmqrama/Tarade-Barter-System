<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarade! · Login</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="center">
        <h1>Log In to Tarade!</h1>
        <form action="dbConnect/login_db.php" method="POST">
            <div class="txt_field">
                <input type="email" name="email_add" placeholder="Email Address">
            </div>
            <div class="txt_field">
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="pass"><a href="forgotPass.php">Forgot Password?</a></div>
            <br>
            <input type="submit" name="submit" value="Log In">
            <div class="lsu_link">
                Don't have an account? <a href="signup.php">Sign up now.</a>
            </div>
        </form>

        <?php
            if(!isset($_GET['error'])){
                exit();
            }else{
                $errorCheck = $_GET['error'];

                if($errorCheck == 'emptyinput'){
                    echo "<p class='wrong'>Fill in all the fields!</p>";
                    exit();
                }
                else if($errorCheck == 'usernull'){
                    echo "<p class='wrong'>Email Address does not exist!</p>";
                    exit();
                }
                else if($errorCheck == 'wronglogin'){
                    echo "<p class='wrong'>The Email Address and Password you entered didn't match our record!</p>";
                    exit();
                }
            }
        ?>

        <?php
            if (!isset($_GET['newpwd'])){
                exit();
            }else{
                $right = $_GET['newpwd'];
                if ($_GET['newpwd'] == 'passwordupdated'){
                    echo "<p class='right'>Your password has been reset!</p>";
                    exit();
                  }
                }
        ?> 
    </div>
</body>
</html>