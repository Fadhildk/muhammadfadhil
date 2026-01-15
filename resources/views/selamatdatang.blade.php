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
    z-index: 10;
}

.password-toggle:hover {
    color: #667eea;
}

.password-input {
    padding-right: 45px !important;
}

.forgot-link {
    color: #009688;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
}

.forgot-link:hover {
    color: #00796b;
    text-decoration: underline;
}

/* MODAL STYLING - POPUP SETENGAH LAYAR */
.modal-backdrop.show {
    opacity: 0.5 !important;
}

#forgotPasswordModal {
    pointer-events: none;
}

#forgotPasswordModal.show {
    pointer-events: auto;
}

#forgotPasswordModal .modal-dialog {
    position: fixed;
    margin: 0;
    width: 100%;
    max-width: 450px;
    height: auto;
    bottom: 0;
    left: 50%;
    transform: translate(-50%, 100%);
    transition: transform 0.3s ease-out;
    z-index: 1055;
    pointer-events: auto;
}

#forgotPasswordModal.show .modal-dialog {
    transform: translate(-50%, 0);
}

#forgotPasswordModal .modal-content {
    background: rgba(44, 47, 82, 0.98) !important;
    backdrop-filter: blur(10px);
    border-radius: 30px 30px 0 0 !important;
    border: none !important;
    padding: 25px 30px 40px 30px;
    max-height: 70vh;
    overflow-y: auto;
    pointer-events: auto;
}

.handle-bar {
    width: 50px;
    height: 5px;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 10px;
    margin: 0 auto 30px auto;
}

#forgotPasswordModal .modal-title {
    color: white !important;
    font-weight: 700;
    font-size: 20px;
    text-align: center;
    margin-bottom: 12px;
}

#forgotPasswordModal .modal-body p {
    color: rgba(255, 255, 255, 0.7);
    font-size: 13px;
    text-align: center;
    line-height: 1.6;
    margin-bottom: 30px;
}

/* Input Email - SUPER FORCE */
#forgotPasswordModal .form-control {
    background: rgba(255, 255, 255, 0.1) !important;
    border: 1px solid rgba(255, 255, 255, 0.2) !important;
    border-radius: 12px !important;
    color: #ffffff !important;
    padding: 14px 15px 14px 45px !important;
    font-size: 14px !important;
    width: 100% !important;
    height: auto !important;
    box-shadow: none !important;
    pointer-events: auto !important;
    cursor: text !important;
    z-index: 9999 !important;
    position: relative !important;
}

#forgotPasswordModal .form-control::placeholder {
    color: rgba(255, 255, 255, 0.5) !important;
}

#forgotPasswordModal .form-control:focus {
    background: rgba(255, 255, 255, 0.15) !important;
    border-color: rgba(61, 220, 151, 0.5) !important;
    outline: none !important;
    box-shadow: none !important;
}

#forgotPasswordModal .input-group {
    position: relative;
    margin-bottom: 20px;
}

#forgotPasswordModal .input-group-text {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    background: transparent !important;
    border: none !important;
    color: rgba(255, 255, 255, 0.6) !important;
    font-size: 16px;
    z-index: 10000;
    pointer-events: none !important;
}

/* Button Reset Password */
#forgotPasswordModal .btn-primary {
    background: #3ddc97 !important;
    color: #1a1b2e !important;
    font-weight: 700;
    padding: 16px !important;
    border-radius: 12px !important;
    border: none !important;
    font-size: 15px;
    width: 100%;
    transition: all 0.3s ease;
    box-shadow: 0 4px 20px rgba(61, 220, 151, 0.3);
    cursor: pointer;
}

#forgotPasswordModal .btn-primary:hover {
    background: #2ec77f !important;
    transform: translateY(-2px);
    box-shadow: 0 6px 25px rgba(61, 220, 151, 0.5);
}

/* Responsive */
@media (max-width: 576px) {
    #forgotPasswordModal .modal-dialog {
        max-width: 90%;
    }
    
    #forgotPasswordModal .modal-content {
        padding: 20px 25px 35px 25px;
    }
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
<button type="button" class="btn p-0 forgot-link" style="border:none; background:none;" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">
    Lupa password?
</button>
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

<!-- MODAL LUPA PASSWORD -->
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="handle-bar"></div>
                
                <h5 class="modal-title" id="forgotPasswordModalLabel">Lupa password?</h5>
                <p>
                    Instruksi untuk melakukan reset password akan dikirim melalui email yang kamu gunakan untuk mendaftar.
                </p>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-text">✉️</span>
                        <input 
                            type="email" 
                            name="email" 
                            class="form-control"
                            placeholder="example@gmail.com" 
                            required
                            id="modalEmailInput"
                        >
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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

// Force focus on input when modal opens
document.getElementById('forgotPasswordModal').addEventListener('shown.bs.modal', function () {
    setTimeout(function() {
        document.getElementById('modalEmailInput').focus();
    }, 100);
});
</script>

</body>
</html>