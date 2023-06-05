<?php
session_start();

// Get the user-entered captcha code from $_POST data
$userCaptcha = $_POST['captcha'];

// Retrieve the captcha code stored in the session
$captchaCode = $_SESSION['captcha_code'];

// Check if the user-entered captcha matches the stored captcha
if ($userCaptcha === $captchaCode) {
    // Captcha is valid
    // Process the form submission and perform any necessary actions
    // ...
    // ...
    // Clear the captcha code from the session
    unset($_SESSION['captcha_code']);
    // Redirect or display a success message
    header('Location: success.php');
    exit();
} else {
    // Captcha is invalid
    // Handle the invalid captcha, e.g., display an error message
    // ...
    // ...
    // Redirect back to the contact form page or display an error message
    header('Location: contact.php?error=captcha');
    exit();
}
?>
