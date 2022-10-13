<?php
    #function - a block of code that can be repeatedly called

    /*
    How to format functions
    1. Camel Case myFunction()
    2.Lower case with underscore my_function()
    3. Pascal Cae - MyFunction() usally used with classes
    */
    function simpleFunction(){
        echo 'Hello Rizal';

    }
    //Run the function like so
    simpleFunction();

    //function with param
    function sayHello($name = " you out there!"){
        echo "<br>and<br> Hello $name<br>";
    }
    sayHello('Rizal');
    sayHello();

    //Reurn Value
    function addNumbers($num1, $num2){
        return $num1 + $num2;
     }
     echo addNumbers(2,3);

     // By Reference

     $myNum = 10;

     function addFive($num){
         $num += 5;
     }

     function addTen(&$num) {
         $num += 10;
     }

     addFive($myNum);
     echo "<br>Value: $myNum<br>";

     addTen($myNum);
     echo "Value: $myNum<br>";


?>
