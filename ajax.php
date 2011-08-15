<?php
if(isset($_POST['goto'])) {

	$path = $_POST['path'];
	$string = $_POST['string'];
	$path = $path.$string;
	$pfiles = array('.','..','.DS_Store');
	if(strrpos($path,'/')!=(strlen($path)-1)) {
		$path .= '/';
	}
	if ($files = scandir($path)) {
		echo '<a onclick="goTo(\'../\',\''.$path.'\')">'.'Back'."</a><br>\n";
	    echo "Directory: ".basename(realpath($path))."<br>\n";
	    //echo "Real Directory: ".$path."<br>\n";
		foreach($files as $f) {
			if(!in_array($f,$pfiles)) {
				if(is_file($path.$f)) {
					echo '<a onclick="openFile(\''.$path.$f.'\')">'.$f."</a><br>\n";
				} else if(is_dir($path.$f)) {
					echo '<a onclick="goTo(\''.$f.'\',\''.$path.'\')">'.$f."</a><br>\n";
				}
			}
		}
	}

} if(isset($_POST['pullfile'])) {
	if(strrpos($path,'/')!=(strlen($path)-1)) {
		$path .= '/';
	}
	readfile($_POST['path']);

}



?>