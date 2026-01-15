<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Masuk - Sleepy Panda</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<style>
.error {
    color: #ff5c5c;
    font-size: 13px;
    margin-top: 5px;
    text-align: left;
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

<div class="login-wrapper">

<div class="login-card text-center">

<!-- ICON -->
<div class="mb-3">
<img src="{{ asset('image/logo.png') }}" width="90" alt="Sleepy Panda Logo">
</div>

<h5 class="fw-bold">Masuk menggunakan akun yang<br>sudah kamu daftarkan</h5>

<!-- Error Messages -->
@if ($errors->has('login'))
<div class="alert alert-danger text-center py-2 mb-3 mt-3">
{{ $errors->first('login') }}
</div>
@endif

@if (session('success'))
<div class="alert alert-success text-center py-2 mb-3 mt-3">
{{ session('success') }}
</div>
@endif

<!-- FORM -->
<form class="mt-4" method="POST" action="/login" id="formLogin">
@csrf

<div class="form-group mb-3">
<input type="email" id="email" name="email" class="form-control input-custom" placeholder="Email" value="{{ old('email') }}" required>
<div id="emailError" class="error"></div>
</div>

<div class="form-group mb-2">
<div class="password-container">
<input type="password" id="password" name="password" class="form-control input-custom password-input" placeholder="Password (min. 8 karakter)" required>
<button type="button" class="password-toggle" id="togglePassword" onclick="togglePasswordVisibility('password', 'togglePassword')">
👁️
</button>
</div>
<div id="passwordError" class="error"></div>
</div>

<div class="text-end mb-3">
<a href="/forgot-password" class="forgot-link">Lupa password?</a>
</div>

<button type="submit" id="btnMasuk" class="btn btn-login w-100">
Masuk
</button>

<p class="mt-3 small-text">
Belum memiliki akun? 
<a href="/register">Daftar sekarang</a>
</p>

</form>

</div>

</div>

<script>
const email = document.getElementById("email");
const password = document.getElementById("password");
const btn = document.getElementById("btnMasuk");

const emailError = document.getElementById("emailError");
const passwordError = document.getElementById("passwordError");

function validate() {
    let valid = true;

    // Validasi 1: Email tidak boleh kosong
    if (email.value === "") {
        emailError.innerText = "Email tidak boleh kosong";
        valid = false;
    }
    // Validasi 2: Email harus format valid dan domain tidak boleh @ganteng.com
    else if (!email.value.includes("@") || email.value.toLowerCase().endsWith("@ganteng.com")) {
        emailError.innerText = "username/password incorrect";
        valid = false;
    }
    else {
        emailError.innerText = "";
    }

    // Validasi 3: Password tidak boleh kosong
    if (password.value === "") {
        passwordError.innerText = "Password tidak boleh kosong";
        valid = false;
    }
    // Validasi 3: Password harus lebih dari 8 karakter
    else if (password.value.length < 8) {
        passwordError.innerText = "Password harus lebih dari 8 karakter";
        valid = false;
    }
    else {
        passwordError.innerText = "";
    }

    btn.disabled = !valid;
}

email.addEventListener("keyup", validate);
password.addEventListener("keyup", validate);

// Initial validation
validate();

// Toggle password visibility
function togglePasswordVisibility(fieldId, buttonId) {
    const field = document.getElementById(fieldId);
    const button = document.getElementById(buttonId);
    
    if (field.type === 'password') {
        field.type = 'text';
        button.textContent = '👁️‍🗨️';
    } else {
        field.type = 'password';
        button.textContent = '👁️';
    }
}
</script>

</body>
</html>
</div>

</body>
</html>
