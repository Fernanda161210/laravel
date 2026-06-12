<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SyntheraFlow - Dashboard</title>

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

section{
padding:60px;
}

.title{
font-size:55px;
margin-bottom:40px;
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
transform:translateY(-8px);
border:1px solid #9b5cff;
box-shadow:0 0 30px #9b5cff33;
}

.card h3{
font-size:28px;
margin-bottom:20px;
}

.xp-bar{
width:100%;
height:25px;
background:#222;
border-radius:20px;
overflow:hidden;
margin-top:20px;
}

.xp-fill{
width:78%;
height:100%;
background:linear-gradient(90deg,#9b5cff,#00d4ff);
}

.item{
background:#ffffff10;
padding:15px;
border-radius:15px;
margin-top:15px;
}

.stats{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
gap:25px;
margin-top:30px;
}

.stat{
background:#111122;
padding:35px;
border-radius:25px;
text-align:center;
}

.stat h2{
font-size:50px;
color:#9b5cff;
margin-bottom:10px;
}

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

.calendar{
display:grid;
grid-template-columns:repeat(7,1fr);
gap:10px;
margin-top:20px;
}

.day{
background:#ffffff10;
padding:15px;
border-radius:12px;
text-align:center;
}

.active{
background:#9b5cff;
}

footer{
padding:40px;
text-align:center;
border-top:1px solid #222;
color:#888;
margin-top:50px;
}

@media(max-width:900px){

header{
padding:20px;
flex-direction:column;
gap:20px;
}

.title{
font-size:40px;
}

section{
padding:30px;
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

</header>

<section>

<h1 class="title">
Dashboard 📊
</h1>

<div class="grid">

<div class="card">

<h3>
Player Profile 👤
</h3>

<div class="item">
Name: Emily Johnson
</div>

<div class="item">
Level: 18
</div>

<div class="item">
XP: 12,450
</div>

<div class="item">
Coins: 3,250 💎
</div>

<div class="xp-bar">
<div class="xp-fill"></div>
</div>

<p style="margin-top:15px;color:#bbb;">
78% to next level
</p>

<button onclick="window.location='{{ route('site.profile') }}'">
View Profile
</button>

</div>

<div class="card">

<h3>
Daily Missions 🎯
</h3>

<div class="item">
✅ Complete 3 quizzes
</div>

<div class="item">
🔥 Win 1 RaceMind match
</div>

<div class="item">
🤖 Teach Lumi something new
</div>

<div class="item">
🏆 Earn 500 XP
</div>

<button>
Claim Rewards
</button>

</div>

<div class="card">

<h3>
Leaderboard 🏆
</h3>

<div class="item">
🥇 Emily - 12,450 XP
</div>

<div class="item">
🥈 Sophia - 10,900 XP
</div>

<div class="item">
🥉 Lucas - 9,800 XP
</div>

<div class="item">
⭐ Olivia - 8,700 XP
</div>

<button>
View Rankings
</button>

</div>

</div>

</section>

<section>

<h2 class="title">
Learning Statistics ⚡
</h2>

<div class="stats">

<div class="stat">
<h2>124</h2>
<p>Quizzes Completed</p>
</div>

<div class="stat">
<h2>42</h2>
<p>Bosses Defeated</p>
</div>

<div class="stat">
<h2>89h</h2>
<p>Study Hours</p>
</div>

<div class="stat">
<h2>18</h2>
<p>Day Streak 🔥</p>
</div>

</div>

</section>

<section>

<h2 class="title">
Weekly Progress ⏳
</h2>

<div class="grid">

<div class="card">

<h3>
Recent Activities
</h3>

<div class="item">
🏎️ Won RaceMind challenge
</div>

<div class="item">
📚 Finished Science Galaxy
</div>

<div class="item">
⚔️ Defeated King Algebra
</div>

<div class="item">
🎁 Unlocked Galaxy Wings
</div>

<div class="item">
🤖 Lumi evolved to Teen Form
</div>

</div>

<div class="card">

<h3>
Study Calendar 📅
</h3>

<div class="calendar">

<div class="day active">1</div>
<div class="day active">2</div>
<div class="day active">3</div>
<div class="day active">4</div>
<div class="day active">5</div>
<div class="day">6</div>
<div class="day">7</div>

</div>

<div class="item">
🔥 5 days studying in a row
</div>

</div>

</div>

</section>

<footer>
© 2026 SyntheraFlow • Learn. Grow. Thrive 🚀
</footer>

</body>
</html>