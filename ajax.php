<?php
function goBack($string) {
	$a = explode('/',$string);
	$s = "";
	for($i=0;$i<(count($a)-2);$i++) {
		$s.=$a[$i];
		$s.='/';
	}
	return $s;
}
if(isset($_POST['goto'])) {

	$path = $_POST['path'];
	$string = $_POST['string'];
	if($string!="back") {
		$path = $path.$string;
	} else {
		$path = goBack($path);
	}
	$pfiles = array('.','..','.DS_Store');
	if ($files = scandir($path)) {
		if($path!="../") {
			echo '<a onclick="goTo(\'back\',\''.$path.'\')">'.'Back'."</a><br>\n";
		}
	    echo "Directory: ".basename(realpath($path))."<br>\n";
	    echo "Total Path: ".$path."<br>\n";
	    //echo "Real Directory: ".$path."<br>\n";
		foreach($files as $f) {
			if(!in_array($f,$pfiles)) {
				if(is_file($path.$f)) {
					echo '<a href="" class="file" onclick="openFile(\''.$path.''.$f.'\')">'.$f."</a>\n";
				} else if(is_dir($path.$f)) {
					echo '<a href="" class="dir" onclick="goTo(\''.$f.'/\',\''.$path.'\')">'.$f."</a>\n";
				}
			}
		}
	}

} else if(isset($_POST['pullfile'])) {
	if(strrpos($path,'/')!=(strlen($path)-1)) {
		$path .= '/';
	}
	stripslashes(readfile($_POST['path']));
	
} else if(isset($_POST['savefile'])) {

	$myFile = $_POST['path'];
	$fh = fopen($myFile, 'w') or die("can't open file");
	fwrite($fh, stripslashes($_POST['text']));
	fclose($fh);
	echo "success";

}
?>