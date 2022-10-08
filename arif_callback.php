<?php
  
// PHP program to illustrate working
// of a Static class method callback
  
// Sample class
class GFG {
  
    // Function used to print a string
    static function someFunction() {
        echo "Parent Arif \n";
    }
}
  
class Article extends GFG {
  
    // Function to print a string
    static function someFunction() {
        echo "Arif Article \n";
    }   
}
  
// Static class method callback
call_user_func(array('Article', 'someFunction'));
  
call_user_func('Article::someFunction');
  
// Relative Static class method callback
call_user_func(array('Article', 'parent::someFunction'));
?>