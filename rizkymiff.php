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
?>
