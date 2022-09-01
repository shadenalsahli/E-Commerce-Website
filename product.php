<?php 
require_once('config.php');
?>

<!DOCTYPE html>

<html>

<head>

    <title><?= $_GET['name'] ?></title>
    
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

    div,h1,p {
      margin:0px auto; }

    h1 {
       color: #f34949; }

    #message2, #message3 {
        color: #f34949;
        font-weight: 500; }

     #text2 {
         text-align: center;
     }   

     table, th, td {
        margin:0px auto;
        padding-top:10px ;
        }

        #myIMG {
            height: 48px;
            width: 42px;
        }

        #myIMG2 {
            height: 55px;
            width: 55px;
        }

        #gtco-special-dishes {
       padding-top: 40px; }

       #butDes {
        padding: 0px;
        border: none;
        background: none;
       }

       #sucBack {
           background-color: #DBF9DB;
       }

  </style>

</head>

<body data-spy="scroll" data-target="#navbar" class="static-layout">

    <?php

    if ($_SESSION["loggedin"] !== true || !isset($_SESSION["loggedin"])) {
      echo("<script>location.href = 'customer.php';</script>");
      exit;
    }
    
    ?>

<!--- Get product details --->
<?php
        if (isset($_GET['pid']) && !empty($_GET['pid'])) { 

          $sql = mysqli_query($conn, "SELECT * FROM Products WHERE id=$_GET[pid]");

          if ($sql) {
            
            if ($row = mysqli_fetch_assoc($sql)) {
              $idOfProduct = $row['id'];
              $nameOfProduct = $row['name'];
              $priceOfProduct = $row['price'];
              $descriptionOfProduct = $row['description'];
              $quantityOfProduct = $row['quantity'];
            }
          } else {echo "No Records Found!";}
        }
        ?>


<!-- Add the product to the cart -->
<?php
        if (isset($_POST['add_to_cart'])) {
          
          if($_POST['add_to_cart'] == 'Add To Cart') {

                  //intval: Return the integer value
                  $productId = intval($_POST['product_id']);
                  $productQuan = intval($_POST['product_qty']);
                  $sql2 = mysqli_query($conn, "SELECT * FROM Products WHERE id = $productId"); 

                  if ($sql2) {
                        if ($productInfo = mysqli_fetch_assoc($sql2)) {
                          
                          $totalPrice = $productQuan * $productInfo['price'];
                          // creat array to store the product "To display it in the cart page"
                          $arrayOfProducts = [
                            'productID_' => $productId,
                            'productQuantity_' => $productQuan,
                            'productName_' => $productInfo['name'],
                            'productPrice_' => $productInfo['price'],
                            'totalPrice_' => $totalPrice,
                          ];

                        // Add the product to an array
                        if (isset($_SESSION['cart_items']) && !empty($_SESSION['cart_items'])) { 

                              $productsId = [];
                              foreach ($_SESSION['cart_items'] as $Key => $value) {
                                $productsId[] = $value['productID_'];
                                if ($value['productID_'] == $productId) {
                                    $_SESSION['cart_items'][$Key]['productQuantity_'] = $productQuan;
                                    $_SESSION['cart_items'][$Key]['totalPrice_'] = $totalPrice;
                                    break; }}

                              if (!in_array($productId, $productsId)) {
                                $_SESSION['cart_items'][] = $arrayOfProducts; }
                              $flag = true;

                        } else { // for the first product that will be added to the cart
                          $_SESSION['cart_items'][] = $arrayOfProducts;
                          $flag = true; }
                        }
                  }
            }
        }

        ?>

 	
</div>	<div id="canvas-overlay"></div>
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
                                header('location:customer.php');
                            }

                    ?>

                        <button id="butDes" type="submit" name="destroy_sess">  <img src="website_images/log_out.jpg" id="myIMG2" title="Log out" alt=""> </button>
            </form>

        </div>
    </th>
    </tr>

    </table>	

        <a class="nav-link" id="text2" href="home.php">Home</a>

<section id="gtco-special-dishes" class="bg-grey section-padding">
    <div class="container">
        <div class="section-content">
            <div class="heading-section text-center">
                <span class="subheading">
                    Welcome !
                </span>
                <h2>
                Product details
                </h2>
            </div>

 <!-- View success message about adding the product to the cart -->
  <?php if (isset($row) && is_array($row)) { 
     if (isset($flag) && $flag == true) { ?>
      <div class="row mt-3">
        <div class="col-md-12 form-group"> 
        <div id="sucBack" class="alert">
            <button type="button" class="close" data-dismiss="alter">&times;</button>
            <img src="<?php echo $row['photo']; ?>" style="width:40px;">
            <?php echo $nameOfProduct ?> is added to the cart successfully !! <a href="cart.php">View Cart</a>
        </div>
        </div>
      </div>
    <?php } ?>

<!--- Display the product in the page --->
    <form method="post">
    <div class="row mt-5">
      <div class="col-lg-5 col-md-6 align-self-center py-5">
              <h2 class="special-number"></h2>
      <div class="dishes-text">

<div  style="padding-top:20px">
                <h3><span><?= $nameOfProduct ?></span><br> 
                <?php
                if ($quantityOfProduct < 5) {
                  echo "</br>Only " . $quantityOfProduct . ' products remining in the stock !!</br>'; 
                }
                ?>
               </h3>
           </div>

               <p class="pt-3"><?= $descriptionOfProduct ?></p>

                <div  style="padding-top:20px">
              <h3 class="special-dishes-price"> <?= $priceOfProduct ?> SAR </h3>
              </div>

              <!-- To add the product in the cart array -->
              <input type="hidden" name="product_id" value="<?= $idOfProduct ?>">

              <table>
                  <tr>
                <!-- Indicate the desired quantity of the product -->
                <th> <input class="btn btn-primary w-100" type="submit" name="add_to_cart" value="Add To Cart"></th> 
                <th><input class="btn" type="number" name="product_qty" value="1" min="1" max="<?= $quantityOfProduct ?>" placeholder="Quantity" required></th> 
                </tr>
                </table>
                </div>      
         
              </div>

              <div class="col-lg-5 offset-lg-2 col-md-6 align-self-center mt-4 mt-md-0">
                    <img src="<?php echo $row['photo']; ?>" alt="<?= $nameOfProduct ?>" class="img-fluid shadow w-100">
                </div>

            </div>
    </form>
  <?php } ?>

        </div>
    </div>
    
</section>

<section id="gtco-testimonial" class="overlay bg-fixed section-padding" style="background-image: url(website_images/giphy.gif);">
    <div class="container">
        <div class="section-content">
            <div class="heading-section text-center">
                <span class="subheading">
                   with #COFFEE EQUIPMENTS
                </span>
                <h2>
                    Happy Customer !
                </h2>
            </div>
        </div>
    </div>
</section>

<div class="col-sm-7 py-5 pl-md-0 pl-4">
    <div class="heading-section pl-lg-5 ml-md-5">
        <span class="subheading">
            About
        </span>
        <h2>
            Welcome to #COFFEE EQUIPMENTS
        </h2>
    </div>
    <div class="pl-lg-5 ml-md-5">
        <p>It is one of the most promising trademark coffee equipment. It provides all its needs at the best prices with good quality.</p>
    </div>
</div>



</div>
</div>


</body>
</html>
