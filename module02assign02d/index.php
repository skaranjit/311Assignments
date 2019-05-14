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
				<h2>What is your day, time and year total?</h2>
				<p>This is the server side script that will give you the total for current day, time and year. It will calculate in the server and return to the user without giving hint about the process.</p>
				<?php
					$timeZone = date("e");
					date_default_timezone_set($timeZone);	
					$day = date("j");
					$time = date("g");
					$year = date("Y");
					$total = $day + $time + $year;
				?>
				<br>
				<div class="ans"> 
				<?php
					echo "<p>Today is ",$day," of the month in ",$year," Year and ",$time," Hour</p>";
					echo "<p>The total for current day of the month, year and time is : <strong>",$total,"</strong></p>";	
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
