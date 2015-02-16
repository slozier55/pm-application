<?php
include ('includes/head.php');
?> 
	<h1>Add WhenEver Item</h1>

</p>
<form name="test" method="post" action="index.php?id=<?php echo $user_id ?>">
My New Whenever: <INPUT TYPE="text" size ="75" NAME="title" value=""><br /><br />
Description? <INPUT TYPE="text" size ="75" NAME="description" value=""><br />
<INPUT TYPE="hidden" NAME="done" value="NO"><br />	
	<input type="hidden" name="user_id" value="<?php echo $user_id ?>"><br />
<INPUT TYPE="submit" name="submit2" value="Submit">
</form>
	 
    <!-- footer area -->
<?php
include ("includes/footer.php");
?>