<?php
	$page_tittle = 'MySQL Laboratory';
	include('includes/header.html');
?>
	<form action="dbconnection.php" method="post">
	<fieldset><legend><h4>Enter your information below</h4></legend>
	<p><label>Host: <input type="text" name="host" size="30" maxlength="40"</label></p>
	<p><label>Data base: <input type="text" name="database" size="30" maxlength="40"</label></p>
	<p><label>User db: <input type="text" name="userdb" size="30" maxlength="40"</label></p>
	<p><label>Password: <input type="text" name="password" size="30" maxlength="40"</label></p>	
	</fieldset>
	<p align="center"><input type="submit" name="submit" value="Submit button"</p>
	</form>
<?php
	include('includes/footer.html');
?>
