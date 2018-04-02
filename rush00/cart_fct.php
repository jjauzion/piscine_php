<?PHP

include_once "fct_table.php";
include_once "dream_fct.php";

session_start();

function print_cart($cart)
{
	if (!isset($cart))
		exit;
	if (isset($cart['name']))
		$name = $cart['name'];
	else
		$name = "Panier non enregistré";
	echo $cart['nb_item']." objet dans le panier '".$name."'<br />";
	foreach ($cart['item_list'] as $id)
	{
		if (($dream = get_dream($id)) === null)
			exit;
		echo $dream['name'].": ".$dream['price']."€<br />";
	}
	echo "Prix total : ".$cart['total_price']."€";
	echo "<br />";
}

?>
