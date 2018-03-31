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

if (!isset($_POST['admin']) || $_POST['admin'] != 1)
	$_POST['admin'] = 0;

$file_path = "private/passwd";
if (!file_exists($file_path))
{
	echo "ERROR\n";
	$error = 1;
}

if (isset($error) && $error = 1)
{
	?>
	<!DOCTYPE html>
	<html>
		<meta http-equiv="refresh" content="1;URL=login_page.php" />
	</html>
	<?PHP
	$error = 0;
	exit;
}

$file_data = file_get_contents($file_path);
$table = unserialize($file_data);
foreach ($table as $index => $user)
{
	if ($_POST['login'] == $user['login'])
	{
		$passwd = hash('whirlpool', $_POST['passwd']);
		if ($passwd == $user['passwd'])
		{
			session_start();
			$_SESSION['login'] = $user['login'];
			$_SESSION['id'] = $index;
			$_SESSION['admin'] = $user['admin'];
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="0;URL=welcome.php" />
</html>
<?PHP
			exit;
		}
		else
		{
			echo "Wrong password\n";
			?>
			<!DOCTYPE html>
			<html>
				<meta http-equiv="refresh" content="1;URL=login_page.php" />
			</html>
			<?PHP
			exit;
		}
	}
}
echo "Wrong login\n";
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="1;URL=login_page.php" />
</html>
