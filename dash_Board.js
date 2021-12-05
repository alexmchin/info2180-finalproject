var error_Msg = "There was an issue retrieving the requested infomation."
window.onload = function () {
	var issueButton = document.getElementById("myTicketsBtn");
	issueButton.addEventListener("click", function (e) {
		var myTicketsUrl = "my_Tickets.php";
        var dashBoard_LinkRequest = new XMLHttpRequest();
		dashBoard_LinkRequest.onreadystatechange = function () {
			if (dashBoard_LinkRequest.readyState == XMLHttpRequest.DONE) {
				if (dashBoard_LinkRequest.status == 200) {
					var ticketIssue = dashBoard_LinkRequest.responseText;
					var result = document.getElementById("result");
					result.innerHTML = ticketIssue;
				} else {
					alert(error_Msg);
				}
			}
		};
		dashBoard_LinkRequest.open("GET", myTicketsUrl, true);
		dashBoard_LinkRequest.send();
	});

	var openIssueBtn = document.getElementById("openIssuesBtn");
	openIssueBtn.addEventListener("click", function (e) {
		var openIssuesUrl = "open_Issues.php";
        var openIssuesRequest = new XMLHttpRequest();
		openIssuesRequest.onreadystatechange = function () {
			if (openIssuesRequest.readyState == XMLHttpRequest.DONE) {
				if (openIssuesRequest.status == 200) {
					var issue = openIssuesRequest.responseText;
					var result = document.getElementById("result");
					result.innerHTML = issue;
				} else {
					alert(error_Msg);
				}
			}
		};
	    openIssuesRequest.open("GET", openIssuesUrl, true);
		openIssuesRequest.send();
	});

	var allIssuesBtn = document.getElementById("allIssuesBtn");
	allIssuesBtn.addEventListener("click", function (e) {
		var allIssuesUrl = "allIssues.php";
        var allIssuesRequest = new XMLHttpRequest();
		allIssuesRequest.onreadystatechange = function () {
			if (allIssuesRequest.readyState == XMLHttpRequest.DONE) {
				if (allIssuesRequest.status == 200) {
					var issue = allIssuesRequest.responseText;
					var result = document.getElementById("result");
					result.innerHTML = issue;
				} else {
					alert(error_Msg);
				}
			}
		};
		allIssuesRequest.open("GET", allIssuesUrl, true);
		allIssuesRequest.send();
	});

    var pageIssuesUrl = "allIssues.php";
	var pageIssuesRequest = new XMLHttpRequest();
	pageIssuesRequest.onreadystatechange = function () {
		if (pageIssuesRequest.readyState == XMLHttpRequest.DONE) {
			if (pageIssuesRequest.status == 200) {
				var issue = pageIssuesRequest.responseText;
				var result = document.getElementById("result");
				result.innerHTML = issue;
			} else {
				alert(error_Msg);
			}
		}
	};
	pageIssuesRequest.open("GET", pageIssuesUrl, true);
	pageIssuesRequest.send();


    /*var dashBoard_Link = document.getElementById("load_Dashboard");
	dashBoard_Link.addEventListener("click", function (e) {
        var dashBoard_LinkRequest = new XMLHttpRequest();
		dashBoard_LinkRequest.onreadystatechange = function () {
			if (dashBoard_LinkRequest.readyState == XMLHttpRequest.DONE) {
				if (dashBoard_LinkRequest.status == 200) {
                    var dashBoard_Link = "dash_Board.php";
                    dashBoard_LinkRequest.open("GET", dashBoard_Link, true);
		            dashBoard_LinkRequest.send();
                    alert("Good");
                }
            }
        }

					/*var dash_Request = dashBoard_LinkRequest.responseText;
					/*var result = document.getElementById("result");*/
					/*result.innerHTML = ticketIssue;
				} else {
					alert(error_Msg);
				}
			}
		};
		dashBoard_LinkRequest.open("GET", myTicketsUrl, true);
		dashBoard_LinkRequest.send();*/
	/*});*/

};


