<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

<div class="login-card">

<div class="logo">
<img src="{{ asset('image/logo.png') }}" alt="logo">
<h4>Sleepy Panda</h4>
<p class="tagline">Mulai dengan masuk atau mendaftar untuk melihat analisa tidur mu</p>
</div>

@if ($errors->has('login'))
<div class="alert alert-danger text-center py-2 mb-3">
{{ $errors->first('login') }}
</div>
@endif

<div class="button-group">
<a href="/selamatdatang" class="btn btn-login w-100">Masuk</a>
<a href="/register" class="btn btn-daftar w-100">Daftar</a>
</div>

</div>

</body>
</html>