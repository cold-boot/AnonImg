<?php
	$img_count = 33;
	$adult = $_GET['adult'];
	
    function mtimecmp($a, $b) {
        $mt_a = filemtime($a); $mt_b = filemtime($b);
        if ($mt_a == $mt_b) { return 0; }
        else if ($mt_a < $mt_b) { return -1; }
        else { return 1; }
    }
	
	if ($adult == 1){ $images = glob("adult/*"); }
	else { $images = glob("img/*"); }
	
    usort($images, "mtimecmp");
    shuffle($images);
	
	print '<div id="display">Showing a maximum of '. $img_count .' random images.';
	print '<a href="javascript:location.reload(true)">Click here</a> to randomize again.<br>';
	if($adult != 1) {
		print 'Click <a href="index.php?p=browse&adult=1">here</a> to show adult images.</div>';
	} else {
		print 'Click <a href="index.php?p=browse">here</a> to hide adult images.</div>';
		$adult = 1;
	}	
	
	for($i = 1; $i <= $img_count; $i++) {
		if (strpos($images[$i],'noimg') !== false) {
			$image2 = str_replace("noimg/","",$images[$i]);
		} else if (strpos($images[$i],'img') !== false)	{
			$image2 = str_replace("img/","",$images[$i]);
		} else if (strpos($images[$i],'adult') !== false) {
			$image2 = str_replace("adult/","",$images[$i]);
		}
		echo '<div id="browsedisplay" style="width: 30%; display: inline-block;"><a href="index.php?p=uploaded&img='.$image2.'"><img src="' . $images[$i] . '" width="96%" alt="Image '. $i . '" margin="0px"; border="3px solid #FFF"><br><br>Click here to view full size.</a>
		</div>';
	}
?>