<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>History Empire</title>
<link rel="stylesheet" href="{{ asset('css/history.css') }}">
<script src="{{ asset('js/history.js') }}"></script>
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

<div class="buttons">
<button class="login" onclick="window.location='{{ route('site.login') }}'">Login</button>
<button class="signup" onclick="window.location='{{ route('site.cadastro') }}'">Start Now</button>
</div>

</header>

<section>

<h1 class="title">📜 Royal Classes of the Kingdom</h1>

<div class="grid">

<div class="card active" id="card1">
<h3>⚔️ Medieval Warfare</h3>
<button class="lesson" onclick="openStudy(1)">Study Lesson</button>
</div>

<div class="card" id="card2">
<h3>🏰 Kingdom Geography</h3>
<button class="lesson" onclick="openStudy(2)">Study Lesson</button>
</div>

<div class="card" id="card3">
<h3>📜 Ancient History</h3>
<button class="lesson" onclick="openStudy(3)">Study Lesson</button>
</div>

</div>

</section>

<div id="studyPage">
<h2 id="studyTitle"></h2>
<p id="studyText"></p>
<button class="lesson" onclick="startQuiz()">Start Quiz</button>
</div>

<div id="quiz" class="quiz">
<h2>📜 Royal Exam</h2>
<form id="quizForm"></form>
<button class="lesson" onclick="submitQuiz()">Submit Exam</button>
<div id="result" class="result"></div>
</div>

<div id="finalScreen">
<h1>👑 Victory!</h1>
<p>
You have mastered all Royal Classes of the Kingdom.<br><br>
The Empire recognizes your knowledge and wisdom.<br>
New realms of history will arrive soon.
</p>
</div>

</body>

</html>