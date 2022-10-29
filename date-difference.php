<?php
$date1 = new DateTime('2010-01-01');
$date2 = new DateTime('2010-01-02');
// Calculate date difference
$diff = abs(strtotime($date2) - strtotime($date1));
// Calculate years
$years = floor($diff / (365*60*60*24));
// Calculate months
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
// Calculate days
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
// Calculate hours
$hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60));
// Calculate minutes
$minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
// Calculate seconds
$seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));
// Print date difference
echo "Difference between two dates: ".$years." years, ".$months." months, ".$days." days, ".$hours." hours, ".$minutes." minutes, ".$seconds." seconds";
