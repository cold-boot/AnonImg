<?PHP
session_start();

$maxsize = 10485760; 
$accepted = array('png', 'jpg', 'jpeg', 'gif', 'ico', 'bmp', 'webm');
$filedir = 'img';

$banned = file_get_contents('inc/b&.txt');
if (strpos($banned, $_SERVER['REMOTE_ADDR'])) {
	header("http://lmgtfy.com/?q=how+to+sedate+and+molest+a+9+year+old");
	die("See you in hell.");
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if (isset($_FILES['upload']['name'])) {
		
		if (count($_FILES['upload']['name']) <= 20) {
			
			if (isset($_SESSION['images'])) {
				unset($_SESSION['images']);
			}
			if (isset($_SESSION['errors'])) {
				unset($_SESSION['errors']);
			}

			for($i=0; $i < count($_FILES['upload']['name']); $i++) {
				if ($_FILES['upload']['size'][$i] <= $maxsize) {
					$ext = explode(".", $_FILES['upload']['name'][$i]);
					$ext = strtolower(end($ext));
					
					if (in_array($ext, $accepted)) {
						
						$tmppath = $_FILES['upload']['tmp_name'][$i];
						
						$newname = md5_file($_FILES['upload']['tmp_name'][$i]).'.'.$ext;
						
						if ($tmppath != "") {
							$path = $filedir."/".$newname;

							if(move_uploaded_file($tmppath, $path)) {
								
								$_SESSION['images'][] = $newname;
								
								if (strpos($path,'jpg') !== false || strpos($path,'jpeg') !== false){
									$img = imagecreatefromjpeg($path);
									imagejpeg($img, $path, 100);
									imagedestroy($img);
								} else if (strpos($path,'bmp') !== false){
									$img = imagecreatefrombmp($path);
									imagebmp($img, $path, 100);
									imagedestroy($img);
								}
								
							} else {
								// Error code 7: Error on our end with permissions/disk space
								$_SESSION['errors'][] = $_FILES['upload']['name'][$i].": Fatal server-side error. Unable to write files. Code: 7";
								echo '7';
							}
						} else {
							// Error code 6: No image data
							$_SESSION['errors'][] = $_FILES['upload']['name'][$i].": Fatal server-side error. File did not upload. Code: 6";
							echo '6';
						}
					} else {
						$_SESSION['errors'][] = $_FILES['upload']['name'][$i].": Invalid image extension. Code: 5";
						// Error code 5: Bad extension
						echo '5';
					}
				} else {
					$_SESSION['errors'][] = $_FILES['upload']['name'][$i].": Image too large (over 2MB). Code: 4";
					// Error code 4: File too large
					echo '4';
				}
			}
			
			// Redirect, now that we're finished.
			header("Location: uploaded-results.html");
			
		} else {
			// Error code 3: Too many files uploaded
			header("Location: error3.html");
			echo '3';
		}
	} else {
		// Error code 2: No image sent
		header("Location: error2.html");
		echo '2';
	}
} else {
	// Error code 1: No post request sent
	header("Location: error1.html");
}
?>