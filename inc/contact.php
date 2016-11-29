<?PHP
if (isset($_REQUEST['email'])) {
	$adminemail = 'legends@linuxmail.org';
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'] ;
	$subject = $_REQUEST['subject'] ;
	$message = $_REQUEST['message'] ;
	mail($adminemail, $subject, $message, "From:" . $email);
	echo '<div id="display">Thank you for contacting us.<br><a href="index.php?p=contact">Back to Contact</a></div>';
} else {
	print '
	<table>
		<tr><td style="text-align: right;">Email:</td><td style="text-align: center;">&nbsp;&nbsp;&nbsp;hatemind@riseup.net</td></tr>
		<tr><td style="text-align: right;">XMPP:</td><td style="text-align: center;">&nbsp;&nbsp;&nbsp;hatemind@lsd-25.ru</td></tr>
	</table>';
}
?>
