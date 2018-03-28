#!/usr/bin/php
<?PHP

if ($argc != 2)
{
	echo "Incorrect Parameters\n";
	exit;
}
$tab = preg_split('/([+]|\*|\%|\/)/m', $argv[1], -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

if (count($tab) == 1)
{
	$tab = preg_split('/( *- *)/', $argv[1], -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
	$count = count($tab);
	$i = -1;
	while (++$i < $count)
		$tab[$i] = trim($tab[$i]);
	$i = -1;
	$v1 = FALSE;
	while ($i < $count && !is_numeric($tab[$i]))
		$i++;
	if ($i > 1)
	{
		echo "Syntax Error\n";
		exit;
	}
	else
	{
		$sign = 1;
		if ($i > 0 && $tab[$i-1] == "-")
			$sign = -1;
		$v1 = $tab[$i] * $sign;
	}
	$i++;
	if ($tab[$i] != '-')
	{
		echo "Syntax Error\n";
		exit;
	}
	$i++;
	if ($tab[$i] == '-')
	{
		if ($i + 2 != $count || !is_numeric($tab[$i+1]))
		{
			echo "Syntax Error\n";
			exit;
		}
		$i++;
		$v2 = $tab[$i] * -1;
	}
	else if (is_numeric($tab[$i]) && $i + 1 == $count)
	{
		$v2 = $tab[$i];
	}
	else
	{
		echo "Syntax Error\n";
		exit;
	}
	$opp = "-";
}
else
{
	$v1 = trim($tab[0]);
	$opp = trim($tab[1]);
	$v2 = trim($tab[2]);
	if (count($tab) != 3 || !is_numeric($v1) || !is_numeric($v2))
	{
		echo "Syntax Error\n";
		exit;
	}
}

if ($opp == "+")
	echo $v1 + $v2."\n";
else if ($opp == "-")
	echo $v1 - $v2."\n";
else if ($opp == "*")
	echo $v1 * $v2."\n";
else if ($opp == "/")
{
	if ($v2 == 0)
	{
		echo "Divsion par 0 interdite\n";
		exit;
	}
	echo $v1 / $v2."\n";
}
else if ($opp == "%")
{
	if ($v2 == 0)
	{
		echo "Divsion par 0 interdite\n";
		exit;
	}
	echo $v1 % $v2."\n";
}

?>
