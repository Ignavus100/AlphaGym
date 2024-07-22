<?php
header('Content-Type: application/json');

// Email configuration
$to = 'olicass100@gmail.com'; // Replace with your email address
$subject = 'Contact Form Submission';

// Retrieve form data
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);

// Email content
$email_message = "Name: $name\n";
$email_message .= "Email: $email\n";
$email_message .= "Message:\n$message\n";

// Headers
$headers = "From: $email";

// Send email
if (mail($to, $subject, $email_message, $headers)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}

