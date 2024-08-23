<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input fields
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Redirect back with error (you can handle errors similarly if needed)
        header("Location: mail.html?status=error");
        exit;
    }

    // Recipient email address
    $to = "florafuze@gmail.com    "; // Replace with your email address

    // Email subject
    $email_subject = "Contact Form: $subject";

    // Email body content
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n\n";
    $email_body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $name <$email>";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Redirect back to the mail.html with a success message
        header("Location: mail.html?status=success");
    } else {
        // Redirect back with an error message
        header("Location: mail.html?status=error");
    }
}
?>
