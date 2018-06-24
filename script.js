//AJAX Request protocol for PHP functions
function ajaxRequest(method, url, async, data, callback) {
	//Create a new request object
	var request = new XMLHttpRequest();
	request.open(method,url,async);
	
	if(method == "POST"){
		request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	}
	
	request.onreadystatechange = function(){
		if (request.readyState == 4) {
			if (request.status == 200) {
				var response = request.responseText;
				callback(response);
			} else {
				//do nothing
			}
		}
	}
	request.send(data);
}

//Get all user information
function getUserInfo() {
    var url = "getInfo.php?";
	ajaxRequest("GET", url, true, "", writeUserInfo);
}

//Write user information in html
function writeUserInfo(response) {
    document.getElementById("block-container").innerHTML = response;
}

//On search key input
function search(input) {
	var key = input.value.toLowerCase();
	var blocks = document.getElementsByClassName("block");

	//If the search only contains whitespace
	if (!key.replace(/\s/g, '').length) {
		for (var i = 0; i < blocks.length; i++) {
			blocks[i].setAttribute("class", "block hide");
		}
		return;
	}

	//Search the blocks for the input key
	for (var i = 0; i < blocks.length; i++) {
		var text = blocks[i].getElementsByClassName('name')[0].innerHTML;
		
		//If the input is found in the name
		if (text.toLowerCase().includes(key)) {
			//Display it
			blocks[i].classList.remove("hide");
		}
		else {
			//Else, hide it
			blocks[i].setAttribute("class", "block hide");
		}
	}
}

//On click functions
function going(id) {
	var url = "sendInfo.php?text=going," + id;
	ajaxRequest("GET", url, true, "", goingCallback);
}
function goingCallback(response) {
	var id = "block-" + response;
	var bigBlock = document.getElementById(id);
	bigBlock.getElementsByTagName('p')[1].innerHTML = "<span class='green'>Going</span>";
	alert("Your wedding attendance has been confirmed.");
}
function unable(id) {
	var url = "sendInfo.php?text=unable," + id;
	ajaxRequest("GET", url, true, "", unableCallback);
}
function unableCallback(response) {
	var id = "block-" + response;
	var bigBlock = document.getElementById(id);
	bigBlock.getElementsByTagName('p')[1].innerHTML = "<span class='red'>Unable to attend</span>";
	alert("Your wedding attendance has been set to unable.");
}
function busCheck(checkbox) {
	var id = checkbox.value;
	if (checkbox.checked) {
		var url = "sendInfo.php?text=busYes," + id;
		ajaxRequest("GET", url, true, "", busCheckCallback);
	}
	else {
		var url = "sendInfo.php?text=busNo," + id;
		ajaxRequest("GET", url, true, "", busCheckCallback);
	}
}
function busCheckCallback() {
	alert("Your registration for the bus has changed.");
}
function deleteUser(id, name) {
	var txt;
	var message = "Are you sure you want to delete " + name + "?";
	var r = confirm(message);
	if (r == true) {
		var url = "deletePerson.php?text=" + id;
		ajaxRequest("GET", url, true, "", deleteCallback);
	}
}
function deleteCallback() {
	window.location.replace("https://ollyandmon.co.nz/admin");
}