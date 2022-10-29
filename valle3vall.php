<?php
 
$string = 'One of your posts about inequalities mentioned that when x < y and y < z then x < z.';
 
// Output: One of your posts about inequalities mentioned that when x 
echo filter_var($string, FILTER_SANITIZE_STRING);
 
// Output: One of your posts about inequalities mentioned that when x &lt; y and y &lt; z then x &lt; z.
echo htmlspecialchars($string);
 
?>
