#!/usr/bin/env php
<?php

/**
 * SMTP & Forgot Password Testing Script
 * Run: php artisan tinker < test-smtp.php
 */

// Test Email Send
echo "\n🧪 Testing SMTP Configuration...\n";
echo "====================================\n\n";

try {
    // Import Facades
    use Illuminate\Support\Facades\Mail;
    use App\Models\User;
    
    // Get test user
    $testUser = User::first();
    
    if (!$testUser) {
        echo "❌ Error: No user found in database\n";
        echo "Please register a user first!\n\n";
        exit;
    }
    
    echo "✓ Found user: {$testUser->name} ({$testUser->email})\n\n";
    
    // Generate test OTP dan token
    $testOtp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    $testToken = \Illuminate\Support\Str::random(60);
    $resetLink = "http://localhost:8000/reset-password?token={$testToken}&email=" . urlencode($testUser->email);
    
    echo "📧 Sending test email with:\n";
    echo "   - OTP: {$testOtp}\n";
    echo "   - Token: " . substr($testToken, 0, 20) . "...\n";
    echo "   - Reset Link: {$resetLink}\n\n";
    
    // Send email
    Mail::send('emails.reset-password', [
        'user' => $testUser,
        'otp' => $testOtp,
        'resetLink' => $resetLink
    ], function ($message) use ($testUser) {
        $message->to($testUser->email)
            ->subject('Reset Password - Sleepy Panda (TEST)');
    });
    
    echo "✅ Email sent successfully!\n";
    echo "   Check your email inbox for the test message.\n\n";
    
    echo "🎯 Next steps:\n";
    echo "   1. Check email in Mailtrap dashboard\n";
    echo "   2. Copy the OTP from email\n";
    echo "   3. Click reset link or visit:\n";
    echo "      http://localhost:8000/reset-password?token={$testToken}&email=" . urlencode($testUser->email) . "\n";
    echo "   4. Enter OTP and new password\n";
    echo "   5. Login with new password\n\n";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "\n📋 Troubleshooting:\n";
    echo "   1. Check .env MAIL_* configuration\n";
    echo "   2. Verify SMTP credentials\n";
    echo "   3. Check firewall/antivirus blocking port 587\n";
    echo "   4. View logs: storage/logs/laravel.log\n\n";
}

echo "====================================\n";
echo "Test complete!\n\n";
