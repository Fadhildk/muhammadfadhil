<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reset Password - Sleepy Panda</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<style>
.error {
    color: #ff5c5c;
    font-size: 13px;
    margin-top: 5px;
    text-align: left;
}

.success {
    color: #4caf50;
    font-size: 13px;
    margin-top: 5px;
}

.password-container {
    position: relative;
    display: flex;
    align-items: center;
}

.password-toggle {
    position: absolute;
    right: 15px;
    background: none;
    border: none;
    cursor: pointer;
    color: #999;
    font-size: 18px;
    padding: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 30px;
    height: 30px;
    transition: color 0.2s ease;
}

.password-toggle:hover {
    color: #667eea;
}

.password-input {
    padding-right: 45px !important;
}
</style>

</head>
<body>

<div class="login-card">

<div class="logo">
<img src="{{ asset('image/logo.png') }}" alt="logo">
<h4>Reset Password</h4>
<p class="tagline">Buat password baru untuk akun Anda</p>
</div>

@if ($errors->any())
<div class="alert alert-danger text-center py-2 mb-3">
@foreach ($errors->all() as $error)
{{ $error }}
@endforeach
</div>
@endif

<form method="POST" action="{{ route('password.update') }}" id="formReset">
@csrf

<input type="hidden" name="token" value="{{ $token }}">
<input type="hidden" name="email" value="{{ $email }}">

<div class="mb-3">
<input type="text" id="otp" name="otp" class="form-control" placeholder="Masukkan OTP (6 digit)" required maxlength="6" inputmode="numeric">
<div id="otpError" class="error"></div>
</div>

<div class="mb-3">
<div class="password-container">
<input type="password" id="password" name="password" class="form-control password-input" placeholder="Password Baru (min. 8 karakter)" required>
<button type="button" class="password-toggle" onclick="togglePasswordVisibility('password', this)">
👁️
</button>
</div>
<div id="passwordError" class="error"></div>
</div>

<div class="mb-3">
<div class="password-container">
<input type="password" id="password_confirmation" name="password_confirmation" class="form-control password-input" placeholder="Konfirmasi Password" required>
<button type="button" class="password-toggle" onclick="togglePasswordVisibility('password_confirmation', this)">
👁️
</button>
</div>
</div>

<button type="submit" id="btnReset" class="btn btn-login w-100" disabled>
Reset Password
</button>
</form>

<div class="text-center mt-3">
<span style="color: rgba(255, 255, 255, 0.7); font-size: 14px;">Ingat password? </span>
<a href="/login" class="forgot">Kembali ke Login</a>
</div>

</div>

<script>
const otp = document.getElementById("otp");
const password = document.getElementById("password");
const passwordConfirm = document.getElementById("password_confirmation");
const btn = document.getElementById("btnReset");

const otpError = document.getElementById("otpError");
const passwordError = document.getElementById("passwordError");

function validate() {
    let valid = true;

    // Validasi OTP
    if (otp.value === "") {
        otpError.innerText = "OTP tidak boleh kosong";
        valid = false;
    }
    else if (otp.value.length !== 6 || isNaN(otp.value)) {
        otpError.innerText = "OTP harus 6 digit angka";
        valid = false;
    }
    else {
        otpError.innerText = "";
    }

    // Validasi Password
    if (password.value === "") {
        passwordError.innerText = "Password tidak boleh kosong";
        valid = false;
    }
    else if (password.value.length < 8) {
        passwordError.innerText = "Password harus lebih dari 8 karakter";
        valid = false;
    }
    else if (password.value !== passwordConfirm.value) {
        passwordError.innerText = "Password tidak cocok";
        valid = false;
    }
    else {
        passwordError.innerText = "";
    }

    btn.disabled = !valid;
}

otp.addEventListener("keyup", validate);
password.addEventListener("keyup", validate);
passwordConfirm.addEventListener("keyup", validate);

// Toggle password visibility
function togglePasswordVisibility(fieldId, button) {
    const field = document.getElementById(fieldId);
    
    if (field.type === 'password') {
        field.type = 'text';
        button.textContent = '👁️‍🗨️';
    } else {
        field.type = 'password';
        button.textContent = '👁️';
    }
}

// Initial validation
validate();
</script>

</body>
</html>
