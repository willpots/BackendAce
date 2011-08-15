<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Editor</title>
	<link href="http://fonts.googleapis.com/css?family=Andika" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<header>
		<input type="text" id="filename" readonly="readonly" placeholder="Filename">
		<button id="openfile">Open a File</button>
		<button id="savefile">Save File</button>
	</header>
	<pre id="editor"></pre>
	<div id="open-lightbg">
	<div id="open-lightbox">
<?php
	$path = "../";
	$pfiles = array('.','..','.DS_Store');
	if ($files = scandir($path)) {
	    echo "Directory: ".basename(realpath($path))."<br>\n";
	    echo "Real Directory: ".$path."<br>\n";
		foreach($files as $f) {
			if(!in_array($f,$pfiles)) {
				if(is_file($path.$f)) {
					echo $f."<br>\n";
				} else if(is_dir($path.$f)) {
					echo '<a onclick="goTo(\''.$f.'\',\''.$path.'\')">'.$f."</a><br>\n";
				}
			}
		}
	}
?>
	</div>
	</div>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script>
	<script src="js/ace.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/theme-twilight.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/mode-javascript.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/backend.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>
