<?php
		//Bắt đầu hàm chi tiết loại tin bài viết
			GLOBAL $connect;
			$chitietloaitin=$_GET["baiviet"];
			$idbaiviet=$_GET["idbaiviet"];
			$sql="Select * From baiviet Where loaitin='".$chitietloaitin."' And trangthai='Hienthi' And idbaiviet=".$idbaiviet."";
			if(is_null($_GET['baiviet']) or $_GET['baiviet']=='trangchu')
				$sql="Select * From baiviet Where trangthai='Hienthi' And idbaiviet=".$idbaiviet." Order By idbaiviet DESC";
			$query_excute1=mysqli_query($connect,$sql);
			$my_array=mysqli_fetch_array($query_excute1);
		?>
		<div class="row tieudechitietloaitin">
        	<div class="col-sm-12">
            	<?php echo $my_array["tieudebaiviet"]; ?>
            </div>
            <div class="row">
                <div class="col-sm-12 date-time">
                    <p>Cập nhật bởi: <?php echo $my_array['nguoidang'];echo "  ".$my_array['datetime']; ?> </p>            
                </div>
            </div>
        </div>
        <div class="row chitietnoidungbaiviet">
        	<div class="col-sm-6">
            	<img class="img-responsive" src="source/<?php echo $my_array["anhminhhoa"]; ?>">
            </div>
              	<?php echo "<span class='img-res'>".$my_array["noidungbaiviet"]."</span>"; ?>                
        </div>
        <div class="baivietlienquan">
        	<div class="row">
            	<div class="col-sm-11 co-the-ban-quan-tam">
                	Có thể bạn quan tâm
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 tieudebaivietlienquan">
					<?php 
						$query_baivietlienquan="Select * From baiviet Where trangthai='Hienthi' And loaisoft='".$_GET['loaisoft']."' And idbaiviet!=".$idbaiviet." Order By Rand() Limit 0,4";
						$query_baivietlienquan="Select * From baiviet Where trangthai='Hienthi' And idbaiviet!='".$idbaiviet."' Order By Rand() Limit 0,4";
						if(isset($_GET['loaisoft']))	
							$query_baivietlienquan="Select * From baiviet Where trangthai='Hienthi' And loaisoft='".$_GET['loaisoft']."' And idbaiviet!=".$idbaiviet." Order By Rand() Limit 0,4";
						if(isset($_GET['baiviet']))
							$query_baivietlienquan="Select * From baiviet Where trangthai='Hienthi' And loaitin='".$_GET['baiviet']."' And idbaiviet!=".$idbaiviet." Order By Rand() Limit 0,4";	
/*						if(is_null($_GET['loaisoft']) and is_null($_GET['baiviet']))							
							$query_baivietlienquan="Select * From baiviet Where idbaiviet!='".$idbaiviet."'";
*/	
						$result_baivietloaitin=mysqli_query($connect,$query_baivietlienquan);
					?>
							<div class="row"><!--//Mỗi phần tử là 6 ô, sau khi hết 12 ô sẽ float trái-->
					<?php
						while($array_baivietlienquan=mysqli_fetch_array($result_baivietloaitin))		
						{?>
                        	
                            	<div class="col-sm-6 box-co-the-ban-quan-tam">
                                	<div class="row">
                                        	<div class="col-sm-3">
												<img class="img-responsive" src="source/<?php echo $array_baivietlienquan['anhminhhoa'] ?>">
                                            </div>
                                            <div class="col-sm-9 item_baivietlienquan">
                                                <a href="<?php echo $array_baivietlienquan['urlbaiviet'] ?>-<?php echo $array_baivietlienquan['idbaiviet']; ?>.html"><?php echo $array_baivietlienquan['tieudebaiviet']; ?></a>
                                                <p class="nguoi-dang">Cập nhật bởi: <?php echo $array_baivietlienquan['nguoidang'];echo "   ".$array_baivietlienquan['datetime']; ?></p>
                                            </div>
                                    </div>
                                </div>
                           
					<?php			
						}
					?>     
                    		 </div>               
                </div>
            </div>
        </div>


		<?php 
	 //Kết thúc hàm chi tiết loại tin ?>