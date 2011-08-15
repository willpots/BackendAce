<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Editor</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<header>
	<input type="text" id="filename" readonly="readonly">
	<button id="openfile">Open a File</button>
	<button id="savefile">Save File</button>
</header>
<pre id="editor"></pre>
    
<script src="src/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="src/theme-twilight.js" type="text/javascript" charset="utf-8"></script>
<script src="src/mode-javascript.js" type="text/javascript" charset="utf-8"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script>
</body>
</html>
