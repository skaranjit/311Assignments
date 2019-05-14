<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script>
function goBack() {
	  window.history.back()
}
</script>
<link rel="stylesheet" type="text/css" href="./../content/css/style.css">
<link rel="stylesheet" href="./../content/css/bootstrapcss.css">
<link rel="stylesheet" href="./../content/css/form.css">
<title>Assignment 03C </title>
</head>
<body>
<ul class="sidenav">
<a href="./../index.html"><img src="./../content/images/logo.png"/></a>
<li><a href="./../index.html">Home</a></li>
<li><a href="./../module01assign01/index.html">About Me</a></li>
</ul>
<div id="homepage" class="contentbox">
	<img src="./../content/images/goback.png" onclick="goBack()"/>
		<div class="container">
			<br>
			<h2>Assignment 3C</h2>
			<br>
			<form enctype="multipart/for-data">
			<?php
			// extract
			extract($_REQUEST);
			print_r($_REQUEST);
			echo <<< HERE
			Enter some text below to write into a file:<br>
			<textarea name = "data" placeholder ="Some date to write inot file"></textarea>	
			<input type="submit" name = "op" value="write">
			<input type="submit" name = "op" value="append">
			<input type ="submit" name = "op" value="read">
HERE;
			if ($op=="read"){
				#$myFile = fopen("data.txt","r") or die("Unable to open Files");
				#echo fread($myFile,filesize("data.txt"));
				#fclose($myFile);
				$file_lines = file('data.txt');
				foreach ($file_lines as $line) {
					    echo $line;
				}
			}
			if ($op=="write"){
				$myFile = fopen("data.txt","w") or die("Unable to open Files");
				fwrite($myFile,$data);
				fclose($myFile);
			 }
			 if ($op=="append"){
				 $myFile = fopen("data.txt","a") or die("Unabel to open File");
				 fwrite($myFile,$data);
				 fclose($myFile);
			 }
		


echo "<HR>";
highlight_file("index.php");
?>
</form>
		</div>
</div>
<footer class="footer">
<div class="page-footer" style="text-align:center;">
Copyright &#169; Skaranjit inc.&#174;
</div>
</footer>
</body>
</html>
