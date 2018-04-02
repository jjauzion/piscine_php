<?PHP

include "fct_table.php";

session_start();

if (!isset($_POST['submit']) || $_POST['submit'] != "OK")
{
	echo "LOAD CART ERROR\n";
?>
	<!DOCTYPE html>
	<html>
		<meta http-equiv="refresh" content="1;URL=<?php echo $_SESSION['url'] ?>" />
	</html>
<?PHP
	exit;
}

if (!isset($_SESSION['id']))
{
	echo "Vous devez etre log pour charger un panier\n";
?>
	<!DOCTYPE html>
	<html>
		<meta http-equiv="refresh" content="2;URL=<?php echo $_SESSION['url'] ?>" />
	</html>
<?PHP
	exit;
}

if ((!isset($_POST['cart_id']) || !is_numeric($_POST['cart_id'])) && (!isset($_POST['cart_name']) || !ctype_alnum($_POST['cart_name'])))
{
	echo "Le numéro ou le nom du panier doit être définit\n";
?>
	<!DOCTYPE html>
	<html>
		<meta http-equiv="refresh" content="1;URL=<?php echo $_SESSION['url'] ?>" />
	</html>
<?PHP
	exit;
}

$cart_path = "private/carts";
if (!isset($_POST['cart_id']) || !is_numeric($_POST['cart_id']))
{
	$id_list = get_id_list($_POST['cart_name'], $cart_path);
	$_POST['cart_id'] = -1;
	$i = -1;
	while (++$i < count($id_list))
	{
		$cart = get_data($id_list[$i], $cart_path);
		if ($cart['login'] == $_SESSION['login'])
		{
			$_POST['cart_id'] = $id_list[$i];
			break;
		}
	}
}
if (($cart = get_data($_POST['cart_id'], $cart_path)) === null || $cart['login'] != $_SESSION['login'])
{
	echo "Panier introuvable :/";
?>
	<!DOCTYPE html>
	<html>
		<meta http-equiv="refresh" content="1;URL=<?php echo $_SESSION['url'] ?>" />
	</html>
<?PHP
	exit;
}

$_SESSION['cart'] = $cart;
$_SESSION['cart_id'] = $_POST['cart_id'];
echo "Panier chargee !<br />";
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="1;URL=<?php echo $_SESSION['url'] ?>" />
</html>
