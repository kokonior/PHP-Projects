<?php

/*
 * In the upcoming PHP 8.1 they will add Enums. Here is a simple usage of enums.
 */

enum Colors: String {
    case green = "#3be016";
    case red = "#eb4034";
}

echo Colors::red
/* the output would be the string #eb4034 */

