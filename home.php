<?php 
require_once('config.php');
?>
<!DOCTYPE html>

<html>

<head>

    <title>Home</title>

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

    #nameH3 {
        color: #f34949;
    }


    #message2, #message3 {
        color: #f34949;
        font-weight: 500; }

     #text2 {
         text-align: center;
     }   

     table, th, td {
        margin:0px auto;
          text-align: center;
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



  </style>

</head>

<body data-spy="scroll" data-target="#navbar" class="static-layout">

    <?php

    if ($_SESSION["loggedin"] !== true || !isset($_SESSION["loggedin"])) {
      echo("<script>location.href = 'customer.php';</script>");
      exit;
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

<section id="gtco-special-dishes" class="bg-grey section-padding">
    <div class="container">
        <div class="section-content">
            <div class="heading-section text-center">
                <span class="subheading">
                    Welcome !
                </span>
                <h2>
                <?php echo $_SESSION['name'];?>
                </h2>
            </div>

            <?php
  
            $sql="select * from Products";
            $run=mysqli_query($conn,$sql);

            while ($row=mysqli_fetch_array($run)){

                ?>
            
            <?php if($row['quantity']==0){} else { ?>

            <div class="row mt-5">
                <div class="col-lg-5 col-md-6 align-self-center py-5">
                    <div class="dishes-text">
                        <h3 id="nameH3"><?php echo $row['name']; ?></h3>
                        <h3 class="special-dishes-price"><?php echo $row['price']; ?> SAR</h3>
                        <a href="product.php?pid=<?php echo $row['id'] ?>" class="btn-primary mt-3">View product details</a>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-2 col-md-6 align-self-center mt-4 mt-md-0">
                    <img src="<?php echo $row['photo']; ?>" alt="" class="img-fluid shadow w-100">
                </div>

            </div>

            <?php } ?>
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