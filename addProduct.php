<?php 
require_once('config.php');
?>

<!DOCTYPE html>
<html>

<head>

	<title>Add new products</title>
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

	<style>

    div,h1 {
      margin:0px auto; 
     text-align: center;}

    h1 {
       color: #f34949;}

    .boxed-page .section-padding {
        padding-top: 50px; }

    input[type='file'] 
    { font-size: 0; }

    ::file-selector-button 
    { font-size: initial;
      background-color:white;
      border:1px solid rgb(220, 216, 216);
      cursor: pointer; 
      color: #f34949;
    font-size:small; }

    label {    
    color: #6d767e;
    font-weight: 400;  }

    #message2 {
        color: #f34949;
        font-weight: 500; }

   table, th, td {
    margin:0px auto;
      text-align: center;
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

  </style>

</head>

<body>
    
       <?php

    if ($_SESSION["AdminLoggedin"] !== true || !isset($_SESSION["AdminLoggedin"])) {
      header("location: admin.php");
      exit;
    }
    
    ?>
    


	<div id="side-nav" class="sidenav"><a href="javascript:void(0)" id="side-nav-close">&times;</a></div>

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

<section id="gtco-reservation" class="bg-fixed bg-white section-padding overlay" style="background-image: url(website_images/coffeeshop_equipment.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-content bg-white p-5 shadow">
                    <div class="heading-section text-center">
                        <span class="subheading">
                            Welcome !
                        </span>
                        <h2>
                           Add New Product 
                        </h2>
                    </div>
                    <form action="addProduct.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" required>
                            </div>
                           
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="price" placeholder="Enter product price" required>
                            </div>

                            <div class="col-md-12 form-group">
                                <input class="form-control" type="text" name="quantity" placeholder="Enter product quantity" required>
                            </div>

                            <div class="col-md-12 form-group">
                                <textarea class="form-control" id="message" name="description" rows="4" placeholder="Write product description ..." required></textarea>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="photo">Choose product photo</label>
                                <input type="file" name="photo" required>
                            </div>

                            <div id="message2"></div><br>

                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit" name="submit">Add</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</section>

	</div>

        <?php

    if(isset($_POST['submit'])){
    
        $productName = $_POST['name'];
    
        $productPhoto=$_FILES['photo'];
        $productPhoto_location= $_FILES['photo']['tmp_name'];
        $productPhoto_name= $_FILES['photo']['name'];
        $productPhoto_upload="../img/".$productPhoto_name;
    
        $productPrice = $_POST['price'];
        $productDescription = $_POST['description'];
        $productQuantity = $_POST['quantity'];
    
    $sql="insert into Products (name, photo, price, description, quantity) value ('$productName','$productPhoto_upload', '$productPrice','$productDescription' , '$productQuantity')";


    if(mysqli_query($conn, $sql)){
       echo '<script>document.getElementById("message2").innerText = "The product is added successfully !!";
                    setTimeout(function(){
                    document.getElementById("message2").innerHTML = ""; }, 2000);</script>';

       move_uploaded_file($productPhoto_location,"img/".$productPhoto_name); } 

    else echo '<script>document.getElementById("message2").innerText = "The product is not added, please try again !!";</script>'; }
    
    ?>
		
</body>
</html>
