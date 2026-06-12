<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SyntheraFlow - My Classes</title>

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

.bg1{
position:fixed;
width:500px;
height:500px;
background:#9b5cff22;
border-radius:50%;
filter:blur(120px);
top:-100px;
right:-100px;
z-index:-1;
}

.bg2{
position:fixed;
width:400px;
height:400px;
background:#00d4ff22;
border-radius:50%;
filter:blur(120px);
bottom:-100px;
left:-100px;
z-index:-1;
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
z-index:100;
}

.logo{
font-size:35px;
font-weight:bold;
color:#9b5cff;
}

nav{
display:flex;
gap:30px;
flex-wrap:wrap;
}

nav a{
color:white;
text-decoration:none;
transition:0.3s;
}

nav a:hover{
color:#9b5cff;
}

/* MAIN */

section{
padding:60px;
}

.title{
font-size:55px;
margin-bottom:40px;
text-align:center;
}

/* GRID */

.grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
gap:30px;
}

.card{
background:#111122;
padding:30px;
border-radius:30px;
border:1px solid #222;
transition:0.4s;
}

.card:hover{
transform:translateY(-8px);
border:1px solid #9b5cff;
box-shadow:0 0 30px #9b5cff33;
}

.card h3{
font-size:28px;
margin-bottom:20px;
}

.card p{
color:#ccc;
margin-top:10px;
}

/* BUTTON */

button{
padding:15px 25px;
border:none;
border-radius:15px;
background:linear-gradient(90deg,#9b5cff,#00d4ff);
color:white;
cursor:pointer;
font-weight:bold;
margin-top:20px;
transition:0.3s;
}

button:hover{
transform:translateY(-3px);
box-shadow:0 0 20px #9b5cff66;
}

/* FOOTER */

footer{
padding:40px;
text-align:center;
border-top:1px solid #222;
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

<div class="bg1"></div>
<div class="bg2"></div>

<header>

<div class="logo">
SyntheraFlow
</div>

<nav>
<a href="{{ route('site.index') }}">Home</a>
<a href="{{ route('site.profile') }}">Profile</a>
<a href="{{ route('site.dashboard') }}">Dashboard</a>
<a href="{{ route('site.worlds') }}">Classes</a>
<a href="{{ route('site.racemind') }}">RaceMind</a>
<a href="{{ route('site.lumi') }}">Lumi</a>
<a href="{{ route('site.shop') }}">Shop</a>
</nav>

</header>

<section>

<h1 class="title">
My Classes 🎓
</h1>

<div class="grid">

<div class="card">
<h3>📐 Mathematics</h3>
<p>Teacher: Ana Silva</p>
<p>Students: 32</p>
<p>Progress: 78%</p>
<button>Enter Class</button>
</div>

<div class="card">
<h3>🧪 Chemistry</h3>
<p>Teacher: Carlos Souza</p>
<p>Students: 28</p>
<p>Progress: 65%</p>
<button>Enter Class</button>
</div>

<div class="card">
<h3>🌎 Geography</h3>
<p>Teacher: Mariana Costa</p>
<p>Students: 30</p>
<p>Progress: 82%</p>
<button>Enter Class</button>
</div>

<div class="card">
<h3>📚 Portuguese</h3>
<p>Teacher: Fernanda Lima</p>
<p>Students: 35</p>
<p>Progress: 91%</p>
<button>Enter Class</button>
</div>

</div>

</section>

<footer>

© 2026 SyntheraFlow • Learn. Grow. Thrive 🚀

</footer>

</body>
</html>