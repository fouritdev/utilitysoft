<?php
	include('../../config.php');
	function checkEmailExits($email) {
		GLOBAL $connect;
		$sqlQueryEmail = "Select * From sendmail Where mail='". $email."'";
		$queryEmail = mysqli_query($connect,$sqlQueryEmail);
		if(mysqli_num_rows($queryEmail)) {
			http_response_code(200);
			echo $result = "Mail của Bạn đã tồn tại trong hệ thống. Cảm ơn Bạn đã quan tâm!!!";
		} else {
			http_response_code(200);
			echo $result = "Cảm ơn Bạn đã đăng ký nhận bài viết. Check mail để nhận bài viết mới nhất";
			insertEmail($email);
		}
	}
	function insertEmail($email) {
		GLOBAL $connect;
		$sqlInsertEmail = "Insert Into sendmail(mail) value('". $email."')";
		$queryEmail = mysqli_query($connect,$sqlInsertEmail);
		return;
	}
?>