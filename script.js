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

function search(input) {

}