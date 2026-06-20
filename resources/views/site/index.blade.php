<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SyntheraFlow</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

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

<section class="hero">

<div class="hero-text">

<h1>
The Future of
<span>Learning</span>
Starts Here ✦
</h1>

<p>
SyntheraFlow transforms studying into an immersive adventure with AI companions, magical universes, quizzes, boss battles and educational races.
</p>

<div class="hero-buttons">

<button class="signup" onclick="window.location='{{ route('site.login') }}'">
Enter The Universe ✦
</button>

</div>

</div>

<div class="lumi"> ✨ </div>
</section>

<section>

<h2 class="title">
✦ Why SyntheraFlow?
</h2>

<div class="grid">

<div class="card">
<h3>✦ Lumi AI</h3>
<p>Teach Lumi new knowledge and watch her evolve emotionally and visually.</p>
</div>

<div class="card">
<h3>✦ Boss Battles</h3>
<p>Defeat powerful enemies using intelligence, logic and teamwork.</p>
</div>

<div class="card">
<h3>✦ TeachQuest</h3>
<p>Learn by teaching others and creating lessons for the community.</p>
</div>

</div>

</section>

<section>

<h2 class="title">
✦ Knowledge Universes
</h2>

<div class="grid">

<div class="world math">
<h2>✦ Math Kingdom</h2>
<p>Solve puzzles inside magical castles.</p>
</div>

<div class="world science">
<h2>✦ Science Galaxy</h2>
<p>Explore futuristic laboratories.</p>
</div>

<div class="world history">
<h2>✦ History Empire</h2>
<p>Travel through ancient civilizations.</p>
</div>

</div>

</section>

<section>

<h2 class="title">
✦ Our Community
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
© 2026 SyntheraFlow • Learn. Grow. Thrive ✦
</footer>

</body>
</html>