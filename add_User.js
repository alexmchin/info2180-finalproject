window.onload = function () {
	var firstname = document.getElementById("firstname");
	var lastname = document.getElementById("lastname");
	var password = document.getElementById("passwd");
	var email = document.getElementById("email");
	var result = document.getElementById("result");
	var add_UserBtn = document.getElementById("add_UserBtn");
	add_UserBtn.addEventListener("click", function (e) {
		e.preventDefault();
		if (validate_Fields() == true) {
			var http_Request = new XMLHttpRequest();
			var urlcode = "submit_User.php?firstname=" + firstname.value + "&lastname=" + lastname.value + "&password=" + password.value + "&email=" + email.value;
			http_Request.onreadystatechange = function () {
				if (http_Request.readyState == XMLHttpRequest.DONE) {
					if (http_Request.status == 200) {
						var issue = http_Request.responseText;
						result.innerHTML = issue;
					} else {
						alert("There was an issue retrieving the requested infomation.");
					}
				}
			};

			http_Request.open("GET", urlcode, true);
			http_Request.send();
			console.log("Here");
			firstname.value = "";
			lastname.value = "";
			password.value = "";
			email.value = "";
		}
	});
};
function validate_Fields() {
	var firstname = document.getElementById("firstname");
	var lastname = document.getElementById("lastname");
	var password = document.getElementById("passwd");
	var email = document.getElementById("email");
	var result = document.getElementById("result");
	var check = true;
	
	if (!password.value.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/)) {
		result.innerHTML = "Password must be at least 8 characters including 1 capital letter and 1 number.";
		check = false;
	}

	if (
		!email.value.match(
			/(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/
		)
	) {
		result.innerHTML = "Please enter an appropriate email address.";
		check = false;
	}
	if (firstname.value == "") {
		result.innerHTML = "Please populate the First Name field.";
		check = false;
	}
	if (lastname.value == "") {
		result.innerHTML = "Please populate the Last Name field.";
		check = false;
	}

	if (check) {
		return true;
	} else {
		return false;
	}
}
