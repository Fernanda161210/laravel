<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SyntheraFlow - Register</title>
<link rel="stylesheet" href="{{ asset('css/cadastro.css') }}">
</head>

<body>

<a href="{{ route('site.index') }}" class="back-home">➟ Home</a>

<div class="card">

<div class="logo">SyntheraFlow</div>

<h2>Create Account 🚀</h2>

@if(session('erro'))
<div class="erro">
{{ session('erro') }}
</div>
@endif

<form method="POST" action="{{ route('site.salvarCadastro') }}">
@csrf

<input type="text" name="nome" placeholder="Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="senha" placeholder="Password" required>

<button type="submit">Create Account</button>

</form>

<p style="margin-top:20px;text-align:center;">
Already have an account?
<a href="{{ route('site.login') }}">Login</a>
</p>

</div>

</body>
</html>