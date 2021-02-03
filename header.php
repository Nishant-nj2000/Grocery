<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="header/assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="header/assets/css/font-awesome.css">

    <link rel="stylesheet" href="header/assets/css/style.css">

    </head>
    
    <body>
    

     <?php include "preloader.php" ?>
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo"><img  src="images/logonew.png" width="240" height="70" alt="Theme-Logo" /></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.php#about_us">
                                    <span class="fa fa-info-circle" aria-hidden="true"></span> About Us
                                </a>
                            </li>
                            
                            <li><a href="contact.php">
                                    <span class="fa fa-phone-square" aria-hidden="true"> Contact Us</span>
                                </a>
                            </li>
                            
                            
                            <?php 
                                if(empty($_SESSION['email']))
                                {
                                      echo'<li><a href="signin.php">
                                                <span class="fa fa-phone-square" aria-hidden="true"> Sign In</span>
                                                </a>
                                            </li>';
                                }

                                else
                                {
                                    if($_SESSION['role'] == 'Customer')
                                    {
                                        echo'<li><form action="#" method="post" class="last">
                                                <input type="hidden" name="cmd" value="_cart">
                                                <input type="hidden" name="display" value="1">
                                                <button type="submit" class="btn btn-warning btn-sm" style="border-radius:8px;"> <i class="fa fa-shopping-cart fa-lg" style="font-size: 1.5em;"></i> </button>
                                                </form>
                                            </li>';
                                    }
                                }


                                if(empty($_SESSION['email']))
                                {   
                                        echo '<li>
                                                <a href="signup.php">
                                                    <span class="fa fa-user-plus" aria-hidden="true"> Sign Up </span>
                                                </a>
                                            </li>';
                                }

                                else
                                {
                                    echo'<li class="dropdown">';

                                            if($_SESSION['role'] == "Owner")
                                            {
                                                echo'<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <span class="fa fa-user" aria-hidden="true"> '; 
                                                    echo $_SESSION['name'];  echo " (Owner)"; 
                                                    
                                                    echo'
                                                    </span>
                                                    </a>

                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa fa-user-circle"></i> My Profile</a>
                                                    <a class="dropdown-item" href="#"><i class="fa fa-tachometer"></i> Dashboard</a>
                                                    <a class="dropdown-item" href="#"><i class="fa fa-comments"></i> Customer Feedbacks</a>
                                                    <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i> Sign Out</a>
                                                </div>';

                                            }

                                            else
                                            {
                                                echo'<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <span class="fa fa-user" aria-hidden="true"> '; 
                                                    echo $_SESSION['name'];
                                                    echo'</a>

                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa fa-user-circle"></i> My Profile</a>
                                                    <a class="dropdown-item" href="#"><i class="fa fa-calendar-check-o"></i> My Orders</a>
                                                    <a class="dropdown-item" href="#"><i class="fa fa-heart"></i> Wishlist</a>
                                                    <a class="dropdown-item" href="contact.php"><i class="fa fa-commenting"></i> Give Feedback</a>
                                                    <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i> Sign Out</a>
                                                </div>';
                                            }

                                   echo '</li>';
                                }
                            ?>

                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

  </body>
</html>