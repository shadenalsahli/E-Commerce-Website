<?php 
require_once('config.php');
?>

<!DOCTYPE html>

<html>

<head>

    <title>View orders</title>
    
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
<body data-spy="scroll" data-target="#navbar">

       <?php

    if ($_SESSION["AdminLoggedin"] !== true || !isset($_SESSION["AdminLoggedin"])) {
      header("location: admin.php");
      exit;
    }
    
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

<section id="gtco-reservation" class="bg-fixed bg-white section-padding overlay" style="background-image: url(website_images/view_orders2.jpg);">
    <div class="container">

             <div class="section-content bg-white p-5 shadow">
         
                    <div class="heading-section text-center">
                        <span class="subheading">
                            View
                        </span>
                        <h2>
                            Orders
                        </h2>
                    </div>  

              <table style="width:100%" class="viewO">

                 <tr>
                  <th class="viewO"> <h4>Order No.</h4></th>
                  <th class="viewO"> <h4>Customer Email</h4></th>
                  <th class="viewO"> <h4>Total</h4></th>
                </tr>
              
                <?php
  
                $sql="select * from viewOrders";
                $run=mysqli_query($conn,$sql);

                while ($row=mysqli_fetch_array($run)){

                $orderNo=$row[0];
                $customerEmail=$row[1];
                $total=$row[2]; 
              ?>
                               <tr>
                              <td class="viewO"> <h4><?php echo $orderNo; ?></h4> </td>
                              <td class="viewO"> <h4><?php echo  $customerEmail; ?></h4> </td>
                              <td class="viewO"> <h4><?php echo $total; ?></h4> </td>
                            </tr>
          
                <?php } ?>
          </table>
          
        </div>
    </div>
</section>

</div>
</body>
</html>
