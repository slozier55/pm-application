<?php
include ('includes/head.php');
?> 
	<h1>Add a Note</h1>

</p>
<form name="test" method="post" action="index.php">
My New Note: <INPUT TYPE="text" size ="100" NAME="detail" value=""><br />
	<input type="hidden" name="user_id" value="<?php echo $user_id ?>"><br />
<INPUT TYPE="submit" name="submit3" value="submit">
</form>
	 
    <!-- footer area -->
<?php
include ("includes/footer.php");
?>