<?php 
	$sqlSuaLoaiSoft="Select * From loaisoft Where idloaisoft='".$_GET['idloaisoft']."'";
	$sqlSuaExcute=mysqli_query($connect,$sqlSuaLoaiSoft);
	$myArraySuaLoaiSoft=mysqli_fetch_array($sqlSuaExcute);
?>

<div class="row box-left">
	<div class="col-sm-4 col-md-4">
        <form action="module/add-process.php?idloaisoft=<?php echo $_GET["idloaisoft"] ?>" method="post" enctype="multipart/form-data">
        
        <p>Sửa loại soft</p>
                <p>Tên loại soft: <input value="<?php echo $myArraySuaLoaiSoft["tenloaisoft"]; ?>" type="text" name="tenloaisoft"></p>
                <p>Tên đầy đủ: <input value="<?php echo $myArraySuaLoaiSoft["tendaydu"]; ?>" type="text" name="tendaydu"></p>
                <p>Ảnh minh họa: <input type="file" name="anhminhhoa"></p>
                <p>Thứ tự: <input value="<?php echo $myArraySuaLoaiSoft["thutu"]; ?>" type="text" name="thutu"></p>
                <p>Trạng thái: <select name="trangthai">
                    <option <?php echo ($myArraySuaLoaiSoft["trangthai"] == "Hienthi") ? "selected" : "" ?> value="Hienthi">Hiển thị</option>
                    <option <?php echo ($myArraySuaLoaiSoft["trangthai"] == "Khonghienthi") ? "selected" : "" ?> value="Khonghienthi">Không hiển thị</option>
                </select>
                </p>
                <p>Vị trí hiển thị: <select name="vitri">
                	<option <?php echo ($myArraySuaLoaiSoft["vitri"] == "1")?"selected":""?> value="1">Top right</option>
                    <option <?php echo ($myArraySuaLoaiSoft["vitri"] == "2")?"selected":""?> value="2">Footer</option>
                </select>
                </p>
                <input type="submit" name="sualoaisoft" value="Sửa loại soft">
        </form>
     </div>
	<div class="col-sm-8 col-md-8">
				<table class="table table-hover table-bordered">
                    <tr>
                        <th>Id loại soft</th>
                        <th>Tên loại soft</th>
                        <th>Tên đầy đủ</th>
                        <th>Ảnh minh họa</th>
                        <th>Thứ tự</th>
                        <th>Vị trí</th>
                        <th>Trạng thái</th>
                        <th colspan="2">Thao tác</th>
                    </tr>
                    <?php 
						include("../config.php");
						$sql_loaisoft="Select * From loaisoft Order By thutu DESC";
						$sql_loaisoft_excute=mysqli_query($connect,$sql_loaisoft);
						while($my_array_loaisoft=mysqli_fetch_array($sql_loaisoft_excute))
						{
					?>
                    <tr>
                    	<td><?php echo $my_array_loaisoft["idloaisoft"]; ?></td>
                        <td><?php echo $my_array_loaisoft["tenloaisoft"]; ?></td>
                        <td><?php echo $my_array_loaisoft["tendaydu"]; ?></td>
                        <td><img width="50px" height="40px" src="../source/<?php echo $my_array_loaisoft["anhminhhoa"]; ?>"></td>
                        <td><?php echo $my_array_loaisoft["thutu"]; ?></td>
                        <td><?php echo ($my_array_loaisoft["vitri"]=='1')?"Top right":"Footer";?></td>
                        <td><?php echo $my_array_loaisoft["trangthai"]; ?></td>
                        <td>
                        	<a href="index.php?quanly=loaisoft&action=sua&idloaisoft=<?php echo $my_array_loaisoft["idloaisoft"] ?>">Sửa</a>
                        </td>
                        <td>
                        	<a href="index.php?quanly=loaisoft&action=xoa&idloaisoft=<?php echo $my_array_loaisoft["idloaisoft"] ?>">
                            	Xóa
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
	</div>
</div>