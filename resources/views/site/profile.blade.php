<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SyntheraFlow - Profile</title>

<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

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
<section class="profile">

<div class="avatar">
    👩
</div>

<div class="profile-info">

@if(session('success'))
<div class="item" style="border:1px solid #00ff88;">
    {{ session('success') }}
</div>
@endif

<h1>
    {{ session('nome', 'Emily Johnson') }}
</h1>

<p>
    {{ session('descricao', 'Level 18 Explorer • Synthera Elite Student 🚀') }}
</p>

<div class="level-box">

<h3>XP Progress</h3>

<div class="level-bar">
    <div class="level-fill"></div>
</div>

<p style="margin-top:10px;color:#ccc;">
    {{ session('xp', '12,450') }} XP
</p>

</div>

<div class="badges">

<div class="badge">🏆 Quiz Master</div>
<div class="badge">🔥 18 Day Streak</div>
<div class="badge">⚡ Fast Learner</div>
<div class="badge">👑 Lumi Guardian</div>

</div>

<button onclick="toggleEdit()">
    Edit Profile
</button>

</div>

</section>

<section id="editProfile" style="display:none;">

<div class="card">

<h2 style="margin-bottom:20px;">
Editar Perfil ✏️
</h2>

<form method="POST" action="{{ route('site.profile.update') }}">

@csrf

<input
class="input"
type="text"
name="nome"
placeholder="Nome"
value="{{ session('nome','Emily Johnson') }}"
>

<input
class="input"
type="text"
name="nivel"
placeholder="Nível"
value="{{ session('nivel','18') }}"
>

<input
class="input"
type="text"
name="xp"
placeholder="XP"
value="{{ session('xp','12450') }}"
>

<textarea
class="input"
name="descricao"
placeholder="Descrição"
>{{ session('descricao','Level 18 Explorer • Synthera Elite Student 🚀') }}</textarea>

<button type="submit">
Salvar Alterações
</button>

</form>

</div>

</section>

<section>

<h2 class="title">
Statistics 📊
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
<p>Study Time</p>
</div>

<div class="stat">
<h2>18</h2>
<p>Current Streak</p>
</div>

</div>

</section>
<section>

<h2 class="title">
Lumi Companion 🤖
</h2>

<div class="grid">

<div class="card">

<h3>Lumi Status</h3>

<div class="item">Mood: Happy 😊</div>
<div class="item">Knowledge: 78%</div>
<div class="item">Energy: 92%</div>
<div class="item">Evolution: Teen Lumi 🌟</div>

<div class="pet">
✨
</div>

</div>

<div class="card">

<h3>Recent Activities</h3>

<div class="item">🏁 Won RaceMind Challenge</div>
<div class="item">📚 Finished Science Mission</div>
<div class="item">⚔️ Defeated King Algebra</div>
<div class="item">🎁 Unlocked Galaxy Wings</div>
<div class="item">👩‍🏫 Taught Lumi New Lessons</div>

</div>

</div>

</section>

<section>

<h2 class="title">
Inventory 🎒
</h2>

<div class="grid">

<div class="card">

<h3>Equipped Items</h3>

<div class="item">👕 Cyber Hoodie</div>
<div class="item">🪽 Galaxy Wings</div>
<div class="item">👓 Neon Glasses</div>
<div class="item">👑 Magic Crown</div>

</div>

<div class="card">

<h3>Unlocked Pets</h3>

<div class="item">🐱 Neon Cat</div>
<div class="item">🐲 Mini Dragon</div>
<div class="item">🦊 Cyber Fox</div>

</div>

</div>

</section>
<footer>
© 2026 SyntheraFlow • Learn. Grow. Thrive 🚀
</footer>

<script>

function toggleEdit() {

let form = document.getElementById('editProfile');

if(form.style.display === 'none'){
    form.style.display = 'block';
}else{
    form.style.display = 'none';
}

}

</script>

</body>
</html>