<?php
	function sendMail($tieude,$tomtat,$url,$id) {
		GLOBAL $connect;
		$urlbaiviet = "http://utilitysoft.tk/".$url."-".$id.".html";
		$sqlSendMail = "Select * from sendmail";		
		$sqlQuery = mysqli_query($connect,$sqlSendMail);
		while($arrayMail = mysqli_fetch_array($sqlQuery)) {
			$to      = $arrayMail['mail'];
			$subject = $tieude;
			$message = $tomtat."<br><a href='".$urlbaiviet."'>Link</a>";
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: fourit@utilitysoft.tk' . "\r\n";
			mail($to, $subject, $message, $headers);			
		}
	}
	function sendMailWelcome($mail) {
			$to      = $mail;
			$subject = "Chào Bạn!!!!";
			$message = "Thư ơi!!!! Đồng ý làm người yêu Tư nhá!!!! ^_^";
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: fourit@utilitysoft.tk' . "\r\n";
			mail($to, $subject, $message, $headers);
	}
?>