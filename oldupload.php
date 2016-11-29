<?PHP
$maxsize = 10485760; 
$accepted = array('png', 'jpg', 'jpeg', 'gif', 'ico', 'bmp');
$filedir = 'img';

$banned = file_get_contents('inc/b&.txt');
if (strpos($banned, $_SERVER['REMOTE_ADDR'])) {
	header("Location: http://lmgtfy.com/?q=how+to+sedate+and+molest+a+9+year+old");
	die("See you in hell.");
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    preg_match('/\.([a-zA-Z]+?)$/', $_FILES['userfile']['name'], $matches);

    if(in_array(strtolower($matches[1]), $accepted)) {

        if($_FILES['userfile']['size'] <= $maxsize) {

            $newname = md5_file($_FILES['userfile']['tmp_name']).'.'.strtolower($matches[1]);
			
			move_uploaded_file($_FILES['userfile']['tmp_name'], $filedir.'/'.$newname);
			
			$path =  $filedir.'/'.$newname;
			
			if (strpos($path,'jpg') !== false || strpos($path,'jpeg') !== false){
			$img = imagecreatefromjpeg ($path);
			imagejpeg ($img, $path, 100);
			imagedestroy ($img);
			} else if (strpos($path,'bmp') !== false){
			$img = imagecreatefrombmp ($path);
			imagebmp ($img, $path, 100);
			imagedestroy ($img);
			} 

            header("Location: uploaded-{$newname}.html");
        } else 
            header("Location: error2.html");
    } else
    header("Location: error1.html");
}
?>
