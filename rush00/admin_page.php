<?PHP

include "fct_table.php";
include "user_fct.php";

session_start();

/*check admin cookie */
if (isset($_SESSION['id']) && isset($_POST['passadmin']) && ($_POST['passadmin'] == "koala"))
{
	$_SESSION['admin'] = 1;
	unset($_POST['passadmin']);
}

/* if not already autentify, ask password */
if (isset($_SESSION['admin']) === FALSE || ($_SESSION['admin'] != 1))
{
?>
<!DOCTYPE html>
<html>
	<form method="post" action="admin_page.php">
		<label>Admin password</label> : <input type="password" name="passadmin" />
		<input type="submit" name="submit" value="OK">
	</form>
	<a href="welcome.php">home page</a>
</html>
<?PHP
	exit;
}

/* if admin identify, show admin page */
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
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Admin Page</title>
	</head>
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
			<label>Reset User Password<label/> : <input type="text" name="resetpass" />
			<input type="submit" name="reset_submit" value="OK" /><br />
		</form>
	<a href="welcome.php">home page</a>
	</body>
</html>
