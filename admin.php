<?php 
require_once('config.php');
?>


<!DOCTYPE html>
<html>

<head>

	<title>Admin login</title>
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
      margin:0px auto; }

    h1 {
       color: #f34949;
    }
    
    #align {
        text-align:center; }
        
    #message, #message2 {
        color: #f34949;
        font-weight: 500; }

  </style>

</head>

<body>

	<div id="side-nav" class="sidenav"><a href="javascript:void(0)" id="side-nav-close">&times;</a></div>

    <div id="canvas-overlay"></div>

	<div class="boxed-page">
		<nav id="navbar-header" class="navbar navbar-expand-lg">
    <div class="container">
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                <h1>#COFFEE EQUIPMENTS</h1>
               
        </div>
      
    </div>
   
</nav>		

<a class="nav-link" id="align" href="index.php">Home</a>
 
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
                           Login 
                        </h2>
                    </div>
                    <form name="register" action="admin.php" method="post" onsubmit="return validate();">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" name="username" placeholder="Enter username">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                            </div>

                            <div id="message"></div><br> <div id="message2"></div><br>

                            <?php

                            if(isset($_POST['submit'])){

                                $firstname = $_POST['username'];
                                $password= $_POST['password'];

                                if($firstname=='admin1' && $password=='admin777') {
                                  $_SESSION["AdminLoggedin"] = true;
                                echo "<script> location.href='dashboard.php'; </script>";
                                exit; } 

                                else { echo '<script>document.getElementById("message").innerText = "Username or password is incorrect !!";
                                setTimeout(function(){
                                document.getElementById("message").innerHTML = ""; }, 3000);</script>'; }

                            
                            }
                            ?>

                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit" name="submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</section>

	</div>


<script type="text/javascript">

function validate() {

var flag=true;

/* Username messaage */
if (document.forms["register"]["name"].value === "") {
    document.getElementById("name").style.border = "1px solid #f34949";
    document.getElementById("message").innerText = "The username field should not be empty !!";
    setTimeout(function(){ document.getElementById("message").innerHTML = ""; }, 3000);
    setTimeout(function(){ document.getElementById("name").style.border = ""; }, 3000);
    flag=false;

} else document.getElementById("message").innerText = "";


/* Password messaage */
if (document.forms["register"]["password"].value === "") {
    document.getElementById("password").style.border = "1px solid #f34949";
    document.getElementById("message2").innerText = "The password field should not be empty !!";
    setTimeout(function(){ document.getElementById("message2").innerHTML = ""; }, 3000);
    setTimeout(function(){ document.getElementById("password").style.border = ""; }, 3000);
    flag=false;
 
} else document.getElementById("message2").innerText = "";

return flag;

}

</script>
		
</body>
</html>
