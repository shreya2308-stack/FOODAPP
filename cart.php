<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudfare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudfare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Dancing+Script" rel="stylesheet">
    </head>
<body class="container">
    <h1 class="text-center text-danger mb-5" style="font-family: 'Abril Fatface',cursive;"> ONLINE SHOPPING CART PHP MYSQLI</h1>

    
    <div class="row">

    <?php
    $con= mysqli_connect('localhost','root');
    mysqli_select_db($con,'cart');

    //if($con){
    //    echo "connection sucessful";

   // }else{
     //   echo "no connection";
   // }

   $query= "SELECT `id`, `name`, `img`, `price`, `discount` FROM `shoppingcart` ORDER BY id ASC";
   $queryfire= mysqli_query($con,$query);
   $num=mysqli_num_rows($queryfire);
   if($num>0){
       while($product= mysqli_fetch_array($queryfire)){

          ?>
        <div class="col-lg-3 col-md-3 col-sm-12">

         <form>
           <div class="card">
            <h6 class="card-title"> <?php echo $product['name']; ?> </h6>
            <div class="card-body">
               <img src="<?php echo $product['img']; ?>" alt="food" class="img-fluid">

               <h6> &#8377;<?php echo $product['price']; ?> 
               <span> (<?php echo $product['discount']; ?>% off) </span></h6>

            </div>

            </div>
         </form>


        </div>
    
<?php
       }


       
   }

    ?>
</div>
</body>
</html>