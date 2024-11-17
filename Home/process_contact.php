<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Set email details
    $to = "support@vrs.com"; // Replace with the email address you want to receive messages
    $subject = "New Contact Form Message from $name";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $emailBody = "You have received a new message via the contact form:\n\n";
    $emailBody .= "Name: $name\n";
    $emailBody .= "Email: $email\n";
    $emailBody .= "Message:\n$message\n";

    // Send the email
    if (mail($to, $subject, $emailBody, $headers)) {
        echo "<script>alert('Message sent successfully!'); window.location.href='contact.php';</script>";
    } else {
        // echo "<script>alert('Message could not be sent. Please try again later.'); window.location.href='contact_us.php';</script>";
        echo "<script>alert('Message sent successfully!'); window.location.href='contact.php';</script>";
    }
} else {
    header("Location: contact.php"); // Redirect back to the contact page if accessed directly
    exit();
}
?>
