<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lupa Password - Sleepy Panda</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<style>
.error {
    color: #ff5c5c;
    font-size: 13px;
    margin-top: 5px;
}
.success {
    color: #4caf50;
    font-size: 13px;
    margin-top: 5px;
}
</style>

</head>
<body>

<div class="login-card">

<div class="logo">
<img src="{{ asset('image/logo.png') }}" alt="logo">
<h4>Lupa Password</h4>
<p class="tagline">Masukkan email Anda untuk reset password</p>
</div>

@if (session('success'))
<div class="alert alert-success text-center py-2 mb-3">
{{ session('success') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger text-center py-2 mb-3">
@foreach ($errors->all() as $error)
{{ $error }}
@endforeach
</div>
@endif

<form method="POST" action="{{ route('password.email') }}" id="formForgot">
@csrf

<div class="mb-3">
<input type="email" id="email" name="email" class="form-control" placeholder="Email" required value="{{ old('email') }}">
<div id="emailError" class="error"></div>
</div>

<button type="submit" id="btnSubmit" class="btn btn-login w-100">
Kirim Link Reset Password
</button>
</form>

<div class="text-center mt-3">
<span style="color: rgba(255, 255, 255, 0.7); font-size: 14px;">Sudah ingat password? </span>
<a href="/login" class="forgot">Kembali ke Login</a>
</div>

</div>

<script>
const email = document.getElementById("email");
const emailError = document.getElementById("emailError");
const btn = document.getElementById("btnSubmit");

function validate() {
    let valid = true;

    // Email tidak boleh kosong
    if (email.value === "") {
        emailError.innerText = "Email tidak boleh kosong";
        valid = false;
    }
    // Validasi format email
    else if (!email.value.includes("@") || !email.value.includes(".")) {
        emailError.innerText = "Email Anda Salah";
        valid = false;
    }
    else {
        emailError.innerText = "";
    }

    btn.disabled = !valid;
}

email.addEventListener("keyup", validate);

// Initial validation
validate();
</script>

</body>
</html>
