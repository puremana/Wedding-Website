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
}
function unable(id) {
	var url = "sendInfo.php?text=unable," + id;
	ajaxRequest("GET", url, true, "", unableCallback);
}
function unableCallback(response) {
	alert(response);
	var id = "block-" + response;
	var bigBlock = document.getElementById(id);
	bigBlock.getElementsByTagName('p')[1].innerHTML = "<span class='red'>Unable to attend</span>";
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
	alert("You have been registration for the bus has changed.");
}