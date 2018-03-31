<?PHP
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Welcome</title>
	</head>
	<body>

		<?PHP 
			if (isset($_SESSION['login']))
	   		{
				echo "Bonjour ".$_SESSION['login']."!<br />";
			}
		?>
		<a href="login_page.php">Log in</a><br />
		<a href="create_user.html">New User</a><br />
		<a href="admin_page.php">Admin page</a><br />
		<a href="logout.php">Log out</a><br />
	</body>
</html>

