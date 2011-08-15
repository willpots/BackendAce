var editor;
window.onload = function() {
    editor = ace.edit("editor");
    editor.setTheme("ace/theme/twilight");
    
    var JavaScriptMode = require("ace/mode/javascript").Mode;
    editor.getSession().setMode(new JavaScriptMode());
    $('#openfile').click(function() {
		$('#open-lightbox').toggleClass('showing');
		$('#open-lightbg').toggleClass('showing');
		goTo('../','');
	});
	$('#open-lightbg').click(function() {
		$('#open-lightbox').toggleClass('showing');
		$('#open-lightbg').toggleClass('showing');
	});
	$('#open-lightbox').click(function() { return false; });

	




};

function goTo(string,path) {
	var fd = new FormData;
	var xhr = new XMLHttpRequest;
	fd.append("path",path);
	fd.append("string",string);
	fd.append("goto","goto");
	xhr.onreadystatechange=function()
	{
		if (xhr.readyState==4 && xhr.status==200) {
			document.getElementById('open-lightbox').innerHTML = xhr.responseText;
		}
	}  
	xhr.open("POST", "ajax.php");
	console.log("sent!");
	xhr.send(fd);
}

function openFile(path) {
	var fd = new FormData;
	var xhr = new XMLHttpRequest;
	fd.append("path",path);
	fd.append("pullfile","pullfile");
	xhr.onreadystatechange=function()
	{
		if (xhr.readyState==4 && xhr.status==200) {
			document.getElementById('filename').value=path;
			editor.getSession().setValue(xhr.responseText);
			$('#open-lightbox').toggleClass('showing');
			$('#open-lightbg').toggleClass('showing');
		}
	}  
	xhr.open("POST", "ajax.php");
	console.log("pulled!");
	xhr.send(fd);
}
function saveFile(text,path) {

}
