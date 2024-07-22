<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "E:\GitHub\AlphaGym\PHPMailer-6.9.1\composer.json"; // Make sure this path is correct

header('Content-Type: application/json');

// Email configuration
$to = 'olicass100@gmail.com'; // Replace with your email address
$subject = 'Contact Form Submission';

// Retrieve form data
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

// Check if all fields are filled
if (empty($name) || empty($email) || empty($message)) {
    echo json_encode(['success' => false, 'error' => 'All fields are required.']);
    exit;
}

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Set mailer to use SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'olicass100@gmail.com'; // Replace with your SMTP username
    $mail->Password = ''; // Replace with your SMTP password
    $mail->SMTPSecure = 'tls'; // Use 'tls' or 'ssl' as required by your SMTP server
    $mail->Port = 587; // Use 587 for TLS, 465 for SSL

    // Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress($to);

    // Content
    $mail->isHTML(false); // Set email format to plain text
    $mail->Subject = $subject;
    $mail->Body    = "Name: $name\nEmail: $email\nMessage:\n$message";

    $mail->send();
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo]);
}
?>
