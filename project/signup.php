<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FoodNest.com/signup</title>        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lateef&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
        <style>
           input:invalid {
        border: 2px dashed red;
      }

      input:valid {
        border: 2px solid black;
      }
        </style>
    </head>
    <body style="background-image: url(Images/bg3.jpg);">
    <?php

        include 'dbcon.php';

        if(isset($_POST['submit'])){


            $username = mysqli_real_escape_string($con, $_POST['username']) ;
            $email = mysqli_real_escape_string($con, $_POST['email']) ;
            $phone = mysqli_real_escape_string($con, $_POST['phone']) ;
            $password = mysqli_real_escape_string($con, $_POST['password']) ;
            $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']) ;

            $pass = password_hash($password, PASSWORD_BCRYPT);
            $cpass = password_hash($password, PASSWORD_BCRYPT);
        
            $emailquery = " SELECT * from registration1 where email='$email' ";
            $Equery = mysqli_query($con,$emailquery);

            $emailcount = mysqli_num_rows($Equery);

            $userquery = " SELECT * from registration1 where username='$username' ";
            $Uquery = mysqli_query($con,$userquery);
            $usercount = mysqli_num_rows($Uquery);

            if($emailcount>0){
                        ?>
                        <script>
                            alert("Email already exists.")
                        </script>
                        <?php
            }
            elseif($usercount>0){
                ?>
                <script>
                    alert("Username already exists.")
                </script>
                <?php
            }
            else{
                if ($password === $cpassword) {
                    $insertquery = "INSERT into `registration1` (`username`, `email`, `phone`, `password`, `cpassword`) VALUES ( '$username', '$email', '$phone', '$pass', '$cpass')";
                    $iquery = mysqli_query($con,$insertquery);
                    
                    ?>
                    <script >
                        alert("Thank you for signing-up");
                    </script>
                    <?php 
                    
                header('location:index.php');
                }
                else{
                    ?>
                    <script>
                        alert("Password doesn't match.")
                    </script>
                    <?php 
                }
            }
        }
       
            
    ?>
   
    

        <main>
        <header class="header">
            <nav class="navbar">
                <div class="navbar__container">
                    <a href="index.php" id="navbar__logo">FoodNest</a><img src="Images/FN.png" style="height: 75px;">
                </div>
            </nav>
        </header>
            <div >
                <img src="Images/FN1.png" alt="" style='height:400px;margin-top: 150px; margin-right: 150px;' align=right >
                <section class="positioning">
                
                <br>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="UserContainer" style='margin-left: 400px;'>
                            <label for="username" style="font-size: 18px;">Username</label>
                            <br>
                            <input style="font-size: 25px; font-family: 'Lateef', cursive;" type="text" placeholder="Enter Username" name="username" required>
                            <br> <br>
                            <label for="email" style="font-size: 18px;">Email Address</label>
                            <br>
                            <input style="font-size: 25px; font-family: 'Lateef', cursive;" type="text" placeholder="Example@email.com" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                            <br>
                            <br>
                            <label for="phone" style="font-size: 18px;">Phone Number</label>
                            <br>
                            <input style="font-size: 25px; font-family: 'Lateef', cursive;" type="text" placeholder="Enter Phone Number" name="phone" required  minlength="10" maxlength="10">
                            <br>
                            <br>
                            <label for="password" style="font-size: 18px;">Choose a Password</label>
                            <br>
                            <input style="font-size: 25px; font-family: 'Lateef', cursive;" type="password" placeholder="Must contain atleast 10 characters" name="password" required>
                            <br>
                            <br>
                            <label for="cpassword" style="font-size: 18px;">Repeat Password</label>
                            <br>
                            <input style="font-size: 25px; font-family: 'Lateef', cursive;" type="password" placeholder="Must contain atleast 10 characters" name="cpassword" required>
                            <br>
                            <br> <br>
                            <button type="submit" class="signupbtn" name="submit">Sign Up</button>
                            <br>
                            <br>
                            <p>Already have an account? <a href="login.php" style="text-decoration: none;color: rgb(57, 167, 231); font-size: 15px;">Sign In</a></p>
                            <br>
                            <p>By proceeding further, you are agreeing to our <a href=# style="text-decoration: none;color: rgb(57, 167, 231); font-size: 15px;">Terms & Conditions</a></p>
                        
                        </div>
                        <br><br>
                    </form>
                </section>
            </div>
        </main>
    </body>
</html>
