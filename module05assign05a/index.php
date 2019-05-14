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
<title>Assignment 05A</title>
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
                        <h2>Assignment 5A</h2>
                        <br>
                        <?php
extract($_REQUEST);
                           print_r($_REQUEST);
                           $today = date("l, F jS, Y g:i A");
                           echo "<p>Today is <strong>",$today,"</strong></p>";
                        if ($button == NULL || $button == "Sign Out"){
                                loginPage();
                        }
                        elseif ($button == "login" or $button == "Clear") {
                            loggedin($user,$Pass);
                        }
                        else{
                            afterSelected($uName,$pass,$dbName,$button,$btn,$Name,$Description);
                        }


// ***********************************************************
// FUNCTIONS
                        function loginPage(){
				echo <<< HERE
				<h2> Enter skaranjit as user and asdlkj as password</h2>
                                <form>
                                <div class="form-group">
                                <label for="username">UserName</label>
                                <input type="text" class="form-control" id="username" name="user" placeholder="UserName">
                                </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="Pass" placeholder="Password">
                                </div>
                            <br>
                            <div class = "form-group">
                            <input class="btn btn-primary" type ="submit" name="button" value="login">
                            </div>
                            </form>
HERE;
                          }
                        function loggedin($user,$Pass){
                                include "password.php";
                                // Create Connection
                        $conn = mysqli_connect('localhost',$uname,$pass,$dbname);

                         //Check Connection
                         if ($conn->connect_error){
                                 echo "<h2>",$status,"</h2>";
                                                                      die("Connection Failed! " . $conn->connect_error);
                                                                      }
                                                                     $status = True;
                        if ($status == True) {
                                $query = "Select * from Users";
                                $result = mysqli_query($conn,$query);
                                while ($row = mysqli_fetch_assoc($result))
                                {
                                    $admin_password = $row['password'];
                                    $admin_username = $row['username'];
                                }
                                if($user == $admin_username && $Pass == $admin_password)
                                {
                                   echo "<br><h2>Login Successfull</h2>";
                                }
                                else{
                                        echo "Username or password do not match. Please check and try again.";
                                }
                                }
                        }

                echo "<HR>";
highlight_file("index.php");
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
