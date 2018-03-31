<?PHP

function user_exist($login, $table)
{
	foreach ($table as $index => $user)
	{
		if ($login == $user['login'])
			return ($index);
	}
	return (-1);
}

?>
