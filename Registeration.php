<!DOCTYPE html>
<html>
<head>
	<title>Paractice Website</title>
</head>
<body>
 <h1>Registration page</h1>
 <a href="index.php">Click here to Go Back</a>
 <form action="Registeration.php" method="Post">
 Enter Username : <input type="text" name="username" required="required" /><br/>
 Enter Password : <input type="password" name="password" required="required" /><br/>
 <input type="submit" value="Register" />
 	
 </form>

</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$bool = true;

	mysql_connect("localhost" , "root" , "") or die(mysql_error());
	mysql_select_db("first_db") or die("can not connect ");
	$query = mysql_query("select * from users");
	while ($row = mysql_fetch_array($query)) 
	{
		$table_users = $row['username'];
		if ($username == $table_users) {
			$bool = false;
			print '<script>alert("Username has been taken !");</script>';
			print '<script>window.location.assign("Registeration.php");</script>';
	}
	
}


if($bool)
{
	mysql_query("INSERT INTO users (username , password) VALUES ('$username' , '$password')");
	print '<script>alert("Successfully registered !");</script>';
	print '<script>window.location.assign("Registeration.php");</script>';  
}
}

?>