<?php
	session_start();
	include("config.php");
	include('lib/lib.php');
?>
<!doctype html>
<html>
<head>
<base href="http://localhost:8080/utilitysoft/" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="source/logo_Four.png" type="image/gif" >
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php if(!empty($_GET['idbaiviet'])) echo title_baiviet($_GET['idbaiviet'])."-";?>Phần mềm thủ thuật máy tính free</title>
<?php 
	$arrayMeta["description"]="Phần mềm thủ thuật máy tính free. Cung cấp cho các Bạn các phần mềm link tốc độ cao, support cài đặt bằng hình ảnh, support online";
	$arrayMeta["keywords"]="Thủ thuật máy tính, miễn phí, diệt virus miễn phí, công cụ boot, tạo usb boot";
	if(!empty($_GET['idbaiviet'])) $arrayMeta=getData($_GET['idbaiviet']);
?>
<meta name="description" content="<?php echo $arrayMeta["description"] ?>">
<meta name="keywords" content="<?php echo $arrayMeta["keywords"];?>">
<meta name="author" content="Hege Refsnes">
<link href="style/css/custom.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style/css/css/font-awesome.min.css">
<link href="style/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script src="style/js/jquery-2.1.4.min.js"></script>
<script src="style/js/utilitysoft.js"></script>
<script>
	$(function(){
		$('.chitietnoidungbaiviet img').addClass('img-responsive');
		});
</script>
</head>

<body>
	<div class="header">
        <div class="container">
            <div class="row">
            	<div class="col-sm-4">
                	<a href="" class="logo-us" title="Thủ thuật tiện ích"></a>
                </div>
                <div class="col-sm-4" style="padding:20px">
                	<div class="glyphicon glyphicon-paperclip">
                    	Download link direct
                    </div>
                    <div class="glyphicon glyphicon-floppy-save">
                    	Download free
                    </div>
                    <div class="glyphicon glyphicon-plane">
                    	Max speed
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-header">
        <div class="container main-menu">
            <div class="row">
            	<div class="col-sm-12">
                    <ul class="nav nav-pills">
                        <li><a class="glyphicon glyphicon-home" href="category/trangchu"></a></li>
                        <li><a href="category/thuthuat">Thủ thuật</a></li>
                        <li><a href="category/windows">Windows</a></li>
                        <li><a href="category/ghost">Ghost</a></li>
                        <li><a href="category/software">Phần mềm</a></li>
                        <li><a href="category/lienhe">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <?php include("module/content-left.php"); ?>
                </div>
                <div class="col-sm-3">
                	<div class="row category">
                        <div class="col-sm-12 glyphicon glyphicon-signal panel page-header">
                                <span class="panel-title">Category Soft</span>
                        </div>
	                </div>
                    <?php include("module/content-right.php");?>
                </div>
            </div>
        </div>
	</div>
    
    <div class="footer">
    	<div class="container">
        	<div class="row">
            	<div class="col-sm-12 col-sm-12">
                	<?php include("module/footer.php"); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
           	<div class="col-md-offset-3 col-sm-8 col-xs-8">
                <div class="popup">
                    <div class="message"></div>
                </div>
        	</div>
    	</div>
	</div>
    <div class="overlay"></div>
</body>
</html>