<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
      
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="shrink-to-fit=no, width=device-width,initial-scale=1">
        <title>Add Product</title>
        <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lateef&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.min.css" integrity="sha512-gRH0EcIcYBFkQTnbpO8k0WlsD20x5VzjhOA1Og8+ZUAhcMUCvd+APD35FJw3GzHAP3e+mP28YcDJxVr745loHw==" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
        <link rel="stylesheet" href="styles.css">
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
    <?php

        include 'dbcon.php';

        if(isset($_POST['submit'])){


            $product_name = mysqli_real_escape_string($con, $_POST['product_name']) ;
            $product_price = mysqli_real_escape_string($con, $_POST['product_price']) ;
            $product_image = mysqli_real_escape_string($con, $_POST['product_image']) ;
            $product_code = mysqli_real_escape_string($con, $_POST['product_code']) ;
        
            $namequery = " SELECT * from product where product_name='$product_name' ";
            $Nquery = mysqli_query($con,$namequery);

            $namecount = mysqli_num_rows($Nquery);

            $codequery = " SELECT * from product where product_code='$product_code' ";
            $Pquery = mysqli_query($con,$codequery);
            $codecount = mysqli_num_rows($Pquery);

            if($namecount>0){
                        ?>
                        <script>
                            alert("Item already exists.")
                        </script>
                        <?php
            }
            elseif($codecount>0){
                ?>
                <script>
                    alert("Item code already exists.")
                </script>
                <?php
            }
            else{
                    $insertquery = "INSERT into `product` (`product_name`, `product_price`, `product_image`, `product_code`) VALUES ( '$product_name', '$product_price', 'Images/$product_image', '$product_code')";
                    $iquery = mysqli_query($con,$insertquery);
                    
                    ?>
                    <script >
                        alert("Item Added");
                    </script>
                    <?php 
                    
                header('location:adminpage.php');
                }
            }
       
            
    ?>
    
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
      <main>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <br>
                <h3 style="margin-left:18em;color:white; font-weight:600">ADD NEW ITEMS</h3>
                <div class="UserContainer" style='margin-left: 400px;'>
                    <label for="product_name" style="font-size: 20px;">Product Name</label>
                    <br>
                    <input style="font-size: 20px; font-family: 'Lateef', cursive;" type="text" placeholder="Enter product name" name="product_name" required minlength="3">
                    <br> <br>
                    <label for="product_price" style="font-size: 20px;">Product Price</label>
                    <br>
                    <input style="font-size: 20px; font-family: 'Lateef', cursive; width: 19em; padding:5px" type="number" placeholder="Enter cost" name="product_price" required>
                    <br>
                    <br>
                    <label for="product_image" style="font-size: 20px; ">Product Image</label>
                    <br>
                    <input style="font-size: 20px; font-family: 'Lateef', cursive; height:40px" type="file" name="product_image" required>
                    <br>
                    <br>
                    <label for="product_code" style="font-size: 20px;">Product Code</label>
                    <br>
                    <input style="font-size: 20px; font-family: 'Lateef', cursive;" type="text" placeholder="Enter Code" name="product_code"  required pattern="[p]\d{4}">
                    <br>
                    <br><br>
                    <button style="margin-left:10em; background-color:red" type="submit"  class="addbtn" name="submit">Add</button> 
                </div>
                <br><br>
            </form>
        </main>
    </body>
</html>