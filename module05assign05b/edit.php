<?php

/*

EDIT.PHP

Allows user to edit specific entry in database

*/



// creates the edit record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm($id, $firstname, $lastname,$DeptID, $error)

{

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>Edit Record</title>

</head>

<body>

<?php

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>



<form action="" method="post">

<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<div>

<p><strong>ID:</strong> <?php echo $id; ?></p>

<strong>First Name: *</strong> <input type="text" name="firstname" value="<?php echo $firstname; ?>"/><br/>

<strong>Last Name: *</strong> <input type="text" name="lastname" value="<?php echo $lastname; ?>"/><br/>
<strong>Department ID: *</strong> <input type="text" name="DeptID" value="<?php echo $DeptID; ?>"/><br/>
<p>* Required</p>

<input type="submit" name="submit" value="Submit">
<input type="hidden" name="uName" value="<?php echo $uName; ?>">
<input type ="hidden" name="pass" value="<?php echo $pass; ?>">
<input type="hidden" name="dbName" value="<?php echo $dbName; ?>">
<input type="hidden" name="btn" value="<?php echo $btn; ?>">
<input type="hidden" name="button" value="<?php echo $button; ?>">
<input type="hidden" name="user" value="<?php echo $user; ?>">
<input type="hidden" name="Pass" value="<?php echo $Pass;?>">
</div>

</form>

</body>

</html>

<?php

}


extract($_GET);

print_r($_GET);

// connect to the database

$server = 'localhost';




$db = $dbName;



// Connect to Database
if (!( $database = mysqli_connect( "localhost", $uName, $pass,$dbName)))
	                            die( "Could not connect to database" );
// check if the form has been submitted. If it has, process the form and save it to the database

if (isset($_POST['submit']))

{
echo "Yeta Samma ";
// confirm that the 'id' value is a valid integer before getting the form data

if (is_numeric($_POST['id']))

{

// get form data, making sure it is valid
echo "asdasd";
$id = $_POST['id'];
$firstname = $database->real_escape_string(htmlspecialchars($_POST['firstname']));
$lastname = $database->real_escape_string(htmlspecialchars($_POST['lastname']));
$DeptID = $_POST['DeptID'];
// check that firstname/lastname fields are both filled in
if ($firstname == '' || $lastname == '')
{
// generate error message
$error = 'ERROR: Please fill in all required fields!';
//error, display form
renderForm($id, $firstname, $lastname,$DeptID, $error);
}
else
{
// save the data to the database

echo "ajksdhaksd";
echo $firstname,$lastname,$DeptID;
$query ="UPDATE Employee_Information SET First_Name='$firstname', Last_Name='$lastname' , DeptID = '$DeptID' WHERE EMPID='$id'";
if ( !( $result = mysqli_query( $database,$query ) ) ) {
     echo "Could not execute query! <br />";
     die( mysqli_error() );
}
echo "quer ran";
header("Location: index.php?user=$user&Pass=$Pass&uName=$uName&pass=$pass&dbName=$dbName&btn=$btn&button=$button");

}

}

else

{

// if the 'id' isn't valid, display an error

echo 'Error!';

}

}

else

// if the form hasn't been submitted, get the data from the db and display the form

{



// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)

{

// query db

$id = $_GET['id'];
echo $id;
$query = "SELECT * FROM Employee_Information WHERE EMPID = $id";

if ( !( $result = mysqli_query( $database,$query ) ) ) {
	                            echo "Could not execute query! <br />";
				                                die( mysqli_error() );
				                            }
$row = $result->fetch_array(MYSQLI_ASSOC);



// check that the 'id' matches up with a row in the databse

if($row)

{



// get data from db

$firstname = $row['First_Name'];

$lastname = $row['Last_Name'];
$DeptID = $row['DeptID'];

// show form

renderForm($id, $firstname, $lastname, $DeptID, '');

}

else

// if no match, display result

{

echo "No results!";

}

}

else

// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error

{

echo 'Error!';

}

}

?>
