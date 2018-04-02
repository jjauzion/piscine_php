<?PHP

include "fct_table.php";
include "dream_fct.php";

session_start();

$error = 0;
if (!isset($_POST['item_id']) || !is_numeric($_POST['item_id']))
	$error = 1;

if (isset($error) && $error == 1)
{
	echo "ERROR\n";
	$error = 0;
	?>
	<!DOCTYPE html>
	<html>
		<meta http-equiv="refresh" content="0;URL=<?php echo $_SESSION['url'] ?>" />
	</html>
	<?PHP
	exit;
}

if (isset($_SESSION['cart']))
{
	$cart = $_SESSION['cart'];
	foreach ($cart['item_list'] as $key => $item)
	{
		if ($_POST['item_id'] == $item)
		{
			$dream = get_dream($item);
			$cart['total_price'] -= $dream['price'];
			$cart['nb_item']--;
			unset($cart['item_list'][$key]);
			$_SESSION['cart'] = $cart;
			echo "Retirer du panier :(<br />";
			?>
			<!DOCTYPE html>
			<html>
				<meta http-equiv="refresh" content="0;URL=<?php echo $_SESSION['url'] ?>" />
			</html>
			<?PHP
			exit;
		}
	}
}
echo "Objet non trouve dans le panier...<br />";
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="0;URL=<?php echo $_SESSION['url'] ?>" />
</html>
