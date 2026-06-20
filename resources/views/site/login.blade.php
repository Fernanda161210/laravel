<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SyntheraFlow - Login</title>
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

<a href="{{ route('site.index') }}" class="back-home">➟ Home</a>

<div class="card">

<div class="logo">SyntheraFlow</div>

<h2>Welcome Back 👋</h2>

@if(session('erro'))
<div class="erro">
{{ session('erro') }}
</div>
@endif

<form method="POST" action="{{ route('site.fazerLogin') }}">
@csrf

<input type="email" name="email" placeholder="Email" required>
<input type="password" name="senha" placeholder="Password" required>

<button type="submit">Login</button>

</form>

<p style="margin-top:20px;text-align:center;">
No account?
<a href="{{ route('site.cadastro') }}">Register</a>
</p>

</div>

</body>
</html>