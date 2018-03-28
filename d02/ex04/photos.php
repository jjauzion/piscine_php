#!/usr/bin/php
<?PHP

if ($argc <= 1)
	exit;

preg_match('/(https{0,1}:\/\/)(.*)/', $argv[1], $matches);
$dir_name = $matches[2];
if (!is_dir($dir_name))
	mkdir ($dir_name);

$c = curl_init($argv[1]);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_BINARYTRANSFER, true);
$str = curl_exec($c);
curl_close($c);
preg_match('/(?<=<img).*(?<=src=")(.*)(?=").*(?=>)/Usi', $str, $matches);
echo "------------DEBUT__________________\n";
print_r($matches[1]);
echo "\n------------FIN__________________\n";

/*image abs ou relative */
if (preg_match('/^\//', $matches[1]))
	$img_url = $argv[1].$matches[1];

$c = curl_init($img_url);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_BINARYTRANSFER, true);
$str = curl_exec($c);
curl_close($c);
$file_name = preg_split('/\//', $matches[1], -1, PREG_SPLIT_NO_EMPTY);
$file_name = $file_name[count($file_name) - 1];
echo "file name = $dir_name/$file_name\n";
if(file_exists($dir_name."/".$file_name)){
	unlink($dir_name."/".$file_name);
}
$fp = fopen($dir_name."/".$file_name, 'x');
fwrite($fp, $str);
fclose($fp);


?>
