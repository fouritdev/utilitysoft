<?php
	include("../config.php");
	include("../lib/send-mail.php");
	if(isset($_POST["registryEmail"]))
	{
		$mail=$_POST["enterEmail"];
		$sql="Insert Into sendmail(mail) Values('".$mail."')";
		$query_excute=mysqli_query($connect,$sql);
		sendMailWelcome($mail);
		header("location: ../index.php");
	}
?>