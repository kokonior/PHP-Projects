<?php
header('Content-type: text/javascript');

$json = [
    'hacktoberfest' => true,
    'name' => "Ahmad Abu Hasan",
    'github' => "github.com/eby8zevin",
    'message' => "Create simple API using PHP"
];

echo json_encode($json, JSON_PRETTY_PRINT);
?>
