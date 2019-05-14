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
<title>Assignment 2f</title>
</head>
<body>
<?php	

                                if (empty($_POST["number1"]) and empty($_POST["number2"])) {
                                        $a = 3;
                                        $b = 2;
                                        }
                                else  {
                                        $a = $_POST["number1"];
                                        $b = $_POST["number2"];
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
			<h2>Assignment 2f</h2>
			<p>This assignment02f will take 2 number from URL and returns user with the addition of two numbers..</p>
			<h2>Enter Two Numbers to add.</h2>
			<br>
		<form method="post" action="">
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
				if (empty($_POST["number1"]) and empty($_POST["number2"])) {
					echo "<p><strong>", $a, " + ", $b, " = ", $a + $b,"</strong></p>"; 
				  	echo "<p>This result is from the form above which uses POST Method. The default value are automatically assigned.Try entering the different number and add.</strong></p>";	
				}
				else  {
					echo "<p><strong>", $a, " + ", $b, " = ", $add,"</strong></p>";
					echo "<p><strong>The result will change if the value in the form are changed while submitting.</strong></p>";
				}?>
			</div>
			<div class="resultBox">
			<?php
				$a = $_POST['a'];
				$b = $_POST['b'];
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
