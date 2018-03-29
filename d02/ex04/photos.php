#!/usr/bin/php
<?PHP

if ($argc <= 1)
	exit;

/* get html source code of target URL */
if (($c = curl_init($argv[1])) === FALSE)
{
	echo "Connexion error\n";
	exit;
}
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_BINARYTRANSFER, true);
$str = curl_exec($c);
curl_close($c);
if (empty($str))
{
	echo "empty HTML ... :(\n";
	exit;
}

/* Remove last \ if present */
if (preg_match('/\/$/', $argv[1]))
	$argv[1] = substr($argv[1], 0, -1);

/* Create output directories */
preg_match('/(?=www.)(.+)|(?<=https:\/\/)(.+)|(?<=http:\/\/)(.+)/', $argv[1], $matches);
$dir_name = preg_replace('/\//', '_', $matches[0]);
if (!is_dir($dir_name))
{
	if (!mkdir ($dir_name))
		exit;
}
if (empty($dir_name))
{
	echo "directory name error\n";
	exit;
}

/* Add \ at the end of URL */
$argv[1] = $argv[1]."/";
$dir_name = $dir_name."/";

/* Find IMG in HTLM source code */
preg_match_all('/(?<=<img).*(?<=src=")(.*)(?=").*(?=>)/Usi', $str, $matches);

foreach($matches[1] as $key => $img)
{
	if (empty ($img))
		continue;
	/* Replace white space with %20 */
	$img = preg_replace('/ +/', '%20', $img);

	/* image abs or relative? */
	if (preg_match('/^www|^http/', $img))
		$img_url = $img;
	else if (preg_match('/^\/\//', $img))
		$img_url = "https:".$img;
	else if (preg_match('/^\//', $img))
	{
		$tmp = preg_split('/\/{1}/', substr($argv[1], 0, -1));
		if ($tmp[0] == "https:" || $tmp[0] == "http:")
			$img_url = $tmp[0]."//".$tmp[2].$img;
		else
			$img_url = "https://".$tmp[0].$img;
	}
	else if (preg_match('/^\//', $img))
		$img_url = substr($argv[1], 0, -1).$img;
	else
		$img_url = $argv[1].$img;

	/* get raw image */
	if (($c = curl_init($img_url)) !== FALSE)
	{
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_BINARYTRANSFER, true);
		$raw_img = curl_exec($c);
		curl_close($c);
	}

	/* write image with the correct file name */
	$file_name = preg_split('/\//', $img, -1, PREG_SPLIT_NO_EMPTY);
	$file_name = $file_name[count($file_name) - 1];
	if(file_exists($dir_name.$file_name))
		unlink($dir_name.$file_name);
	$fp = fopen($dir_name.$file_name, 'x');
	fwrite($fp, $raw_img);
	fclose($fp);
}


?>
