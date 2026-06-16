<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SyntheraFlow - Register</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial;
}

body{
background:#070711;
color:white;
display:flex;
justify-content:center;
align-items:center;
min-height:100vh;
position:relative;
}

/* 🔙 BOTÃO VOLTAR */
.back-home{
position:absolute;
top:20px;
left:20px;
text-decoration:none;
font-size:16px;
color:#9b5cff;
padding:10px 14px;
border:1px solid #9b5cff33;
border-radius:12px;
background:#111122;
transition:0.3s;
}

.back-home:hover{
transform:translateX(-3px);
background:#1a1a2e;
}

/* CARD */
.card{
width:450px;
background:#111122;
padding:40px;
border-radius:30px;
border:1px solid #222;
}

.logo{
text-align:center;
font-size:40px;
font-weight:bold;
color:#9b5cff;
margin-bottom:30px;
}

h2{
margin-bottom:20px;
}

input{
width:100%;
padding:15px;
margin-top:15px;
background:#1a1a2e;
border:none;
border-radius:15px;
color:white;
}

button{
width:100%;
padding:15px;
margin-top:20px;
border:none;
border-radius:15px;
background:linear-gradient(90deg,#9b5cff,#00d4ff);
color:white;
font-weight:bold;
cursor:pointer;
transition:0.3s;
}

button:hover{
transform:translateY(-3px);
}

a{
color:#9b5cff;
text-decoration:none;
}

.erro{
background:#ff4d4d20;
border:1px solid #ff4d4d;
padding:12px;
border-radius:10px;
margin-bottom:15px;
}

</style>

</head>

<body>

<!-- 🔙 SETA VOLTAR -->
<a href="{{ route('site.index') }}" class="back-home"> ➟ Home
</a>

<div class="card">

<div class="logo">
SyntheraFlow
</div>

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

<button type="submit">
Create Account
</button>

</form>

<p style="margin-top:20px;text-align:center;">
Already have an account?
<a href="{{ route('site.login') }}">
Login
</a>
</p>

</div>

</body>
</html>