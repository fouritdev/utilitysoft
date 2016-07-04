<?php
		if(isset($_GET['q'])) {
			include("search.php"); 
		} else {
			if(is_null($_GET['idbaiviet']))	{
				include("liet-ke-bai-viet.php"); 
			} else {
				include("chi-tiet-loai-tin.php");
			}
		}
?>
	
	

		
