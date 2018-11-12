<!DOCTYPE html>
<html>
<head>
    <title> Term Project </title>
    <meta charset = "utf-8" />
    <style type = "text/css">
		table, th, td {
			border-collapse: collapse;
			border: 1px solid white;
		}
		th, td {
			text-align: center;
		}	

    </style>
</head>
<body>
<h2>Login</h2>
<form method="post" action=#>
	<table><tr>
	<th>Username:</th>
	<td><input type="text" name="username"></td></tr>
	<!--<tr><th>Password:</th>
	<td><input type="password" name="password"></td></tr>--></table>
	<input type="submit" name="login" value="Login">
	<input type="submit" name="create" value="Create an Account">
</form>
</body>
</html>
<?php 
$db = mysqli_connect("127.0.0.1", "webaccess", "Password1", "DBMon");
if (!$db) {
	print "Error - Could not connect to MySQL";
	exit;
}
$er = mysqli_select_db($db,"DBMon");
if (!$er) {
	print "Error - Could not select the database";
	exit;
}
if (isset($_POST['login'])) {
	$username = $_POST["username"];
	$query = "select * from User";
	$result = mysqli_query($db,$query);
	$num_rows = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	$num_fields = mysqli_num_fields($result);
	// $keys = array_keys($row);
	$userExists = false;
	for ($row_num = 0; $row_num < $num_rows; $row_num++) {
		$values = array_values($row);
		$result2 = mysqli_fetch_array($sth);
		$value = htmlspecialchars($values[1]);
		if ($value == $username) {
			$userExists = true;
		}
	}
	if (userExists == false) {
		echo "<p>Invalid login</p>";
	}
	else {
		echo "<p>", $username, " has logged in.</p>";
		echo "<form method=\"post\" action=\"action.php\">
			  <input type=\"submit\" name=\"addRecipe\" value=\"Add Recipe\"><br><br>
			  <input type=\"submit\" name=\"updateRecipe\" value=\"Update Recipe\"><br><br>
			  <input type=\"submit\" name=\"deleteRecipe\" value=\"Delete Recipe\"><br><br>
			  <input type=\"submit\" name=\"searchRecipe\" value=\"Search Recipe\">
			  </form><br>";
	}
}
if (isset($_POST['create'])) {
	$username = $_POST["username"];
	$query = "select UserID from User";
	$result = mysqli_query($db,$query);
	$num_rows = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	$num_fields = mysqli_num_fields($result);
	// $keys = array_keys($row);
	$nameTaken = false;
	for ($row_num = 0; $row_num < $num_rows; $row_num++) {
		$values = array_values($row);
		$result2 = mysqli_fetch_array($sth);
		$value = htmlspecialchars($values[1]);
		if ($value == $username) {
			$nameTaken = true;
		}
	}
	if ($nameTaken == true) {
		echo "<p>", $username, " has already been taken.</p>";
	}
	else {
		$date = date("Y-m-d");
		$query = "insert into User (UserID, JoinDate) values ('$username','$date')";
		$result = mysqli_query($db,$query);
		echo "<p>", $username, " has created an account.</p>";
		echo "<form method=\"post\" action=\"action.php\">
			  <input type=\"submit\" name=\"addRecipe\" value=\"Add Recipe\"><br><br>
			  <input type=\"submit\" name=\"updateRecipe\" value=\"Update Recipe\"><br><br>
			  <input type=\"submit\" name=\"deleteRecipe\" value=\"Delete Recipe\"><br><br>
			  <input type=\"submit\" name=\"searchRecipe\" value=\"Search Recipe\">
		      </form><br>";
	}
}
?>