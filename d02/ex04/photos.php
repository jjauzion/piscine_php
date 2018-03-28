#!/usr/bin/php
<?PHP

$c = curl_init("http://www.42.fr");
$str = curl_exec($c);

preg_match('/(?<=<img).*(?<=src=")(.*)(?=").*(?=>)/', $str, $matches);

print_r($matches[1]);

?>
