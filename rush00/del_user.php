<?PHP

include "fct_table.php";
include "user_fct.php";

session_start();

$table_path = "private/passwd";
if (isset($_SESSION['login']))
{
	$user_table = read_table($table_path);
	if (($id = user_exist($_SESSION['login'], $user_table)) >= 0)
	{
		unset($user_table[$id]);
		file_put_contents($table_path, serialize($user_table));
		echo "Compte supprimer<br />";
	}
}
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="1;URL=logout.php" />
</html>
