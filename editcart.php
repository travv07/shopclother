<?php 
	session_start();
	if (isset($_GET['id'])) {
		$sl = $_GET['soluong'];
		$id = $_GET['id'];
		echo $id;
		echo $sl;
		$_SESSION['cart'][$id] = $sl;
		
		header("location:cart.php");
	}
?>