function submit() {
	var form = document.getElementById('signupForm');
	form.submit();
}
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
			var uname;
			var pwd1;
			var pwd2;
			var email;
			var unameOut;
			var emailOut;
			var pwd1Out;
			var pwd2Out;
			var regex = /^[a-zA-Z][a-zA-Z0-9\.\-_]*[a-zA-Z0-9]@[a-zA-Z0-9][\.a-zA-Z0-9]*[a-zA-Z0-9]\.[a-z]{2,4}$/;
			var regex2 = /^[a-zA-Z0-9]+$/;
			function formChecker() {
				if (pwd1.value.length < 6) pwd1Out.innerHTML = "Make it longer!";
				else pwd1Out.innerHTML = "";
				if (pwd1.value.length > 6 && pwd1.value != pwd2.value) pwd2Out.innerHTML = "Make 'em match, yo.";
				else pwd2Out.innerHTML = "";
				if (!regex.test(email.value))	emailOut.innerHTML = "Enter a real email, dawg.";
				else emailOut.innerHTML = "";
				if(!regex2.test(uname.value)) unameOut.innerHTML = "Must be alphanumeric.";
				if(regex2.test(uname.value) && pwd1.value.length >= 6 && pwd1.value == pwd2.value && regex.test(email.value) && unameOut.innerHTML == "") document.getElementById('flash').style.display = 'block';
				else document.getElementById('flash').style.display = 'none';
			};	

			function checkUname() {
				http.open('get', 'checkUserName.php?username='+uname.value ,true);
				http.onreadystatechange = function() {unameOut.innerHTML = http.responseText;};
				http.send(null);
			};

			window.onload=function() {
				uname = document.getElementById('username');
				email = document.getElementById('email');
				pwd1 = document.getElementById('password1');
				pwd2 = document.getElementById('password2');
				unameOut = document.getElementById('usernameout');
				emailOut = document.getElementById('emailout');
				pwd1Out = document.getElementById('passwordout');
				pwd2Out = document.getElementById('password2out');
				uname.onchange = checkUname;
			}
			setInterval(formChecker,100);

