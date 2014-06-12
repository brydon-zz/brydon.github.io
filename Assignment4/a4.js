window.onload = function() {
	s = setInterval(function(){displayRss()},10000)
	document.getElementById("rssSelect").onchange=displayRSS;
}

function displayRSS() {
	str = this.value;
	if (str.length==0) {
		document.getElementById("rssFeed").innerHTML="";
		return;
	}
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	}
	else {
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("rssFeed").innerHTML=xmlhttp.responseText;
		}
	}
	
	xmlhttp.open("GET","Assignment4.php?rss="+str,true);
	xmlhttp.send();
}
