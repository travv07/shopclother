<?php
	session_start();
	if (isset($_SESSION['fullname'])) {
		session_destroy();
		header("location:index.php");
	}
?>
