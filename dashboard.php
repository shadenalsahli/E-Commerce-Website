<?php 
require_once('config.php');
?>

<!DOCTYPE html>

<html>

<head>

    <title>Dashboard</title>
    
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

       h1 {
       color: #f34949; }

    #h1COLOR {
       color: black;}


    #gtco-team{
       padding-top: 50px; }

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

       #myIMG2 {
            height: 55px;
            width: 55px;
        }

      table, th, td {
            margin:0px auto;
              text-align: center;
            }

    </style>

</head>

<body>

    <?php

    if ($_SESSION["AdminLoggedin"] != true || !isset($_SESSION["AdminLoggedin"])) {
      header("location: admin.php");
      exit;
    }
    
    ?>
    
    <?php

if(isset($_POST['addproduct'])){
	echo "<script> location.href='addProduct.php'; </script>";
	exit;  } 

else if(isset($_POST['viewOrders'])){
	     echo "<script> location.href='viewOrders.php'; </script>";
 		 exit;  }

    ?>

	<div id="canvas-overlay"></div>
	<div class="boxed-page">
        
		  <table>
<tr>

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

            <form method="post" action="dashboard.php">

                 <?php 

                            if(isset($_POST['destroy_sess_admin'])) {
                                session_destroy();
                                unset($_SESSION['AdminLoggedin']);
                                header('location:admin.php');
                            }

                    ?>

                        <button id="butDes" type="submit" name="destroy_sess_admin">  <img src="website_images/log_out.jpg" id="myIMG2" title="Log out" alt=""> </button>
            </form>

        </div>
    </th>
    </tr>

    </table>

<a class="nav-link" href="dashboard.php">Home</a>

<section id="gtco-team">
    <div class="container">
        <div class="section-content">
    
            <form action="dashboard.php" method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="team-card mb-5">
                        <img class="img-fluid" src="website_images/add_new.jpg" alt="">
                        <div class="team-desc">
                            <h4 class="mb-0">
                            <button class="hovBtn" type="submit" name="addproduct">Add New Product</button>
                            </h4>
                        </div>
                    </div>
                </div>
                  <div class="heading-section text-center">
                        <span class="subheading">
                            Welcome 
                        </span>
                        <h1 id="h1COLOR">
                          Back ! 
                        </h1>
                </div>
                <div class="col-md-4">
                    <div class="team-card mb-5">
                        <img class="img-fluid" src="website_images/view_orders.jpg" alt="">
                        <div class="team-desc">
                            <h4 class="mb-0">
                                <button class="hovBtn" type="submit" name="viewOrders">View Customers' Orders</button>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</section>
</body>
</html>
