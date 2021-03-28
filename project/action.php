<?php
    session_start();
    require 'config.php';

    if(isset($_POST['pid'])){
        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $pprice = $_POST['pprice'];
        $pimage = $_POST['pimage'];
        $pcode = $_POST['pcode'];
        $pqty = 1;

        $stmt = $conn->prepare ("SELECT product_code from cart WHERE product_code=?");
        $stmt->bind_param("s", $pcode);
        $stmt->execute();
        $res= $stmt->get_result();
        $r = $res->fetch_assoc();
        $code = $r['product_code']??'';

        if(!$code){
            $query = $conn->prepare("INSERT INTO cart(product_name,product_price,product_image,qty,total_price,product_code) 
            VALUES(?,?,?,?,?,?)");
            $query->bind_param("sssiss",$pname,$pprice,$pimage,$pqty,$pprice,$pcode);
            $query->execute();

            echo '<div class="alert alert-success alert-dismissible mt-2">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Item added to your cart!</strong> 
                    </div>';


    }
    else{
        echo '<div class="alert alert-danger alert-dismissible mt-2">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Item already added to your cart!</strong> 
        </div>';
    }

  }
    if(isset($_GET['cartItem']) && isset($_GET['cartItem'])=='cart_item'){
        $stmt= $conn->prepare("SELECT * from cart");
        $stmt->execute();
        $stmt->store_result();
        $rows= $stmt->num_rows;

        echo $rows;
    }

    // Remove single items from cart
	if (isset($_GET['remove'])) {
        $id = $_GET['remove'];
  
        $stmt = $conn->prepare('DELETE FROM cart WHERE id=?');
        $stmt->bind_param('i',$id);
        $stmt->execute();
  
        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'Item removed from the cart!';
        header('location:cart.php');
      }
  
      // Remove all items at once from cart
      if (isset($_GET['clear'])) {
        $stmt = $conn->prepare('DELETE FROM cart');
        $stmt->execute();
        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'All Items removed from the cart!';
        header('location:cart.php');
      }
  
      // Set total price of the product in the cart table
      if (isset($_POST['qty'])) {
        $qty = $_POST['qty'];
        $pid = $_POST['pid'];
        $pprice = $_POST['pprice'];
  
        $tprice = $qty * $pprice;
  
        $stmt = $conn->prepare('UPDATE cart SET qty=?, total_price=? WHERE id=?');
        $stmt->bind_param('isi',$qty,$tprice,$pid);
        $stmt->execute();
      }

  ?>