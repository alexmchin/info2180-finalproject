var error_Msg = "There was an issue retrieving the requested infomation."
window.onload = function () {
	const issueButton = document.getElementById("myTicketsBtn");
	issueButton.addEventListener("click", function (e) {
		const myTicketsUrl = "my_Tickets.php";
        const dashBoard_LinkRequest = new XMLHttpRequest();
		dashBoard_LinkRequest.onreadystatechange = function () {
			if (dashBoard_LinkRequest.readyState == XMLHttpRequest.DONE) {
				if (dashBoard_LinkRequest.status == 200) {
					const ticketIssue = dashBoard_LinkRequest.responseText;
					const result = document.getElementById("result");
					result.innerHTML = ticketIssue;
				} else {
					alert(error_Msg);
				}
			}
		};
		dashBoard_LinkRequest.open("GET", myTicketsUrl, true);
		dashBoard_LinkRequest.send();
	});

	const openIssueBtn = document.getElementById("openIssuesBtn");
	openIssueBtn.addEventListener("click", function (e) {
		const openIssuesUrl = "open_Issues.php";
        const openIssuesRequest = new XMLHttpRequest();
		openIssuesRequest.onreadystatechange = function () {
			if (openIssuesRequest.readyState == XMLHttpRequest.DONE) {
				if (openIssuesRequest.status == 200) {
					const issue = openIssuesRequest.responseText;
					const result = document.getElementById("result");
					result.innerHTML = issue;
				} else {
					alert(error_Msg);
				}
			}
		};
	    openIssuesRequest.open("GET", openIssuesUrl, true);
		openIssuesRequest.send();
	});

	const allIssuesBtn = document.getElementById("allIssuesBtn");
	allIssuesBtn.addEventListener("click", function (e) {
		const allIssuesUrl = "allIssues.php";
        const allIssuesRequest = new XMLHttpRequest();
		allIssuesRequest.onreadystatechange = function () {
			if (allIssuesRequest.readyState == XMLHttpRequest.DONE) {
				if (allIssuesRequest.status == 200) {
					const issue = allIssuesRequest.responseText;
					const result = document.getElementById("result");
					result.innerHTML = issue;
				} else {
					alert(error_Msg);
				}
			}
		};
		allIssuesRequest.open("GET", allIssuesUrl, true);
		allIssuesRequest.send();
	});

    const pageIssuesUrl = "allIssues.php";
	const pageIssuesRequest = new XMLHttpRequest();
	pageIssuesRequest.onreadystatechange = function () {
		if (pageIssuesRequest.readyState == XMLHttpRequest.DONE) {
			if (pageIssuesRequest.status == 200) {
				const issue = pageIssuesRequest.responseText;
				const result = document.getElementById("result");
				result.innerHTML = issue;
			} else {
				alert(error_Msg);
			}
		}
	};
	pageIssuesRequest.open("GET", pageIssuesUrl, true);
	pageIssuesRequest.send();


    /*const dashBoard_Link = document.getElementById("load_Dashboard");
	dashBoard_Link.addEventListener("click", function (e) {
        const dashBoard_LinkRequest = new XMLHttpRequest();
		dashBoard_LinkRequest.onreadystatechange = function () {
			if (dashBoard_LinkRequest.readyState == XMLHttpRequest.DONE) {
				if (dashBoard_LinkRequest.status == 200) {
                    const dashBoard_Link = "dash_Board.php";
                    dashBoard_LinkRequest.open("GET", dashBoard_Link, true);
		            dashBoard_LinkRequest.send();
                    alert("Good");
                }
            }
        }

					/*const dash_Request = dashBoard_LinkRequest.responseText;
					/*const result = document.getElementById("result");*/
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


