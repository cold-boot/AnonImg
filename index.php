<!DOCTYPE html>
<?PHP
	if (isset($_GET['p'])) {$page = $_GET['p']; } else { $page = Null; }
	if ($page == Null) { header("Location: upload.html"); $title = "Uploaded Image"; $titletag = "Anonymous Image Hosting"; }
	if ($page == "upload") { $title = "Upload"; $titletag = "Anonymous Image Hosting"; }
	if ($page == "oldupload") { $title = "Upload"; $titletag = "Anonymous Image Hosting"; }
	if ($page == "terms") { $title = "Terms"; $titletag = "Terms of Service"; }
	if ($page == "uploaded") { $title = "Uploaded Image"; $titletag = "Anonymous Image Hosting"; }
	if ($page == "privacy") { $title = "Privacy"; $titletag = "Privacy Policy"; }
	if ($page == "contact") { $title = "Contact"; $titletag = "Contact Us"; }
	if ($page == "totallynotmod") { $title = "Mod Panel"; $titletag = "Moderator Panel"; }
	if (strpos("error", $page)) { $title = "Error"; $titletag = "Anonymous Image Hosting"; }
?>
<html itemscope itemtype="http://schema.org/Organization">
  <head>
	<title>AnonImg - <?PHP print $titletag; ?></title>
	<link href="style/style.css" rel="stylesheet">
	<meta name="description" content="Free Anonymous image hosting. We provide you with a safe web page to share your images.">
	<meta name="revisit-after" content="7 days">
	<meta name="distribution" content="web">
	<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
	<meta name="keywords" content="Anonymous Image Host, Anonymous Image Hosting, Logless image hosting, anonymous, image hosting, anonimg, logless image host">
	<meta name="copyright" content="AnonImg">
	<meta name="language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta property="og:title" content="AnonImg - Anonymous Image Hosting"/>
	<meta property="og:image" content="style/squarelogo.png"/>
	<meta property="og:site_name" content="AnonImg"/>
	<meta property="og:description" content="Free Anonymous image hosting. We provide you with a safe web page to share your images." />
	<meta itemprop="name" content="AnonImg - Anonymous Image Hosting">
	<meta itemprop="description" content="Free Anonymous image hosting. We provide you with a safe web page to share your images.">
	<meta itemprop="image" content="http://anonimg.com/style/squarelogo.png">
	<!--
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	ga('create', 'UA-46217167-1', 'anonimg.com');
	ga('send', 'pageview');
	</script>
	-->
</head>
<body>
</div>
	<div class="header">
		<a href="upload.html"><div class="left"><div class="logo"><font color="#CC0000">Anon</font>Img</div></div></a>
		<div class="right">
			<a href="<?PHP $_SERVER['PHP_SELF']; ?>upload.html"><div class="head">Upload</div></a>
			<a href="<?PHP $_SERVER['PHP_SELF']; ?>terms.html"><div class="head">Terms</div></a>
			<a href="<?PHP $_SERVER['PHP_SELF']; ?>privacy.html"><div class="head">Privacy</div></a>
			<a href="<?PHP $_SERVER['PHP_SELF']; ?>contact.html"><div class="head">Contact</div></a>
		</div>
	</div>
	<div class="box">
		<div class="top">
			<?PHP print $title; ?>
		</div>
	<?PHP
		if ($page == "upload") {
			echo 'Click <a href="oldupload.html">here</a> to use the old uploader if you are having issues.';
			include("inc/main.php");
		} else if ($page == "oldupload") {
			include("inc/oldmain.php");
		} else if ($page == "contact") {
			include("inc/contact.php");
		} else if ($page == "terms") {
			include("inc/terms.php");
		} else if ($page == "uploaded") {
			include("inc/uploaded.php");
		} else if ($page == "error") {
			include("inc/error.php");
		} else if ($page == "privacy") {
			include("inc/privacy.php");
		} else if ($page == "totallynotmod") {
			include("inc/moderation.php");
		} else if ($page == "error1") {
			print "<div id=\"display\">You uploaded an invalid file type. Please don't shell us.<br><a href=\"index.php\">Click here to try again.</a></div>";
		} else if ($page == "error2") {
			print "<div id=\"display\">You tried to upload a file that was too large.<br><a href=\"index.php\">Click here to try again.</a></div>";
		} else {
			include("inc/error.php");
		}
	?>
	</div>
	<?PHP
	if ($page == "upload") {
		print '<div class="box"><div class="top">Why Anonimg?</div>';
			include("inc/why.php");
		print '</div>';
	}
	print '<div class="box">
		<div class="top">Advertisement</div>';
		include('inc/adv.php');
	print '</div>';
	?>
<div id="footer">
	<?PHP include('inc/footer.php'); ?>
</div>
<div id="raze">
</div>
</body>
</html>
