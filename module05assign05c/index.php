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
<title>Assignment 5B</title>
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
                        <h2>Assignment 5B</h2>
                        <br>
                        <?php
extract($_REQUEST);
extract($_POST);
                           print_r($_REQUEST);
                           $data = array();
                           $today = date("l, F jS, Y g:i A");
                           echo "<p>Today is <strong>",$today,"</strong></p>";
                        if ($button == NULL || $button == "Sign Out" || $button == "Register"){
                                loginPage();
                        }
                        elseif ($button == "login" or $button == "Clear") {
                            loggedin($user,$Pass);
                        }
                        else{
                            print_r($tbls);
                            afterSelected($user,$Pass,$uName,$pass,$dbName,$button,$btn,$Name,$Description);
                        }


// ***********************************************************
// FUNCTIONS
                        function loginPage(){
				echo <<< HERE
				<h2>Enter skaranjit as user and asdlkj as password</h2>
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
                                echo $user,$Pass;
                                $query = "Select * from Users";
                                $result = mysqli_query($conn,$query);
                                while ($row = mysqli_fetch_assoc($result))
                                {
                                    $admin_password = $row['password'];
                                    $admin_username = $row['username'];
                                }
                                if($user == $admin_username && $Pass == $admin_password)
                                {
                                   showMainPage($user,$Pass);
                                }
                                else{
                                        echo "Username or password do not match. Please check and try again.";
                                }
                                }
                        }
                        function showMainPage($user,$Pass){
                                echo $admin_password;
                                echo $user,$Pass;
                            include "password.php";
                            $status = "Connection Failed";
                            // Create Connection
                            $conn = new mysqli('localhost',$uname,$pass,$dbname);
                            //Check Connection
                            if ($conn->connect_error){
                                echo "<h2>",$status,"</h2>";
                                die("Connection Failed! " . $conn->connect_error);
                            }
                            else{
				    echo <<< HERE
				<form>
                                <h2>Database: $dbName</h2>
                                <h2>Search Information in:
                                   <input type="hidden" name="user" value=$user>
                                   <input type="hidden" name="Pass" value=$Pass>
                                    <input type="hidden" name="uName" value=$uname>
                                    <input type ="hidden" name="pass" value=$pass>
                                    <input type="hidden" name="dbName" value=$dbname>
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                            <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Employees by Department
                                                </button>
                                            </h2>
                                            </div>

                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                            <form>
HERE;
                                            $conn = mysqli_connect("localhost",$uname,$pass,$dbname);
                                            $sql = "select Name from Departments";
                                            $result = mysqli_query($conn,$sql);
                                            while ($row = mysqli_fetch_assoc($result))
                                            {
                                                $Name = $row["Name"];
                                                echo " <input class='btn btn-secondary' type='submit' name='btn' value='$Name'>";
                                            }
                                            echo <<< HERE
                                            <input type='hidden' name='button' value='Department'>
                                            </form>
                                            <input class='btn btn-secondary' type='submit' name='button' value='Add New Department'>

                                            </div>
                                            </div>
                                            <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Histroy of Changes in Employees Information table
                                                </button>
                                            </h2>
                                            </div>

                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                            <form>
HERE;
                                            $conn = mysqli_connect("localhost",$uname,$pass,$dbname);
                                            $sql = "select * from data_history";
                                            $result = mysqli_query($conn,$sql);
                                            printtable("History of change in Employee Table",$result,$uName,$pass,$dbName,$btn,$button,$user,$Pass);                                            
                                        echo <<< HERE
                                            </div>
                                            </div>
                                        </div>

                                    </div>
				    </idiv>
				    </form>
				    </form>
                                    <br> <form action="./../index.html">  <!-- change the action to where you want to go -->
                                <input class="btn btn-dark btn-lg btn-block" type="submit" value="Return to Assignment index">
                                </form>
HERE;

                            }
                        }
                        function afterSelected($user,$Pass,$uName,$pass,$dbName,$button,$btn,&$Name,&$Description){
                            if ($button == "Add New Department"){
                                if (!( $database = mysqli_connect( "localhost", $uName, $pass,$dbName)))
                                    die( "Could not connect to database" );

                                if ($_REQUEST["Name"] != NULL){
                                    $query = "INSERT INTO Departments(Name,Description) VALUES (";
                                     $query = $query . "'$Name','$Description')";
                                if ( $result = mysqli_query( $database,$query ) ) {
                                    echo "$Name added to Departments";
                                }}
                                echo "Enter details below:";
                                echo <<< HERE
                                <form>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Department Name:</span>
                                </div>
                                <input type="text" name="Name" class="form-control">
                                </div>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Description</span>
                                </div>
                                <input type="text" name="Description" class="form-control">
                                </div>
                                <input class="btn btn-dark btn-lg btn-block" type="Submit" name="button" Value="Add New Department">
                                <input type="hidden" name="uName" value=$uName>
                                <input type ="hidden" name="pass" value=$pass>
                                <input type="hidden" name="dbName" value=$dbName>
                                <input type="hidden" name="user" value=$user>
                                <input type="hidden" name="Pass" value=$Pass>
                                </form>
HERE;
                                mysqli_close($database);
                            }
                            else{
                            $conn = mysqli_connect("localhost",$uName,$pass,$dbName);
                            $sql = "select EMPID,Hire_Date,BirthDate,First_Name,Last_Name,Departments.Name, Departments.Description from Employee_Information left join Departments on Employee_Information.DeptID = Departments.DeptID where Departments.Name = '$btn'";
                            echo $sql;
                            $result = mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            printtable("Query Results",$result,$uName,$pass,$dbName,$btn,$button,$user,$Pass);
                            }
                                        echo <<< HERE
                                <form method="post" action="index.php">
                                <input type="submit" name="button" value="Clear">
                                <input type="hidden" name="user" value=$user>
                                <input type ="hidden" name="Pass" value=$Pass>
                                </form>
HERE;
                            }


                        function loadTable($button,$uName,$pass,$dbName){
                            echo <<< HERE
                            <form>
                            <input class="btn btn-secondary" type="submit" name="button" value="Clear">
                            <input type="hidden" name="uName" value=$uName>
                            <input type ="hidden" name="pass" value=$pass>
                            <input type="hidden" name="dbName" value=$dbName>
HERE;
                            passData($tbls);
                            echo "</form>";
                            $table = $button;
                            $conn = mysqli_connect("localhost",$uName,$pass,$dbName);
                            $sql = "select * from $table";
                            $result = mysqli_query($conn,$sql);

                            // output the field names
                            echo "<h3>Field Names in the $table table</h3>";
                            while ($field = mysqli_fetch_field($result))
                            {
                                echo "$field->name<br>\n";
                            }
                            // output the records
                            echo "<h3>Records in the $table table</h3>";
                            echo "------------------<br>";
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                foreach ($row as $col=>$val)
                                    {
                                        echo "$col - $val<br>\n";
                                    }
                                echo "------------------<br>";
                            }
                            echo <<< HERE
                                <form method="post" action="index.php">
                                <input type="submit" name="button" value="Clear">
                                <input type="hidden" name="user" value=$user>
                                <input type ="hidden" name="Pass" value=$Pass>
                                </form>
HERE;
                        }
                        function printtable($tablename,$result,$uName,$pass,$dbName,$btn,$button,$user,$Pass)
                        {
                           //Display the entire table
                           echo <<< HERE
                              <h1>$tablename</h1>
                              <table class="table">
                              <thead class="thead-dark">
                              <tr>
HERE;
                           // Print the table column headers
                           while ($field = mysqli_fetch_field($result))
                           {
                              echo "<th scope='col'><b>$field->name</b></th>\n";
                           }
                           echo "</tr>\n</thead>\n<tbody>";
                           // Print each row.  $row is an associative array containing one
                           // record in the table.
                           while ($row = mysqli_fetch_assoc($result))
                           {
                              echo "<tr>\n";
                              foreach($row as $field=>$value)
                              {
                                 /* since the table has a border, put a blank (&nbsp;) in the variable
                                    if the database field is NULL so that the border of the table
                                    cell will be displayed */
                                 if ($value==NULL) $value="&nbsp;";
                                 echo "<td scope='row'>$value</td>\n";


                              }

                              echo '<td>';
                              echo '<a href="edit.php?user='.$user. '&Pass='.$Pass.'&uName='.$uName.'&pass='.$pass.'&dbName='.$dbName.'&btn='.$btn.'&button='.$button.'&id=' . $row['EMPID'] . '">Edit</a></td>';
                              echo '<td><a href="delete.php?user='.$user.'&Pass='.$Pass.'&uName='.$uName.'&pass='.$pass.'&dbName='.$dbName.'&btn='.$btn.'&button='.$button.'&id=' . $row['EMPID'] . '">Delete</a></td>';
                              echo "</tr>\n";
                           }
                           echo "</tbody></table>";
                        }
                function passData($tbls){
                    foreach($tbls as $key=>$value){
                        echo "<input type='hidden' name='tbls[$key]' value=$value><br>";
                    }
                }

                echo "<HR>";
highlight_file("index.php");
                        ?>
</form>
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
