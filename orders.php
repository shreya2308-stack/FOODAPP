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
            <link rel="stylesheet" href="styles1.css">
    </head>
    <body>
    <?php
    echo $_SESSION['username'];
    ?>
        <div>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Orders</th>
                </tr>
                    <?php
                    if(mysqli_num_rows($result)>0)
                    {
                        while($row = mysqli_fetch_array($result))
                        {
                    ?>
                        <tr>
                        <td><?php echo $row["username"];?></td>
                        <td><?php echo $row["products"];?></td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
            </table>
        </div>    
    </body>
</html>