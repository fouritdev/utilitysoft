<?php //Begin function search ?>
<?php
//	Liệt kê bài viết theo loại tin		
		$keyword_search=str_replace("+"," ",$_GET["q"]);

		$sql_search="Select * From baiviet Where trangthai='Hienthi' And noidungbaiviet like '%".$keyword_search."%'";		
		$sql_search_query=mysqli_query($connect,$sql_search);
		while($my_array_search=mysqli_fetch_array($sql_search_query))
		{
?>                         
			<div class="row tieudebaiviet">
				<div class="col-sm-12">
                	<?php
           				$url="<a href='index.php?loaisoft=".$my_array_search['loaisoft']."&idbaiviet=".$my_array_search['idbaiviet']."'>".$my_array_search['tieudebaiviet']."</a>";                     				
						echo $url;
                    ?>
				</div>
			</div>
			<div class="row tomtatbaiviet">
				<div class="col-sm-3">
					<img src="source/<?php echo $my_array_search["anhminhhoa"]; ?>" class="img-responsive">
				</div>
				<div class="col-sm-9">
					<?php echo $my_array_search["tomtatbaiviet"]; ?>
				</div>
			</div>
        <?php } //End Function search ?>