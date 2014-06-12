window.onload = function() {
	document.getElementById('base').onchange = checkBase;
	document.getElementById('exponent').onchange = checkExp;
}

function checkBase(flag=0) {
	var base = document.getElementById('base');
	var exponent = document.getElementById('exponent');
	if (!isNumeric(base.value) || base.value < 1 || base.value > 100) {
		base.style.backgroundColor = "#FF0000";
		document.getElementById('button').disabled = true;
		document.getElementById('baseWarning').style.display="block";
	} else {
		base.style.backgroundColor = "#FFFFFF";
		document.getElementById('baseWarning').style.display="none";
		if (isNumeric(exponent.value) && exponent.value > 0 && exponent.value < 8) {
			document.getElementById('button').disabled = false;
		}
	}
}

function checkExp(flag=0) {
	var base = document.getElementById('base');
	var exponent = document.getElementById('exponent');
	if (!isNumeric(exponent.value) || exponent.value < 1 || exponent.value > 7) {
		exponent.style.backgroundColor = "#FF0000";
		document.getElementById('button').disabled = true;
		document.getElementById('expWarning').style.display="block";
	} else {
		exponent.style.backgroundColor = "#FFFFFF";
		document.getElementById('expWarning').style.display="none";
		if (isNumeric(base.value) && base.value >= 0 && base.value <= 100) {
			document.getElementById('button').disabled = false;
		}
	}
}

function isNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}