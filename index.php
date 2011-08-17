
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
		<select name="lang" id="langselect">
			<option value="js">JavaScript</option>
			<option value="plain">Plain Text</option>
			<option value="svg">SVG</option>
			<option value="html">HTML</option>
			<option value="css">CSS</option>
			<option value="scss">SCSS</option>
			<option value="coffee">CoffeeScript</option>
			<option value="json">JSON</option>
			<option value="python">Python</option>
			<option value="ruby">Ruby</option>
			<option value="perl">Perl</option>
			<option value="php">PHP</option>
			<option value="java">Java</option>
			<option value="csharp">C#</option>
			<option value="c_cpp">C++</option>
			<option value="clojure">Clojure</option>
			<option value="ocaml">OCaml</option>
			<option value="textile">Textile</option>
			<option value="groovy">Groovy</option>
			<option value="scala">Scala</option>
  		</select>
	</header>
	<pre id="editor"></pre>
	<div id="open-lightbg">
	<div id="open-lightbox">

	</div>
	</div>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script>
	<script src="js/ace.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/theme-cobalt.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/mode-c_cpp.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/mode-clojure.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/mode-coffee.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/mode-csharp.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/mode-css.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/mode-groovy.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/mode-html.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/mode-java.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/mode-javascript.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/mode-json.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/mode-ocaml.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/mode-perl.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/mode-php.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/mode-python.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/mode-ruby.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/mode-scad.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/mode-scala.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/mode-scss.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/mode-svg.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/mode-textile.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/mode-xml.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/backend.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>
