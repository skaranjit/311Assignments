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
<title>List of Assignments</title>
<!-- In addition to the changes described in the other comments, add an external CSS file that you write yourself and reference it from within here. It should have the goal of making this look prettier - maybe making it look like a business card that a professional might hand out at a networking event. -->
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
				<h2>Assignment 2C</h2>
				<p>This is the server side script that will give you the current day,Month and Date,Year and time in 12hr.</p>
				<?php
			
				$today = date("l, F jS, Y, g A")
				?> 
				<?php
					echo "<p>Today is <strong>",$today,"</strong></p>";
				?>
			</div>
    </div>
<footer class="footer">
<div class="page-footer" style="text-align:center; ">
Copyright &#169; Skaranjit inc.&#174;
</div>
</footer>

</body>
</html>
