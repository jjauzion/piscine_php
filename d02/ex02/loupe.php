#!/usr/bin/php
<?PHP

function handle_lvl2($matches)
{
	return strtoupper($matches[0]);
}

function handle_lvl1($matches)
{
	$str = preg_replace_callback('/(?<=title=").*"|(?<=>).*(?=<)/sUi', "handle_lvl2", $matches[0]);
	return $str;
}

if ($argc <= 1)
	exit;
if (($str = file_get_contents($argv[1])) === FALSE)
	exit;
$str = preg_replace_callback('/(?<=<a href).*(?=\/a>)/sUi', "handle_lvl1", $str);
echo "$str";
?>
