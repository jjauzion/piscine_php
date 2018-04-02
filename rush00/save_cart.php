<?PHP

include "fct_table.php";

session_start();
$cart_path = "private/carts";

if (!isset($_POST['save_cart']) || ($_POST['save_cart'] != 'save' && $_POST['save_cart'] != 'new'))
{
	echo "SAVE CART ERROR\n";
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
	echo "Vous devez etre log pour enregistrer un panier\n";
?>
	<!DOCTYPE html>
	<html>
		<meta http-equiv="refresh" content="2;URL=<?php echo $_SESSION['url'] ?>" />
	</html>
<?PHP
	exit;
}

if (!isset($_SESSION['cart']))
{
	echo "Panier vide!";
?>
	<!DOCTYPE html>
	<html>
		<meta http-equiv="refresh" content="1;URL=<?php echo $_SESSION['url'] ?>" />
	</html>
<?PHP
	exit;
}

if ($_POST['save_cart'] == 'new' && (!isset($_POST['cart_name']) || !ctype_alnum($_POST['cart_name'])))
{
	echo "Merci d'indiquer un nom valider pour le panier";
?>
	<!DOCTYPE html>
	<html>
		<meta http-equiv="refresh" content="1;URL=<?php echo $_SESSION['url'] ?>" />
	</html>
<?PHP
	exit;
}

if (file_exists($cart_path) && ($_POST['save_cart'] == 'new' && ($id_list = get_id_list($_POST['cart_name'], $cart_path)) !== null))
{
	$i = -1;
	while (++$i < count($id_list))
	{
		$cart = get_data($id_list[$i], $cart_path);
		if ($cart['login'] == $_SESSION['login'])
		{
			echo "Nom de panier existant";
			?>
			<!DOCTYPE html>
			<html>
				<meta http-equiv="refresh" content="1;URL=<?php echo $_SESSION['url'] ?>" />
			</html>
			<?PHP
			exit;
		}
	}
}
else if ($_POST['save_cart'] == 'save' && !isset($_SESSION['cart_id']))
{
	echo "Vous devez créer un nouveau panier d'abords";
?>
	<!DOCTYPE html>
	<html>
		<meta http-equiv="refresh" content="1;URL=<?php echo $_SESSION['url'] ?>" />
	</html>
<?PHP
	exit;
}

if (!file_exists("private"))
	mkdir("private");
if (file_exists($cart_path))
	$cart = read_table($cart_path);
if ($_POST['save_cart'] == 'new')
{
	$_SESSION['cart']['login'] = $_SESSION['login'];
	$_SESSION['cart']['name'] = $_POST['cart_name'];
	$_SESSION['cart_id'] = count($cart); //A MODIFIER AC UNE FCT KEY CART_ID
}
$cart[$_SESSION['cart_id']] = $_SESSION['cart'];
file_put_contents($cart_path, serialize($cart));
echo "Votre panier a ete sauve. Vous pourrez le retrouver a lors de votre prochaine visite.<br />";
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="2;URL=<?php echo $_SESSION['url'] ?>" />
</html>
