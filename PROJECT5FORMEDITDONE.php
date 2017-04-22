<?php
$process = $_GET["process"];
$error = $_GET['error'];
$Age = $_GET['age'];
$FirstName = $_GET["firstname"];
$LastName = $_GET["lastname"];
$Action = $_POST["action"];
$Gender = $_GET["gender"];
$City = $_GET["city"];
$Email = $_GET["email"];
$People = $_GET["people"];

		$error2 = $_GET['error2'];
		$error3 = $_GET['error3'];
		$error4 = $_GET['error4'];
		$error5 = $_GET['error5'];
		$error6 = $_GET['error6'];
		$error7 = $_GET['error7'];
		$error9 = $_GET['error9'];
if(isset($_GET['process']))
	{
		$process = $_GET['process'];
	}
if($Action == "edit")
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
		
		$error9=0;
		}
		if($error>0 or $error2>0 or $error3>0 or $error4>0 or $error5>0 or $error6>0 or $error9>0)
		{
		header("Location: PROJECT5FORMEDIT.php?firstname=".urlencode($FirstName)."&lastname=".urlencode($LastName)."&gender=".urlencode($Gender)."&age=".urlencode($Age)."&city=".urlencode($City)."&email=".urlencode($Email)."&action=".urlencode($Action)."&error=".urlencode($error)."&error2=".urlencode($error2)."&error3=".urlencode($error3)."&error4=".urlencode($error4)."&error5=".urlencode($error5)."&error6=".urlencode($error6)."&error9=".urlencode($error9));	
		}
else
	{
	
$db=mysql_connect("localhost","root") or die('Not connected : ' . mysql_error());
mysql_select_db("contacts",$db) or die (mysql_error());

$SQL1="UPDATE people
SET last_name = '$LastName', first_name = '$FirstName', age = '$Age', gender = '$Gender', email = '$Email', cityid = '$City'
WHERE id = '$People'";
$result1=mysql_query($SQL1) or die(mysql_error());

echo $People;
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
	}

	
?>
