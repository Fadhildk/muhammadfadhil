<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}
.container {
    max-width: 600px;
    margin: 0 auto;
    background-color: #ffffff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}
.header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 30px;
    text-align: center;
}
.header h1 {
    margin: 0;
    font-size: 24px;
}
.content {
    padding: 30px;
    color: #333;
}
.otp-box {
    background-color: #f8f9fa;
    border: 2px dashed #667eea;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    margin: 20px 0;
}
.otp-code {
    font-size: 32px;
    font-weight: bold;
    color: #667eea;
    letter-spacing: 5px;
}
.btn {
    display: inline-block;
    padding: 12px 30px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    text-decoration: none;
    border-radius: 25px;
    margin: 20px 0;
    font-weight: 600;
}
.footer {
    background-color: #f8f9fa;
    padding: 20px;
    text-align: center;
    color: #666;
    font-size: 12px;
}
</style>
</head>
<body>
<div class="container">
<div class="header">
<h1>🐼 Sleepy Panda</h1>
<p>Reset Password Request</p>
</div>

<div class="content">
<h2>Halo, {{ $user->name }}!</h2>
<p>Kami menerima permintaan untuk reset password akun Anda. Gunakan OTP berikut untuk melanjutkan:</p>

<div class="otp-box">
<p style="margin: 0; color: #666;">Kode OTP Anda:</p>
<div class="otp-code">{{ $otp }}</div>
<p style="margin: 10px 0 0 0; font-size: 12px; color: #999;">Kode ini berlaku selama 15 menit</p>
</div>

<p>Atau klik tombol di bawah ini untuk langsung reset password:</p>

<center>
<a href="{{ $resetLink }}" class="btn">Reset Password</a>
</center>

<p style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee; color: #666; font-size: 14px;">
<strong>Catatan Keamanan:</strong><br>
• Jangan berikan kode OTP ini kepada siapapun<br>
• Jika Anda tidak meminta reset password, abaikan email ini<br>
• Link akan expired dalam 1 jam
</p>
</div>

<div class="footer">
<p>&copy; 2026 Sleepy Panda. All rights reserved.</p>
<p>Email ini dikirim otomatis, mohon tidak membalas.</p>
</div>
</div>
</body>
</html>
