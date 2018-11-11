<?php
/*$db = mysqli_connect("", "", "");
if (!$db) {
	print "Error - Could not connect to MySQL";
	exit;
}
$er = mysqli_select_db($db,"");
if (!$er) {
	print "Error - Could not select the database";
	exit;
}*/
if (isset($_POST['addRecipe'])) {
	echo "<h2>Add Recipe</h2>";
	echo "<form method=\"post\">
	      Steps:<br>
		  <textarea rows=\"10\" cols=\"80\" name=\"steps\"></textarea><br>
		  Instructions:<br>
		  <textarea rows=\"10\" cols=\"80\" name=\"instructions\"></textarea><br>
		  Tags:<br>
		  <input type=\"text\" name=\"tag\"><br><br>
		  <input type=\"submit\" name=\"submitAdd\" value=\"Enter\">
		  </form>";
}
if (isset($_POST['updateRecipe'])) {
	echo "<h2>Update Recipe</h2>";
	echo "<form method=\"post\">
		  Enter Recipe ID:<br>
		  <input type=\"text\" name=\"recipeID\"><br>
		  Steps:<br>
		  <textarea rows=\"10\" cols=\"80\" name=\"steps\"></textarea><br>
		  Instructions:<br>
		  <textarea rows=\"10\" cols=\"80\" name=\"instructions\"></textarea><br>
		  Tags:<br>
		  <input type=\"text\" name=\"tag\"><br><br>
		  <input type=\"submit\" name=\"submitUpdate\" value=\"Enter\">
		  </form>";
}
if (isset($_POST['deleteRecipe'])) {
	echo "<h2>Delete Recipe</h2>";
	echo "<form method=\"post\">
	      <table><tr>
		  <th>Enter Recipe ID</th>
		  <td><input type=\"text\" name=\"tagID\"></td>
		  <td><input type=\"submit\" name=\"submitDelete\" value=\"Delete\"></td></tr>
		  </table>
		  </form>";
}
if (isset($_POST['searchRecipe'])) {
	echo "<h2>Search by Tag</h2>";
	echo "<form method=\"post\">
		  <input type=\"text\" name=\"search\">
		  <input type=\"submit\" name=\"submitSearch\" value=\"Search\"><br>
		  </form>";
}
if (isset($_POST['submitSearch'])) {
	echo "<h2>Search by Tag</h2>";
	echo "<form method=\"post\">
		  <input type=\"text\" name=\"search\">
		  <input type=\"submit\" name=\"submitSearch\" value=\"Search\"><br>
		  </form>";
	$search = $_POST['search'];
	if ($search == "") {
		echo "<p>You must enter a tag to be searched</p>";
	}
	else {
		$query = "select * from Recipes where Tags like '%" . $search . "%'";
		/*$result = mysqli_query($db,$query);
		$num_rows = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
		$num_fields = mysqli_num_fields($result);
		$keys = array_keys($row);*/
		
	}
}
if (isset($_POST['submitDelete'])) {
	$tagID = $_POST['tagID'];
	$query = "delete from Recipes where ID=" . $tagID;
	//$result = mysqli_query($db,$query);
	echo "The recipe was deleted";
}
if (isset($_POST['submitAdd'])) {
	$steps = $_POST['steps'];
	$instructions = $_POST['instructions'];
	$tag = $_POST['tag'];
	$date = date("Y-m-d");
	$query = "insert into Recipes (Steps, Instructions, Tags, Date) values ('$steps','$instructions','$tag','$date')";
	//$result = mysqli_query($db,$query);
	echo "The recipe was added";
}
if (isset($_POST['submitUpdate'])) {
	if (isset($_POST['recipeID']) && !empty($_POST['recipeID'])) {
		$id = $_POST['recipeID'];
		if (isset($_POST['steps']) && !empty($_POST['steps'])) {
			$steps = $_POST['steps'];
			$query = "update Recipe set Steps = '$steps' where ID = '$id'";
			//$result = mysqli_query($db,$query);
		}
		if (isset($_POST['instructions']) && !empty($_POST['instructions'])) {
			$instructions = $_POST['instructions'];
			$query = "update Recipe set Instructions = '$instructions' where ID = '$id'";
			//$result = mysqli_query($db,$query);
		}
		if (isset($_POST['tag']) && !empty($_POST['tag'])) {
			$tag = $_POST['tag'];
			$query = "update Recipe set Tags = '$tag' where ID = '$id'";
			//$result = mysqli_query($db,$query);
		}
		echo "The recipe was updated";
	}
	else {
		echo "You must enter a recipe ID";
	}
}
?>