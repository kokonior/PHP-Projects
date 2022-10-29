<html>
  <head>
    <title>Random Profile Generator</title>
  </head>
  <body>
   <?php
      $firstname = ['John','Jane','Jean','Xiao','Agus','Durandal','Mamang', 'Kiana', 'Kevin', 'Riski'];
      $lastname = ['Doe', 'Kyle', 'Sieghart','Kaslana','Kevin','Ling','Garox', 'Sultan','Nue','Shadow'];
      $country = ['Arab','Indonesia','USA','Brasil','Rusia','Siberia','Alaska','Atlantic', 'Mariana Trench','Mount Everest'];
      $gender = ['Male','Female'];

      $fn_key = array_rand($firstname);
      $ln_key = array_rand($lastname);
      $c_key = array_rand($country);
      $g_key = array_rand($gender);
      
      // Display the random array element
      echo 'My Name is '.$firstname[$fn_key].' '.$lastname[$ln_key].'<br/>';
      echo 'I am '.$gender[$g_key].'<br/>';
      echo 'I Live at '.$country[$c_key].'<br/>';

    ?>
  </body>
</html>