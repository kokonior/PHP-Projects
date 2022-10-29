
<?php
// Program palindrom PHP

function Palindrome($number){  

    $temp = $number;  

    $new = 0;  

    while (floor($temp)) {  

        $d = $temp % 10;  

        $new = $new * 10 + $d;  

        $temp = $temp/10;  

    }  

    if ($new == $number){  

        return 1;  

    }

    else{

        return 0;

    }
}  
 
// Driver Code

$original = 1441; 

if (Palindrome($original)){  

    echo "Ini Palindrome";  
} 

else {  

echo "Bukan Palindrome";  
}
 
?>
