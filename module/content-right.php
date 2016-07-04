<?php include("config.php"); 
	$sql_count_loaisoft="Select * From loaisoft Where trangthai='Hienthi' And vitri=1 Order By thutu ASC";
	$sql_count_loaisoft_excute=mysqli_query($connect,$sql_count_loaisoft);
	while($mysql_count_loaisoft=mysqli_fetch_array($sql_count_loaisoft_excute))
	{
?>
<div class="row menu-doc">
	<div class="item-image col-xs-2 col-sm-2 col-md-2">
    	<img src="source/<?php echo $mysql_count_loaisoft["anhminhhoa"]; ?>" alt=""/>
    </div>
    <div class="item-text col-xs-8 col-sm-8 col-md-8">
    	<a href="software/<?php echo $mysql_count_loaisoft["tenloaisoft"]; ?>"><?php echo $mysql_count_loaisoft["tendaydu"]; ?></a>
    </div>
    <div class="item-count pull-right col-xs-2 col-sm-2 col-md-2">
    	<?php 
			$count_loaisoft="Select * From baiviet Where trangthai='Hienthi' And loaisoft='".$mysql_count_loaisoft['tenloaisoft']."'";
			$count_loaisoft_excute=mysqli_query($connect,$count_loaisoft);
			echo "[".mysqli_num_rows($count_loaisoft_excute)."]"; 
		?>
    </div>
<!--    Bắt đầu menu dọc-->


	<!--	Kết thúc menu dọc-->
</div>
	<?php } ?>
<!--Box search-->
<form action="index.php" method="get" accept-charset="utf-8" class="form-group">

<div class="row input-group">
 	<input type="text" name="q" class="col-sm-10 form-control input-search" placeholder="Tìm kiếm theo tên phần mềm.........">
    <span  class="input-group-addon"><label for="btn-search">GO</label></span>
   	<input id="btn-search" type="submit" class="btn-search btn btn-primary col-sm-2">
</div>

</form>
<!--Bài viết mới nhất-->    
<div class="row baivietmoinhat">
	<div class="col-sm-12 glyphicon glyphicon-hand-right panel page-header">
		<span class="panel-title">Bài viết mới nhất</span>
    </div>
</div>
<?php
	
	if($_GET['idbaiviet'])
		$sql_baivietmoinhat="Select * From baiviet Where trangthai='Hienthi' And idbaiviet!=".$_GET['idbaiviet']." Order By idbaiviet DESC limit 0,5";
	else
		$sql_baivietmoinhat="Select * From baiviet Where trangthai='Hienthi' Order By idbaiviet DESC limit 0,5";
	$sql_baivietmoinhat_excute=mysqli_query($connect,$sql_baivietmoinhat);
	while($array_baivietmoinhat=mysqli_fetch_array($sql_baivietmoinhat_excute))
	{
?>
	<div class="row list_baivietmoinhat">
    	<div class="col-sm-3">
        	<img class="img-responsive" src="source/<?php echo $array_baivietmoinhat['anhminhhoa']; ?>">
        </div>
        <div class="col-sm-9">
        	<p><a href="<?php echo $array_baivietmoinhat['urlbaiviet']; ?>-<?php echo $array_baivietmoinhat['idbaiviet']; ?>.html"><?php echo $array_baivietmoinhat['tieudebaiviet'] ?></a></p>
            <div class="row">
            	<div class="col-sm-12">
                	<span class="capnhatboi">Cập nhật bởi: <?php echo $array_baivietmoinhat['nguoidang']; ?></span>
                </div>
            </div>
        </div>
    </div>
<?php } ?>