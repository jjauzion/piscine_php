#!/usr/bin/php
<?PHP

$c = curl_init("http://www.42.fr");
$str = curl_exec($c);
curl_close($c);

preg_match('/DOCTYPE/Usi', $str, $matches);

echo "------------\nFIN\n__________________\n";
echo "$str\n";
print_r($matches);

?>
