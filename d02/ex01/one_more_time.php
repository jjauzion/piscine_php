#!/usr/bin/php
<?PHP

function ft_translate_month($month)
{
	if (preg_match("/novembre/i", $month))
		$ret = "November";
	else if (preg_match("/janvier/i", $month))
		$ret = "January";
	else if (preg_match("/f[ée]vrier/iu", $month))
		$ret = "February";
	else if (preg_match("/mars/i", $month))
		$ret = "March";
	else if (preg_match("/avril/i", $month))
		$ret = "April";
	else if (preg_match("/mai/i", $month))
		$ret = "May";
	else if (preg_match("/juin/i", $month))
		$ret = "June";
	else if (preg_match("/juillet/i", $month))
		$ret = "July";
	else if (preg_match("/ao[ûu]t/iu", $month))
		$ret = "August";
	else if (preg_match("/septembre/i", $month))
		$ret = "September";
	else if (preg_match("/octobre/i", $month))
		$ret = "October";
	else if (preg_match("/decembre/i", $month))
		$ret = "December";
	else
		$ret = FALSE;
	return $ret;
}

if ($argc <= 1)
	exit;
$str = preg_split("/ /", $argv[1], -1, PREG_SPLIT_NO_EMPTY);

$str[2] = ft_translate_month($str[2]);
if ($str[2] === FALSE)
{
	echo "Wrong Fromat\n";
	exit;
}
$time = $str[1]." ".$str[2]." ".$str[3]." ".$str[4];
if (($time = strtotime($time)) !== FALSE)
	echo "$time\n";
else
	echo "Wrong Fromat\n";

?>
