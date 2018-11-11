<?php $title = 'Change Later'; include("UserPageTop.php");?>
<?php list($width, $height) = getimagesize("test.png");?>
<hr>
<div id="Title">Test</div>
<div id="User">User</div>
<!--
	this is not the real code for the page, the connection between php and the sql database is boring-->

<!--Design:
	User Name
	Join Date
	Picture|Bio
	Contributed recipes-->

	<div id="User">Name Name</div>
	<div>Join Date: 12/21/2018</div>
	<div id="User">Bio:</div><br>
	<!--Reference the bio column from the user table-->
	<!-- <div><img src="test.png" align="left" /></div> -->
	<div.overflow-wrap id="User" style="margin-left: 10px">This is a test biography. Later Biographies will be pulled dirsctly from the database.</div><br>
	<div id="User" style="margin-left: 10px">Contribued Recipes:</div>
	<div id="Par">
		<p style="margin-left: 15px;margin-top: 10px">Item 1<br>Item 2<br>Item 3<br></p><!--Replace with php script that generates links based on HAVING UserID=User.UserID-->
	</div>

<article>
<br style="clear: both" />
</article>

<?php include("UserPageBottom.php");?>