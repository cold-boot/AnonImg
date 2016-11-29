<?php
session_start();

$accounts = array(
	"h|4d027a",
	);
$delpass = "7ca7c8ee051f97ad6cf6714d42d08b3ecb8146fa";

if (isset($_POST['logout'])) {
	unset($_SESSION['loggedin']);
}

if (!isset($_POST['refresh'])) {	
	if (isset($_POST['number'])) {
		$_SESSION['number'] = $_POST['number'];
	} else {
		if (!isset($_SESSION['number'])) {
			$_SESSION['number'] = "30";
		}
	}

	if (isset($_POST['row'])) {
		$_SESSION['row'] = $_POST['row'];
	} else {
		if (!isset($_SESSION['row'])) {
			$_SESSION['row'] = "3";
		}
	}
}

$rowpercent = (100 / $_SESSION['row']) -1;
		
if (isset($_POST['user']) & isset($_POST['p4ss'])) {
	$user = strtolower($_POST['user']);
	$pass = sha1($_POST['p4ss']);
	$account = $user.'|'.$pass;
	$log = fopen("inc/adminlogins.txt", "a");
	if (in_array($account, $accounts)) {
		fwrite($log, '['.date("M d Y g:i:s a").'] Successful login with username '.$_POST['user'].' from '.$_SERVER['REMOTE_ADDDR']."\n");
		$_SESSION['loggedin'] = "L0LsECuRITYiSD3Dc0cKs".$_SERVER['HTTP_USER_AGENT'];
	} else {
		fwrite($log, '['.date("M d Y g:i:s a").'] Failed login with username '.$_POST['user'].' from '.$_SERVER['REMOTE_ADDR']."\n");
		print 'Invalid credentials.<br>';
	}
	fclose($log);
}
		
if ($_SESSION['loggedin'] == "L0LsECuRITYiSD3Dc0cKs".$_SERVER['HTTP_USER_AGENT']) {
		
		if (isset($_POST['old'])) {
			if (file_exists('img/'.basename($_POST['old']))){
				rename('img/'.basename($_POST['old']), 'trash/'.basename($_POST['old']));
				print 'Move successful<br>';
			} else {
				print 'That file cannot be moved.<br>';
			}
		}
		
		if (isset($_POST['ban']) & isset($_POST['b&'])) {
			$log = fopen("inc/b&.txt", "a");
			fwrite($log, $_POST['b&']."\n");
			fclose($log);
		}
		
		if (isset($_POST['purge'])) {
			if ($_POST['delpass'] !== "") {
				if (sha1($_POST['delpass']) == $delpass) {
					$topurge = glob("trash/*");
					foreach ($topurge as $badfile) {
						if ($badfile !== "trash/.htaccess" & $badfile !== "trash/index.html") {
							unlink($badfile);
						}
					}
					echo 'Done cumming buckets on your face. Oh, and I purged all of the child porn, too.<br>';
				} else {
					echo "Wrong password. A nigger was born. Are you going to pull that shit again?<br>";
				}
			} else {
				echo 'Please provide the password to purge, you fucking retard.<br>';
			}
		}
	
		function mtimecmp($a, $b) {
			$mt_a = filemtime($a);
			$mt_b = filemtime($b);
			if ($mt_a == $mt_b) {
				return 0;
			} else if ($mt_a < $mt_b) {
				return -1;
			} else {
				return 1;
			}
		}
		
    $images = glob("img/*");
	usort($images, "mtimecmp");
	$images = array_reverse($images);
	print '
	<form method="post">
		<label for="b&">B& IP:</label><input type="text" class="small" placeholder="'.$_SERVER['REMOTE_ADDR'].'" name="b&" /> <input type="submit" name="ban" value="BANHAMMAH" />&nbsp;&nbsp;&nbsp;&nbsp;
	</form>
	<form method="post">
		<label for="delpass">Trash purge pass:</label><input type="password" class="small" name="delpass"/><input type="submit" value="PURGE" name="purge" /><br>
	</form>
	<form method="post">
		<label for="number">Visible:</label><input type="textfield" style="width: 30px;" name="number" class="small" value="'.$_SESSION['number'].'"/><label for="row">Per row:</label><input type="textfield" style="width: 30px;" name="row" class="small" value="'.$_SESSION['row'].'"/>
		<input type="submit" name="refresh" value="Refresh" style="width: 100px;" /> <input type="submit" value="Update" style="width: 100px;" /> <input type="submit" name="logout" value="Logout" style="width: 100px;" />
	</form>
	<br>
	';
		$i = 0;
		foreach ($images as $image) {
			if ($i < $_SESSION['number']) {
				$imagename = str_replace("img/","",$image);
				$ext = end(explode(".", $image));
				if ($ext == "webm") {
					echo '
					<div id="browsedisplay" style="width: '.$rowpercent.'%; display: inline-block;">
						<a href="http://anonimg.com/index.php?p=uploaded&img='.$imagename.'" target="_blank"><video src="'.$image.'" loop controls preload="metadata" max-width="96%" margin="0px"; border="3px solid #000"></a><br>
						<form action="totallynotmod.html" enctype="multipart/form-data" method="post">
							<input type="hidden" name="old" value="'.$imagename.'"/>
							<input type="submit" class="small" value="Delete" size="100" />
						</form>
					</div>';
				} else {
					echo '
					<div id="browsedisplay" style="width: '.$rowpercent.'%; display: inline-block;">
						<a href="http://anonimg.com/index.php?p=uploaded&img='.$imagename.'" target="_blank"><img src="'.$image.'" max-width="96%" margin="0px"; border="3px solid #000"></a><br>
						<form action="totallynotmod.html" enctype="multipart/form-data" method="post">
							<input type="hidden" name="old" value="'.$imagename.'"/>
							<input type="submit" class="small" value="Delete" size="100" />
						</form>
					</div>';
				}
			}
			$i++;
		}
} else {
	print '
	<form action="totallynotmod.html" enctype="multipart/form-data" method="post">
		<table border="0px" align="center">
			<tr><td>Username:</td><td><input type="textfield" size="20%" name="user"/></td></tr>
			<tr><td>Password:</td><td><input type="password" size="20%" name="p4ss"/></td></tr>
		</table>
		<input type="submit" value="Login" size="100" />
	</form>
	';
}
?>
