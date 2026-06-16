<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>History Empire - Classes</title>

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

/* fundo medieval */
background-image: radial-gradient(circle at top, #2a1a1a, #070711 60%);
}

/* HEADER */
header{
display:flex;
justify-content:space-between;
align-items:center;
padding:20px 50px;
border-bottom:1px solid #2a2a2a;
background:#070711cc;
backdrop-filter:blur(10px);
position:sticky;
top:0;
z-index:100;
}

.logo{
font-size:35px;
font-weight:bold;
color:#d4af37;
}

/* NAV */
nav{
display:flex;
gap:25px;
flex-wrap:wrap;
}

nav a{
color:white;
text-decoration:none;
transition:0.3s;
}

nav a:hover{
color:#d4af37;
}

/* MAIN */
section{
padding:60px;
}

.title{
font-size:55px;
margin-bottom:40px;
text-align:center;
color:#d4af37;
}

/* GRID */
.grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
gap:30px;
}

/* CARD */
.card{
background:#111122;
padding:30px;
border-radius:30px;
border:1px solid #2a2a2a;
transition:0.4s;
box-shadow:0 0 20px rgba(212,175,55,0.05);
}

.card:hover{
transform:translateY(-8px);
border:1px solid #d4af37;
box-shadow:0 0 30px rgba(212,175,55,0.2);
}

.card h3{
font-size:28px;
margin-bottom:15px;
color:#f5deb3;
}

.card p{
color:#ccc;
margin-top:8px;
}

/* BUTTON */
button{
padding:15px 25px;
border:none;
border-radius:15px;
background:linear-gradient(90deg,#d4af37,#8b6b1f);
color:black;
cursor:pointer;
font-weight:bold;
margin-top:20px;
transition:0.3s;
}

button:hover{
transform:translateY(-3px);
box-shadow:0 0 20px rgba(212,175,55,0.4);
}

/* FOOTER */
footer{
padding:40px;
text-align:center;
border-top:1px solid #2a2a2a;
color:#888;
margin-top:50px;
}

/* MOBILE */
@media(max-width:900px){

header{
padding:20px;
flex-direction:column;
gap:20px;
}

section{
padding:30px;
}

.title{
font-size:40px;
}

}

</style>

</head>

<body>

<header>

<div class="logo">
⚔️ History Empire
</div>

<nav>
<a href="{{ route('site.index') }}">Home</a>
<a href="{{ route('site.profile') }}">Profile</a>
<a href="{{ route('site.worlds') }}">Worlds</a>
<a href="{{ route('site.lumi') }}">Lumi</a>
</nav>

</header>

<section>

<h1 class="title">
📜 Royal Classes of the Kingdom
</h1>

<div class="grid">

<div class="card">
<h3>⚔️ Medieval Warfare</h3>
<p>Teacher: Sir Arthur</p>
<p>Students: 32 knights</p>
<p>Progress: 78%</p>
<button>Enter Battle Training</button>
</div>

<div class="card">
<h3>🏰 Kingdom Geography</h3>
<p>Teacher: Lady Eleanor</p>
<p>Students: 28 nobles</p>
<p>Progress: 65%</p>
<button>Explore Kingdom</button>
</div>

<div class="card">
<h3>📜 Ancient History</h3>
<p>Teacher: Lord William</p>
<p>Students: 30 scribes</p>
<p>Progress: 82%</p>
<button>Read Scrolls</button>
</div>

<div class="card">
<h3>🪶 Royal Literature</h3>
<p>Teacher: Scholar Margaret</p>
<p>Students: 35 apprentices</p>
<p>Progress: 91%</p>
<button>Study Manuscripts</button>
</div>

</div>

</section>

<footer>

© 2026 History Empire • Knowledge of the Kingdom ⚔️

</footer>

</body>

</html>