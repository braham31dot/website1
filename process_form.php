<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);

  $to = "b.brahamsboutique@gmail.com"; // Your email address
  $subject = "Contact Form Submission";
  $body = "Name: ". $name. "\nEmail: ". $email. "\nMessage: ". $message;
  $headers = "From: ". $email. "\r\n";  // Important: Add \r\n for proper headers
  $headers.= "Reply-To: ". $email. "\r\n"; // Add Reply-To header


  // More robust error handling (optional, but recommended)
  if (mail($to, $subject, $body, $headers)) {
    echo "Thank you for your message!";
  } else {
    $error = error_get_last(); // Get the last error
    echo "Sorry, there was an error sending your message.  Please try again later. (Error: ". $error['message']. ")"; // Display a more informative error message (for debugging)
    // Log the error (for production)
    error_log("Mail sending failed: ". $error['message']);
  }
}?>