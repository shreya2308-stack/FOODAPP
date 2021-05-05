<?php
session_start();
$name=$_SESSION['username'];

include 'dbcon.php';
$sql = "SELECT * FROM product WHERE product_name='" . $_GET["product_name"] . "'";

$result = mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
      
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="shrink-to-fit=no, width=device-width,initial-scale=1">
        <title>Add Product</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.min.css" integrity="sha512-gRH0EcIcYBFkQTnbpO8k0WlsD20x5VzjhOA1Og8+ZUAhcMUCvd+APD35FJw3GzHAP3e+mP28YcDJxVr745loHw==" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
        <link rel="stylesheet" href="styles1.css">
    <style>
        .UserContainer {
    margin-top:50px;
    border-radius: 5px;
    background-color: #ffffffda;
    padding: 20px;
    width: 33%;
}
    </style>
        
    </head>
    <body style="background-image: url(images/bg1.jpg);" >
      <header class="header">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="index.html"><img src="images/foodnest.png" alt="logo" class="img-responsive"></a>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link active" href="adminpage.php">Products</a>
              </li>
                <li class="navbar__item" id="dropdown">
                  <a class="nav-link" href="#" style="margin-right:30px"><img src="images/user.png" height="30px"></a>
                    <div class="dropdown-content">
                        <ul>
                            <li class="dropdown-links">
                                <?php
                                  echo $_SESSION['username'];
                                ?>
                            </li>
                            <li class="dropdown-links">
                                <a href="admin_orders.php" >Orders</a>
                            </li>                 
                            <li class="dropdown-links">
                                <a href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header> 
      <?php

        include 'dbcon.php';

        if(isset($_POST['submit'])){


            $product_name = mysqli_real_escape_string($con, $_POST['product_name']) ;
            $product_price = mysqli_real_escape_string($con, $_POST['product_price']) ;
            $product_image = mysqli_real_escape_string($con, $_POST['product_image']) ;
            $product_code = mysqli_real_escape_string($con, $_POST['product_code']) ;

            $updatequery = "UPDATE `product` SET `product_name`='$product_name',`product_price`='$product_price',`product_image`='Images/$product_image',`product_code`='$product_code' )";
            $Uquery = mysqli_query($con,$updatequery);
        }
        ?>
<main>
        <h3 style="text-align:center;color:white">Edit poducts</h3>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                <div class="UserContainer" style='margin-left: 400px;'>
                <?php
                    while ($rows=mysqli_fetch_assoc($result))
                    {
                ?>
                        <label for="product_name" style="font-size: 18px;">Product Name</label>
                        <br>
                        <input style="font-size: 25px; font-family: 'Lateef', cursive;" type="text" value="<?php echo $rows['product_name'] ?>" placeholder="Enter product name" name="product_name" required minlength="3">
                        <br> <br>
                        <label for="product_price" style="font-size: 18px;">Product Price</label>
                        <br>
                        <input style="font-size: 25px; font-family: 'Lateef', cursive;" type="number" value="<?php echo $rows['product_price'] ?>" placeholder="Enter cost" name="product_price" required>
                        <br>
                        <br>
                        <label for="product_image" style="font-size: 18px;">Product Image</label>
                        <br>
                        <input style="font-size: 25px; font-family: 'Lateef', cursive;" type="file" value="<?php echo $rows['product_image'] ?>" name="product_image" required>
                        <br>
                        <br>
                        <label for="product_code" style="font-size: 18px;">Product Code</label>
                        <br>
                        <input style="font-size: 25px; font-family: 'Lateef', cursive;" type="text" value="<?php echo $rows['product_code'] ?>" placeholder="Enter Code" name="product_code"  required pattern="[p]\d{4}">
                        <br>
                        <br>
                        <button type="submit" class="signupbtn" name="submit">Edit</button>
                    </div>
                    <br><br>
                <?php
                    }
                ?>
            </form>
        </main>
    </body>
</html>