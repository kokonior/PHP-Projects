<?php

class Person
{
    const AUTHOR = "Muhammad Arief";
    var string $name;
    var ?string $address = null; //nullable
    var string $country = "Indonesia";

    public function __construct(string $name, ?string $address)
    {
        $this->name = $name;
        $this->address = $address;
    }

    function sayHello(?string $name)
    {
        if (is_null($name)) {
            echo "Hi, my name is {$this->name}" . PHP_EOL;
        } else {
            echo "Hello $name, my name is {$this->name}" . PHP_EOL;
        }
    }

    function info()
    {
        echo "Author : " . self::AUTHOR . PHP_EOL;
    }

    public function __destruct()
    {
        echo "Object Person $this->name is Destroyed" . PHP_EOL;
    }
}

$arief = new Person("Nanda", "Jakarta");
$arief->name = "Arief";
$arief->sayHello("Eko");
