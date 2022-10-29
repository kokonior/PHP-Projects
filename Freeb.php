<?php
$cars = array("Volvo", "BMW", "Toyota");
echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";

$total = 1000;

$client = new DeathByCaptcha_HttpClient($username_dbc, $password_dbc);
$client = new DeathByCaptcha_HttpClient($username_dbc, $password_dbc);
$data = array(
    'googlekey' => 'asdgasjgdashjgdjkasgdashjk',
    'pageurl' => 'https://www.pointbllank.id/member/signup'
);
$json = json_encode($data);
$extra = [
    'type' => 4,
    'token_params' => $json,
];
?>