<?php
	include('APIEmail.php');
	if($_GET['checkEmail']) {
		checkEmailExits($_GET['checkEmail']);
	}
	if($_GET['insertEmail']) {
		checkEmailExits($_GET['checkEmail']);
	}
?>