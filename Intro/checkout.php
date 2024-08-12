<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $product = htmlspecialchars(trim($_POST['product']));
    $price = htmlspecialchars(trim($_POST['price']));
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $address = htmlspecialchars(trim($_POST['address']));

    // Email details
    $to = 'florafuze@gmail.com'; // Replace with your email address
    $subject = 'New Order from Glass FloraFuze Creations';
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Email content
    $email_content = "<html><body>";
    $email_content .= "<h2>New Order Details</h2>";
    $email_content .= "<p><strong>Product:</strong> {$product}</p>";
    $email_content .= "<p><strong>Price:</strong> {$price}</p>";
    $email_content .= "<p><strong>Name:</strong> {$name}</p>";
    $email_content .= "<p><strong>Email:</strong> {$email}</p>";
    $email_content .= "<p><strong>Address:</strong><br>{$address}</p>";
    $email_content .= "</body></html>";

    // Send email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Thank you for your order. We will process it soon.";
    } else {
        echo "Sorry, there was an error processing your order. Please try again later.";
    }
}
?>
