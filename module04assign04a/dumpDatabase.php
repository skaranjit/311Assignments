<?php
$dbname = "Your DB"; // replace with your database name
$username = "User";  // replace with your username
$password = "Password";  // replace with your password, nobody can see it
extract($_POST);
echo <<< HERE
   <form method="POST"> 
   <h2>Database: $dbname</h2>
   <h2>View Tables: 
         <input type="submit" name="button" value="Employee_Information">
         <input type="submit" name="button" value="event"><BR>
   </h2>
   </form>
   <form action="./../index.html">  <!-- change the action to where you want to go -->
      <input type="submit" value="return to assignment index">
   </form>
HERE;
if ($button == "Employee_Information" or $button == "event")
{
	   echo <<< HERE
      <form method="POST"> 
      <input type="submit" name="button" value="clear">
      </form>
HERE;
	      $table = $button;
	      $conn = mysqli_connect("localhost",$username,$password,$dbname);
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
		                                         echo "------------------<br>";                                    	      }
	 }                     
	 ?>
