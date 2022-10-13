<!DOCTYPE html>
<html>

<head>
    <title>Nilai</title>
</head>

<body>
    <?php
    echo "<form method=POST action=ifelse_dinamis.php>
            Please input your value (10-100) : <input type=text name='nilai'>
            <input type=submit name='hitung' value=Count>
          </form>";

          if(isset($_POST['hitung']))
          {
              if ($_POST['nilai'] >= 90){
                echo "Nilai $_POST[nilai] Very Excelent";
              }
              elseif ($_POST['nilai'] >= 80) {
                echo "Nilai $_POST[nilai] Excelent";
              }
              elseif ($_POST['nilai'] >= 65) {
                echo "Nilai $_POST[nilai] Good";
              }
              elseif ($_POST['nilai'] >= 50) {
                echo "Nilai $_POST[nilai] Bad";
              }
              else {
                echo "Nilai $_POST[nilai] Very Bad";
              }
          }
    ?>

</body>

</html>
