<?php  
//declare an array of string  
$number = array ("One", "Two", "Three", "Stop", "Four");  
foreach ($number as $element) {  
if ($element == "Stop") {  
break;  
}  
echo "$element </br>";  
}  
?>  
