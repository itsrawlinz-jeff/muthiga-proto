<?php
// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Define the email recipient
$to = "info@muthigaacademy.co.ke";

// Define the email subject
$subject = "New Admission Request from Website";

// Define the email body
$message = "Name: $name\n";
$message .= "Email: $email\n";
$message .= "Phone: $phone\n";

// Define the email headers
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Send the email
$result = mail($to, $subject, $message, $headers);

// Check the result and log any errors
if ($result) {
    echo "Email sent successfully!";
} else {
    $error_message = error_get_last()['message'];
    echo "Email failed to send. Error: $error_message";
    
    // Log the error to a file
    $log_file = 'email_errors.log';
    $log_entry = date('Y-m-d H:i:s') . " - Email failed to send: $error_message\n";
    error_log($log_entry, 3, $log_file);
}
?>