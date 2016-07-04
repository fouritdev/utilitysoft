<?php
	$sql_del_loaisoft="Delete From loaisoft Where idloaisoft=".$_GET['idloaisoft'];
	$sql_del_loaisoft_query=mysqli_query($connect,$sql_del_loaisoft);
	header('location: index.php?quanly=loaisoft&action=them');
?>