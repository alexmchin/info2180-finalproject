window.onload = function () {
	var createIssueBtn = document.getElementById("create_Issue");
	var result = document.getElementById("result");
	createIssueBtn.addEventListener("click", function (e) {
		e.preventDefault();
		var check = true;
		var title = document.getElementById("title");
		var description = document.getElementById("description");
		var userList = document.getElementById("assignedto");
		var selectedUser = userList.options[userList.selectedIndex].text;
		var priority = document.getElementById("priority");
		var priorityChosen = priority.options[priority.selectedIndex].text;
		var type = document.getElementById("type");
		var typeChosen = type.options[type.selectedIndex].text;
	
		if (title.value.length < 1) {
			result.innerHTML = "Please populate title field.";
			check = false;
		}
		
        if (description.value.length < 1) {
			result.innerHTML = "Please populate description field.";
			check = false;
		}

		if (selectedUser == "Please Select") {
			result.innerHTML = "Please select a user.";
			check = false;
		}
		
        if (check) {
			var hRequest = new XMLHttpRequest();
			var urlcode = "add_Issues.php?title=" + title.value + "&description=" + description.value + "&assignedto=" + selectedUser + "&priority=" + priorityChosen + "&type=" + typeChosen;
			hRequest.onreadystatechange = function () {
				if (hRequest.readyState == XMLHttpRequest.DONE) {
					if (hRequest.status == 200) {
						var issue = hRequest.responseText;
						result.innerHTML = issue;
					} else {
						alert("Issue retrieving the requested information.");
					}
				}
			};
			hRequest.open("GET", urlcode, true);
			hRequest.send();
			title.value = "";
			description.value = "";
		}
	});
};
