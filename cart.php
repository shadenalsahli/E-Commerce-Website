<?php 
require_once('config.php');
?>

<!DOCTYPE html>

<html>

<head>

    <title>View cart</title>
    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- External CSS -->
  <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendor/select2/select2.min.css">
  <link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/brands.css">

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Josefin+Sans:300,400,700">
  <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <!-- CSS -->
  <link rel="stylesheet" href="css/style.min.css">

  <!-- Modernizr JS for IE8 support of HTML5 elements and media queries -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

    <style>
     
        div,h1 {
          margin:0px auto; 
          text-align: center;}
    
        #h1COLOR {
           color: #f34949;}
    
        #gtco-menu{
           padding-top: 20px; 
           padding-bottom: 50px;}
    
        .viewO {
          border:1px dashed gray;
          text-align: center;
        }

        td {
            color: #6d767e;
        }

        th {
       color: #f34949;
        }

         button {
           background-color: white;
           border-color: white;
           border-width: 0px;
       }

        #butDes {
        padding: 0px;
        border: none;
        background: none;
       }

       #myIMG {
            height: 48px;
            width: 42px;
        }

       #myIMG2 {
            height: 55px;
            width: 55px;
        }

      table, th, td {
            margin:0px auto;
              text-align: center;
            }

            #text2 {
         text-align: center;
     }   

        </style>


</head>
<body data-spy="scroll" data-target="#navbar">

<?php
if ($_SESSION["loggedin"] !== true || !isset($_SESSION["loggedin"])) {
  echo("<script>location.href = 'customer.php';</script>");
  exit;
}
?>

<?php 
      // Update the vieworders and products tables in the DB 
      if(isset($_GET['action']) && $_GET['action'] == 'checkOut')
      {
              // Update vieworders table
              $customerEmail = $_SESSION['email'];
              $total = $_SESSION['tcost'];
              $sqlOrder = "insert into viewOrders (customerEmail,total) value ('$customerEmail','$total')";
              $resultOrder = mysqli_query($conn, $sqlOrder);

              if($resultOrder){
                    // Update the products table 
                    foreach($_SESSION['cart_items'] as $Key => $value)
                    {
                        $Pid=$value['productID_'];
                        $sqlProduct = "SELECT quantity FROM Products WHERE id = '$Pid'";
                        $resultProduct = mysqli_query($conn, $sqlProduct);

                        if (mysqli_num_rows($resultProduct) === 1) 
                        { 
                            if ($productQuan = mysqli_fetch_assoc($resultProduct)) {
                                $newQ=(int)$productQuan['quantity']-(int)$value['productQuantity_'];
                            }
                        }
                        $sqlUpadate = "UPDATE Products SET quantity=$newQ WHERE id=$Pid";
                        $resultUpadate = mysqli_query($conn, $sqlUpadate);
                    }
                    //The unset() function unsets a variable (delete it)
                    unset($_SESSION['cart_items']);
                    unset($_SESSION['tcost']);
                    echo("<script>location.href = 'cart.php';</script>");
              } 
      }
      // To remove the product
      if(isset($_GET['action'],$_GET['item']) && $_GET['action'] == 'remove')
      {
                unset($_SESSION['cart_items'][$_GET['item']]);
                echo("<script>location.href = 'cart.php';</script>");
                exit();
      }
      // To remove all the products
      if(isset($_GET['action']) && $_GET['action'] == 'removeAll')
      {
                unset($_SESSION['cart_items']);
                echo("<script>location.href = 'cart.php';</script>");
                exit();
      }
?>

  <div id="canvas-overlay"></div>
  <div class="boxed-page">

  <table>
<tr>

      <th>
        <div class="mb-2">
            <a class="btn btn-icon btn-lg" href="cart.php" data-featherlight="iframe" data-featherlight-iframe-allowfullscreen="true">
               <img src="website_images/cart2.jpg" id="myIMG" title="Show shopping cart" alt="">
            </a>
        </div>
    </th>

    <th>
        <nav id="navbar-header" class="navbar navbar-expand-lg">
            <div class="container">
                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                        <h1>#COFFEE EQUIPMENTS</h1>
                </div>
            </div>
        </nav>  
    </th>
    <th>
        <div class="mb-2">

            <form method="post" action="home.php">

                 <?php 

                            if(isset($_POST['destroy_sess'])) {
                                session_destroy();
                                unset($_SESSION['loggedin']);
                                echo("<script>location.href = 'customer.php';</script>");
                                
                            }

                    ?>

                        <button id="butDes" type="submit" name="destroy_sess">  <img src="website_images/log_out.jpg" id="myIMG2" title="Log out" alt=""> </button>
            </form>

        </div>
    </th>
    </tr>

    </table>	

        <a class="nav-link" id="text2" href="home.php">Home</a>

<section id="gtco-reservation" class="bg-fixed bg-white section-padding overlay" style="background-image: url(website_images/view_orders2.jpg);">
    <div class="container">

             <div class="section-content bg-white p-5 shadow">
         
                    <div class="heading-section text-center">
                        <span class="subheading">
                            View
                        </span>
                        <h2>
                            Cart
                        </h2>
                    </div>  

              <!-- If the cart is empty ------>  
              <?php if(empty($_SESSION['cart_items'])){?>
                    <table>
                        <tr>
                          <td>
                              <h4>Your cart is empty !!</h4>
                          </td>
                        </tr>
                    </table>
              <?php } ?>

              <?php if(isset($_SESSION['cart_items']) && count($_SESSION['cart_items']) > 0){?>

              <table style="width:100%">

                 <tr>
                  <th class="viewO"> <h4>Product No.</h4></th>
                  <th class="viewO"> <h4>Product Name</h4></th>
                  <th class="viewO"> <h4>Price</h4></th>
                  <th class="viewO"> <h4>Quantity</h4></th>
                  <th class="viewO"> <h4>Total Price</h4></th>
                  <th class="viewO"> <h4>Remove Product</h4></th>
                </tr>
              
                <?php 
                    $iteamNo = 0;
                    $totalPrice = 0;
                    $allProducts = 0;

                    foreach($_SESSION['cart_items'] as $key => $value){
                    $total = $value['productPrice_'] * $value['productQuantity_'];
                    $totalPrice+= $total;
                    $allProducts+=$value['productQuantity_'];
                    $iteamNo = $iteamNo+1; 
                    ?>

                    <tr>
                              <td class="viewO"> <h4> <?php echo $iteamNo ?></h4> </td>
                              <td class="viewO"> <h4> <?php echo $value['productName_']; ?></h4> </td>
                              <td class="viewO"> <h4> <?php echo $value['productPrice_'];?> SAR</h4> </td>
                              <td class="viewO"> <h4> <?php echo $value['productQuantity_'];?> </h4> </td>
                              <td class="viewO"> <h4> <?php echo $total;?> </h4> </td>
                              <td class="viewO"> <h4><a href="Cart.php?action=remove&item=<?=$key?>"><button class="btn btn-primary w-100">DUMMY BUTTON!</button></a></h4> </td>
                    </tr>

                 <?php } ?>
                         
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="viewO">
                            <strong>
                                <?php echo ($allProducts==1)?$allProducts.' item':$allProducts.' items'; ?>
                            </strong>
                        </td>
                        <td class="viewO"><strong><?php echo $totalPrice;  $_SESSION['tcost']=$totalPrice;?> SAR</strong></td>
                        <td class="viewO"><h4>
                        <a href="cart.php?action=removeAll"><button class="btn btn-primary w-100" type="button">Remove All Products</button></a>
                    </h4>
                        </td>
                    </tr> 
          </table>

        <!------ Checkout button ------>
        <div  style="padding-top:20px">
        <a href="cart.php?action=checkOut"><button class="btn btn-primary" type="button">CheckOut (Cash on Delivery) !</button></a>
        </div>

        <?php } ?> 


        </div>
    </div>


</section>

</div>
</body>
</html>
