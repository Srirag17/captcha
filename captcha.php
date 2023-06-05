<?php
session_start();

// Generate a random captcha code
$captchaCode = generateCaptchaCode(6); // Change the length as per your requirement

// Save the captcha code in the session for validation later
$_SESSION['captcha_code'] = $captchaCode;

// Generate and output the captcha image
$fontFile = 'path/to/your/font.ttf'; // Replace with the path to your font file
$fontSize = 24; // Adjust the font size as needed

// Create a blank image with the desired dimensions
$captchaImage = imagecreatetruecolor(200, 60); // Adjust the dimensions as needed

// Set the background and text colors
$backgroundColor = imagecolorallocate($captchaImage, 255, 255, 255); // White
$textColor = imagecolorallocate($captchaImage, 0, 0, 0); // Black

// Fill the image with the background color
imagefilledrectangle($captchaImage, 0, 0, 200, 60, $backgroundColor);

// Add random lines to the image for noise
for ($i = 0; $i < 10; $i++) {
    $lineColor = imagecolorallocate($captchaImage, rand(0, 255), rand(0, 255), rand(0, 255));
    imageline($captchaImage, rand(0, 200), rand(0, 60), rand(0, 200), rand(0, 60), $lineColor);
}

// Add the captcha code to the image
imagettftext($captchaImage, $fontSize, 0, 40, 40, $textColor, $fontFile, $captchaCode);

// Set the image content type and output the image
header('Content-type: image/png');
imagepng($captchaImage);
imagedestroy($captchaImage);

// Function to generate a random alphanumeric captcha code
function generateCaptchaCode($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';
    $maxIndex = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, $maxIndex)];
    }
    return $code;
}
?>
