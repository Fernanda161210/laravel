<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SyntheraFlow - Profile</title>

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

/* NAVBAR */

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
gap:25px;
align-items:center;
}

nav a{
text-decoration:none;
color:white;
transition:.3s;
}

nav a:hover{
color:#9b5cff;
}

/* AVATAR */

.avatar{
width:180px;
height:180px;
margin:40px auto 15px;
}

.avatar img{
width:180px;
height:180px;
border-radius:50%;
object-fit:cover;
border:4px solid #9b5cff;
box-shadow:0 0 30px rgba(155,92,255,.5);
}

/* USER */

.username{
text-align:center;
font-size:28px;
font-weight:bold;
}

.bio{
text-align:center;
color:#bbb;
margin:10px 20px;
font-size:16px;
}

.level{
text-align:center;
margin-top:10px;
font-weight:bold;
color:#3b82f6;
}

/* BUTTONS */

.buttons{
display:flex;
justify-content:center;
gap:15px;
margin-top:20px;
}

.btn-edit,
.btn-logout{
padding:14px 28px;
border:none;
border-radius:15px;
cursor:pointer;
font-weight:bold;
font-size:15px;
transition:.3s;
text-decoration:none;
color:white;
}

.btn-edit{
background:linear-gradient(90deg,#9b5cff,#00d4ff);
}

.btn-logout{
background:linear-gradient(90deg,#ff4d6d,#ff6b6b);
}

.btn-edit:hover,
.btn-logout:hover{
transform:translateY(-3px);
box-shadow:0 0 20px rgba(155,92,255,.4);
}

/* FORM */

#editProfile{
display:none;
justify-content:center;
margin-top:30px;
margin-bottom:40px;
}

#editProfile form{
width:650px;
max-width:90%;
background:#111122;
padding:35px;
border-radius:30px;
border:1px solid #222;
text-align:center;
transition:.4s;
}

#editProfile form:hover{
border-color:#9b5cff;
box-shadow:0 0 30px rgba(155,92,255,.3);
}

#editProfile input,
#editProfile textarea{

width:100%;
padding:15px;
margin-top:15px;

background:#ffffff10;
color:white;

border:none;
border-radius:15px;

font-size:15px;
}

#editProfile textarea{
resize:none;
min-height:120px;
}

.save-btn{

width:100%;
margin-top:20px;

padding:15px;

border:none;
border-radius:15px;

font-weight:bold;
font-size:15px;

cursor:pointer;

color:white;

background:linear-gradient(
90deg,
#9b5cff,
#00d4ff
);
}

.save-btn:hover{
box-shadow:0 0 20px rgba(155,92,255,.5);
}

</style>

</head>

<body>

<header>

<div class="logo">SyntheraFlow</div>

<nav>
    <a href="{{ route('site.index') }}">Home</a>
    <a href="{{ route('site.profile') }}">Profile</a>
    <a href="{{ route('site.worlds') }}">Worlds</a>
    <a href="{{ route('site.racemind') }}">RaceMind</a>
    <a href="{{ route('site.lumi') }}">Lumi</a>

</nav>


</header>

<!-- AVATAR -->

<div class="avatar">

@if(session('avatar'))
<img src="{{ asset('avatars/' . session('avatar')) }}">
@else
<img src="https://via.placeholder.com/180">
@endif

</div>

<!-- USERNAME -->

<div class="username">
{{ session('usuario_nome', 'Usuário') }}
</div>

<!-- BIO -->

<div class="bio">
{{ session('descricao', 'Level 18 Explorer • Synthera Elite Student 🚀') }}
</div>

<!-- LEVEL -->

<div class="level">
🚀 Nível 1 • Status: Iniciante
</div>

<!-- BUTTONS -->

<div class="buttons">

<button class="btn-edit" onclick="toggleEdit()">
 Editar Perfil
</button>

<a class="btn-logout"
href="{{ route('site.logout') }}"
onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
 Logout
</a>

<form id="logout-form"
action="{{ route('site.logout') }}"
method="POST"
style="display:none;">
@csrf
</form>

</div>
<!-- PROGRESSO DO JOGADOR -->
<style>
.game-section{max-width:1000px;margin:40px auto;padding:0 20px;}
.game-section h2{text-align:center;margin-bottom:20px;color:white;}
.game-card{background:#111122;padding:30px;border-radius:30px;border:1px solid #222;}
.progress-info{display:flex;justify-content:space-between;margin-bottom:10px;font-weight:bold;}
.progress-bar{height:22px;background:#222;border-radius:30px;overflow:hidden;}
.progress-fill{width:12%;height:100%;background:linear-gradient(90deg,#9b5cff,#00d4ff);animation:xpAnimation 2s ease;}
.progress-text{margin-top:15px;color:#bbb;}
@keyframes xpAnimation{from{width:0%;}to{width:12%;}}
</style>
<section class="game-section">
<h2>🎮 Progresso do Jogador</h2>
<div class="game-card">
<div class="progress-info"><span>Nível 1 • Iniciante</span><span>120 XP / 1000 XP</span></div>
<div class="progress-bar"><div class="progress-fill"></div></div>
<p class="progress-text">Você acabou de iniciar sua jornada no SyntheraFlow.Continue estudando para desbloquear novas missões.</p>
</div>
</section>
<script>
console.log("Sistema de XP carregado!");
</script>


<!-- EDIT PROFILE -->

<section id="editProfile">

<form method="POST"
action="{{ route('site.profile.update') }}"
enctype="multipart/form-data">

@csrf

<input type="file" name="avatar">

<input
type="text"
name="nome"
value="{{ session('nome') }}"
placeholder="Seu nome">

<textarea
name="descricao"
placeholder="Digite sua descrição...">{{ session('descricao') }}</textarea>

<button
type="submit"
class="save-btn">
✨ Salvar Alterações
</button>

</form>

</section>

<script>

function toggleEdit(){

let form = document.getElementById('editProfile');

if(form.style.display === 'flex'){
form.style.display = 'none';
}else{
form.style.display = 'flex';
}

}

</script>
<style>

.lumi-section{
max-width:1000px;
margin:40px auto;
padding:0 20px;
}

.lumi-section h2{
text-align:center;
margin-bottom:20px;
}

.lumi-card{
background:#111122;
padding:30px;
border-radius:30px;
border:1px solid #222;
}

.lumi-grid{
display:flex;
justify-content:space-between;
align-items:center;
flex-wrap:wrap;
gap:20px;
}

.lumi-avatar{
width:180px;
height:180px;
border-radius:50%;
background:linear-gradient(135deg,#9b5cff,#00d4ff);
display:flex;
align-items:center;
justify-content:center;
font-size:80px;
box-shadow:0 0 30px rgba(155,92,255,.4);
}

.lumi-info p{
margin:10px 0;
color:#ddd;
}

</style>

<section class="lumi-section">

<h2>🤖 Sua Lumi</h2>

<div class="lumi-card">

<div class="lumi-grid">

<div class="lumi-info">
<p>😊 Humor: Feliz</p>
<p>⚡ Energia: 100%</p>
<p>🧠 Conhecimento: 10%</p>
<p>🌱 Evolução: Lumi Bebê</p>
<p>🎯 Missões Concluídas: 2</p>
</div>

<div class="lumi-avatar">
✨
</div>

</div>

</div>

</section>

<script>
console.log("Lumi carregada");
</script>

<style>

.lumi-section{
max-width:1000px;
margin:40px auto;
padding:0 20px;
}

.lumi-section h2{
text-align:center;
margin-bottom:20px;
}

.lumi-card{
background:#111122;
padding:30px;
border-radius:30px;
border:1px solid #222;
}

.lumi-grid{
display:flex;
justify-content:space-between;
align-items:center;
flex-wrap:wrap;
gap:20px;
}

.lumi-avatar{
width:180px;
height:180px;
border-radius:50%;
background:linear-gradient(135deg,#9b5cff,#00d4ff);
display:flex;
align-items:center;
justify-content:center;
font-size:80px;
box-shadow:0 0 30px rgba(155,92,255,.4);
}

.lumi-info p{
margin:10px 0;
color:#ddd;
}

</style>


<style>
.achievements{max-width:1000px;margin:40px auto;padding:0 20px;}
.achievements h2{text-align:center;margin-bottom:20px;}
.achievement-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:20px;}
.achievement-card{background:#111122;padding:20px;border-radius:20px;border:1px solid #222;text-align:center;font-size:18px;}
</style>
<section class="achievements">
<h2>🏆 Conquistas</h2>
<div class="achievement-grid">
<div class="achievement-card">🏅<p>Primeiro Login</p></div>
<div class="achievement-card">📚<p>Primeiro Quiz</p></div>
<div class="achievement-card">🔒<p>Bloqueada</p></div>
</div>
</section>
<script>console.log("Conquistas carregadas");</script>1

<style>
.gallery-section{max-width:1000px;margin:40px auto;padding:0 20px;}
.gallery-section h2{text-align:center;margin-bottom:20px;}
.gallery-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:15px;}
.gallery-grid img{width:100%;height:200px;object-fit:cover;border-radius:20px;border:1px solid #222;}
</style>
<section class="gallery-section">
<h2>📸 Aventuras Recentes</h2>
<div class="gallery-grid">
<img src="https://picsum.photos/500/300?1"><img src="https://picsum.photos/500/300?2"><img src="https://picsum.photos/500/300?3"><img src="https://picsum.photos/500/300?4">
</div>
</section>
<script>console.log("Galeria carregada");</script>

<style>
.beginner-badge{text-align:center;margin-top:15px;}
.beginner-badge span{background:linear-gradient(90deg,#9b5cff,#00d4ff);padding:10px 20px;border-radius:20px;font-weight:bold;}
</style>
<div class="beginner-badge"><span>🌱 Jogador Iniciante</span></div>
<script>console.log("Badge de iniciante carregada");</script>

</body>
</html>