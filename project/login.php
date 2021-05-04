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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.min.css" integrity="sha512-gRH0EcIcYBFkQTnbpO8k0WlsD20x5VzjhOA1Og8+ZUAhcMUCvd+APD35FJw3GzHAP3e+mP28YcDJxVr745loHw==" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="styles.css">
        <style>
           
        </style>
    </head>
    <body style="background-image: url(Images/bg3.jpg);">
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
            $_SESSION['phone'] = $email_pass['phone'];
            $_SESSION['email'] = $email_pass['email'];


            $pass_decode = password_verify($password, $db_pass);

            if($pass_decode){
                ?>
                <script >
                alert("Login Successful");
                </script>
                <?php
                
                header('location:products.php');
                            
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
    <header class="header">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="index.html"><img src="images/foodnest.png" alt="logo" class="img-responsive"></a>
        </nav>
      </header> 
        <img src="Images/FN1.png" alt="" style='height:400px;margin-top: 200px; margin-right: 150px;' align=right >
        <section class="positioning">
        <br>
            <form action="login.php" method="POST" >
                <div class="UserContainer" style='margin-left: 400px;'>
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
                <br><br>     
            </form>
        </section>
    </body>
</html>
