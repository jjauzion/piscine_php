<?PHP

session_start();
if (isset($_SESSION['id']))
{
	echo "log out first";
	?>
	<!DOCTYPE html>
	<html>
		<meta http-equiv="refresh" content="1;URL=welcome.php" />
	</html>
	<?PHP
	exit;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Hello</title>
	</head>
	<body>
		<form method="post" action="login.php">
			<label>Login<label/> : <input type="text" name="login" /><br />
			<label>Password<label/> : <input type="password" name="passwd" /><br />
			<input type="submit" name="submit" value="OK" /><br />
		</form>
		<a href="welcome.php">home</a>
	</body>
</html>

