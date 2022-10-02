<?php

$hello = function($name='') {
  	return $name;
}

echo $hello('rizky');

interface Contracts {

	public function getResult($param);
}

class toClosure
{
	public function bind($callback)
	{
		return function($param) use ($callback) {
			return $callback->getResult($param);
		};
	}
}


class TestA implements Contracts
{
    public function getResult($param)
    {
    	return $param;
    }
}

class TestB implements Contracts
{
    public function getResult($param)
    {
    	return $param;
    }
}

$closure = (new toClosure)->bind(new TestA);
$closure = (new toClosure)->bind(new TestB);

echo $closure->call(new TestA, 'Class A');
echo "\n";
echo $closure->call(new TestB, 'Class B');

public function random($length = 16)
{
	$string = '';

	while (($len = strlen($string)) < $length) {
	    $size = $length - $len;

	    $bytes = random_bytes($size);

	    $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
	}

	return $string;
}

echo random(17);

?>
