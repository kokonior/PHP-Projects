<!-- Write a PHP script to calculate and display average temperature, five lowest and highest temperatures.
Recorded temperatures : 78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73
Expected Output :
Average Temperature is : 70.6 
List of seven lowest temperatures : 60, 62, 63, 63, 64, 
List of seven highest temperatures : 76, 78, 79, 81, 85, -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $RecordedTemperatures = "78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76,
                             63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 
                             62, 65, 64, 68, 73, 75, 79, 73";
    $temperatures = explode(",", $RecordedTemperatures);
    $length_array = count($temperatures);
    $total_temperature = 0;
    foreach($temperatures as $temp){
        $total_temperature += $temp;
    }

    $average_temperature = $total_temperature / $length_array;
    echo "Average Temperature is : $average_temperature <br>";


    sort($temperatures);
    echo "List of seven lowest temperatures: ";
    for($i=0; $i<7; $i++){
        echo "$temperatures[$i] , ";
    }


    echo "<br>List of seven highest temperatures :";
    for($i=($length_array-7); $i <= ($length_array); $i++){
        echo "$temperatures[$i] , ";
    }


    ?>
</body>
</html>
