<?php

require 'vendor/autoload.php';

use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Extractors\NDJSON;
use Rubix\ML\Classifiers\KNearestNeighbors;
use Rubix\ML\CrossValidation\Metrics\Accuracy;
use Rubix\ML\Persisters\Filesystem;
use Rubix\ML\PersistentModel;

$file = readline('Nama File : ');
$jadi = readline('File Jadi : ');

$data = file_get_contents($file.'.csv');

$array = explode("\r\n", $data);

$text = "";

for($j = 1; $j < count($array) - 1; $j++) {
  $line = explode(';', $array[$j]);
  $newtext = "[";

  for($i = 1; $i < count($line); $i++) {
    $newtext .= $line[$i].",";
  }

  $newtext .= "]\n";

  $text .= $newtext;
}

$replace = str_replace([
  ",]",
  "BAIK",
  "KURANG"
],

[
  "]",
  "\"BAIK\"",
  "\"KURANG\""
],

$text);


$files = fopen('trained/'.$jadi.'.ndjson', 'w');
fwrite($files, $replace);
fclose($files);

$dataset = Labeled::fromIterator(new NDJSON('trained/'.$jadi.'.ndjson'));
$estimator = new PersistentModel(new KNearestNeighbors(3), new Filesystem('trained/'.$jadi.'.rbx'));

$estimator->train($dataset);

$estimator->save();

unlink($file.'.csv');

?>