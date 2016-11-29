<?PHP
session_start();

$img = $_GET['img'];
$accepted = array('png', 'jpg', 'jpeg','gif', 'ico', 'tif', 'bmp', 'webm');
$ext = end(explode(".", $img));
$imgdir = "img/";

if (!in_array($ext, $accepted)) {
	if ($img !== 'results') {
		$img = "404.png";
		$imgdir = "style/";
	}
} else if (strpos($img, "/")) {
	$img = end(explode("/", $img));
	header("Location: https://www.anonimg.com/uploaded-404.png.html");
} else {
	if (file_exists('img/'.$img)) {
		$imgdir = "img/";
	} else if (file_exists('adult/' .$img)) {
		$imgdir = "adult/";
	} else if (file_exists('noimg/' .$img)) {
		$imgdir = "noimg/";
	} else {
    	$img = "404.png";
		$imgdir = "style/";
	}
}

echo '<div id="browsedisplay">';

if ($img == "results") {
	if (isset($_SESSION['images'])) {
		$images = $_SESSION['images'];
	} else {
		$die = "An error occured. Do you have cookies enabled?";
		$img = "404.png";
		$imgdir = "style/";
	}
	if (isset($_SESSION['errors'])) {
		$errors = $_SESSION['errors'];
		if (isset($die)) {
			$errors[] = $die;
		}
	}
} else {
	$images[] = $img;
}

if (isset($errors)) {
	echo 'Error log:<br><textarea style="height: '. count($errors) * 20 .'px;" readonly>';
	foreach ($errors as $error) {
		echo $error."\r\n";
	}
	echo '</textarea><br>';
}

if (isset($images[1])) {
	echo 'Image Links:<br><textarea style="height: '. count($images) * 20 .'px;" onclick="javascript:this.focus();this.select();" readonly>';
	foreach ($images as $image) {
		echo 'http://anonimg.com/uploaded-'.$image.".html\r\n";
	}
	echo '</textarea><br>';
	echo 'Direct Links:<br><textarea style="height: '. count($images) * 20 .'px;" onclick="javascript:this.focus();this.select();" readonly>';
	foreach ($images as $image) {
		echo 'http://anonimg.com/img/'.$image."\r\n";
	}
	echo '</textarea><br>';
}

foreach ($images as $img) {
$src = $imgdir.$img;
$ext = end(explode(".", $img));
if ($ext == "webm") {
	print '<video autoplay loop controls preload="auto" src="'.$src.'"></video><br>';
} else {
	print '<img src="' .$src. '"><br>';
}
print '	<b>Page Link:</b><br><input type="text" readonly="true" id="file" size="90%" value="https://www.anonimg.com/uploaded-' .$img. '.html" onclick="javascript:this.focus();this.select();" /><br>
		<b>Direct Link:</b><br><input type="text" readonly="true" id="file" size="90%" value="https://www.anonimg.com/' .$src. '" onclick="javascript:this.focus();this.select();" /><br>
		<b><a href="contact.html">Report this image</a></b><br>';
}
		
echo '</div></div></div>
<div class="box">
<div class="top">Upload</div>';
include("main.php");
echo '</div>';
?>
