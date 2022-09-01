<?php 
require_once('config.php');
?>

<!DOCTYPE html>
<html>

<head>

    <title>Registeration</title>
    
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

    div,h1,p {
      margin:0px auto; 
      text-align: center;}

    h1 {
       color: #f34949; }

     #message, #message2, #message3,   #message4, #message5,  #message6, #message7,#message8 {
        color: #f34949;
        font-weight: 500;  }

    #message8 {

        color: rgb(0, 200, 0)
    }

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
                           Register
                        </h2>
                    </div>
                    <form method="post" action="register.php" name="register" onsubmit="return validate();">

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter username">
                            </div>

                             <div class="col-md-12 form-group">
                                <input type="email" class="form-control"  id="email" name="email" placeholder="Enter email">
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control"  id="password" name="password" placeholder="Enter password">
                            </div>

                              <div class="col-md-12 form-group">
                                <input type="password" class="form-control"  id="conPassword" name="conPassword" placeholder="Confirm password">
                            </div>

                            <div   id="message"></div><br>
                            <div   id="message2"></div><br>
                            <div  id="message3"></div><br>
                            <div  id="message4"></div><br>
                            <div  id="message5"></div><br>
                            <div id="message6"></div><br>
                            <div  id="message7"></div><br>
                            <div id="message8"></div><br>

                            <?php

                            if(isset($_POST['signup'])){
                                
                                $user = $_POST['name'];
                                $password = $_POST['password'];
                                $conPassword = $_POST['conPassword'];
                                $email = $_POST['email'];
    
                                $sql = "SELECT email FROM register WHERE email = '$email' LIMIT 1";
                                $check_query = mysqli_query($conn,$sql);
                                $count_email = mysqli_num_rows($check_query);
                            
                                if ($count_email > 0) {
                                    echo '<script> document.getElementById("message7").innerText = "Email is already exist !!";
                                    setTimeout(function(){ document.getElementById("message7").innerHTML = ""; }, 3000); </script>'; }


                                else { $qu = "insert into register (name,email,password) value ('$user','$email','$password')";
                                    
                                        if(mysqli_query($conn, $qu)) {

                                        echo '<script>document.getElementById("message8").innerText = "User Registeration Completed !!";
                                            setTimeout(function(){
                                            document.getElementById("message8").innerHTML = ""; }, 3000);</script>';

                                        echo "<script> location.href='customer.php'; </script>";

                                             }  }
                                        
                                        
                                        }     
                            ?>

                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit" name="signup">Sign up</button>
                            </div>

                            <p>Already a user? <a href="customer.php"><b>Log in</b></a></p>
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
if ((document.forms["register"]["name"].value === "") && (document.forms["register"]["email"].value === "") && (document.forms["register"]["password"].value === "") && (document.forms["register"]["conPassword"].value === "") ){
    document.getElementById("name").style.border = "1px solid #f34949";
    document.getElementById("email").style.border = "1px solid #f34949";
    document.getElementById("password").style.border = "1px solid #f34949";
    document.getElementById("conPassword").style.border = "1px solid #f34949";
    document.getElementById("message").innerText = "The fields should not be empty !!";
    setTimeout(function(){ document.getElementById("message").innerHTML = ""; }, 2000);
    setTimeout(function(){ document.getElementById("name").style.border = ""; }, 2000);
    setTimeout(function(){ document.getElementById("email").style.border = ""; }, 2000);
    setTimeout(function(){ document.getElementById("password").style.border = ""; }, 2000);
    setTimeout(function(){ document.getElementById("conPassword").style.border = ""; }, 2000);
    flag=false;

} else { 

/* Username messaage */
if (document.forms["register"]["name"].value === "") {
    document.getElementById("name").style.border = "1px solid #f34949";
    document.getElementById("message2").innerText = "The username field should not be empty !!";
    setTimeout(function(){ document.getElementById("message2").innerHTML = ""; }, 3000);
    setTimeout(function(){ document.getElementById("name").style.border = ""; }, 3000);
    flag=false; }

/* Email messaage */
if (document.forms["register"]["email"].value === "") {
    document.getElementById("email").style.border = "1px solid #f34949";
    document.getElementById("message3").innerText = "The email field should not be empty !!";
    setTimeout(function(){ document.getElementById("message3").innerHTML = ""; }, 3000);
    setTimeout(function(){ document.getElementById("email").style.border = ""; }, 3000);
    flag=false; }

/* Password messaage */
if (document.forms["register"]["password"].value === "") {
    document.getElementById("password").style.border = "1px solid #f34949";
    document.getElementById("message4").innerText = "Password field should not be empty !!";
    setTimeout(function(){ document.getElementById("message4").innerHTML = ""; }, 3000);
    setTimeout(function(){ document.getElementById("password").style.border = ""; }, 3000);
    flag=false; }

/* conPass messaage */
if (document.forms["register"]["conPassword"].value === "") {
    document.getElementById("conPassword").style.border = "1px solid #f34949";
    document.getElementById("message5").innerText = "Confirm password field should not be empty !!";
    setTimeout(function(){ document.getElementById("message5").innerHTML = ""; }, 3000);
    setTimeout(function(){ document.getElementById("conPassword").style.border = ""; }, 3000);
    flag=false; }

 if ((document.forms["register"]["conPassword"].value != "") && (document.forms["register"]["password"].value != "")) {
if (document.forms["register"]["conPassword"].value != document.forms["register"]["password"].value) {
        document.getElementById("message6").innerText = "Passwords does not match !!";
        setTimeout(function(){ document.getElementById("message6").innerHTML = ""; }, 3000);
        flag=false;  } }

}


return flag;

} 


</script>

</body>
</html>
