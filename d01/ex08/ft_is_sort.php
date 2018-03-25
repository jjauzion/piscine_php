<?PHP

function ft_is_sort($tab)
{
	$tmp = $tab;
	sort($tab);

	$flag = true;
	foreach($tab as $key=>$value)
		if($value!=$tmp[$key])
			$flag = false;  
	return ($flag);
}

?>
