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
<title>Assignment 04C</title>
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
                        <h2>Assignment 4C</h2>
                        <br>
                        <?php
                        extract($_POST);
                        if ($button == "Add") // prompt for the information to add
                        {
                        echo <<< HERE
                        <form method="post" action="ex3add.php">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">First and last name</span>
                            </div>
                            <input type="text" name="FirstName" class="form-control">
                            <input type="text" name ="LastName" class="form-control">
                        </div><br>
                        <div class="input-group mb-3">
                        <select class="custom-select" id="inputGroupSelect02" name="Gender">
                          <option selected>Choose...</option>
                          <option value="M">Male</option>
                          <option value="F">Female</option>
                        </select>
                        <div class="input-group-append">
                          <label class="input-group-text" for="inputGroupSelect02">Gender</label>
                        </div>
                      </div><br>
                      <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text" id="">Hire Date</span>
                      </div>
                      <input type="date" name="HireDate" class="form-control">
		      </div><br>
		      <div class="input-group">
                      <div class="input-group-prepend">
                      <span class="input-group-text" id="">Birth Date</span>
                  	</div>
                  	<input type="date" name="BirthDate" class="form-control">
			</div>
			<br><br>
		        <input type="submit" class="btn btn-dark" name="button" value="add new entry">
			<input type="hidden" name="uName" value=$uName>
			<input type ="hidden" name="pass" value=$pass>
			<input type="hidden" name="dbName" value=$dbName>
			</form><br><br>
			<form action="index.php">
			<input type="submit" class="btn btn-lg btn-secondary btn-block" name="button" value="Clear">
			<input type="hidden" name="uName" value=$uName>
                        <input type ="hidden" name="pass" value=$pass>
                        <input type="hidden" name="dbName" value=$dbName>
			</form>
HERE;
                        }
                        else // add the new entry to the pet table in the database
                        {
                        if (!( $database = mysqli_connect( "localhost", $uName, $pass,$dbName)))
                            die( "Could not connect to database" );
                            $query = "INSERT INTO Employee_Information(Hire_Date,BirthDate,First_Name,Last_Name,Gender) VALUES (";
                            $query = $query . "'$HireDate','$BirthDate','$FirstName','$LastName','$Gender')";
                        echo "<h4>query: $query</h4>"; 
                        if ( !( $result = mysqli_query( $database,$query ) ) ) {
                            echo "Could not execute query! <br />";
                            die( mysqli_error() );
                        }
                        else 
                            echo "$FirstName added to Employee_Information database.";
                        mysqli_close($database);
                        echo <<< HERE
                        <form method="post" action="index.php">
                        <input type="submit" class="btn btn-lg btn-dark btn-block" name="button" value="Clear">
                       <input type="hidden" name="uName" value=$uName>
                                <input type ="hidden" name="pass" value=$pass>
                                <input type="hidden" name="dbName" value=$dbName>
			 </form>
HERE;
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


