<?php
	include 'config.php';
	
	if(isset($_POST['signin']))
	{
		
		$errMsg = '';
		$Email = $_POST['Email'];
		$Password = $_POST['Password'];

		try
		{
			$result = mysqli_query($conn,"SELECT * FROM user_details WHERE email = '$Email' AND password = '$Password'");
			$rows = mysqli_fetch_array($result);
			
			if(is_array($rows))
			{
				$_SESSION['user_id'] = $rows['user_id'];
				$_SESSION['email'] = $rows['email'];
				$_SESSION['name'] = $rows['name'];
				$_SESSION['password'] = $rows['password'];
				$_SESSION['role'] = $rows['role'];	
				header("Location: index.php");
				exit();
			}
			else
			{
					$errMsg ='Incorrect Username or Password';
				//$message = "Invalid Username or Password!";
			}

		}

		catch(PDOException $e) 
		{
			echo $e->getMessage();
		}
		
	}

	if(isset($_POST['forgotpassword']))
	{
	    $msg = '';
		$emailId = $_POST['forgotpassword_email'];
	    $result = mysqli_query($conn,"SELECT * FROM user_details WHERE email='".$emailId."'");
	    $row= mysqli_fetch_array($result);
	 	$fetch_email = $row['email'];
	 	$name = $row['name'];
	 	$password = $row['password'];
		if($emailId == $fetch_email)
		{
			$to = $emailId;
			$subject = "Password Recovery";
			$txt = "Hello $name, we heard you need to recover your password. We are providing you your password below     #keepShopping"."\r\n"."Your Password is : $password";
			$headers = "From: (no-reply)GroceryShoppy@gmail.com"."\r\n";
			$mail = mail("$to","$subject","$txt","$headers");
		    $msg = '<div class="alert alert-success" role="alert">
					<span class="fa fa-handshake-o" aria-hidden="true"></span> We have mailed you your password
					</div>';
		}
		else
		{
			$msg = '<div class="alert alert-danger" role="alert">
					<span class="fa fa-exclamation-circle" aria-hidden="true"></span> Invalid Email id entered
					</div>';
		}
	}

?>



	
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title> Sign in page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/videoimg2.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="css/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

<!-- Password viewer-->
<style type="text/css">
.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -33px;
  margin-right: 10px;
  position: relative;
  z-index: 2;
}
</style>


</head>
 <body>
 	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100" style="padding-top:40px;">
				<div class="login10-pic">
					<img src="images/login.jpg" alt="IMG">
					<?php
						if(isset($errMsg))
						{
							echo '<div class="alert alert-danger" role="alert" style="margin-top:20px;">
								<span class="fa fa-exclamation-circle" aria-hidden="true"></span>
							'.$errMsg.'</div>';
						}
						elseif(isset($msg))
						{
						   echo'<br><br>';
						    echo $msg;
						}
					?>
				</div>

				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-title">
						Customer Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="Email" id="Email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Must include 8 characters
					Atleast 1 capital letter
					Atleast 1 number
					Atleast 1 sp. char.">
						<input class="input100" type="password" name="Password" id="Password" placeholder="Password" >
						<span toggle="#Password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="signin" id="signin">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							<a class="txt2" href="#" data-target="#pwdModal" data-toggle="modal">
							Forgot Password?
							</a>
						</span>
					</div>

					<div class="text-center p-t-20">
						<a class="txt2" href="signup.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
					<div class="text-center p-t-20">
						<a class="txt2" href="index.php">
							<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
							Homepage
						</a>
					</div>
				</form>
			</div>
		</div>

		<div id="pwdModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">										
				<h5>Password Recovery</h5>
			</div>
			<div class="modal-body">
				<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="text-center">
									<div class="panel-body">
										<fieldset>
										<form action="" method="POST">
											<div class="form-group">
											<input class="form-control input-lg" placeholder="E-mail Address" name="forgotpassword_email" type="email" required>
											<br>
											
											<input class="login100-form-btn" value="Send Password" name="forgotpassword" type="submit">
										</form>
										</div>
										</fieldset>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<div class="col-md-5">
				<button class="login100-form-btn" data-dismiss="modal" aria-hidden="true" style="float: right;">Cancel</button>
				</div>	
			</div>
		</div>
		</div>
		
	</div>

	

<!--===============================================================================================-->	
	<script src="js/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="js/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<script type="text/javascript">
$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>

</body>
</html>
