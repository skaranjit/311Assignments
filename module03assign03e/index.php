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
<title>Assignment 03E</title>
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
		<div class="resultBox">
			
			<br>
			<h2>Assignment 3E</h2>
			<br>
			<p>This is a parking calculator. It will help you determine the total price you will get when you start parking and end parking.</p>
			<?php
			   extract($_REQUEST);
			   $data = array();
			   $today = date("l, F jS, Y g:i A");
			   echo "<p>Today is <strong>",$today,"</strong></p>";
			if ($button == NULL || $button == "back to form"){
				calcPage();
				passData($data);
			}
   			else{
				echo "<div class='resultBox'>";
				if (checkdate($StartMonth,$StartDay,$StartYear) and checkdate($EndMonth,$EndDay,$EndYear)){
					array_push($data,$StartMonth,$StartDay,$StartYear,$StartHour,$StartMinutes);
					array_push($data,$EndMonth,$EndDay,$EndYear,$EndHour,$EndMinutes);
					if ($rate == "short"){
						
						Calculate(18,$data,0);
						smartCheck(18,$data,0);
					}
					else if ($rate == "long"){
						Calculate(8,$data,48);
						smartCheck(8,$data,48);
					}
					else{
						Calculate(6,$data,36);
						smartCheck(6,$data,36);
					}
					passData($data);

				}
				else{
					echo"<h3 class='error'>Invalid Date!Please check againg</h3>";
				}
				echo "</div>";
				back2form();
 			}
// ***********************************************************
// FUNCTIONS
			function calcPage(){
				echo "<form>";
				echo "<h3>Start Time<br></h3>";
				displayform("Start");
				echo "</h3>";
				echo "</div>";
				echo "<h3>End Time<br></h3> ";
				displayform("End");
				echo "</h3>";
				echo "</div";				
				echo <<< HERE
				<br><br>
				<fieldset class="form-group">
				<div class="row">
				  <legend class="col-form-label col-sm-2 pt-1">Type:</legend>
				  <div class="col-sm-10">
				  <div class="form-check">
				  <input type="radio" class="form-check-input" name="rate" id="short" value="short" checked>
				  <label for="short" class="form-check-label">Short-term Parking</label>
				  </div>
				  <div class="form-check">
				  <input type="radio" class="form-check-input" name="rate" value="long" id="long">
				  <label for="long" class="form-check-label">Long-term Parking</label>
				  </div>
				  <div class="form-check">
				  <input type="radio" class="form-check-input" name="rate" value="econ" id="econ">
				  <label for="econ" class="form-check-label">Economy Parking</label>
				  </div>
				  </div>
				  
				</div>
			  </fieldset><br><br>
					
					<input type="submit" class = "btn btn-primary btn-lg" name="button" value="Calculate"><p>
					
					<h4>PARKING RATES:</h4>			
					<ul>
					<li>Short Term Parking (238 spaces): $1 for each 30 minutes/$18 maximum daily rate</li>
					<li>Long Term Parking (1,570 spaces): $1 for each 30 minutes/$8 maximum daily rate/$48 maximum weekly rate</li>
					<li>Economy Lot Parking (323 spaces/credit card payment only): $1 for each 30 minutes/$6 maximum daily rate/$36 maximum weekly rate.</li>
					</ul>
HERE;
				echo "</form>";
			}
			function displayform($prefix){
				$yearNow = date('Y');
   				selectMonth($prefix."Month");
   				selectNum($prefix."Day",1,31,$x=date('d'));
   				selectNum($prefix."Year",$yearNow-5,$yearNow+5,$x = date("Y"));
				selectNum($prefix."Hour",1,24,$x=date("H"));
				selectNum($prefix."Minutes",0,60,$x=date("i"));
				
			}
			function selectMonth($name){
				echo "<div class='form-row'>";
				echo "<div class=form-group col-md4'>";
				echo "<label for='$name'>$name</label>";
				echo "<select id='$name' name=\"$name\" class='form-control'>";
				for ($i=0;$i<=11;$i++){
					$month = date('F',strtotime("first day of -$i month"));
					$mntNum = date('m',strtotime("first day of -$i month"));
					echo "<option value=$mntNum>$month</option>";}
				echo "</select>";	
				echo "</div>";
				

			}
			function selectNum($name,$first,$last,$x){
				echo "<div class=form-group col-md4'>";
				echo "<label for='$name'>$name</label>";
   				echo "<select name=\"$name\" value='$x' class='form-control form-control-lg'>";
   				for ($i=$first; $i<=$last; $i++){
     				if ($i == $x){
					echo "<option value=$x selected>$x</option>";
				   }
				   else{
					if (intval($i) < 10){
						echo "<option value=$i>0$i</option>";
					}
					else {
					  echo "<option>$i</option>";
					  }
				   }
				}
				echo "</select>";
				echo "</div>";
				
				
		
			}
			function back2form(){
   				echo <<< HERE
   				<form>
      				<input type="submit" class="btn btn-lg btn-secondary" name="$button" value="back to form">
   				</form>
HERE;
			}
			function displayNum($num){
   				echo "<h2>number selected: $num</h2>";	
			}
			function passData($data)
			{
				foreach($data as $key=>$value){
					echo <<< HERE
					<input type="hidden" name="data[$key]" value="$value">
HERE;
					}
			}
			function Calculate($dailyRates,$data,$weeklyRates){
					$startMonth = $data[0];
					$startDay = $data[1];
					$startYear = $data[2];
					$startHour = $data[3];
					$startMinutes = $data[4];
					$endMonth = $data[5];
					$endDay = $data[6];
					$endYear = $data[7];
					$endHour = $data[8];
					$endMinutes = $data[9];

			
				$startTime = mktime($startHour,$startMinutes,0,$startMonth,$startDay,$startYear);
				echo "Your Start date and time: ",date("l, F jS, Y g:i A",$startTime),"<br>";
				$endTime = mktime($endHour,$endMinutes,0,$endMonth,$endDay,$endYear);
				echo "Your Ending date and time: ",date("l, F jS, Y g:i A",$endTime),"<br>";
				$diffdays = ceil(($endTime-$startTime)/86400);
				$diffhours = ceil(($endTime-$startTime)/3600);
				$diffmin = ceil(($endTime-$startTime)/1800);
				$ratebyMin = $diffmin * 1;
				$ratebyday = ($diffdays * $dailyRates);
				echo "<br>You will pay $",$ratebyMin," if you want to pay by minutes.<br>";
				echo "You will pay $",$ratebyday," if you want to pay by days.<br>";
				if ($weeklyRates != 0){
					$ratebyWeek = ($diffdays/7) * $weeklyRates;
					echo "<br>You will pay $",$ratebyWeek," if you want to pay by week.<br>";
				}
				else{
					echo "Short term parking do not have weekly available!<br>";
				}


			}
			function smartCheck($dailyRates,$data,$weeklyRates)
			{
				$startMonth = $data[0];
				$startDay = $data[1];
				$startYear = $data[2];
				$startHour = $data[3];
				$startMinutes = $data[4];
				$endMonth = $data[5];
				$endDay = $data[6];
				$endYear = $data[7];
				$endHour = $data[8];
				$endMinutes = $data[9];
				$startTime = mktime($startHour,$startMinutes,0,$startMonth,$startDay,$startYear);
				#echo "Your Start date and time: ",date("l, F jS, Y g:i A",$startTime),"<br>";
				$endTime = mktime($endHour,$endMinutes,0,$endMonth,$endDay,$endYear);
				#echo "Your Ending date and time: ",date("l, F jS, Y g:i A",$endTime),"<br>";
				if ($startTime < $endTime){
				$diffdays = ceil(($endTime-$startTime)/86400);
				$diffhours = ceil(($endTime-$startTime)/3600);
				$diffmin = ceil(($endTime-$startTime)/1800);
				$tmpWeek = 0;$tmpdays =0;
				while (($diffdays-7) > 0){
					$diffdays = $diffdays-7;
					$diffhours = $diffdays * 24;
					$tmpWeek ++;
				}
				if ($weeklyRates != 0){
				if ($tmpWeek == 0){					
					if ($diffhours>24){
						while (($diffhours-24)>0){
							$tmpdays ++;
							$diffhours = $diffhours - 24;
						}
						$ratebyday = $tmpdays * $dailyRates;
						$ratebyMin = $diffhours *2;
						if ($ratebyMin >= $dailyRates){
							$ratebyMin = $dailyRates;
							echo "<br>You should pay $",$ratebyday + $ratebyMin," for ",$tmpdays+1," days.<br>";
						}else{
							echo "<br>You should pay $",$ratebyday," for ",$tmpdays," days and $",$ratebyMin," for ",$diffhours*60," minutes<br>";
						}
					}
					else{
						$ratebyMin = $diffhours * 2;
						if ($ratebyMin >= $dailyRates){
							$ratebyMin = $dailyRates;
							echo "<br>You should pay $",$ratebyday + $ratebyMin," by day<br>";
						}else{
							echo "<br>You should pay $",$ratebyMin," by minutes.<br>";
						}
					}
				}
				else {
					$ratebyWeek = $tmpWeek * $weeklyRates;
					if ($diffhours>24){
						while (($diffhours-24)>0){
							$tmpdays ++;
							$diffhours = $diffhours - 24;
						}
						$ratebyday = $tmpdays * $dailyRates;
						$ratebyMin = $diffhours *2;
						if ($ratebyMin >= $dailyRates){
							$ratebyMin = $dailyRates;
							echo "<br>You should pay $",$ratebyWeek," for ",$tmpWeek," weeks and $",$ratebyday + $ratebyMin," for ",$tmpdays+1 ," days.<br>";
						}else{
							echo "<br>You should pay $",$ratebyWeek," for ",$tmpWeek," weeks and $",$ratebyday," for ",$tmpdays," days and $",$ratebyMin," for ",$diffhours*60," minutes<br>";
						}
					}
					else{
						$ratebyMin = $diffhours * 2;
						if ($ratebyMin >= $dailyRates){
							$ratebyMin = $dailyRates;
							echo "<br>You should pay $",$ratebyWeek," for ",$tmpWeek," weeks and $",$ratebyday + $ratebyMin," by day<br>";
						}
						else{
							echo "<br>You should pay $",$ratebyWeek," for ",$tmpWeek," weeks and $",$ratebyMin," by minutes.<br>";
						}
					}
				}
			}else {
				if ($diffhours>24){
					while (($diffhours-24)>0){
						$tmpdays ++;
						$diffhours = $diffhours - 24;
					}
					$ratebyday = $tmpdays * $dailyRates;
					$ratebyMin = $diffhours *2;
					if ($ratebyMin >= $dailyRates){
						$ratebyMin = $dailyRates;
						echo "<br>You should pay $",$ratebyday + $ratebyMin," for ",$tmpdays+1," days.<br>";
					}else{
						echo "<br>You should pay $",$ratebyday," for ",$tmpdays," days and $",$ratebyMin," for ",$diffhours*60," minutes<br>";
					}
				}
				else{
					$ratebyMin = $diffhours * 2;
					if ($ratebyMin >= $dailyRates){
						$ratebyMin = $dailyRates;
						echo "<br>You should pay $",$ratebyday + $ratebyMin," by day<br>";
					}else{
						echo "<br>You should pay $",$ratebyMin," by minutes.<br>";
					}
				}
				echo "<br>Short term parking do not have weekly available!";
			}
		}else {
			echo "<h3 class='error'>Please check your end time.</h3>";
		}
		}

		echo "<HR>";
highlight_file("index.php");		
			?>
			
		</div>
</div>
<footer class="footer">
<div class="page-footer" style="text-align:center;">
Copyright &#169; Skaranjit inc.&#174;
</div>
</footer>
</body>
</html>
