<?PHP
$type = $_GET['num'];
if ($type == 1)
print "<div id=\"display\">You uploaded an invalid file type. Please don't shell us.<br><a href=\"index.php\">Click here to try again.</a></div>";
else if ($type == 2)
print "<div id=\"display\">You tried to upload a file that was too large, AKA Chuck Norris' penis.<br><a href=\"index.php\">Click here to try again.</a></div>";
else if ($type == 3)
print "<div id=\"display\">We fucked up, the image directory isn't writeable. We'll hire better monkeys.<br><a href=\"index.php\">Click here to try again.</a></div>";
else if ($type == 404)
print "<div id=\"display\"><h1>404 Error.</H1><BR> Nothing to see here.<br><a href=\"index.php\">Click here to go back to the index.</a></div>";
else if ($type == 403)
print "<div id=\"display\">403 Error. This area is restricted.<br><a href=\"index.php\">Click here to go back to the index.</a></div>";
else if ($type == 500)
print "<div id=\"display\">500 Error. Somehing has gone wrong.<br><a href=\"index.php\">Click here to go back to the index.</a></div>";
else {
print "<div id=\"display\">What are you doing? You'll go to jail FOREVER.<br><a href=\"index.php\">Click here to go back to the index.</a></div>";
}
?>