<?php
	include 'config.php';
	
	if(isset($_POST['signup']))
	{
		$errMsg = '';
		$Name = $_POST['Name'];
		$Email = $_POST['Email'];
		$Password = $_POST['Password'];
		$C_Password = $_POST['C_Password'];

		try
		{
			//this condition is not required because we have used required validation in the html form below
			/*if ($Name == null ||  $Email == null || $Password == null ) 
			{
				 echo "Please enter all the details";
			}*/


			//for checking if the user already exists.
			$check_email = mysqli_query($conn,"SELECT * FROM user_details WHERE Email = '$Email'");

			if(mysqli_num_rows($check_email) != 0)
			{
				$errMsg ='<span class="fa fa-exclamation-circle" aria-hidden="true"></span> <a href="signin.php"> User Already Exists better you do login now. </a>';
			}

			//comparing both passwords 
			elseif($Password == $C_Password)
			{
				$query = "INSERT INTO user_details (Name, Email, Password) VALUES ('$Name', '$Email', '$Password')";

				if(mysqli_query($conn,$query))
				{
					$errMsg ='<span class="fa fa-thumbs-up" aria-hidden="true"></span>
					<a href="signin.php"> Well Done! Login here </a>';
				}
				
				else
				{
					$errMsg ='<span class="fa fa-exclamation-circle" aria-hidden="true"></span> Connection Error ! Please try again later ';
				}

			}

			else
			{
				$errMsg ='<font color="red"> <span class="fa fa-exclamation-circle" aria-hidden="true"></span> Password Mismatch </font>';
			}
			

		}

		catch(PDOException $e) 
		{
			echo $e->getMessage();
		}
	}
?>
	


<!DOCTYPE html>
<html lang="zxx">
<head>
	<title> Sign up page</title>
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
					<img src="images/register.jpg" alt="IMG">
					<?php
						if(isset($errMsg)){
							echo '<div class="alert alert-success" role="alert" style="margin-top:70px;">
							'.$errMsg.'</div>';
						}
						?>
				</div>

				<form class="login10-form validate-form" method="post">
					<span class="login100-form-title">
						Customer Registeration
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid name is required">
						<input class="input100" type="text" type="text" placeholder="Fullname" name="Name" id="Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

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

						<input class="input100" type="password" name="Password" id="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password">
						<span toggle="#Password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Confirm Password is required">
						<input class="input100" type="text" name="C_Password" id="C_Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="signup" id="signup" onclick = "Checktnc()">
							Register
						</button>
						
					</div>

					<br>
					<div class="wrap-input100 validate-input" data-validate = "please select this">
						<input type="checkbox" name="tnc" id="tnc" class="validate-input" data-validate = "please select this">
						<span class="txt1">
							By clicking sign up, I agree to the
						</span>
						<a class="txt2" href="terms.php">
							terms and conditions 
						</a>
					</div>
					

					<div class="text-center p-t-20">
						<span class="txt1">
							Already have an account ?
						</span>
						<a class="txt2" href="signin.php">
							Login Here 
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
	</div>


<script type="text/javascript">
    function Checktnc() {
        document.getElementById("tnc").innerHTML = tnc;
        if (tnc.checked != 1) {
            window.alert("Terms and conditions not accepted");
        } 
    }


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

</body>
</html>