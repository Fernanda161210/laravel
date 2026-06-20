<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SyntheraFlow - Worlds</title>
<link rel="stylesheet" href="{{ asset('css/worlds.css') }}">
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

<div class="buttons">
    <button class="login" onclick="window.location='{{ route('site.login') }}'">
        Login
    </button>

    <button class="signup" onclick="window.location='{{ route('site.cadastro') }}'">
        Start Now
    </button>
</div>

</header>

<h1 class="title">✦ Choose Your World</h1>

<div class="grid">

<a href="{{ route('site.worlds.history') }}" class="card active">
<h3>✦ History Empire</h3>
<p>Medieval kingdoms, wars and legends</p>
</a>

<a href="{{ route('site.worlds.math') }}" class="card">
<h3>✦ Math Kingdom</h3>
<p>Puzzles and logic challenges</p>
</a>

<a href="{{ route('site.worlds.science') }}" class="card">
<h3>✦ Science Galaxy</h3>
<p>Space, experiments and discoveries</p>
</a>

</div>

</body>
</html>