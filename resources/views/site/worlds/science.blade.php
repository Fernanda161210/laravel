<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Science Galaxy</title>
<link rel="stylesheet" href="{{ asset('css/science.css') }}">
<script src="{{ asset('js/science.js') }}"></script>
</head>

<body>

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

<section>
<h1 class="title">🧪 Science Galaxy</h1>

<div class="grid">

<div class="card active" id="card1">
<h3>🚀 Space Physics</h3>
<button class="lesson" onclick="openStudy(1)">Study Lesson</button>
</div>

<div class="card" id="card2">
<h3>⚛️ Atomic Structure</h3>
<button class="lesson" onclick="openStudy(2)">Study Lesson</button>
</div>

<div class="card" id="card3">
<h3>🧪 Chemical Reactions</h3>
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
<h2>🧠 Science Exam</h2>
<form id="quizForm"></form>
<button class="lesson" onclick="submitQuiz()">Submit Exam</button>
<div id="result" class="result"></div>
</div>

<div id="finalScreen">
<h1>🎉 Victory!</h1>
<p>You completed Science Galaxy.</p>
</div>



</body>
</html>