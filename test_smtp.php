<?php

echo "=== SMTP CONNECTION TEST ===\n\n";

// Test 1: fsockopen to Mailtrap
$host = 'live.smtp.mailtrap.io';
$port = 587;

echo "Test 1: Can reach Mailtrap port 587?\n";
echo "Connecting to: $host:$port\n";

$conn = @fsockopen($host, $port, $errno, $errstr, 5);
if ($conn) {
    echo "✅ SUCCESS: Connected to Mailtrap!\n";
    fclose($conn);
} else {
    echo "❌ FAILED: Cannot connect\n";
    echo "Error: $errstr ($errno)\n";
}

echo "\n---\n\n";

// Test 2: Check if mail functions enabled
echo "Test 2: PHP Mail Functions\n";
if (function_exists('mail')) {
    echo "✅ mail() function available\n";
} else {
    echo "❌ mail() function NOT available\n";
}

if (function_exists('fsockopen')) {
    echo "✅ fsockopen() function available\n";
} else {
    echo "❌ fsockopen() function NOT available\n";
}

echo "\n---\n\n";

// Test 3: Check Laravel .env
echo "Test 3: Laravel Config Check\n";
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';

$config = app('config');
echo "MAIL_MAILER: " . $config->get('mail.mailer') . "\n";
echo "MAIL_HOST: " . $config->get('mail.host') . "\n";
echo "MAIL_PORT: " . $config->get('mail.port') . "\n";
echo "MAIL_USERNAME: " . (str_repeat('*', strlen($config->get('mail.username')))) . "\n";
echo "MAIL_ENCRYPTION: " . $config->get('mail.encryption') . "\n";
echo "MAIL_FROM: " . $config->get('mail.from.address') . "\n";

echo "\n✅ All checks complete!\n";
