#!/usr/bin/php
<?PHP

date_default_timezone_set('Europe/Paris');

if (($fd = fopen('/var/run/utmpx', 'r')) === FALSE)
	exit;
$i = 0;
$tab = array();
while (!feof($fd))
{
	$line = fread($fd, 628);
	if (feof($fd))
		continue;
	$tab = unpack("a256user/a4id/a32line/i1pid/i1type/I2entry_time/a256hostsize/I16blabla", $line);
	if ($tab['type'] == 7)
	{
		$log[$i] = $tab['user']." ".$tab['line']."  ".date("M j H:i", $tab['entry_time1']);
		$i++;
	}
}
fclose($fd);
sort($log);
foreach ($log as $val)
	echo "$val\n";	

?>
