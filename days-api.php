<?php 

$days = [
  'Monday',
  'Tuesday',
  'Wednesday',
  'Thursday',
  'Friday',
  'Saturday',
  'Sunday'
];

header('Content-Type: application/json');
echo json_encode([
  'status'  => 200,
  'message' => 'OK',
  'data'    => $days
]);