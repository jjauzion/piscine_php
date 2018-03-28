#!/usr/bin/php
<?PHP

if ($argc <= 1)
	exit;
if (($file = file_get_contents($argv[1])) === FALSE)
	exit;

?>
