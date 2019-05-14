<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script>
function goBack() {
          window.history.back()
}
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="./../content/css/style2.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<title>Assignment 04D</title>
</head>
<body>

<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-lg-2">
          <nav class="navbar navbar-default navbar-fixed-side">
            <div class="container">
              <div class="navbar-header">
                <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./">CSIS 311</a>
              </div>
              <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                  <li class="active">
                    <a href="./../index.html">Home</a>
                  </li>
                  <li class="">
                    <a href="./../module01assign01/index.html">About</a>
                  </li>
                  
                </ul>
                
              </div>
            </div>
          </nav>
        </div>
        <div class="col-sm-9 col-lg-10">
          <div id="content">
            <img src="./../content/images/goback.png" onclick="goBack()"/>

                        <br>
                        <h2>Delete</h2>
                        <br>
                        <?php
			extract($_GET);
			print_r($_GET);
                            if (!( $database = mysqli_connect( "localhost", $uName, $pass,$dbName)))
                                    die( "Could not connect to database" );
                            // check if the 'id' variable is set in URL, and check that it is valid

                            if (isset($_GET['id']) && is_numeric($_GET['id']))

                            {

                            // get id value

                            $id = $_GET['id'];
                            echo "$id";



                            // delete the entry
                            $sql = "DELETE FROM `Employee_Information` WHERE `Employee_Information`.`EMPID` = $id";
                            $result = mysqli_query($database,$sql);





                            // redirect back to the view page
                            echo <<< HERE
                            <input type="hidden" name="uName" value=$uName>
                            <input type ="hidden" name="pass" value=$pass>
			    <input type="hidden" name="user" value=$user>
			    <input type="hidden" name="Pass" value=$Pass>
								
			    <input type="hidden" name="dbName" value=$dbName>
HERE;
				 header("Location: index.php?user=$user&Pass=$Pass&uName=$uName&pass=$pass&dbName=$dbName&btn=$btn&button=$button");
                            }

                            else

                            // if id isn't set, or isn't valid, redirect back to view page

                            {
                            echo <<< HERE
                            <input type="hidden" name="uName" value=$uName>
                            <input type ="hidden" name="pass" value=$pass>
                            <input type="hidden" name="dbName" value=$dbName>
HERE;
                            header("Location: index.php?user=$user&Pass=$Pass&uName=$uName&pass=$pass&dbName=$dbName&btn=$btn&button=$button");

                            }



                            ?>
          </div>
        </div>
      </div>
    </div>
<footer class="footer">
<div class="page-footer" style="text-align:center;">
Copyright &#169; Skaranjit inc.&#174;
</div>
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
