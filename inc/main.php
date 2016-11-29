<?PHP 
			print '<form action="upload.php" enctype="multipart/form-data" method="post">
				<table id="uploader">
				<tr>
				<td><b>Select your image:</b><br><input type="file" name="upload[]" id="file" multiple="multiple" /></td>
				</tr>
				</table><br>
				<input type="submit" value="Upload Image" />
			</form>
			<br>
			Accepted file types are: PNG, JPG (JPEG), GIF, ICO, BMP, <span style="color: #CC0000">WEBM</span> and a maximum of 20 files';
?>
