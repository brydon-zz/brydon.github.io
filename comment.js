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

window.onload = function() {
	load();
	var tArea = document.getElementById('comment');
	if (tArea != null) tArea.onkeypress = enter;
	updateComments();
	setInterval(updateComments,15000);
}

function enter(e) {
	e = e || event;
  if (e.keyCode === 13 && !e.shiftKey) {
		http.open('get', 'comment.php?comment='+this.value+"&a="+document.getElementById('cmntForm').className,true);
		http.onreadystatechange = function() {
				if (http.readyState == 4) {
					var response = http.responseText;
					var tArea = document.getElementById('comment');
					if (response == 1) {
						tArea.value = "There was an error.";
					}
					else {
						updateComments();
						tArea.value = "";
					}
				}
		};
		http.send(null);
  }
};

function updateComments() {
	var aid = document.getElementById('cmntForm').className;
	if (aid != 0) {
		http.open('get','getComments.php?a='+aid,true);
		http.onreadystatechange = function() {
			if (http.readyState == 4) {
				document.getElementById('commentsDiv').innerHTML = http.responseText;
				temp = document.getElementsByClassName('upVote');
				for (var a = 0; a<temp.length;a++) {
					temp[a].onclick = function() { vote(1,this.href.split("#")[1]); };
				}
				temp = document.getElementsByClassName('downVote');
				for (var a = 0; a<temp.length;a++) {
					temp[a].onclick = function() { vote(-1,this.href.split("#")[1]); };
				}
				temp = document.getElementsByClassName('delete');
				for (var a = 0; a<temp.length;a++) {
					temp[a].onclick = function() { deleteFunc(this.id); };
				}
			}
		}
		http.send(null);
	}
};

function vote(dir,id) {
	http.open('get','vote.php?dir='+dir+'&id='+id,true);
	http.onreadystatechange = function() { if (http.readyState == 4) { updateComments(); } };
	http.send(null);
}

/*** OVERRIDING ***/


function logout() {
	http.open('get', 'sessionKill.php', true);
	http.send(null);
	http.onreadystatechange = function() { if (http.readyState == 4) { updateComments(); } };
	document.getElementById('login').innerHTML = '<a href="signup.php" title="Sign Up">Sign Up</a> / <a  id="loginA" title="Login">Login</a><br /><div id="loginform" style="display:none">\nUsername: <input type="text" id="usernametext" name="username" /><br />\nPassword: <input type="password" id="password" name="password" /><br />\n<input id="loginButt" type="button" value="Login" />\n</div>';
	if (document.getElementById('cmntForm').className != 0) {
		document.getElementById('cmntForm').innerHTML = '<p>Sign in to make a comment!</p>';
	}
	load();
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
			updateComments();
			load();
			if (document.getElementById('cmntForm').className != 0) {
				document.getElementById('cmntForm').innerHTML = '<p>Enter a comment in the textarea below. Hit enter when you are done or shift+enter to make a newline.</p>\n								<textarea id="comment" rows="3" cols="50" maxlength="400"></textarea><br />';
				document.getElementById('comment').onkeypress = enter;
			}
		}
	}
}

function deleteFunc(n) {
	http.open('get','deleteComment.php?id='+n,true);
	http.send(null);
	http.onreadystatechange = function() { if (http.readyState == 4) { updateComments(); } };
}
