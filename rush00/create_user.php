<?PHP

if (!isset($_POST['submit']) || $_POST['submit'] != "OK")
{
	echo "ERROR\n";
	$error = 1;
}

if (!isset($_POST['login']) || $_POST['login'] == "")
{
	echo "ERROR\n";
	$error = 1;
}

if (!isset($_POST['passwd']) || $_POST['passwd'] == "")
{
	echo "ERROR\n";
	$error = 1;
}

if (isset($error) && $error = 1)
{
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="1;URL=create_user.html" />
</html>
<?PHP
	$error = 0;
	exit;
}

if (!isset($_POST['admin']) || $_POST['admin'] != 1)
	$_POST['admin'] = 0;

if (!file_exists("private"))
	mkdir("private");

$file_path = "private/passwd";
if (file_exists($file_path))
{
	$file_data = file_get_contents($file_path);
	$table = unserialize($file_data);
	foreach ($table as $user)
	{
		if ($_POST['login'] == $user['login'])
		{
			echo "ERROR: user already exist<br />";
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="1;URL=create_user.html" />
</html>
<?PHP
			exit;
		}
	}
}
$user_data['login'] = $_POST['login'];
$user_data['passwd'] = hash('whirlpool', $_POST['passwd']);
$user_data['admin'] = $_POST['admin'];
$table[] = $user_data;
file_put_contents($file_path, serialize($table));
echo "User created<br />";
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="1;URL=welcome.php" />
</html>
<?PHP
