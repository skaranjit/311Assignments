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
<title>Assignment 03A </title>
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
			<h2>Assignment 3A</h2>
			<br>
			<form>
			<?php
			// extract
			extract($_REQUEST);
			// prep for display
			 if ($button=="Begin" or $button =="Clear")
			 {
				// Check for empty variable:
			 	if ($name !=Null){
					clearStory($rand,$rand1,$correct,$count);
			 	}
			 	else{
					echo '<h3 class="error">No Name Provided! Please enter your name</h3>';
					namePage();
				}
			 }
		
			// display and pass data

			if ($button==NULL or $button=="Restart")
				namePage();
			else if ($button=="Next"){
				$rand = rand(1,9);
				$rand1 = rand(1,9);
				quizPage($name,$rand,$rand1,$correct,$count);
				passData($name,$rand,$rand1,$correct,$count);
			}
			else if ($button=="Try Again"){
				$rand = rand(1,9);
				$rand1 = rand(1,9);
				quizPage($name,$rand,$rand1,$correct,$count);
				passData($name,$rand,$rand1,$correct,$count);

			}
			else if ($button=="Submit"){
				check($name,$rand,$rand1,$correct,$count,$answer);
				passData($name,$rand,$rand1,$correct,$count);
			}
			else if ($button=="Show Answer"){
				showAnswer($name,$rand,$rand1,$correct,$count,$answer);
				passData($name,$rand,$rand1,$correct,$count);
			}
			else if ($name != NULL){
				quizPage($name,$rand,$rand1,$correct,$count);
				passData($name,$rand,$rand1,$correct,$count);
			}
			// functions
			function clearStory(&$rand,&$rand1,&$correct,&$count)
			{
				$rand = rand(1,9);
				$rand1 = rand(1,9);
				$correct = 0;
				$count = 0;
				
			}
			function namePage()
			{
				echo <<< HERE
				<div class="resultBox">
				<h1>Addition Quiz</h1>
				<br>
				<p>To start the quiz enter your name and begin</p>
				 <h3>Name:<input type="text" name="name" autocomplete="off"></h3>
				<input type="submit" name="button" value="Begin" class="btn btn-primary">
				</div>
HERE;
			}
			function quizPage($name,$rand,$rand1,$correct,$count)
			{
				echo <<< HERE
				<div class= "resultBox">
				<h1><strong>Participant: </strong>$name</h1>
				<h2> $rand / $rand1 = <input type="text" name="answer" autocomplete="off"></h2>
				<br>
				<input type="submit" name="button" value="Submit" class="btn btn-primary">
				<input type ="submit" name="button" value="Clear" class="btn btn-success">
				<input type ="submit" name="button" value = "Next" class="btn btn-secondary">
				<input type ="submit" name="button" value = "Show Answer" class="btn btn-secondary">
				<input type="image" src="./../content/images/restart-btn.png" name= "button" value="Restart" class ="btn">
				</div>
				<div class="resultBox">
				Number of correct answers: $correct
				<br>
				Number of problems attempted: $count
				</div>
HERE;
			}
			function showAnswer($name,$rand,$rand1,$correct,$count)
			{
				$ans = $rand/$rand1;
				$ans = round($ans,2);
				echo <<< HERE
				<div class= "resultBox">
				<h1><strong>Participant: </strong>$name</h1>
				<h2> $rand / $rand1 = <input type="text" name="answer" value=$ans></h2>
				<br>
				<input type="submit" name="button" value="Submit" class="btn btn-primary">
				<input type ="submit" name="button" value="Clear" class="btn btn-success">
				<input type ="submit" name="button" value = "Next" class="btn btn-secondary">
				<input type ="submit" name="button" value = "Show Answer" class="btn btn-secondary">
				<input type="image" src="./../content/images/restart-btn.png" name= "button" value="Restart" class ="btn">
				</div>
				<div class="resultBox">
				Number of correct answers: $correct
				<br>
				Number of problems attempted: $count
				</div>
HERE;
			}
			function check($name,$rand,$rand1,&$correct,&$count,&$answer)
			{
				if (round(($rand / $rand1),2) == $answer){
					echo "<h3 class='error'>Correct Answer!</h3>";
					$correct++;
					$count++;
					echo <<< HERE
					<div class= "resultBox">
					<h1><strong>Participant: </strong>$name</h1>
					<h2> $rand / $rand1 = $answer</h2>
					<br>
					<input type="submit" name="button" value="Next" class="btn btn-secondary">
					<input type="image" src="./../content/images/restart-btn.png" name= "button" value="Restart" class ="btn">
					</div>
					<div class="resultBox">
					Number of correct answers: $correct
					<br>
					Number of problems attempted: $count
					</div>
HERE;
				}
				else{
					$ans = round($rand/$rand1,2);
					echo "<h3 class='error'>Incorrect!</h3>";
					$count++;
					echo <<< HERE
				<div class= "resultBox">
				<h1><strong>Participant: </strong>$name</h1>
				<h2> $rand / $rand1 = $answer</h2>
				<h2 style="color:blue;">Correct Answer is: $ans</h2>
				<br>
				<input type="submit" name="button" value="Try Again" class="btn btn-secondary">
				<input type="image" src="./../content/images/restart-btn.png" name= "button" value="Restart" class ="btn">

				</div>
				<div class="resultBox">
				Number of correct answers: $correct
				<br>
				Number of problems attempted: $count
				</div>
HERE;
					
			}
		}
		
			function passData($name,$rand,$rand1,$correct,$count)
			{
				echo <<< HERE
				<input type="hidden" name="name" value="$name">
      			<input type="hidden" name="rand" value="$rand">
	  			<input type="hidden" name="rand1" value="$rand1">
				<input type="hidden" name="correct" value="$correct">
				<input type="hidden" name="count" value="$count">
			
HERE;
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
