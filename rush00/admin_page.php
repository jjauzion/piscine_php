<?PHP

include_once "fct_table.php";
include_once "user_fct.php";
include_once "cmd_fct.php";

session_start();
$_SESSION['url'] = "admin_page.php";

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="admin_page.css" />
		<title>Admin</title>
	</head>
	<body>
	<header>
		<div id="container">
			<div id="titre">Admin Page</div>
		</div>
		</header>
<hr>
</html>
<?PHP
/*check admin cookie */
if (isset($_SESSION['id']) && isset($_POST['passadmin']) && ($_POST['passadmin'] == "koala"))
{
	$_SESSION['admin'] = 1;
	unset($_POST['passadmin']);
}

/* if no user logged in, ask log in first */
if (!isset($_SESSION['id']))
	echo "Log in first";

/* if not already autentify, ask password */
if (isset($_SESSION['id']) && (isset($_SESSION['admin']) === FALSE || ($_SESSION['admin'] != 1)))
{
?>
<!DOCTYPE html>
<html>
	<form method="post" action="admin_page.php">
		<label>Admin password</label> : <input type="password" name="passadmin" />
		<input type="submit" name="submit" value="OK">
	</form>
</html>
<?PHP
}

/* if admin identify, show admin page */
if (isset($_SESSION['id']) && $_SESSION['admin'] == 1)
{
	$table_path = "private/passwd";
	if (isset($_POST['del_login']) && isset($_POST['del_submit']) && $_POST['del_submit'] == "OK")
	{
		$user_table = read_table($table_path);
		if (($id = user_exist($_POST['del_login'], $user_table)) >= 0)
		{
			unset($user_table[$id]);
			file_put_contents($table_path, serialize($user_table));
			$user_deleted = 1;
		}
		else
			$user_deleted = -1;
		$_POST['del_submit'] == "KO";
	}
	else
		$user_deleted = 0;
	?>
	<html>
		<body>
			<form method="post" action="admin_page.php">
				<label>Delete User<label/> : <input type="text" name="del_login" />
				<input type="submit" name="del_submit" value="OK" />
				<span>
	<?PHP
	if ($user_deleted == 1)
		echo "User deleted !";
	else if ($user_deleted == -1)
		echo "Error!";
	?>
				</span><br />
			</form>
			<form method="post" action="reset_passwd.php">
				<label>Reset User Password<label/> : <input type="text" name="reset_login" />
				<input type="submit" name="reset_submit" value="OK" /><br />
			</form>
			<p>
			<form action="manage_dream.php">
				<input type="submit" value="Manage dream" /><br />
			</form>
			</p>
			<form method="post" action="admin_page.php">
				<label>Print command list<label/> : <input type="text" name="cmd_login" placeholder="leave empty to print all"/>
				<input type="submit" name="print_cmd_submit" value="OK" /><br />
			</form>
	<?PHP
	if ($_POST['print_cmd_submit'] == "OK")
	{
		echo "<p>";
		print_cmd($_POST['cmd_login']);
		echo "</p>";
		unset($_POST['print_cmd_submit']);
	}
	?>
			<form method="post" action="edit_cmd.php">
				<label>Delete command<label/> : <input type="text" name="delcmd_id" placeholder="Command id here"/>
				<input type="submit" name="del_cmd" value="Delete" /><br />
				<label>Edit command owner<label/> : <input type="text" name="editcmd_id" placeholder="Command id here"/><input type="text" name="new_cmd_owner" placeholder="New owner name here"/>
				<input type="submit" name="edit_cmd" value="Change" /><br />
			</form>
		</body>
	</html>
<?PHP
}
?>
<html>
<hr>
<footer>
	<div id="home"><a href="accueil.php"><img src="resources/home.png" title="home"></a></div>
	<div id="logout"><a href="logout.php"><img src="resources/logout.jpeg" title="logout"></a></div>
</footer>
</html>
