<?php
 
if($_POST) {
    $visitor_name = "";
    $visitor_email = "";
    $email_title = "";
    $concerned_department = "";
    $visitor_message = "";
     
    if(isset($_POST['visitor_name'])) {
      $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    }
     
    if(isset($_POST['email_title'])) {
        $email_title = filter_var($_POST['email_title'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['concerned_department'])) {
        $concerned_department = filter_var($_POST['concerned_department'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
    }
     
    if($concerned_department == "billing") {
        $recipient = "billing@domain.com";
    }
    else if($concerned_department == "marketing") {
        $recipient = "marketing@domain.com";
    }
    else if($concerned_department == "technical support") {
        $recipient = "tech.support@domain.com";
    }
    else {
        $recipient = "contact@domain.com";
    }
     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
     
    if(mail($recipient, $email_title, $visitor_message, $headers)) {
        echo "<p>Thank you for contacting us, $visitor_name. You will get a reply within 24 hours.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }
     
} else {
    echo '<p>Something went wrong</p>';
}
 
?>
