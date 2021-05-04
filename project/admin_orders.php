<?php
session_start();
$connect = mysqli_connect("localhost","root","","cart_system");

$sql = "SELECT * FROM orders INNER JOIN registration1 ON orders.name = registration1.username";

$result = mysqli_query($connect,$sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="shrink-to-fit=no, width=device-width,initial-scale=1">
            <title> CART SYSTEM</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.min.css" integrity="sha512-gRH0EcIcYBFkQTnbpO8k0WlsD20x5VzjhOA1Og8+ZUAhcMUCvd+APD35FJw3GzHAP3e+mP28YcDJxVr745loHw==" crossorigin="anonymous" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
            <link rel="stylesheet" href="styles.css">
     <style>
     table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}
th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
     </style>
    </head>
    <body>
   
 <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="index.php">FOODNEST</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link active" href="index.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="checkout.php">Checkout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fas
         fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"> </span> </a>
      </li>
    </ul>
  </div>
</nav>

        
        <div style="overflow-x:auto;">
            <table style='font-family:"Courier New", Courier, monospace; font-size:120%'>
            <th> CUSTOMER NAME</th>
                       <th> CART ITEMS</th>
                       <th> ADDRESS</th>
                       <th>PMODE</th>               
                    <?php
                    if(mysqli_num_rows($result)>0)
                    {
                        while($row = mysqli_fetch_array($result))
                        {
                    ?>
                    <?php
                    $str = $row["username"];
                    $fruits_ar=explode(" ",$str);
                    $str1 = $row["products"];
                    $fruits_ar1=explode(" ",$str1);?>
                   
                      
                    <tr><td><?php $arrlength=count($fruits_ar1);
                    echo($str)?></td>
                         <td><?php echo($str1)?></td>
 <td><?php echo($row["address"]) ?></td>
<td><?php echo($row["pmode"]) ?></td>
                    </tr>
                   
                    <?php
                        }
                    }
                    ?>
            </table>
        </div>    
    </body>
</html>
