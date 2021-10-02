// Caesar Cipher Implementation

function Caesarcipher($ch, $key)
{
	if (!ctype_alpha($ch))
		return $ch;

	$offset = ord(ctype_upper($ch) ? 'A' : 'a');
	return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
}

function Encipher($input, $key)
{
	$output = "";

	$inputArr = str_split($input);
	foreach ($inputArr as $ch)
		$output .= Caesarcipher($ch, $key);

	return $output;
}

function Decipher($input, $key)
{
	return Encipher($input, 26 - $key);
}
