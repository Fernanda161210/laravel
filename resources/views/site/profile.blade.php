<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SyntheraFlow - Profile</title>

<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<script src="{{ asset('js/profile.js') }}"></script>

</head>

<body>

<header>

<div class="logo">SyntheraFlow</div>

<nav>
    <a href="{{ route('site.index') }}">Home</a>
    <a href="{{ route('site.profile') }}">Profile</a>
    <a href="{{ route('site.worlds') }}">Worlds</a>
    <a href="{{ route('site.lumi') }}">Lumi</a>
</nav>

</header>

<div class="avatar">
@if(session('avatar'))
    <img src="{{ asset('avatars/' . session('avatar')) }}">
@else
    <img src="https://via.placeholder.com/180">
@endif
</div>

<div class="username">
{{ session('usuario_nome', 'User') }}
</div>

<div class="level">
🚀 Level {{ session('nivel', 1) }} • Status: Beginner
</div>

@if(session('descricao'))
<div class="bio">
    {{ session('descricao') }}
</div>
@endif

<div class="buttons">

<button class="btn-edit" onclick="toggleEdit()">Edit Profile</button>

<a class="btn-logout"
href="{{ route('site.logout') }}"
onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
Logout
</a>

<form id="logout-form" action="{{ route('site.logout') }}" method="POST" style="display:none;">
@csrf
</form>

</div>

<section class="game-section">
<h2>🎮 Player Progress</h2>

<div class="game-card">

<div class="progress-info">
<span>Level {{ session('nivel', 1) }} • Beginner</span>
<span>{{ session('xp', 0) }} XP</span>
</div>

<div class="progress-bar">
<div class="progress-fill"></div>
</div>

<p class="progress-text">
You have just started your journey in SyntheraFlow. Keep studying to unlock new missions.
</p>

</div>
</section>

<section id="editProfile">

<form method="POST" action="{{ route('site.profile.update') }}" enctype="multipart/form-data">

@csrf

<input type="file" name="avatar">

<input type="text" name="nome" value="{{ session('usuario_nome') }}" placeholder="Your name">

<textarea name="descricao" placeholder="Write your description...">{{ session('descricao') }}</textarea>

<button type="submit" class="save-btn">Save Changes</button>

</form>

</section>

<section class="lumi-section">

<h2>🤖 Your Lumi</h2>

<div class="lumi-card">

<div class="lumi-grid">

<div class="lumi-info">
<p>😊 Mood: Happy</p>
<p>⚡ Energy: 100%</p>
<p>🧠 Knowledge: 10%</p>
<p>🌱 Evolution: Baby Lumi</p>
<p>🎯 Missions Completed: 2</p>
</div>

<div class="lumi-avatar">✨</div>

</div>

</div>

</section>

<section class="achievements">
<h2>🏆 Achievements</h2>

<div class="achievement-grid">
<div class="achievement-card-old">🏅 First Login</div>
<div class="achievement-card-old">📚 First Quiz</div>
<div class="achievement-card-old">🔒 Locked</div>
</div>

</section>

<section class="worlds-section">

<h2> ✰ Recent Adventures</h2>

<div class="worlds-grid">

<a href="{{ route('site.worlds.math') }}" class="world-card">
<h3>✦ ⋆ Mathematics ✦ ⋆ ˚</h3>
<p>Explore logic, numbers and challenges</p>
</a>

<a href="{{ route('site.worlds.history') }}" class="world-card">
<h3>✦ ⋆ History ✦ ⋆ ˚</h3>
<p>Discover past events</p>
</a>

<a href="{{ route('site.worlds.science') }}" class="world-card">
<h3>✦ ⋆ Science ✦ ⋆ ˚</h3>
<p>Experiments and discoveries</p>
</a>

</div>

</section>

</body>
</html>