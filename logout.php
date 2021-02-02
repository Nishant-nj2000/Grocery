<?php
	require 'config.php';
	 $_SESSION=array();
    unset($_SESSION);
	session_destroy();
	header('Location: index.php');
?>
