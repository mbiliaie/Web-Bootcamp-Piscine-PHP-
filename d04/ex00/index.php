<?php
session_start();
if ($_GET['submit']) {
	if ($_GET['submit'] == "OK" && $_GET['login'] && $_GET['passwd'] ) {
		$_SESSION['login'] = $_GET["login"];
		$_SESSION['passwd'] = $_GET["passwd"];
	}
}
?>
<html><body>
<form>
	Username:
		<input name="login" value="<?php echo $_SESSION['login']; ?>"/>
		<br />
	Password:
		<input name="passwd" value="<?php echo $_SESSION['passwd']; ?>"/>
		<br />
		<input type="submit" name="submit" value="OK"/>
</form>
</body></html>