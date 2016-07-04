<?php
//	Liệt kê bài viết theo loại tin		
		GLOBAL $connect;
		if(is_null($_GET['cp']))
			$_GET['cp']=1;
		if($_GET['baiviet']==NULL and $_GET['loaisoft']==NULL)
			$_GET['baiviet']="trangchu";
		if(is_null($_GET['baiviet']) || $_GET['baiviet']=='trangchu')
			{
				$_GET['cp']-=1;	if($_GET['cp']<0) $_GET['cp']=$_GET['cp']+abs($_GET['cp']); //Lấy chỉ số limit bắt đầu từ record 0
				$_GET['cp']*=10;//Mỗi page lấy 10 bản ghi và page thứ 2 bắt đầu từ vị trí thứ 1*10
				$sql="Select * From baiviet Where trangthai='Hienthi' Order By idbaiviet DESC limit ".$_GET['cp'].",10";
				$sql_num_row="Select * From baiviet Where trangthai='Hienthi' Order By idbaiviet DESC";	
			}
		else
				{
					$_GET['cp']-=1; if($_GET['cp']<0) $_GET['cp']=$_GET['cp']+abs($_GET['cp']); 
					$_GET['cp']*=10; 
					$sql="Select * From baiviet Where loaitin='".$_GET['baiviet']."' And trangthai='Hienthi' Order By idbaiviet DESC limit ".$_GET['cp'].",10";
					$sql_num_row="Select * From baiviet Where loaitin='".$_GET['baiviet']."' And trangthai='Hienthi' Order By idbaiviet DESC";
				}
		if($_GET['loaisoft']!=NULL)
		{
			if($_GET['cp']<0) $_GET['cp']=$_GET['cp']+abs($_GET['cp']); 
			$sql="Select * From baiviet Where loaisoft='".$_GET['loaisoft']."' And trangthai='Hienthi' Order By idbaiviet DESC limit ".$_GET['cp'].",10";
			$sql_num_row="Select * From baiviet Where loaisoft='".$_GET['loaisoft']."' And trangthai='Hienthi' Order By idbaiviet DESC";
		}
		$_GET['cp']/=10;
		if($_GET['baiviet']=='lienhe')
			include('module/lienhe.php');
		$query_excute=mysqli_query($connect,$sql);
		while($my_array=mysqli_fetch_array($query_excute))
		{
?>                         
			<div class="row tieudebaiviet">
				<div class="col-sm-12">
                	<?php
					//Trường hợp không có bài viết có nghĩa đang ở trang chủ
						$url="<a href='".$my_array['urlbaiviet']."-".$my_array['idbaiviet'].".html'>".$my_array['tieudebaiviet']."</a>";                     				
						if(isset($_GET['baiviet']))
	               			$url="<a href='".$my_array['urlbaiviet']."-".$my_array['idbaiviet'].".html'>".$my_array['tieudebaiviet']."</a>";                     				
						if($_GET['baiviet']=="trangchu")							
							$url="<a href='".$my_array['urlbaiviet']."-".$my_array['idbaiviet'].".html'>".$my_array['tieudebaiviet']."</a>";    
						if(isset($_GET['loaisoft'])) 
               				$url="<a href='".$my_array['urlbaiviet']."-".$my_array['idbaiviet'].".html'>".$my_array['tieudebaiviet']."</a>";                     				
						echo $url;
                    ?>
				</div>
			</div>
			<div class="row tomtatbaiviet">
				<div class="col-sm-3">
					<img src="source/<?php echo $my_array["anhminhhoa"]; ?>" class="img-responsive">
				</div>
				<div class="col-sm-9">
					<?php echo $my_array["tomtatbaiviet"]; 
					?>
				</div>
			</div>
        <?php }?>
<!--/*        Phân trang ở chỗ này*/-->
			<!--Đếm tổng số bài viết theo loại soft hoặc bài viết-->
        <?php  
			$sql_num_row_excute=mysqli_query($connect,$sql_num_row);
			$num_row=ceil(mysqli_num_rows($sql_num_row_excute)/10);
		?>
		<div class="row">
        	<div class="col-sm-12">
            	<div class="box-phantrang">
                	<ul class="phantrang">
                    	<li><a href="index.php?<?php if(is_null($_GET['baiviet'])) echo 'loaisoft'; else echo 'baiviet'; ?>=<?php if(is_null($_GET['baiviet'])) echo $_GET['loaisoft']; else echo $_GET['baiviet'];?>&cp=<?php echo 1; ?>"><?php if($num_row>=2) echo "Về đầu" ?></a></li>                
                    	<li><a href="index.php?<?php if(is_null($_GET['baiviet'])) echo 'loaisoft'; else echo 'baiviet'; ?>=<?php if(is_null($_GET['baiviet'])) echo $_GET['loaisoft']; else echo $_GET['baiviet'];?>&cp=<?php echo $_GET['cp']-2; ?>"><?php if(($_GET['cp']-2<=$num_row) and $num_row>=2 and $_GET['cp']-2>0) echo $_GET['cp']-2;?></a></li>
                        <li><a href="index.php?<?php if(is_null($_GET['baiviet'])) echo 'loaisoft'; else echo 'baiviet'; ?>=<?php if(is_null($_GET['baiviet'])) echo $_GET['loaisoft']; else echo $_GET['baiviet'];?>&cp=<?php echo $_GET['cp']-1; ?>"><?php if($num_row>=2 and $_GET['cp']-1>0) echo $_GET['cp']-1;?></a></li>
                        <li><a href="index.php?<?php if(is_null($_GET['baiviet'])) echo 'loaisoft'; else echo 'baiviet'; ?>=<?php if(is_null($_GET['baiviet'])) echo $_GET['loaisoft']; else echo $_GET['baiviet'];?>&cp=<?php echo $_GET['cp']; ?>"><?php if(($_GET['cp']<=$num_row) and $_GET['cp']>0 and $num_row>=2) echo $_GET['cp'];?></a></li>
                        <li><a href="index.php?<?php if(is_null($_GET['baiviet'])) echo 'loaisoft'; else echo 'baiviet'; ?>=<?php if(is_null($_GET['baiviet'])) echo $_GET['loaisoft']; else echo $_GET['baiviet'];?>&cp=<?php echo $_GET['cp']+1; ?>"><?php if(($_GET['cp']+1<=$num_row) and $num_row>=2) echo $_GET['cp']+1;?></a></li>
                        <li><a href="index.php?<?php if(is_null($_GET['baiviet'])) echo 'loaisoft'; else echo 'baiviet'; ?>=<?php if(is_null($_GET['baiviet'])) echo $_GET['loaisoft']; else echo $_GET['baiviet'];?>&cp=<?php echo $_GET['cp']+2; ?>"><?php if(($_GET['cp']+2<=$num_row) and $num_row>=2) echo $_GET['cp']+2;?></a></li>
                    	<li><a href="index.php?<?php if(is_null($_GET['baiviet'])) echo 'loaisoft'; else echo 'baiviet'; ?>=<?php if(is_null($_GET['baiviet'])) echo $_GET['loaisoft']; else echo $_GET['baiviet'];?>&cp=<?php echo $num_row; ?>"><?php if($num_row>=2) echo "Về cuối" ?></a></li>                
                    </ul>
                </div>
          	</div>
        </div>
        
	<?php   ?>
<!--//Kết thúc hàm liệt kê bài viết-->