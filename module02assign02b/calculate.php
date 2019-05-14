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
				<h2>Km per Litre Calculator</h2>
				<?php
					$x= $_POST["distance"];
					$y = $_POST["volume"];
					
					$z = $x/$y;
	
				?>
				<br>
				<div class="ans"> 
				<?php if ($x == "" || $y == ""){
				echo "<p> <font color='red'>Error: All fields are required! Please go back and enter value.</font></p>";}
				else if (!is_numeric($x) || !is_numeric($y)){
				echo "<p><font color='red'>Only Numbers!!!! Please go back and enter correctly.</font></p>";}
					else{
						echo "<p>You travelled <strong> $x km</strong> and used <strong>$y Litre</strong>.<br><br>So You travelled <strong>$z km/li</strong></p>";
					}
					?>
				</div>
			</div>
    </div>
<footer class="footer">
<div class="page-footer" style="text-align:center; ">
Copyright &#169; Skaranjit inc.&#174;
</div>
</footer>

</body>
</html>
