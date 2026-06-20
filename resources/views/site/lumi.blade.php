<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SyntheraFlow - Lumi AI</title>
<link rel="stylesheet" href="{{ asset('css/lumi.css') }}">
<script src="{{ asset('js/lumi.js') }}"></script>
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

<section>

<div class="lumi-container">

<!-- LUMI -->
<div class="lumi-avatar">

<img src="{{ asset('images/lumi.png') }}" class="lumi-img">

<div class="spark">⭐</div>
<div class="spark">💫</div>

</div>

<!-- INFO -->
<div class="lumi-info">

<h1>Meet Lumi </h1>

<p>
Lumi is your interactive NPC guide. She helps you navigate SyntheraFlow.
</p>

<div class="quick-questions">

<button onclick="step('start')">🚀 Start here</button>
<button onclick="step('worlds')">🌍 Worlds</button>
<button onclick="step('lessons')">📚 Lessons</button>
<button onclick="step('profile')">👤 Profile</button>
<button onclick="step('help')">❓ Help</button>

</div>

<div id="chatBox" class="chat-box">
<p><strong>Lumi:</strong> Welcome! I am ready to guide you ✨</p>
</div>

</div>

</div>

</section>

<footer>
© 2026 SyntheraFlow • Lumi System 
</footer>



</body>
</html>