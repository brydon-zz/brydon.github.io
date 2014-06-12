window.onload=function() {
	load();
	document.getElementById('uploadBtn').onclick = function() { upload(0); };
	document.getElementById('uploadTarget').onload = finished;
	document.getElementById('previewEdit').onclick = preview;
	document.getElementById('submitEdit').onclick = function() { document.getElementById('editForm').submit() };
}

function upload(n) {
	document.getElementById('uploadFormset').style.display = n==0 ? 'none': 'block';
	document.getElementById('loading').style.display = n==0 ? 'block' : 'none';	
}

function finished() {
	upload(1); 
	document.getElementById('uploadOut').innerHTML = this.contentDocument.body.innerHTML;
}

function preview() {
	var preview = document.getElementById('preview');
	if (preview.style.display != 'block') {
		document.getElementById('editStuff').style.display='none';
		document.getElementById('edit').style.display='none';
		preview.style.display = 'block';
		preview.innerHTML = document.getElementById('editText').value;
		this.value = "Edit";
	} else {
		document.getElementById('editStuff').style.display='block';
		document.getElementById('edit').style.display='block';
		preview.style.display = 'none';
		preview.innerHTML = "";
		this.value = "Preview";
	}
}
