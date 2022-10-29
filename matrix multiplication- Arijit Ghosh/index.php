<?php
$a00=0; $a01=0; $a02=0; $a10=0; $a11=0; $a12=0; $a20=0; $a21=0; $a22=0; $b00=0; $b01=0; $b02=0; $b10=0; $b11=0; $b12=0; $b20=0; $b21=0; $b22=0; $c00=0; $c01=0; $c02=0; $c10=0; $c11=0; $c12=0; $c20=0; $c21=0; $c22=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
  $a00=$_POST['a00'];
  $a01=$_POST['a01'];
  $a02=$_POST['a02'];
  $a10=$_POST['a10'];
  $a11=$_POST['a11'];
  $a12=$_POST['a12'];
  $a20=$_POST['a20'];
  $a21=$_POST['a21'];
  $a22=$_POST['a22'];
  $b00=$_POST['b00'];
  $b01=$_POST['b01'];
  $b02=$_POST['b02'];
  $b10=$_POST['b10'];
  $b11=$_POST['b11'];
  $b12=$_POST['b12'];
  $b20=$_POST['b20'];
  $b21=$_POST['b21'];
  $b22=$_POST['b22'];


  $c00=$a00*$b00+$a01*$b10+$a02*$b20;
  $c01=$a00*$b01+$a01*$b11+$a02*$b21;
  $c02=$a00*$b02+$a01*$b12+$a02*$b22;

  $c10=$a10*$b00+$a11*$b10+$a12*$b20;
  $c11=$a10*$b01+$a11*$b11+$a12*$b21;
  $c12=$a10*$b02+$a11*$b12+$a12*$b22;
  
  $c20=$a20*$b00+$a21*$b10+$a22*$b20;
  $c21=$a20*$b01+$a21*$b11+$a22*$b21;
  $c22=$a20*$b02+$a21*$b12+$a22*$b22;
}
  // echo $c00. $c01. $c02.'\n'.$c10. $c11. $c12.'\n'.$c20. $c21. $c22.'\n';


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/index.2c4c117b.css">
    <title>Matrix Multiplication with php</title>
</head>
<body>
    <nav>
        <ul class="flex space-x-4 bg-yellow-200 text-black p-4 font-semibold">
            <li><a href="">Home</a></li>
            <li><a href="">Clear Screen</a></li>
            <li><a href="https://github.com/Rancho2002">Contact</a></li>
        </ul>
    </nav>
    <div>
        <h1 class="text-center text-3xl mt-8 font-sans text-blue-800 font-bold" >
            Click on the <span class="bg-gray-200 p-3 border-2 rounded-md font-medium cursor-pointer">X</span> button below to multiply(X) two transpose matrix(3x3)
        </h1>
    </div>
    <form action="/index.php" method="POST">
    <div class="flex justify-center items-center my-20 flex-col md:flex-row">
        <div class="left">
            <div class="r1">
            <input type="number" name="a00" id="a00" class="inp " value=<?php echo $a00 ?> required>
            <input type="number" name="a01" id="a01" class="inp " value=<?php echo $a01 ?> required>
            <input type="number" name="a02" id="a02" class="inp " value=<?php echo $a02 ?> required>
            </div>
            <div class="r2">
            <input type="number" name="a10" id="a10" class="inp " value=<?php echo $a10 ?> required>
            <input type="number" name="a11" id="a11" class="inp " value=<?php echo $a11 ?> required>
            <input type="number" name="a12" id="a12" class="inp " value=<?php echo $a12 ?> required>
            </div>
            <div class="r3">
            <input type="number" name="a20" id="a20" class="inp " value=<?php echo $a20 ?> required>
            <input type="number" name="a21" id="a21" class="inp " value=<?php echo $a21 ?> required>
            <input type="number" name="a22" id="a22" class="inp " value=<?php echo $a22 ?> required>
            </div>
        </div>
        <div class="middle">
            <button class="text-blue-700 h-44 p-3 text-9xl bg-gray-300 mx-4 rounded-lg my-2">X</button>
        </div>
        <div class="right">
            <div class="r1">
            <input type="number" name="b00" id="b00" class="inp " value=<?php echo $b00 ?> required>
            <input type="number" name="b01" id="b01" class="inp " value=<?php echo $b01 ?> required>
            <input type="number" name="b02" id="b02" class="inp " value=<?php echo $b02 ?> required>
            </div>
            <div class="r2">
            <input type="number" name="b10" id="b10" class="inp " value=<?php echo $b10 ?> required>
            <input type="number" name="b11" id="b11" class="inp " value=<?php echo $b11 ?> required>
            <input type="number" name="b12" id="b12" class="inp " value=<?php echo $b12 ?> required>
            </div>
            <div class="r3">
            <input type="number" name="b20" id="b20" class="inp " value=<?php echo $b20 ?> required>
            <input type="number" name="b21" id="b21" class="inp " value=<?php echo $b21 ?> required>
            <input type="number" name="b22" id="b22" class="inp " value=<?php echo $b22 ?> required>
            </div>
        </div>
    </div>
    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){    
    echo '<div class="flex justify-center">
            <div class="answer">
                <div class="right -mt-12">
                    <div class="r1">
                    <p name="c00" id="c00" class="inp inline-block">'.$c00.'</p>
                    <p name="c01" id="c01" class="inp inline-block">'.$c01.'</p>
                    <p name="c02" id="c02" class="inp inline-block">'.$c02.'</p>
                    </div>
                    <div class="r2">
                    <p name="c10" id="c10" class="inp inline-block">'.$c10.'</p>
                    <p name="c11" id="c11" class="inp inline-block">'.$c11.'</p>
                    <p name="c12" id="c12" class="inp inline-block">'.$c12.'</p>
                    </div>
                    <div class="r3">
                    <p name="c20" id="c20" class="inp inline-block">'.$c20.'</p>
                    <p name="c21" id="c21" class="inp inline-block">'.$c21.'</p>
                    <p name="c22" id="c22" class="inp inline-block">'.$c22.'</p>
                    </div>
                </div>
            </div>
        </div>';
    }
    ?>
    </form>
</body>
</html>
