// Juggling PHP Apabila seorang developer menggunakan loose comparison maka sandi yang menghasilkan magic hash dapat
dimasuki menggunakan sandi lain yang menghasilkan magic hash. <?php

var_dump(0 == '0');           # true
var_dump('false' == '0');     # true PHP 5.0 / false PHP 7.0
var_dump('0' == '0e123'); # true PHP 5.0 / false PHP 7.0
var_dump('100'     == '1e2');                # true PHP 5.0 / false PHP 7.0
var_dump('5' == '5 apel');

?>
