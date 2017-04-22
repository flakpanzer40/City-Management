<form action="PROJECT5FORMEDITDONE.php" method="POST">
<?php
$sus = "error";
$sus2 = "error2";
$sus3 = "error3";
$sus4 = "error4";
$sus5 = "error5";
$sus6 = "error6";
$sus7 = "error7";
$sus9 = "error9";
$FirstName = "";
$LastName = "";
$Gender = "";
$Age = "";
$Email = "";
$City = "";
$People = "";
$error = "";

if(isset($_GET['error'])) 

{
$error = $_GET['error'];

}
if(isset($_GET['error2'])) 

{
$error2 = $_GET['error2'];

}
if(isset($_GET['error3'])) 

{
$error3 = $_GET['error3'];

}
if(isset($_GET['error4'])) 

{
$error4 = $_GET['error4'];

}
if(isset($_GET['error5'])) 

{
$error5 = $_GET['error5'];

}
if(isset($_GET['error6'])) 

{
$error6 = $_GET['error6'];

}
if(isset($_GET['error7'])) 

{
$error7 = $_GET['error7'];

}
if(isset($_GET['error8'])) 

{
$error8 = $_GET['error8'];

}
if(isset($_GET['error9'])) 

{
$error9 = $_GET['error9'];

}
if(isset($_GET['firstname'])) 

{
$FirstName = $_GET['firstname'];
}
if(isset($_GET['lastname'])) 

{
$LastName = $_GET['lastname'];
}
if(isset($_GET['gender'])) 

{
$Gender = $_GET['gender'];
}
/*if(isset($_GET['age'])) 

{
$Age = $_GET['age'];
}*/
if(isset($_GET['email'])) 

{
$Email = $_GET['email'];
}
/*if(isset($_GET['city'])) 
{
$City = $_GET['city'];
}*/
if(isset($_GET['people'])) 
{
$People = $_GET['people'];
}
if(isset($_GET['action'])) 
{
$Action = $_GET['action'];
}
		
if($Action == "add")
		{
	?>
	Add<input type="radio" name="action" value="add" checked = "checked" disabled>
	<?php
		}
if($Action !== "add")
		{
	?>
	Add<input type="radio" name="action" value="add" disabled>
		<?php
		}
$db=mysql_connect("localhost","root") or die('Not connected : ' . mysql_error());
mysql_select_db("contacts",$db) or die (mysql_error());
//$SQL1="SELECT cityid FROM people
//LEFT JOIN city
//ON people.cityid = city.id"; 
$SQL1="SELECT * FROM people
WHERE id = '$People'";
$SQL2="SELECT * FROM city";
$SQL3="SELECT * FROM people";
$result2=mysql_query($SQL2) or die(mysql_error());
$num_results2=mysql_num_rows($result2);	
$result3=mysql_query($SQL3) or die(mysql_error());
$num_results3=mysql_num_rows($result3);	
mysql_close($db);
if($num_results3>0)
{

if(!isset($_GET['action']))
	{
	?>
			Edit<input type="radio" name="action" value="edit">
			Delete<input type="radio" name="action" value="delete" disabled>
	<?php
	}
if(isset($_GET['action']))
	{
	$Action = $_GET['action'];
		if($Action == "edit")
			{
			
		?>
	Edit<input type="radio" name="action" value="edit" checked = "checked">
	Delete<input type="radio" name="action" value="delete" disabled>
		<?php
			}
	if($Action == "delete")
			{
		?>
	Edit<input type="radio" name="action" value="edit">
	Delete<input type="radio" name="action" value="delete" checked = "checked" disabled>
		<?php
			}
	if($Action == "add")
			{
		?>
			Edit<input type="radio" name="action" value="edit">
			Delete<input type="radio" name="action" value="delete" disabled>
			<?php
			}
	}

}
if($error == "1")
	{
?>
Display Table<input type="radio" name="action" value="display"><font color="red" disabled>*You must select your action</font>
<?php
	}
if($error !== "1")
	{
?>
Display Table<input type="radio" name="action" value="display" disabled>
<?php
	}
?>

<br>First Name:<input type="text" size="15" name="firstname" maxlength="10" placeholder="Evan" value="<?php echo $FirstName;?>">
<?php
if($error2 == 1)
{
?>
<font color="red">*Your name must contain alphabet letters only!</font>
<?php
}
?><br>
Last Name:<input type="text" size="15" name="lastname" maxlength="10" placeholder="Ren" value="<?php echo $LastName;?>">
<?php
if($error3 == 1)
{
?>
<font color="red">*Your name must contain alphabet letters only!</font>
<?php
}
?><br>
Gender
<?php
if($error4 == 1)
{
?>
<font color="red">*You must select your gender!</font>
<?php
}

	if($Gender=="male")
		{
?>
			Male<input type="radio" name="gender" value="male" checked>
			Female<input type="radio" name="gender" value="female"><br>
<?php
		}
	else if($Gender=="female")
		{
?>
			Male <input type="radio" name="gender" value="male">
			Female<input type="radio" name="gender" value="female" checked><br>
<?php
		}
	else
		{
?>

			Male<input type="radio" name="gender" value="male">
			Female<input type="radio" name="gender" value="female"><br>
<?php
		}
?>
Age
<?php 
if($error5 == 1)
{
?>
<font color="red">*You must select your age!</font>
<?php
}
?>
<select name="age">
<option value="x"> Select</option>
<?php
for($i=1;$i<120+1;$i++)
		{
			if(isset($_GET['age']))
				{
					$Age=$_GET['age'];
					if($i==$Age)
						{
							$selected="selected";
						}
					else
						{
							$selected="";
						}
				}
			echo "<option value=".$i.">$i $selected</option>";
		}

?>
</select>
<br>

email:<input type="text" size="20" name="email" maxlength="30" placeholder="renevan10@gmail.com" value="<?php echo $Email;?>">
<?php
if($error9 == 1)
	{
	?>
<font color="red">*You must enter a valid email!</font>
<?php
	}


?>
<br>
Cities
<?php
if($error6 == 1)
{
?>
<font color="red">*You must select your city!</font>
<?php
}
?>

<select name="city">
<option value="x"> Select</option>
<?php
for ($i=0;$i<$num_results2;$i++)
	{
	if(isset($_GET['city']))
				{
					$City=$_GET['city'];
					if($i==$City)
						{
							$selected="selected";
						}
					else
						{
							$selected="";
						}
				}
	
	$row2=mysql_fetch_array($result2);
	echo "<option value='".$row2["id"]."'>".$row2["name"]." ". $selected."</option>"."<br>";
	}
?>
</select>
<br>

<input type='hidden' name="process" value="4">
<input type='hidden' name="people" value= "<?php echo $_GET['people']; ?>">
<input type = "submit" value = "GO">
</form>
