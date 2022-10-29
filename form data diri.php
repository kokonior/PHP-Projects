<!DOCTYPE HTML>
<html>
<head>
</head>
<body>

<?php
// define variables and set to empty values
$nama kamu = $e-mail kamu = $jenis kelamin kamu = $komentar kamu = $website kamu = $TTL kamu = $hobi kamu = $pekerjaan kamu =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$nama kamu = test_input($_POST["name"]);
$e-mail kamu = test_input($_POST["email"]);
$website kamu = test_input($_POST["website"]);
$komentar kamu = test_input($_POST["comment"]);
$TTL kamu = test_input($_POST["comment"]);
$hobi kamu = test_input($_POST["comment"]);
$pekerjaan kamu = test_input($_POST["comment"]);
$jenis kelamin kamu = test_input($_POST["gender"]);
}

function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>
