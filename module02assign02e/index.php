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
<title>Assignment 2e</title>
</head>
<body>
<?php	
if (empty($_GET["number1"]) and empty($_GET["number2"])) {      
	$a = 3;
        $b = 2;
}
else  {
	$a = $_GET["number1"];
        $b = $_GET["number2"];
        $add = $a + $b;
       }
?>
<ul class="sidenav">
<a href="./../index.html"><img src="./../content/images/logo.png"/></a>
<li><a href="./../index.html">Home</a></li>
<li><a href="./../module01assign01/index.html">About Me</a></li>

</ul>
<div id="homepage" class="contentbox">
	<img src="./../content/images/goback.png" onclick="goBack()"/>
		<div class="container">
			<br>
			<h2>Assignment 2e</h2>
			<p>This assignment 02e will take 2 number either assigned by default or entered by user and will add and return the result to the user.</p>
			<h2>Enter Two Numbers to add.</h2>
			<br>
		<form method="get" action="">
		<div class="form-group">
			<div class="col-auto" align="center">	
				<label>Enter numbers A:</label>
				<input type="text" class="form-control" name="number1" value="<?= $a?>">
			</div>
			<div class="col-auto" align = "center">
				<label>Enter number B:</label>
				<input type="text" class="form-control" name="number2" value="<?= $b?>">
			</div>
			<div class="col-auto" align="center">
			<button type="submit" name="calc" class="btn btn-primary mb">Add</button>
			</div>
		</div>
		</form>
			<br><br>
			<div class="resultBox">
			 <?php
				if (empty($_GET["number1"]) and empty($_GET["number2"])) {
					echo "<p><strong>", $a, " + ", $b, " = ", $a + $b,"</strong></p>";
				echo "<p>This result is from the form above which uses GET Method.The default value are automatically assigned.Try entering the different number and add.</strong></p>";	
				}
				else  {
					echo "<p><strong>", $a, " + ", $b, " = ", $add,"</strong></p>";
					echo "<p><strong>The result will change if the value in the form are changed while submitting.See the URL, you can see the values passed through the form are visible..</strong></p>";
				}
			?>
			</div>
			<div class="resultBox">
			<?php
				$a = $_GET['a'];
				$b = $_GET['b'];
				echo $a + $b;
				 echo "<p></strong>This result shows that the values have been assigned by HTTP POST request and are not from the HTTP form</strong></p>";
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
