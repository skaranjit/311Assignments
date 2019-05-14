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
<title>Assignment 03D</title>
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
			<h2>Assignment 3D</h2>
			<br>
			<form enctype="multipart/for-data">
<?php
			$randNumber = rand(1,1000);
			$ans = array();
			// extract
			extract($_REQUEST);
			print_r($_REQUEST);
			if ($button=="Submit"){
				check($answer,$randNumber,$count,$correct,$ans);
				passData($randNumber,$correct,$count,$ans);
			}
			else if($button == "Try Again" or $button == "Next Question")
			{
				quizpage($correct,$count,$ans);
				passData($randNumber,$correct,$count,$ans);
			}
           		else if($button=="Restart" or $button == Null){
				clearStory($correct,$count);
				$ans = array();
				 quizPage($correct,$count,$ans);
				passData($randNumber,$correct,$count,$ans);

            		}
            		function clearStory(&$correct,&$count)
			{
				$correct = 0;
				$count = 0;
				$randNumber = rand(1,1000);
			}
			function quizPage($correct,$count,$ans){
				echo <<< HERE
				<div class= "resultBox">
				<h3>Guess:  <input type="text" name="answer" autocomplete="off"></h2>
				</h2><br>
				<input type="submit" name="button" value="Submit" class="btn btn-primary">
				<input type ="submit" name="button" value="Restart" class="btn btn-success">
				</div>
				<div class="resultBox">
				Number of Guesses: $count
				<br>
				Number of Correct Guess: $correct
				</div>          
HERE;
				echo <<< HERE
      			          <div class= "resultBox"> 
               				 <h3>Previous Guesses are : </h3> 
HERE;
     		           foreach($ans as $key=>$value){
                		    echo $value ,"<br>"; 
               			 }
                		echo "</div>";
			}
			function showAnswer($answer,&$randNumber,$count,$correct){
				echo "<div class= 'resultBox'>";
				if ($answer == Null ){
					 echo "<h3 class = 'error'> Please enter your guess!</h3>";
					echo <<< HERE
						<h3>Guess:  <input type="text" name="answer" autocomplete="off"></h2>
                                </h2><br>
                                <input type="submit" name="button" value="Submit" class="btn btn-primary">
                                <input type ="submit" name="button" value="Restart" class="btn btn-success">
HERE;
				}
				else if ($answer > $randNumber){
					 echo <<< HERE
					 <h3 class='error'>You are high!</h3>
					 <input type="submit" name="button" value="Try Again" class="btn btn-primary">
					 <input type ="submit" name="button" value="Restart" class="btn btn-success">				
HERE;
				 }
				 else if ($answer < $randNumber){
					 echo "
					<h3 class='error'>You are low!</h3>
					<input type='submit' name='button' value='Try Again' class='btn btn-primary'>
					<input type ='submit' name='button' value='Restart' class='btn btn-success'>
					"; 
				 }
				 else if ($answer == $randNumber){
					$randNumber = rand(1,1000);
					echo <<< HERE
					<h3> Your are Correct.</h3>
					<input type="submit" name="button" value="Next Question" class="btn btn-primary">
					<input type ="submit" name="button" value="Restart" class="btn btn-success">
HERE;
				 }
				echo '</div>';
			        echo <<< HERE
                                <div class="resultBox">
                                Number of Guesses: $count
                                <br>
                                Number of Correct Guess: $correct
                                </div>
HERE;
			}
			
			function check($answer,&$randNumber,&$count,&$correct,&$ans){
                	if ($randNumber == intval($answer)){
                		$count++;
				$correct++;
			} else if ($randNumber != $answer and $answer != Null ) {

				$count++;
			} 
			showAnswer($answer,$randNumber,$count,$correct);
			OutputGuess($ans,$answer);
			}
			function OutputGuess(&$ans,$answer)
			{
				if ($answer != Null){
				array_push($ans,$answer);}
				echo <<< HERE
				<div class= "resultBox">
				<h3>Previous Guesses are : </h3>
HERE;
				foreach($ans as $key=>$value){
					echo $value ,"<br>";
				}
				echo "</div>";
			}
         		function passData($randNumber,$correct,$count,$ans)
			{
				foreach($ans as $key=>$value){
					echo <<< HERE
					<input type="hidden" name="ans[$key]" value="$value">
HERE;
					}
				echo <<< HERE
      				<input type="hidden" name="randNumber" value="$randNumber">
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
