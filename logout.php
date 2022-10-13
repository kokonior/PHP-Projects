<?php
   session_start();
   session_destroy(); 
   echo '<h1>Anda sudah logout. إلى اللقاء ...</h1>';
   header('Refresh: 1; URL = daftar.php');
?>
