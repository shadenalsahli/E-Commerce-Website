<?php 
require_once('config.php'); ?>

<!DOCTYPE html>
<html>

<head>

    <title>Log in</title>
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

    #message, #message2, #message3 {
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

<a class="nav-link" href="index.php">Home</a>

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
                    <form name="login" method="post" action="customer.php" onsubmit="return validate();">

                        <div class="row">
                          
                             <div class="col-md-12 form-group">
                                <input type="email" class="form-control"  id="email" name="email" placeholder="Enter email">
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control"  id="password" name="password" placeholder="Enter password">
                            </div>

                            <div id="message"></div><br>

                            <div id="message2"></div><br>

                            <div id="message3"></div><br>


                            <?php


                            if(isset($_POST["login"])){

                                $email = mysqli_real_escape_string($conn,$_POST["email"]);
                                $password = $_POST["password"];

                                $qu = "select * from register where email = '$email' AND password = '$password'";
                                $run=mysqli_query($conn, $qu);

                                while ($row=mysqli_fetch_array($run)){

                                    $name=$row[0]; }

                                if(mysqli_num_rows(mysqli_query($conn, $qu)) == 1){
                                    
                                    $_SESSION['email'] = $email;
                                    $_SESSION['name'] = $name;
                                    $_SESSION["loggedin"] = true;
                                    echo("<script>location.href = 'home.php';</script>");

                                    } 

                                else { echo '<script>document.getElementById("message3").innerText = "The username or password is incorrect !!";
                                                    setTimeout(function(){
                                                    document.getElementById("message3").innerHTML = ""; }, 3000);</script>'; } }

                                    ?>


                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit" name="login">Login</button>
                            </div>

                            <p>Not a user? <a href="register.php"><b>Register Here</b></a></p>
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
if (document.forms["login"]["email"].value === "") {
    document.getElementById("email").style.border = "1px solid #f34949";
    document.getElementById("message").innerText = "The email field should not be empty !!";
    setTimeout(function(){ document.getElementById("message").innerHTML = ""; }, 3000);
    setTimeout(function(){ document.getElementById("email").style.border = ""; }, 3000);
    flag=false; }


/* Password messaage */
if (document.forms["login"]["password"].value === "") {
    document.getElementById("password").style.border = "1px solid #f34949";
    document.getElementById("message2").innerText = "The password field should not be empty !!";
    setTimeout(function(){ document.getElementById("message2").innerHTML = ""; }, 3000);
    setTimeout(function(){ document.getElementById("password").style.border = ""; }, 3000);
    flag=false; }

return flag;

}

</script>

</body>
</html>
