<?PHP
$why = date("n");
if ($why == 1) {
	print 'AnonImg provides you with logless image hosting. When images are uploaded, no IP addresses are stored, and all EXIF data is cleared in order to protect personally identifying information. Your images are safe from copyright trolls, too. We will deny any DMCA takedown requests we receive, and have done so in the past.';
} else if ($why == 2) {
	print 'If you are an activist, a journalist, a protester, or just worried about privacy, then AnonImg is for you. We protect your anonimity by keeping no logs of your IP address upon image uploading and clearing EXIF metadata that can compromise your location or even identity.';
} else if ($why == 3) {
	print 'We truely care about your privacy. We make sure that your identity remains a secret by providing anonymous image hosting. The steps that we take include not logging IP addresses, clearing EXIF data, and hosting images on a non-US located server. To top it off, we deny DMCA requests from copyright trolls.';
} else {
	print 'AnonImg provides you with logless image hosting. When images are uploaded, no IP addresses are stored, and all EXIF data is cleared in order to protect personally identifying information. Your images are safe from copyright trolls, too. We will deny any DMCA takedown requests we receive, and have done so in the past.';
}

print '<br><br>Want an image uploading site where images are burnt upon viewing? Check out <a href="https://www.anonimg.com/burn/upload.html">BurnImg</a> (Now with SSL).';
?>
