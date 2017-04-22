<?php
$process = $_POST["process"];
$error = $_POST['error'];
		$error2 = $_POST['error2'];
		$error3 = $_POST['error3'];
		$error4 = $_POST['error4'];
		$error5 = $_POST['error5'];
		$error6 = $_POST['error6'];
		$error7 = $_POST['error7'];
if(isset($_GET['process']))
	{
		$process = $_GET['process'];
	}

if($process == "3")
	{
	
		$People = $_POST["people"];
		if(isset($_GET['people']))
		{
			$People = $_GET['people'];
		}

	$db=mysql_connect("localhost","root") or die('Not connected : ' . mysql_error());
	mysql_select_db("contacts",$db) or die (mysql_error());
	echo $People;
	$SQL1="DELETE FROM people
	WHERE id = '$People'";
	$result1=mysql_query($SQL1) or die(mysql_error());


	$SQL2="SELECT * FROM people
	INNER JOIN city
	ON people.cityid=city.id";
	$result2=mysql_query($SQL2) or die(mysql_error());
	$num_results2=mysql_num_rows($result2);
	echo "You have ".$num_results2. " number of records.";
	echo "<TABLE border = 4>";
	echo "<tr><td>Last Name</td><td>First Name</td><td>cityid</td></tr>";
	for ($i=0;$i<$num_results2;$i++)
			{
			$row2=mysql_fetch_array($result2);
			echo "<TR>";
			echo "<TD>";
			echo $row2["last_name"];
			echo "</TD>";
			echo "<TD>";
			echo $row2["first_name"];
			echo "</TD>";
			echo "<TD>";
			echo $row2["cityid"];
			echo "</TD>";
			echo "</TR>";
			}
	echo "</TABLE>";
	echo "<a href=PROJECT5FORM.php>Go Back</a>";
	}
	if($process == "4")
		{
$Age = $_POST['age'];
$FirstName = $_POST["firstname"];
$LastName = $_POST["lastname"];
$Action = $_POST["action"];
$Gender = $_POST["gender"];
$City = $_POST["city"];
$Email = $_POST["email"];
$People = $_POST["people"];
if($Action == "add")
{
	if(!ctype_alpha($FirstName) )
		{
	$error2=1;
		}
		else
		{
		$error2=0;	
		}
		if(!ctype_alpha($LastName))
			{
		$error3=1;
			}
		else
		{
		$error3=0;	
		}
		if($Gender!="male" and $Gender!="female")
		{
		$error4=1;
		}
		else
		{
		$error4=0;	
		}
		if($Age=="x")
		{
		$error5=1;
		}
		else
		{
		$error5=0;
		}
		if($City=="x")
		{
		$error6=1;
		}
		else
		{
		$error6=0;
		}
		if(!filter_var($Email, FILTER_VALIDATE_EMAIL))
		{
		echo "E-mail is not valid";
		$error9=1;
		}
		else
		{
		echo "E-mail is valid";
		$error9=0;
		}
		if($error>0 or $error2>0 or $error3>0 or $error4>0 or $error5>0 or $error6>0 or $error9>0)
		{
		header("Location: PROJECT5FORM.php?firstname=".urlencode($FirstName)."&lastname=".urlencode($LastName)."&gender=".urlencode($Gender)."&age=".urlencode($Age)."city=".urlencode($City)."&error=".urlencode($error)."&error2=".urlencode($error2)."&error3=".urlencode($error3)."&error4=".urlencode($error4)."&error5=".urlencode($error5)."&error6=".urlencode($error6)."&error9=".urlencode($error9));	
		}
else
	{
$db=mysql_connect("localhost","root") or die('Not connected : ' . mysql_error());
mysql_select_db("contacts",$db) or die (mysql_error());

$SQL1="INSERT INTO people (last_name, first_name, age, gender, email, cityid)
VALUES ('$LastName','$FirstName','$Age','$Gender','$Email','$City')";
$result1=mysql_query($SQL1) or die(mysql_error());
$SQL2="SELECT *
FROM people
INNER JOIN city
ON people.cityid=city.id";
$result2=mysql_query($SQL2) or die(mysql_error());
$num_results2=mysql_num_rows($result2);
echo "<TABLE border = 4>";
echo "<tr><td>Last Name</td><td>First Name</td><td>cityid</td></tr>";
for ($i=0;$i<$num_results2;$i++)
		{
		$row2=mysql_fetch_array($result2);
		echo "<TR>";
		echo "<TD>";
		echo $row2["last_name"];
		echo "</TD>";
		echo "<TD>";
		echo $row2["first_name"];
		echo "</TD>";
		echo "<TD>";
		echo $row2["cityid"];
		echo "</TD>";
		echo "</TR>";
		}
echo "</TABLE>";
echo "<a href=PROJECT5FORM.php>Go Back</a>";
$error = 0;	
	}
}		
if($Action == "delete")
{
if($People=="x")
		{
		$error7=1;
header("Location: PROJECT5FORM.php?error7=".urlencode($error7));
		}
		else
		{
		$error7=0;
		
/*
$db=mysql_connect("localhost","root") or die('Not connected : ' . mysql_error());
mysql_select_db("contacts",$db) or die (mysql_error());

$SQL1="DELETE FROM people
WHERE id = '$People'";
$result1=mysql_query($SQL1) or die(mysql_error());


$SQL2="SELECT * FROM people
INNER JOIN city
ON people.cityid=city.id";
$result2=mysql_query($SQL2) or die(mysql_error());
$num_results2=mysql_num_rows($result2);
echo "<TABLE border = 4>";
echo "<tr><td>Last Name</td><td>First Name</td><td>cityid</td></tr>";
for ($i=0;$i<$num_results2;$i++)
		{
		$row2=mysql_fetch_array($result2);
		echo "<TR>";
		echo "<TD>";
		echo $row2["last_name"];
		echo "</TD>";
		echo "<TD>";
		echo $row2["first_name"];
		echo "</TD>";
		echo "<TD>";
		echo $row2["cityid"];
		echo "</TD>";
		echo "</TR>";
		}
echo "</TABLE>";
echo "<a href=PROJECT5FORM.php>Go Back</a>";
*/
$db=mysql_connect("localhost","root") or die('Not connected : ' . mysql_error());
mysql_select_db("contacts",$db) or die (mysql_error());

$SQL3="SELECT * FROM people
WHERE id = '$People'";
$result3=mysql_query($SQL3) or die(mysql_error());
$num_results3=mysql_num_rows($result3);
echo "Delete this record?";
echo "<TABLE border = 4>";
echo "<tr><td>id</td><td>Last Name</td><td>First Name</td><td>age</td><td>gender</td><td>email</td><td>cityid</td></tr>";
for ($i=0;$i<$num_results3;$i++)
		{
		$row2=mysql_fetch_array($result3);
		echo "<TR>";
		echo "<TD>";
		echo $row2["id"];
		echo "</TD>";
		echo "<TD>";
		echo $row2["last_name"];
		echo "</TD>";
		echo "<TD>";
		echo $row2["first_name"];
		echo "</TD>";
		echo "<TD>";
		echo $row2["age"];
		echo "</TD>";
		echo "<TD>";
		echo $row2["gender"];
		echo "</TD>";
		echo "<TD>";
		echo $row2["email"];
		echo "</TD>";
		echo "<TD>";
		echo $row2["cityid"];
		echo "</TD>";
		echo "</TR>";
		}
echo "</TABLE>";
$process = 3;
echo "<br>";
echo "<a href=PROJECT5PROCESS.php?process=$process&people=$People>YES</a>"."<br>";
echo "<a href=PROJECT5FORM.php>NO</a>";
$error = 0;	
}		
}
if($Action == "edit")
	{
	if($People=="x")
		{
		$error7=1;
header("Location: PROJECT5FORM.php?error7=".urlencode($error7));
		}
		else
		{
		
	$error7=0;
	
$db=mysql_connect("localhost","root") or die('Not connected : ' . mysql_error());
mysql_select_db("contacts",$db) or die (mysql_error());
//$error7=0;
$SQL1="SELECT * FROM people
WHERE id = '$People'";
$result1=mysql_query($SQL1) or die(mysql_error());
$num_results1=mysql_num_rows($result1);
$row1=mysql_fetch_array($result1);
$FirstName = $row1["first_name"];
$LastName = $row1["last_name"];
$Gender = $row1["gender"];
$Age = $row1["age"];
$City = $row1["city"];
$Email = $row1["email"];
	header("Location: PROJECT5FORMEDIT.php?firstname=".urlencode($FirstName)."&lastname=".urlencode($LastName)."&gender=".urlencode($Gender)."&age=".urlencode($Age)."&city=".urlencode($City)."&email=".urlencode($Email)."&people=".urlencode($People)."&action=".urlencode($Action)."&error=".urlencode($error)."&error2=".urlencode($error2)."&error3=".urlencode($error3)."&error4=".urlencode($error4)."&error5=".urlencode($error5)."&error6=".urlencode($error6));	
		}
/*$SQL1="UPDATE people
SET last_name = '$LastName', first_name = '$FirstName', age = '$Age', gender = '$Gender', email = '$Email', cityid = '$City'
WHERE id = '$People'";
$result1=mysql_query($SQL1) or die(mysql_error());


$SQL2="SELECT * FROM people";
$result2=mysql_query($SQL2) or die(mysql_error());
$num_results2=mysql_num_rows($result2);
echo "<TABLE border = 4>";
echo "<tr><td>Last Name</td><td>First Name</td><td>cityid</td></tr>";
for ($i=0;$i<$num_results2;$i++)
		{
		$row2=mysql_fetch_array($result2);
		echo "<TR>";
		echo "<TD>";
		echo $row2["last_name"];
		echo "</TD>";
		echo "<TD>";
		echo $row2["first_name"];
		echo "</TD>";
		echo "<TD>";
		echo $row2["cityid"];
		echo "</TD>";
		echo "</TR>";
		}
echo "</TABLE>";
echo "<a href=PROJECT5FORM.php>Go Back</a>";
		}
	}*/
	}
if($Action == "display")	
	{
$db=mysql_connect("localhost","root") or die('Not connected : ' . mysql_error());
mysql_select_db("contacts",$db) or die (mysql_error());
	
	$SQL2="SELECT * FROM people";
$result2=mysql_query($SQL2) or die(mysql_error());
$num_results2=mysql_num_rows($result2);
if($num_results2 == 0)
	{
	echo "There are no results."."<br>";
	echo "<a href=PROJECT5FORM.php>Go Back</a>";
	}
if($num_results2 > 0)
	{
echo "<TABLE border = 4>";
echo "<tr><td>id</td><td>Last Name</td><td>First Name</td><td>age</td><td>gender</td><td>email</td><td>cityid</td></tr>";
for ($i=0;$i<$num_results2;$i++)
		{
		$row2=mysql_fetch_array($result2);
		echo "<TR>";
		echo "<TD>";
		echo $row2["id"];
		echo "</TD>";
		echo "<TD>";
		echo $row2["last_name"];
		echo "</TD>";
		echo "<TD>";
		echo $row2["first_name"];
		echo "</TD>";
		echo "<TD>";
		echo $row2["age"];
		echo "</TD>";
		echo "<TD>";
		echo $row2["gender"];
		echo "</TD>";
		echo "<TD>";
		echo $row2["email"];
		echo "</TD>";
		echo "<TD>";
		echo $row2["cityid"];
		echo "</TD>";
		echo "</TR>";
		}
echo "</TABLE>";
echo "<a href=PROJECT5FORM.php>Go Back</a>";
$error = 0;	
	}
	}

if($Action == "")
		{
		$error = 1;
		header("Location: PROJECT5FORM.php?firstname=".urlencode($FirstName)."&lastname=".urlencode($LastName)."&gender=".urlencode($Gender)."&age=".urlencode($Age)."&city=".urlencode($City)."&error=".urlencode($error)/*."&error2=".urlencode($error2)."&error3=".urlencode($error3)."&error4=".urlencode($error4)*/);	
		}

	}
?>
