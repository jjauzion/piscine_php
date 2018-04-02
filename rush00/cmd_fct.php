<?PHP

include_once "fct_table.php";
include_once "dream_fct.php";

session_start();

function get_cmd_list($login)
{
	$cmd_path = "private/commands";
	$cmd_table = read_table($cmd_path);
	$cmd = null;
	if ($cmd_table)
	foreach($cmd_table as $id => $item)
	{
		if ($item['login'] == $login)
			$cmd[] = $item;
	}
	return ($cmd);
}

function print_cmd($login)
{
	$cmd_path = "private/commands";
	if (file_exists($cmd_path))
	{
		if (!empty($login))
			$cmd = get_cmd_list($login);
		else
			$cmd = read_table($cmd_path);
		if ($cmd === null)
		{
			echo "Pas de commande dans l'historique";
		}
		else
		foreach ($cmd as $id => $item)
		{
			echo "Commande id: $id<br />";
			echo "Acheteur: ".$item['login']."<br />";
			echo "Montant total: ".$item['total_price']."€<br />";
			echo "Date de la commande: ".$item['date']."<br />";
			echo "Détails de la commande:<br />";
			foreach ($item['item_list']['name'] as $key => $object)
				echo "	-->".$object." : ".$item['item_list']['price'][$key]."€<br />";
			echo "<br />";
		}
	}
	else
		echo "No command found";
	echo "<br />";
}

?>
