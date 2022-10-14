<?php

// CONFIG
$path = "/";
$template_folder = "templates/"


function get_template($name){
    global $path;

    $file_to_open = __DIR__.$template_folder.$name;

    $myfile = fopen($file_to_open, "r") or die("Unable to open template file!");
    $need = fread($myfile,filesize($file_to_open));
    fclose($myfile);

    $need = str_replace("<template_path>", $path, $need);
    $need = str_replace("<template_realpath", $_SERVER['REQUEST_URI'], $need);
    if(strpos($need, "<template_dynamic>") != false){
        $need = str_replace("<template_dynamic>", get_template("dynamic.html"), $need);
    }

    return $need;
}

?>
