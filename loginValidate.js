function validateUser() {
	var passwd = document.getElementById("passwd");
	var email = document.getElementById("email");
	var error_Msg = document.getElementById("checkForError");
	var check = true;
	
    if (email.value == "") {
		error_Msg.innerHTML = "Please fill the email field";
		check = false;
	}
	
    if (passwd.value == "") {
		error_Msg.innerHTML = "Please fill the password field";
		check = false;
	}
	
    if (check) {
		return true;
	} else {
		return false;
	}
}
