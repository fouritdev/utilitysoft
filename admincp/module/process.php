<?php session_start(); ?>
<?php 
	include("../../config.php");
		
		$username=$_POST["username"];
		$username = str_replace("'", "z", str_replace("&*#39;","",$username));
		$password=$_POST["password"];
		$password = str_replace("'", "z", str_replace("&*#39;","",$password));
		$query="Select * From account Where username='".$username."' And password='".$password."'";
		$query_excute=mysqli_query($connect,$query);
		$num_row=mysqli_num_rows($query_excute);
		if($num_row==1)
			{
				$_SESSION["username"]=$username;
				$_SESSION["password"]=$password;
				header("location: ../index.php");
			}
		else
			header("location: ../log.php");

?>