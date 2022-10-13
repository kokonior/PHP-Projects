<html>
<head>
<title>Program Barang</title>

</head>

<body>


<form action="" method="POST">
      <input type="text" name="barang"><br>
     <input type="submit" value="kirim">
</form>
     <?php
     if (isset($_POST['barang'])){
$barang = $_POST['barang'];
switch ($barang){
 case 1:
  echo 'Alat Olahraga';
  break;
 case 2:
  echo 'Alat Elektronik';
  break;
 case 3:
  echo 'Alat Masak';
  break;
 default:
 echo 'Anda salah memasukkan code';
 break;
}
     }
?>
</body>
</html>
