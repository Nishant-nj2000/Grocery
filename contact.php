<?php
	include 'config.php';
	
	if(isset($_POST['submit']))
	{
		$errMsg = '';
		$user_id= $_SESSION['user_id'];
		$name= $_SESSION['name'];
		$email= $_SESSION['email'];
		$feed_subject = $_POST['feed_subject'];
		$feed_msg = $_POST['feed_msg'];

		try
		{
			$query = "INSERT INTO feedback (user_id, name, email, feed_subject, feed_msg) VALUES ('$user_id', '$name', '$email', '$feed_subject', '$feed_msg')";
			if(mysqli_query($conn,$query))
			{
				$errMsg ='<span class="fa fa-thumbs-up" aria-hidden="true"></span>
				 Feedback or Query Sent Successfully !';
			}

			else
			{
				$errMsg ='<span class="fa fa-exclamation-circle" aria-hidden="true"></span> An Error Occurred While Sending ! ';
			}
		}

		catch(PDOException $e) 
		{
			echo $e->getMessage();
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Grocery Shoppy</title>
</head>
<body>
		<!-- header-bot-->
	<?php include "header.php" ?>
	<!-- //header-bot -->

	<!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <img src="images/about4.jpg"/>

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>No.1 Leading E-commerce marketplace</h6>
                <h2><em>Contact Us</em></h2>
                	<div class="contact-form wthree">
                		<div class="form-group">
						<form action="#" method="post">
							<div class="">
								<input type="text"  name="name" placeholder="Login First !" value="<?PHP if(isset($_SESSION['email'])){echo $_SESSION['name'];}?>" style="border-radius: 5px" readonly>
							</div>
							<div class="">
								<input class="text" type="text" name="feed_subject" placeholder="Subject" required style="border-radius: 5px">
							</div>
							<div class="">
								<input class="email" type="email" name="email" placeholder="Login First !" value="<?PHP if(isset($_SESSION['email'])){echo $_SESSION['email'];}?>" style="border-radius: 5px" readonly>
							</div>
							<div class="">
								<textarea placeholder="Message" name="feed_msg" required style="border-radius: 5px"></textarea>
							</div>
							<div class="main-button">
				                <button type="submit" class="btn btn-primary" name="submit" id="submit"> Submit </button>
				            </div>

				            <?php
							if(isset($errMsg)){
								echo '<div class="alert alert-success" role="alert" style="margin-top:60px;">
								'.$errMsg.'</div>';
							}
							?>
						</form>
						</div>
					</div>
                </form>
            </div>
        </div>
    </div>



    <!-- ***** Main Banner Area End ***** -->
	<!-- map -->
	<div class="map w3layouts">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29169.121954835613!2d74.37377801604401!3d23.955480413713207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3966fb51879b2953%3A0x54bcc945aa0c7a9c!2sOm%20Prakash%20Gendmal%20Pachori!5e0!3m2!1sen!2sin!4v1611673127377!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	</div>
	<!-- //map -->
	
	<!--Footer-->
	<?php include "footer.php" ?>
	<!--Footer End-->

	<!-- all the scripts-->
	<?php include "scripts.php" ?>
	<!-- //all the scripts-->

</body>
</html>

