<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SyntheraFlow</title>

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

.bg1{
position:fixed;
width:500px;
height:500px;
background:#9b5cff33;
border-radius:50%;
filter:blur(120px);
top:-150px;
right:-100px;
z-index:-1;
animation:float 6s infinite ease-in-out;
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
animation:float 8s infinite ease-in-out;
}

@keyframes float{
0%{transform:translateY(0px);}
50%{transform:translateY(30px);}
100%{transform:translateY(0px);}
}

header{
display:flex;
justify-content:space-between;
align-items:center;
padding:20px 60px;
border-bottom:1px solid #222;
position:sticky;
top:0;
backdrop-filter:blur(10px);
background:#070711aa;
z-index:1000;
}

.logo{
font-size:35px;
font-weight:bold;
color:#9b5cff;
}

nav{
display:flex;
gap:30px;
}

nav a{
text-decoration:none;
color:white;
transition:0.3s;
}

nav a:hover{
color:#9b5cff;
}

.buttons{
display:flex;
gap:15px;
}

button{
padding:12px 25px;
border:none;
border-radius:14px;
cursor:pointer;
font-weight:bold;
transition:0.3s;
}

.login{
background:#222;
color:white;
}

.signup{
background:linear-gradient(90deg,#9b5cff,#00d4ff);
color:white;
}

button:hover{
transform:translateY(-3px);
box-shadow:0 0 20px #9b5cff55;
}

.hero{
min-height:100vh;
display:flex;
align-items:center;
justify-content:space-between;
padding:80px 60px;
gap:50px;
flex-wrap:wrap;
}

.hero-text{
max-width:650px;
}

.hero-text h1{
font-size:80px;
line-height:90px;
margin-bottom:25px;
}

.hero-text span{
background:linear-gradient(90deg,#9b5cff,#00d4ff);
-webkit-background-clip:text;
-webkit-text-fill-color:transparent;
}

.hero-text p{
font-size:22px;
line-height:38px;
color:#ccc;
margin-bottom:35px;
}

.hero-buttons{
display:flex;
gap:20px;
flex-wrap:wrap;
}

.lumi{
width:380px;
height:380px;
border-radius:50%;
background:linear-gradient(135deg,#9b5cff,#00d4ff);
display:flex;
align-items:center;
justify-content:center;
font-size:120px;
box-shadow:0 0 80px #9b5cff66;
animation:lumi 4s infinite ease-in-out;
}

@keyframes lumi{
0%{transform:translateY(0px);}
50%{transform:translateY(-20px);}
100%{transform:translateY(0px);}
}

section{
padding:80px 60px;
}

.title{
font-size:55px;
margin-bottom:50px;
text-align:center;
}

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
transform:translateY(-10px);
border:1px solid #9b5cff;
box-shadow:0 0 30px #9b5cff33;
}

.card h3{
font-size:28px;
margin-bottom:20px;
}

.card p{
color:#ccc;
line-height:30px;
}

.world{
height:250px;
border-radius:30px;
padding:30px;
display:flex;
flex-direction:column;
justify-content:end;
transition:0.4s;
cursor:pointer;
}

.world:hover{
transform:scale(1.03);
}

.math{
background:linear-gradient(#00000088,#000000cc),
url('https://images.unsplash.com/photo-1511512578047-dfb367046420?q=80&w=1200&auto=format&fit=crop');
background-size:cover;
background-position:center;
}

.science{
background:linear-gradient(#00000088,#000000cc),
url('https://images.unsplash.com/photo-1462331940025-496dfbfc7564?q=80&w=1200&auto=format&fit=crop');
background-size:cover;
background-position:center;
}

.history{
background:linear-gradient(#00000088,#000000cc),
url('https://images.unsplash.com/photo-1524492412937-b28074a5d7da?q=80&w=1200&auto=format&fit=crop');
background-size:cover;
background-position:center;
}

.language{
background:linear-gradient(#00000088,#000000cc),
url('https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=1200&auto=format&fit=crop');
background-size:cover;
background-position:center;
}

.stats{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
gap:25px;
}

.stat{
background:#111122;
padding:40px;
border-radius:25px;
text-align:center;
}

.stat h2{
font-size:50px;
margin-bottom:10px;
color:#9b5cff;
}

footer{
padding:50px;
text-align:center;
border-top:1px solid #222;
color:#888;
margin-top:50px;
}

@media(max-width:900px){

.hero-text h1{
font-size:55px;
line-height:65px;
}

.hero{
justify-content:center;
text-align:center;
}

header{
padding:20px;
flex-wrap:wrap;
gap:20px;
}

nav{
flex-wrap:wrap;
justify-content:center;
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
    <a href="{{ route('site.worlds') }}">Worlds</a>
    <a href="{{ route('site.racemind') }}">RaceMind</a>
    <a href="{{ route('site.lumi') }}">Lumi</a>
    <a href="{{ route('site.shop') }}">Shop</a>
</nav>

<div class="buttons">
    <button class="login" onclick="window.location='{{ route('site.login') }}'">
        Login
    </button>

    <button class="signup" onclick="window.location='{{ route('site.cadastro') }}'">
        Start Now
    </button>
</div>

</header>

<section class="hero">

<div class="hero-text">

<h1>
The Future of
<span>Learning</span>
Starts Here 🚀
</h1>

<p>
SyntheraFlow transforms studying into an immersive adventure with AI companions, magical universes, quizzes, boss battles and educational races.
</p>

<div class="hero-buttons">

<button class="signup">
Enter The Universe
</button>

<button class="login">
Watch Trailer
</button>

</div>

</div>

<div class="lumi">
✨
</div>

</section>

<section>

<h2 class="title">
Why SyntheraFlow? 🌌
</h2>

<div class="grid">

<div class="card">
<h3>🏎️ RaceMind</h3>
<p>Race against other players while answering questions and unlocking powerful boosts.</p>
</div>

<div class="card">
<h3>🤖 Lumi AI</h3>
<p>Teach Lumi new knowledge and watch her evolve emotionally and visually.</p>
</div>

<div class="card">
<h3>⚔️ Boss Battles</h3>
<p>Defeat powerful enemies using intelligence, logic and teamwork.</p>
</div>

<div class="card">
<h3>👩‍🏫 TeachQuest</h3>
<p>Learn by teaching others and creating lessons for the community.</p>
</div>

</div>

</section>

<section>

<h2 class="title">
Knowledge Universes 🌍
</h2>

<div class="grid">

<div class="world math">
<h2>🏰 Math Kingdom</h2>
<p>Solve puzzles inside magical castles.</p>
</div>

<div class="world science">
<h2>🚀 Science Galaxy</h2>
<p>Explore futuristic laboratories.</p>
</div>

<div class="world history">
<h2>⚔️ History Empire</h2>
<p>Travel through ancient civilizations.</p>
</div>

<div class="world language">
<h2>🐉 Language Valley</h2>
<p>Learn languages with magical creatures.</p>
</div>

</div>

</section>

<section>

<h2 class="title">
Our Community 📈
</h2>

<div class="stats">

<div class="stat">
<h2>1M+</h2>
<p>Students Learning</p>
</div>

<div class="stat">
<h2>500K</h2>
<p>Boss Battles Won</p>
</div>

<div class="stat">
<h2>98%</h2>
<p>Positive Reviews</p>
</div>

<div class="stat">
<h2>120+</h2>
<p>Knowledge Worlds</p>
</div>

</div>

</section>

<footer>
© 2026 SyntheraFlow • Learn. Grow. Thrive 🚀
</footer>

</body>
</html>