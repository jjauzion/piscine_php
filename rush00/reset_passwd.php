<?PHP

include "fct_table.php";
include "user_fct.php";

session_start();

if (!isset($_SESSION['id']) || $_SESSION['admin'] != 1)
{
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="1;URL=accueil.php" />
</html>
<?PHP
}

if (!isset($_POST['reset_submit']) || $_POST['reset_submit'] != "OK" || !isset($_POST['reset_login']))
{
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="1;URL=admin_page.php" />
</html>
<?PHP
}

$table_path = "private/passwd";
if (isset($_SESSION['id']) && $_SESSION['admin'] == 1)
{
	$user_table = read_table($table_path);
	if (($id = user_exist($_POST['reset_login'], $user_table)) >= 0)
	{
		$user_table[$id]['passwd'] = hash('whirlpool', "start0");
		file_put_contents($table_path, serialize($user_table));
		echo "Nouveau mdp : start0<br />";
	}
	else
		echo "User name does not exist<br />";
	?>
	<!DOCTYPE html>
	<html>
		<meta http-equiv="refresh" content="1;URL=admin_page.php" />
	</html>
	<?PHP
	exit;
}
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="1;URL=accueil.php" />
</html>
