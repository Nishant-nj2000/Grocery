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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="navigationbar and products/css/bootstrap.min.css" rel="stylesheet">
    <link href="navigationbar and products/css/font-awesome.min.css" rel="stylesheet">
    <link href="navigationbar and products/css/prettyPhoto.css" rel="stylesheet">
    <link href="navigationbar and products/css/animate.css" rel="stylesheet">
	<link href="navigationbar and products/css/main.css" rel="stylesheet">
	<link href="navigationbar and products/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="navigationbar and products/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="navigationbar and products/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="navigationbar and products/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="navigationbar and products/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="navigationbar and products/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	

	<!--Footer-->
	<?php include "preloader.php" ?>
	<!--Footer End-->


    
	<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/logonew.png" width="200" height="60" alt="" /></a>
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<?php
									if(empty($_SESSION['email']))
									{ echo'<li><a href="trackorder.php"><i class="fa fa-truck"></i> Track Order</a></li>';}
									else
									{ echo'<li><a href="profile.php"><i class="fa fa-user"></i> Your Account</a></li>';}
								?>

								<?php
									if(empty($_SESSION['email']))
									{ echo'<li><a href="index.php"><i class="fa fa-info-circle"></i> About Us</a></li>';}
									else
									{ 	
										if($_SESSION['role'] == "Customer")
										{ echo'<li><a href="wishlist.php"><i class="fa fa-heart"></i> Wishlist</a></li>';}
										else
										{ echo'<li><a href="Dashbaord.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>';}
									}
								?>

								<?php
									if(empty($_SESSION['email']))
									{ echo '<li><a href="contact.php"><i class="fa fa-phone-square"></i> Contact Us</a></li>';}
									else
									{
										if($_SESSION['role'] == "Customer")
										{ echo '<li><a href="contact.php"><i class="fa fa-commenting"></i> Feedback</a></li>';
											echo '<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>';}
										else
										{ echo '<li><a href="feedbacks.php"><i class="fa fa-comments"></i> Feedbacks</a></li>';}
									}
								?>

								<?php
									if(empty($_SESSION['email']))
									{ echo '<li><a href="signin.php"><i class="fa fa-sign-in"></i> Sign In </a></li>';}
									else
									{ 
										echo '<li ><button class="btn btn-danger btn-outline-danger btn-sm" type="button" id="logout">'; echo $_SESSION['name']; echo ' (Logout) </button>
											 </li>';
									}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->


	<header id="header"><!--header-->
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php">Home</a></li>
								<li class="dropdown"><a href="#">Kitchen Products<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
										<li><a href="product-details.html">Product Details</a></li> 
										<li><a href="checkout.html">Checkout</a></li> 
										<li><a href="cart.html">Cart</a></li> 
										<li><a href="login.html">Login</a></li> 
                                    </ul>
                                </li> 

								<li class="dropdown"><a href="#">Beauty Products<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 

                                <li class="dropdown"><a href="#">Household Products<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->


    <script src="navigationbar and products/js/jquery.js"></script>
	<script src="navigationbar and products/js/bootstrap.min.js"></script>
    <script src="navigationbar and products/js/jquery.prettyPhoto.js"></script>
    <script src="navigationbar and products/js/main.js"></script>
    <script>
    	var btn = document.getElementById('logout');
		btn.addEventListener('click', function() {
		  document.location.href = 'logout.php';
		});
    </script>

</body>