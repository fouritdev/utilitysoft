// JavaScript Document
/*
*
*Load When page load
*
*/

function showPopup(state) {
	document.getElementsByClassName("popup")[0].style.display = state;
	document.getElementsByClassName("overlay")[0].style.display = state;		
}
window.onload = function() {
	var overlay = document.getElementsByClassName("overlay");
	overlay[0].addEventListener('click', function() {showPopup("none");});
};
function checkExitsEmail() {
	var email = document.getElementsByClassName('enter-email')[0].value;
	if(!validationEmail(email)) {
		document.getElementsByClassName('error')[0].innerHTML = "Bạn nhập mail không chính xác. Vui lòng kiểm tra lại và nhập lại!!!!";
		return;
	} else {
		document.getElementsByClassName('error')[0].innerHTML = "";
	}
	if(email.trim().length === 0) {
		return;	
	} else {
		var requestMail = new XMLHttpRequest();
		requestMail.onreadystatechange = function() {
			if(requestMail.status == 200 && requestMail.readyState == 4) {		
				showPopup("block");	
				document.getElementsByClassName("message")[0].innerHTML = "<p>"+requestMail.responseText+"</p>" + '<i class="fa fa-envelope-o" aria-hidden="true"></i>';
			}
		};
		requestMail.open("GET","module/ajax/APIController.php?checkEmail=" + email, true);
		requestMail.send();
	}
}
function validationEmail(email) {
	var pattern = /^[A-Za-z0-9._%+-]+@([A-Za-z0-9-]+\.)+([A-Za-z0-9]{2,4}|museum)$/;
	return pattern.test(email);
}