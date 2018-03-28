<?PHP

function ft_is_sort($tab)
{
	$tmp = $tab;
	sort($tab);

	$flag1 = true;
	foreach($tab as $key=>$value)
		if($value!=$tmp[$key])
			$flag1 = false;  
	$flag2 = true;
	$tab = array_reverse($tab);
	foreach($tab as $key=>$value)
		if($value!=$tmp[$key])
			$flag2 = false;  
	return ($flag1 || $flag2);
}

?>
