var editor;
var isCtrl = false;
var JavaScriptMode = require("ace/mode/javascript").Mode;
var CssMode = require("ace/mode/css").Mode;
var ScssMode = require("ace/mode/scss").Mode;
var HtmlMode = require("ace/mode/html").Mode;
var XmlMode = require("ace/mode/xml").Mode;
var PythonMode = require("ace/mode/python").Mode;
var PhpMode = require("ace/mode/php").Mode;
var JavaMode = require("ace/mode/java").Mode;
var CSharpMode = require("ace/mode/csharp").Mode;
var RubyMode = require("ace/mode/ruby").Mode;
var CCPPMode = require("ace/mode/c_cpp").Mode;
var CoffeeMode = require("ace/mode/coffee").Mode;
var JsonMode = require("ace/mode/json").Mode;
var PerlMode = require("ace/mode/perl").Mode;
var ClojureMode = require("ace/mode/clojure").Mode;
var OcamlMode = require("ace/mode/ocaml").Mode;
var SvgMode = require("ace/mode/svg").Mode;
var TextileMode = require("ace/mode/textile").Mode;
var TextMode = require("ace/mode/text").Mode;
var GroovyMode = require("ace/mode/groovy").Mode;
var ScalaMode = require("ace/mode/scala").Mode;
var modes = {
    text: new TextMode(),
    textile: new TextileMode(),
    svg: new SvgMode(),
    xml: new XmlMode(),
    html: new HtmlMode(),
    css: new CssMode(),
    scss: new ScssMode(),
    javascript: new JavaScriptMode(),
    python: new PythonMode(),
    php: new PhpMode(),
    java: new JavaMode(),
    ruby: new RubyMode(),
    c_cpp: new CCPPMode(),
    coffee: new CoffeeMode(),
    json: new JsonMode(),
    perl: new PerlMode(),
    clojure: new ClojureMode(),
    ocaml: new OcamlMode(),
    csharp: new CSharpMode(),
    groovy: new GroovyMode(),
    scala: new ScalaMode()
};
window.onload = function() {
    editor = ace.edit("editor");
    editor.setTheme("ace/theme/cobalt");
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
	$('#open-lightbox').click(function() { 
		return false; 
	});
	$('#savefile').click(function() {
		saveFile();
	});
	$('#langselect').change(function() {
		setMode();
	});
	$(document).keyup(function(e) {
		isCtrl=false;
	}).keydown(function(e) {
		if(e.metaKey||e.ctrlKey) isCtrl=true;
		if(e.which == 83 && isCtrl == true) {
			saveFile();
			return false;
		}
	});
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
	console.log("Opening "+path);
	var fd = new FormData;
	var xhr = new XMLHttpRequest;
	var p = path.split('.');
	var i = p.length-1;
	var ext = p[i];
	console.log("Extension: "+ext);
	fd.append("path",path);
	fd.append("pullfile","pullfile");
	xhr.onreadystatechange=function()
	{
		if (xhr.readyState==4 && xhr.status==200) {
			document.getElementById('filename').value=path;
			editor.getSession().setValue(xhr.responseText);
			$('#open-lightbox').toggleClass('showing');
			$('#open-lightbg').toggleClass('showing');
			if(ext=="html") {
				editor.getSession().setMode(new HtmlMode());
			} else if(ext="js") {
				editor.getSession().setMode(new JavaScriptMode());
			} else if(ext="css") {
				editor.getSession().setMode(new CssMode());
			} else if(ext="php") {
				editor.getSession().setMode(new PhpMode());
			}			
		}
	}  
	xhr.open("POST", "ajax.php");
	console.log("pulled!");
	xhr.send(fd);
}
function saveFile() {
	console.log("Saving "+document.getElementById('filename').value);
	var text = editor.getSession().getValue();
	var fd = new FormData;
	var xhr = new XMLHttpRequest;
	fd.append("text",text);
	fd.append("path",document.getElementById('filename').value);
	fd.append("savefile","savefile");
	xhr.onreadystatechange=function()
	{
		if (xhr.readyState==4 && xhr.status==200) {
			if(xhr.responseText=="success") {
				alert("Saved Succesfully!");
			}
		}
	}  
	xhr.open("POST", "ajax.php");
	console.log("saved!");
	xhr.send(fd);
}
function setMode() {
	var a=document.getElementById('langselect').selectedIndex;
	var b=document.getElementById('langselect').options;
	var mode = b[a].value;
	console.log("Mode: "+mode);
	editor.getSession().setMode(modes[mode]);
}
