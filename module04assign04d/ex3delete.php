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
                        if ($button == "Delete") // prompt for name and owner
                        {
                        echo <<< HERE
                        <form method="post" action="ex3delete.php">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">First and last name</span>
                            </div>
                            <input type="text" name="FirstName" class="form-control">
                            <input type="text" name ="LastName" class="form-control">
                        </div>
                        <br>

                        <input class="btn btn-primary" type="submit" name="button" value="Remove">
                        <input type="hidden" name="uName" value=$uName>
                        <input type="hidden" name="pass" value=$pass>
                        <input type="hidden" name="dbName" value=$dbName>
                        </form>
                        <br>
                        <form method="post" action="index.php">
                        <input class="btn btn-lg btn-dark btn-block" type="submit" name="button" value="Clear">
                        <input type="hidden" name="uName" value=$uName>
                        <input type="hidden" name="pass" value=$pass>
                        <input type="hidden" name="dbName" value=$dbName>
                        </form>
HERE;
                        }
                        else // attempt to delete
                        {
                        if (!( $database=mysqli_connect("localhost",$uName,$pass,$dbName)))
                            die( "Could not connect to database" );
                        $query = "DELETE from Employee_Information where First_Name = '$FirstName' and Last_Name = '$LastName'";
                        echo "<h4>query: $query</h4>"; 
                        if ( !( $result = mysqli_query( $database, $query) ) ) {
                            echo "Could not execute query! <br />";
                            die( mysqli_error() );
                        }
                        if ( mysqli_affected_rows($database) > 0 ) 
                            echo "<h3>$FirstName $LastName deleted from Employee_Information database.</h3>";
                        else
                            echo "<h3>$FirstName $LastName not in Employee_Information database.</h3>";
                        mysqli_close($database);
                        echo <<< HERE
                        <br>
                        <form method="post" action="index.php">
                        <input class="btn btn-lg btn-dark btn-block" type="submit" name="button" value="Clear">
                        <input type="hidden" name="uName" value=$uName>
                        <input type="hidden" name="pass" value=$pass>
                        <input type="hidden" name="dbName" value=$dbName>
                        </form>
HERE;
                        }
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



