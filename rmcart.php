<?php 
	session_start();
	if (isset($_GET['ten'])) {
		$id = $_GET['ten'];
		unset($_SESSION['cart'][$id]);
	}
	header("location:cart.php");
?>