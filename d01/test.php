#!/usr/bin/php
<?PHP

include("ex08/ft_is_sort.php");
$tab = array("a","c","a");
if (ft_is_sort($tab))
	echo "Le tableau est trie\n";
else
	echo "Le tableau n’est pas trie\n";

?>
