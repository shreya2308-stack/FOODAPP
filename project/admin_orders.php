<?php
session_start();
$connect = mysqli_connect("localhost","root","","cart_system");
$name=$_SESSION['username'];
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
      <title> Orders</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.min.css" integrity="sha512-gRH0EcIcYBFkQTnbpO8k0WlsD20x5VzjhOA1Og8+ZUAhcMUCvd+APD35FJw3GzHAP3e+mP28YcDJxVr745loHw==" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
      <link rel="stylesheet" href="styles1.css">
     <style>
     table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 80%;
  border: 1px solid #ddd;
  margin:100px auto ;
  
}
th{
    
    background-color: #fff;
}
th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(odd){background-color: #fff}
tr:nth-child(even){background-color: #f2f2f2}
     </style>
    </head>
    <body style="background-image: url(Images/bg3.jpg);" >
      <header class="header">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="index.html"><img src="images/foodnest.png" alt="logo" class="img-responsive"></a>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link active" href="adminpage.php">Products</a>
              </li>
                <li class="navbar__item" id="dropdown">
                  <a class="nav-link" href="#" style="margin-right:30px"><img src="Images/user.png" height="30px"></a>
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

        
        <div style="overflow-x:auto;">
        
            <table style='font-family:"Courier New", Courier, monospace; font-size:120%'>
                <th>Order Number</th>
                <th>Cart Items</th>
                <th>Address</th>
                <th>Payment Mode</th>               
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
