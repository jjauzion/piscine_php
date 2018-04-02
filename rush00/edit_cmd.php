<?PHP

include "fct_table.php";
include "user_fct.php";

session_start();
$cmd_path = "private/commands";

if (!isset($_SESSION['id']) || $_SESSION['admin'] != 1)
{
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="1;URL=accueil.php" />
</html>
<?PHP
}

$edit = 0;
$delete = 0;
if (isset($_POST['del_cmd']) && $_POST['del_cmd'] == "Delete")
	$delete = 1;
if (isset($_POST['edit_cmd']) && $_POST['edit_cmd'] == "Change")
	$edit = 1;
if (($edit == 0 && $delete == 0) || ($edit == 1 && $delete == 1))
{
	?>
	<!DOCTYPE html>
	<html>
		<meta http-equiv="refresh" content="1;URL=admin_page.php" />
	</html>
	<?PHP
	exit;
}

if ($delete == 1 && (!isset($_POST['delcmd_id']) || !is_numeric($_POST['delcmd_id'])))
{
	echo "enter a valid command id";
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="1;URL=admin_page.php" />
</html>
<?PHP
	exit;
}
else if ($delete == 1)
	$id = $_POST['delcmd_id'];

if ($edit == 1 && (!isset($_POST['editcmd_id']) || !is_numeric($_POST['editcmd_id'])))
{
	echo "enter a valid command id";
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="1;URL=admin_page.php" />
</html>
<?PHP
	exit;
}
else if ($edit == 1)
	$id = $_POST['editcmd_id'];

if ($edit == 1 && empty($_POST['new_cmd_owner']))
{
	echo "enter a valid owner name";
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="1;URL=admin_page.php" />
</html>
<?PHP
	exit;
}

$cmd_table = read_table($cmd_path);
if ($cmd_table === null || !isset($cmd_table[$id]))
{
	echo "Command $id does not exist<br />";
	?>
	<!DOCTYPE html>
	<html>
		<meta http-equiv="refresh" content="1;URL=admin_page.php" />
	</html>
	<?PHP
	exit;
}

if ($delete == 1)
{
	unset($cmd_table[$id]);
	file_put_contents($cmd_path, serialize($cmd_table));
	echo "Command deleted";
}
else if ($edit == 1)
{
	$cmd_table[$id]['login'] = $_POST['new_cmd_owner'];
	file_put_contents($cmd_path, serialize($cmd_table));
	echo "Command owner changed";
}
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="1;URL=admin_page.php" />
</html>
<?PHP
