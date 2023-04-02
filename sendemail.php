<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  // Validate the form data
  if (empty($name) || empty($email) || empty($message)) {
    echo "Please fill in all the fields.";
    exit;
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Please enter a valid email address.";
    exit;
  }

  // Send the email
  $to = "m.salmankhaliq7@gmail.com";
  $subject = "New message from your website";
  $body = "Name: $name\nEmail: $email\nMessage: $message";
  $headers = "From: $email";

  if (mail($to, $subject, $body, $headers)) {
    echo "Thank you for your message.";
  } else {
    echo "There was a problem sending your message. Please try again later.";
  }
}
?>
