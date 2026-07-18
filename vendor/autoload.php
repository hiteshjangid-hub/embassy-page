<?php
/**
 * Custom autoloader for PHPMailer (without Composer)
 * This file mimics the vendor/autoload.php behavior
 */

spl_autoload_register(function ($class) {
    // PHPMailer namespace prefix
    $prefix = 'PHPMailer\\PHPMailer\\';
    $len = strlen($prefix);

    // Check if the class uses the PHPMailer namespace
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    // Get the relative class name
    $relativeClass = substr($class, $len);

    // Build the file path
    $file = __DIR__ . '/phpmailer/phpmailer/src/' . $relativeClass . '.php';

    // If the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});
