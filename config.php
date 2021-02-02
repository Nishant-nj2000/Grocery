<?php
	session_start();
	try {
		$conn = mysqli_connect('localhost','root','','grocery');
	}
	catch(PDOException $e) {
		echo $e->getM;
	}

?>
