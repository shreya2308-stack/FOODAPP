<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FoodNest.com/login</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lateef&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
        <style>
           
        </style>
    </head>
    <body class="bgimage1">
    <?php

        include 'dbcon.php';

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email_search = " SELECT * from registration1 where email = '$email'";
        $query = mysqli_query($con,$email_search);

        $email_count = mysqli_num_rows($query);

        if($email_count){
            $email_pass = mysqli_fetch_assoc($query);

            $db_pass = $email_pass['password'];

            $_SESSION['username'] = $email_pass['username'];

            $pass_decode = password_verify($password, $db_pass);

            if($pass_decode){
                
                echo $_SESSION['username'];
            
        }   else{
            ?>
            <script >
                alert("Login Unsuccessful");
            </script>
            <?php 
        }

    }   else{
    echo "Invalid Email";
}

}

?>

        <nav class="navbar">
            <div class="navbar__container">
                <a href="Index.html" id="navbar__logo">FoodNest</a><img src="Images/1.png" style="height: 75px;">
            </div>
        </nav>
        
        <img src="Images/3.png" alt="" style='height:400px;margin-top: 200px; margin-right: 150px;' align=right >
        <section class="positioning">
        <br>
            <form action="login.php" method="POST" >
                <div class="UserContainer">
                    <label for="email" style="font-size: 18px;">Email Address</label>
                    <br>
                    <input style="font-size: 25px; font-family: 'Lateef', cursive;" type="text" placeholder="Enter Email" name="email" required>
                    <br>
                    <br>
                    <label for="password" style="font-size: 18px;">Password</label>
                    <br>
                    <input style="font-size: 25px; font-family: 'Lateef', cursive;" type="password" placeholder="Enter Password" name="password" required>
                    <br>
                    <span class="forget"><a href=# style="text-decoration: none; color: rgb(57, 167, 231);">Forgot Password?</a></span>
                    <br>
                    <br>
                    <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                    </label> 
                    <br><br>
                    <button type="submit" name="submit" class="signupbtn">Sign In</button>
                    <br>
                    <br>

                    <p style="color: rgb(31, 28, 28);">or you can sign in with</p>
                    <br>
                    
                    <button type="submit"  class="google">Google</button>
                    <br> <br>
                    <p>New to FoodNest? <a href="signup.php" style="text-decoration: none;color: rgb(57, 167, 231);font-size: 15px;">Sign up</a></p>
                    <br>
                    <p>By proceeding further, you are agreeing to our <a href=# style="text-decoration: none;color: rgb(57, 167, 231); font-size: 15px;">Terms & Conditions</a></p>
                </div>            
            </form>
        </section>
    </body>
</html>
