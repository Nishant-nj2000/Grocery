<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Reset Password In PHP MySQL</title>
<!-- CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<div class="card">
<div class="card-header text-center">
Reset Password In PHP MySQL
</div>
<div class="card-body">

<form action="update-forget-password.php" method="post">
<input type="hidden" name="email" value="<?php echo $email;?>">
<input type="hidden" name="reset_link_token" value="<?php echo $token;?>">
<div class="form-group">
<label for="exampleInputEmail1">Password</label>
<input type="password" name='password' class="form-control">
</div>                
<div class="form-group">
<label for="exampleInputEmail1">Confirm Password</label>
<input type="password" name='cpassword' class="form-control">
</div>
<input type="submit" name="new-password" class="btn btn-primary">
</form>

</div>
</div>
</div>
</body>
</html>

if(isset($_POST['forgotpassword']) &amp;&amp; $_POST['forgotpassword_email'])
	{
		$emailId = $_POST['forgotpassword_email'];
		$result = mysqli_query($conn,"SELECT * FROM user_details WHERE email='" . $emailId . "'");
		$row= mysqli_fetch_array($result);

		if($row)
		{
			$token = md5($emailId).rand(10,9999);
			$expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d")+1, date("Y"));
			$expDate = date("Y-m-d H:i:s",$expFormat);
			
			$update = mysqli_query($conn,"UPDATE user_details set password ='" .$password. "', reset_link_token = '" .$token. "', exp_date = '" .$expDate. "' WHERE email = '" .$emailId. "'");

			$link = "<a href="
		}
	}