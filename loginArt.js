function load() {
	if (document.getElementById("loginA") == null) {
		document.getElementById("logout").onclick = logout;
	} else {
		document.getElementById("loginA").onclick = displayForm;
		document.getElementById("loginButt").onclick = login;
	}
};

function hideForm() {
	document.getElementById('loginform').style.display = 'none';
}

function displayForm() {
	var form = document.getElementById("loginform");
	if (this.innerHTML == "Login" || this.innerHTML == "Try Again?") {
		form.style.display = "block";
		this.innerHTML = "Close";
	} else {
		form.style.display = "none";
		this.innerHTML = "Login";
	}
}

var styleRay = ["main","blank"];
function changeCSS(n) {
	document.getElementById("bod").className = styleRay[n];
}

/* ---------------------------- */
/* XMLHTTPRequest Enable */
/* ---------------------------- */
function createObject() {
	var request_type;
	var browser = navigator.appName;
	if (browser == "Microsoft Internet Explorer"){ // BOOO
		request_type = new ActiveXObject("Microsoft.XMLHTTP");
	} else{
		request_type = new XMLHttpRequest();
	}
	return request_type;
}

var http = createObject();


/* -------------------------- */
/* LOGIN */
/* -------------------------- */
/* Required: var nocache is a random number to add to request. This value solve an Internet Explorer cache issue */
var nocache = 0;

function logout() {
	http.open('get', 'sessionKill.php', true);
	http.send(null);
	http.onreadystatechange = null;
	document.getElementById('login').innerHTML = '<a href="signup.php" title="Sign Up">Sign Up</a> / <a  id="loginA" title="Login">Login</a><br /><div id="loginform" style="display:none">\nUsername: <input type="text" id="usernametext" name="username" /><br />\nPassword: <input type="password" id="password" name="password" /><br />\n<input id="loginButt" type="button" value="Login" />\n</div>';
	load();
}

function login() {
	var user = document.getElementById('usernametext').value;
	var password = document.getElementById('password').value;
	var form = document.getElementById('loginForm');
	nocache = Math.random(); // IE BUG fix - ie cache's things like an idiot
	document.getElementById('login').innerHTML = "Loading...";
	http.open('get', 'login.php?username='+user+'&password='+password+"&cache="+nocache,true);
	http.onreadystatechange = loginReply;
	http.send(null);
}

function loginReply() {
	if(http.readyState == 4){
		var response = http.responseText;
		if(response == 0){
			// if login fails
			document.getElementById('login').innerHTML = 'Login failed! <a href="signup.php" title="Sign Up">Sign Up</a> /  <a  id="loginA" title="Login">Try Again?</a><br /><div id="loginform" style="display:none">\nUsername: <input type="text" id="usernametext" name="username" /><br />\nPassword: <input type="password" id="password" name="password" /><br />\n<input id="loginButt" type="button" value="Login" />\n</div>';
			load();
			hideForm();
			// else if login is ok show a message: "Welcome + the user name".
		} else {
			document.getElementById('login').innerHTML = 'Welcome '+response+'<br /><a  id="logout">Logout</a>';
			load();
		}
}
}
