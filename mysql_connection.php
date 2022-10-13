<?php
$db = new mysqli('localhost', 'YOUR_USERNAME', 'YOUR_PASSWORD', 'YOUR_DATABASE');
$query = $db->query("SELECT * FROM yourlife WHERE name = 'yourname';");
$fetch = $query->fetch_assoc();
print_r($fetch);
?>
