<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
	<title>Tarade! · Sign Up</title>
</head>

<body>

	<div class="center">
		<h1>Sign Up to Tarade!</h1>
        <form action="dbConnect/signup_db.php" method="POST">

            
            <?php
                if(isset($_GET['name'])){
                    $name = $_GET['name'];
                    echo '<div class="txt_field"><input type="text" name="name" placeholder="Full Name" value="'.$name.'"></div>';
                }else{
                    echo '<div class="txt_field"><input type="text" name="name" placeholder="Full Name"></div>';
                }

                if(isset($_GET['contact_num'])){
                    $number = $_GET['contact_num'];
                    echo '<div class="txt_field"><input type="text" name="contact_num" placeholder="Contact Number" value="'.$number.'"></div>';
                }else{
                    echo '<div class="txt_field"><input type="text" name="contact_num" placeholder="Contact Number"></div>';
                }

                if(isset($_GET['email_add'])){
                    $email = $_GET['email_add'];
                    echo '<div class="txt_field"><input type="text" name="email_add" placeholder="Email Address" value="'.$email.'"></div>';
                }else{
                    echo '<div class="txt_field"><input type="text" name="email_add" placeholder="Email Address"></div>';
                }
            ?>
           
			<div class="txt_field">
                <input type="password" name="password" placeholder="Password">
            </div>
            <p class="reqpass">Minimum of 8 characters (Atleast 1 uppercase letter and 1 number)</p>
			<div class="txt_field">
                <input type="password" name="cpassword" placeholder="Confirm Password">
            </div>
            
			<p class="terms">*By signing up, you agree to the <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a> of the company.</p>	
            <input type="submit" name="submit" value="Sign Up">
            <div class="lsu_link">
                Already have an account? <a href="login.php">Login here.</a>
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
            else if($errorCheck == 'invalidname'){
                echo "<p class='wrong'>Invalid Name!</p>";
                exit();
            }
            else if($errorCheck == 'invalidnumber'){
                echo "<p class='wrong'>Invalid Contact Number!</p>";
                exit();
            }
            else if($errorCheck == 'invalidemail'){
                echo "<p class='wrong'>Invalid Email Address!</p>";
                exit();
            }
            else if($errorCheck == 'passworddontmatch'){
                echo "<p class='wrong'>Passwords doesn't match!</p>";
                exit();
            }
            else if($errorCheck == 'emailtaken'){
                echo "<p class='wrong'>Email Address already used!</p>";
                exit();
            }
            else if($errorCheck == 'numbertaken'){
                echo "<p class='wrong'>Contact Number already used!</p>";
                exit();
            }
            else if($errorCheck == 'passwordisweak'){
                echo "<p class='wrong'>Password is weak!</p>";
                exit();
            }
            else if($errorCheck == 'none'){
                echo "<p class='right'>Signed up successfully!</p>";
                exit();
            }
        }
    ?>

	</div>

</body>
</html>