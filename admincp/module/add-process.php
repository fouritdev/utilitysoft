<?php
	date_default_timezone_set('asia/Ho_Chi_Minh');
	session_start();
///*	Dữ liệu từ trang thêm đưa vào để xử lý*/
	include("../../config.php");//
	include("../../lib/lib.php");
	include("../../lib/send-mail.php");
	if(isset($_POST["thembaiviet"]))
	{
		$tieudebaiviet=$_POST["tieudebaiviet"];
		$keywords=$_POST["keywords"];
		$description=$_POST["description"];		
		$tomtatbaiviet=$_POST["tomtatbaiviet"];
		$noidungbaiviet=$_POST["noidungbaiviet"];
		$loaitin=$_POST["loaitin"];
		$loaisoft=$_POST["loaisoft"];
		$thutubaiviet=$_POST["thutu"];
		$trangthaibaiviet=$_POST["trangthai"];
		$file_path=$_FILES["anhminhhoa"]["tmp_name"];
		$file_name=$_FILES["anhminhhoa"]["name"];
		move_uploaded_file($file_path,"../../source/".$file_name);
		$sql="Insert Into baiviet(tieudebaiviet,keywords,description,urlbaiviet,tomtatbaiviet,noidungbaiviet,anhminhhoa,loaitin,loaisoft,trangthai,nguoidang,datetime) Values('".$tieudebaiviet."','".$keywords."','".$description."','".convert_vi_to_en($tieudebaiviet)."','".$tomtatbaiviet."','".$noidungbaiviet."','".$file_name."','".$loaitin."','".$loaisoft."','".$trangthaibaiviet."','".$_SESSION['username']."','".date('y-m-d h:i:s')."')";
		$query_excute=mysqli_query($connect,$sql);
		sendMail($tieudebaiviet,$tomtatbaiviet,convert_vi_to_en($tieudebaiviet),mysqli_insert_id($connect));
		header("location: ../index.php?quanly=baiviet&action=them");
	}
	if(isset($_POST["themloaisoft"]))
	{
		$tenloaisoft=$_POST["tenloaisoft"];	
		$tendaydu=$_POST["tendaydu"];
		$thutuloaisoft=$_POST["thutu"];
		$trangthailoaisoft=$_POST["trangthai"];
		$vitri=$_POST['vitri'];
		$file_path_loaisoft=$_FILES["anhminhhoa"]["tmp_name"];
		$file_name_loaisoft=$_FILES["anhminhhoa"]["name"];
		move_uploaded_file($file_path_loaisoft,"../../source/".$file_name_loaisoft);
		$sql_loaisoft="Insert Into loaisoft(tenloaisoft,tendaydu,anhminhhoa,thutu,trangthai,vitri) Values('".$tenloaisoft."','".$tendaydu."','".$file_name_loaisoft."','".$thutuloaisoft."','".$trangthailoaisoft."','".$vitri."')";
		$themloaisoft_excute=mysqli_query($connect,$sql_loaisoft);
		header("location: ../index.php?quanly=loaisoft&action=them");
	}
	if(isset($_POST["sualoaisoft"]))
	{
		$tenloaisoft=$_POST["tenloaisoft"];	
		$tendaydu=$_POST["tendaydu"];
		$thutuloaisoft=$_POST["thutu"];
		$trangthailoaisoft=$_POST["trangthai"];
		$vitri=$_POST['vitri'];
		$file_path_loaisoft=$_FILES["anhminhhoa"]["tmp_name"];
		$file_name_loaisoft=$_FILES["anhminhhoa"]["name"];
		if(!empty($file_path_loaisoft))
		{
			move_uploaded_file($file_path_loaisoft,"../../source/".$file_name_loaisoft);
		}
		else
			$file_name_loaisoft=fileimage($_GET['idloaisoft']);
		$sqlEditLoaiSoft="Update loaisoft Set tenloaisoft='".$tenloaisoft."',tendaydu='".$tendaydu."',anhminhhoa='".$file_name_loaisoft."',thutu='".$thutuloaisoft."',trangthai='".$trangthailoaisoft."',vitri='".$vitri."' Where idloaisoft=".$_GET["idloaisoft"];
		$themloaisoft_excute=mysqli_query($connect,$sqlEditLoaiSoft);
echo $sqlEditLoaisoft;
		header("location: ../index.php?quanly=loaisoft&action=them");
	}
	if(isset($_POST["suabaiviet"]))
	{
		$tieudebaiviet=$_POST["tieudebaiviet"];
		$keywords=$_POST["keywords"];
		$description=$_POST["description"];
		$tomtatbaiviet=$_POST["tomtatbaiviet"];
		$noidungbaiviet=$_POST["noidungbaiviet"];
		$loaitin=$_POST["loaitin"];
		$loaisoft=$_POST["loaisoft"];
		$thutubaiviet=$_POST["thutu"];
		$trangthaibaiviet=$_POST["trangthai"];
		$file_path=$_FILES["anhminhhoa"]["tmp_name"];
		$file_name=$_FILES["anhminhhoa"]["name"];
		if(!empty($file_path))
		{
			move_uploaded_file($file_path,"../../source/".$file_name);
		}
		else
			$file_name=fileimage($_GET['idbaiviet']);
		$sql="Update baiviet Set tieudebaiviet='".$tieudebaiviet."',keywords='".$keywords."',description='".$description."',urlbaiviet='".convert_vi_to_en($tieudebaiviet)."',tomtatbaiviet='".$tomtatbaiviet."',noidungbaiviet='".$noidungbaiviet."',anhminhhoa='".$file_name."',loaitin='".$loaitin."',loaisoft='".$loaisoft."',trangthai='".$trangthaibaiviet."',nguoidang='".$_SESSION['username']."' Where idbaiviet=".$_GET['idbaiviet'];
		$query_excute=mysqli_query($connect,$sql);
		header("location: ../index.php?quanly=baiviet&action=them");
	}	
?>