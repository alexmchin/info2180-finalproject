var error_Msg = "There was an issue retrieving the requested infomation."
window.onload = function () {
	var id_Issue = document.getElementById("issue-#").getAttribute("value");
	var close_Button = document.getElementById("closed");
	var progress_Button = document.getElementById("inprogress");
	close_Button.addEventListener("click", function (e) {
		var http_Request = new XMLHttpRequest();
		var issues_UpdateURL = "issues_Update.php?id=" + id_Issue + "&update_Status=Closed";
		console.log("Here");
		http_Request.onreadystatechange = function () {
			if (http_Request.readyState == XMLHttpRequest.DONE) {
				if (http_Request.status == 200) {
					if (http_Request.responseText == "Updated") {
						location.reload();
						
					}
				} else {
					alert(error_Msg);
				}
			}
		};
		http_Request.open("GET", issues_UpdateURL, true);
		http_Request.send();
	});

	progress_Button.addEventListener("click", function (e) {
		var http_Request = new XMLHttpRequest();
		var issues_UpdateURL = "issues_Update.php?id=" + id_Issue + "&update_Status=In-Progress";
		http_Request.onreadystatechange = function () {
			if (http_Request.readyState == XMLHttpRequest.DONE) {
				if (http_Request.status == 200) {
					if (http_Request.responseText == "Updated") {
						location.reload();
					}
				} else {
					alert(error_Msg);
				}
			}
		};

		http_Request.open("GET", issues_UpdateURL, true);
		http_Request.send();
	});
};
