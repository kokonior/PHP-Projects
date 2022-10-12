<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//cdn.muicss.com/mui-0.10.3/css/mui.min.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-0.10.3/js/mui.min.js"></script>
    <title>Send Mail</title>
    <style>
        *{
            overflow: hidden;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    
    <div class="mui-container-fluid" style="margin:300px auto; width: 400px; height: 600px; ">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="mui-form">
            <legend>Send Mail</legend>
            <div class="mui-textfield mui-textfield--float-label">
              <input type="text" name="subject" required>
              <label>Subject</label>
            </div>
            <div class="mui-textfield mui-textfield--float-label">
              <input type="email" name="email" required>
              <label>Receiptient Email Address</label>
            </div>
            <div class="mui-textfield mui-textfield--float-label">
              <textarea name="body" required></textarea>
              <label>Email Body</label>
            </div>
            <button type="submit" class="mui-btn mui-btn--raised mui-btn--primary">Send</button>
          </form>
        
    </div>

</body>
</html>

<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $subject= test_input($_POST["subject"]);
  $to = test_input($_POST["email"]);
  $message = test_input($_POST["body"]);
  mail($to, $subject, $message);
}


?>
