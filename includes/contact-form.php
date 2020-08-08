<?php


header("Access-Control-Allow-Origin: *");

header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Methods: POST");

header("Access-Control-Max-Age: 3600");

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

date_default_timezone_set("Africa/Lagos");

$mail_host = "info@lasvegasconcordservice.com";
$mail_title = "[LASVEGAS CONCORD SERVICE] Contact Form Message";


$name = "";
$email_from = "";
$message = "";
$phone = "";
$mail_body = "";

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $mail_body = "<h3>Name: " . $name . "</h3>";
}


if (isset($_POST['email'])) {
    $email_from = $_POST['email'];
    $mail_body .= "<h3>Email: " . $email_from . "</h3>";
}

if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
    $mail_body .= "<h3>Phone Number: </h3><p>" . $phone . "</p>";
}

if (isset($_POST['message'])) {
    $message = nl2br($_POST['message']);
    $mail_body .= "<h3>Message: </h3><p>" . $message . "</p>";
}


if( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']) ){
       
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
 

    $love = mail('info@lasvegasconcordservice.com', $mail_title, $mail_body, $headers);
    if( $love ) {
        $serialized_data = '{"type":1, "message":"Contact form successfully submitted. Thank you,"}';
        echo $serialized_data;
    } else {
        $serialized_data = '{"type":0, "message":"Contact form failed. Please send again later!"}';
        echo $serialized_data;
    }
};

?>