<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register - Sleepy Panda</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<style>
.error {
    color: #ff5c5c;
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
<h4>Sleepy Panda</h4>
<p class="tagline">Buat akun untuk memulai analisa tidur mu</p>
</div>

<form method="POST" action="/register" id="formRegister">
@csrf

<div class="mb-3">
<input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required>
@error('name') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
<input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
<div id="emailError" class="error"></div>
@error('email') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
<div class="password-container">
<input type="password" id="password" name="password" class="form-control password-input" placeholder="Password (min. 8 karakter)" required>
<button type="button" class="password-toggle" onclick="togglePasswordVisibility('password', this)">
👁️
</button>
</div>
<div id="passError" class="error"></div>
@error('password') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
<div class="password-container">
<input type="password" id="password_confirmation" name="password_confirmation" class="form-control password-input" placeholder="Konfirmasi Password" required>
<button type="button" class="password-toggle" onclick="togglePasswordVisibility('password_confirmation', this)">
👁️
</button>
</div>
@error('password_confirmation') <div class="error">{{ $message }}</div> @enderror
</div>

<button type="submit" id="btnDaftar" class="btn btn-login w-100" disabled>
Daftar
</button>
</form>

<div class="text-center mt-3">
<span style="color: rgba(255, 255, 255, 0.7); font-size: 14px;">Sudah punya akun? </span>
<a href="/login" class="forgot">Masuk</a>
</div>

</div>

<script>
const email = document.getElementById("email");
const password = document.getElementById("password");
const btn = document.getElementById("btnDaftar");

const emailError = document.getElementById("emailError");
const passError = document.getElementById("passError");

function validate(){

let valid = true;

/* 1. Email tidak boleh kosong */
if(email.value === ""){
emailError.innerText = "Username tidak boleh kosong";
valid = false;
}
else{

/* 2. Validasi domain */
if(!email.value.includes("@") || email.value.endsWith("@ganteng.com")){
emailError.innerText = "username/password incorrect";
valid = false;
}
else{
emailError.innerText = "";
}
}

/* 3. Password */
if(password.value === ""){
passError.innerText = "Password tidak boleh kosong";
valid = false;
}
else if(password.value.length < 8){
passError.innerText = "Password harus lebih dari 8 karakter";
valid = false;
}
else{
passError.innerText = "";
}

btn.disabled = !valid;
}

email.addEventListener("keyup", validate);
password.addEventListener("keyup", validate);

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
</script>

</body>
</html>
