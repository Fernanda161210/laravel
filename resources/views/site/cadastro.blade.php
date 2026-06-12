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
}

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
}

a{
color:#9b5cff;
text-decoration:none;
}
</style>
</head>

<body>

<div class="card">

<div class="logo">
SyntheraFlow
</div>

<h2>Create Account 🚀</h2>

<form>
<input type="text" placeholder="Name">
<input type="email" placeholder="Email">
<input type="password" placeholder="Password">

<button>
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