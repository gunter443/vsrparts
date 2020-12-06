<?php
	session_start();
	if (session_start()) {
		session_destroy();
		header("location:index.php");
	}
?>