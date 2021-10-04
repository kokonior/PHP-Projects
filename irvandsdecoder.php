<html>
    <head>
        <title>Base64 DECODER</title>
    </head>

    <body>
        <form action="" method="POST">
        <h3>Simple Base64 Decoder Based on Php</h3>
            <input type="text" name="base64" placeholder="Input Base64 Here">
            <input type="submit" name="decode" value="DECODE!">
        </form>
    </body>
</html>
<!-- open source program @Hacktoberfest -->
<?php
if (isset($_POST["decode"])) {
    $base64 = $_POST['base64'];
    $text = base64_decode($base64);
    echo "Result : ".$text;

}
?>
