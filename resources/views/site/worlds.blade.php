<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SyntheraFlow - Worlds</title>

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
overflow-x:hidden;
}

/* BACKGROUND */
.bg1,.bg2{
position:fixed;
width:400px;
height:400px;
border-radius:50%;
filter:blur(120px);
z-index:-1;
}

.bg1{
background:#9b5cff22;
top:-100px;
right:-100px;
}

.bg2{
background:#00d4ff22;
bottom:-100px;
left:-100px;
}

/* HEADER */
header{
display:flex;
justify-content:space-between;
align-items:center;
padding:20px 50px;
border-bottom:1px solid #222;
background:#070711cc;
backdrop-filter:blur(10px);
position:sticky;
top:0;
}

.logo{
font-size:35px;
color:#9b5cff;
font-weight:bold;
}

nav a{
color:white;
margin-left:20px;
text-decoration:none;
transition:0.3s;
}

nav a:hover{
color:#9b5cff;
}

/* TITLE */
.title{
text-align:center;
font-size:55px;
margin:50px 0;
}

/* GRID */
.grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
gap:25px;
padding:0 50px 80px;
}

/* CARD */
.card{
background:#111122;
padding:30px;
border-radius:25px;
border:1px solid #222;
transition:0.3s;
text-decoration:none;
color:white;
position:relative;
}

.card:hover{
transform:translateY(-10px);
border:1px solid #9b5cff;
box-shadow:0 0 30px #9b5cff33;
}

.card h3{
font-size:26px;
margin-bottom:10px;
}

.card p{
color:#ccc;
}

/* 🔒 BLOQUEADO */
.locked{
opacity:0.5;
cursor:not-allowed;
filter:grayscale(1);
}

.lock-icon{
font-size:40px;
margin-bottom:10px;
}

/* OVERLAY BLOQUEIO */
.lock-text{
position:absolute;
top:15px;
right:15px;
background:#000000aa;
padding:6px 10px;
border-radius:10px;
font-size:12px;
color:#ffcc00;
}

</style>

</head>

<body>

<div class="bg1"></div>
<div class="bg2"></div>

<header>

<div class="logo">SyntheraFlow</div>

<nav>
<a href="{{ route('site.index') }}">Home</a>
<a href="{{ route('site.profile') }}">Profile</a>
<a href="{{ route('site.worlds') }}">Worlds</a>
<a href="{{ route('site.lumi') }}">Lumi</a>
</nav>

</header>

<h1 class="title">🌍 Choose Your World</h1>

<div class="grid">

<!-- ⚔️ HISTORY (LIBERADO) -->
<a href="{{ route('site.worlds.history') }}" class="card">
<h3>⚔️ History Empire</h3>
<p>Medieval kingdoms, wars and legends</p>
</a>

<!-- 📐 MATEMÁTICA (BLOQUEADO) -->
<div class="card locked">
<div class="lock-text">🔒 Unlock at Level 9 - Veteran</div>
<div class="lock-icon">🔒</div>
<h3>📐 Math Kingdom</h3>
<p>Puzzles and logic challenges</p>
</div>

<!-- 🧪 CIÊNCIA (BLOQUEADO) -->
<div class="card locked">
<div class="lock-text">🔒 Unlock at Level 9 - Veteran</div>
<div class="lock-icon">🔒</div>
<h3>🧪 Science Galaxy</h3>
<p>Space, experiments and discoveries</p>
</div>

</div>

</body>
</html>