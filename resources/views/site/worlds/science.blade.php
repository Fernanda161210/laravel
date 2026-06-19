<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Science Galaxy</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:Arial;}

body{
background:#070711;
color:white;
background-image: radial-gradient(circle at top, #1b2a6b, #070711 60%);
overflow-x:hidden;
}

header{
display:flex;
justify-content:space-between;
align-items:center;
padding:20px 60px;
background:#070711cc;
position:sticky;
top:0;
backdrop-filter:blur(10px);
border-bottom:1px solid #2a2a2a;
}

.logo{font-size:30px;color:#4da3ff;font-weight:bold;}

nav{display:flex;gap:25px;}
nav a{color:white;text-decoration:none;}
nav a:hover{color:#4da3ff;}

.buttons{display:flex;gap:15px;}

.login{background:#222;color:white;padding:10px 20px;border:none;border-radius:12px;}
.signup{background:linear-gradient(90deg,#4da3ff,#7c4dff);color:white;padding:10px 20px;border:none;border-radius:12px;}

section{padding:60px;}

.title{font-size:55px;text-align:center;color:#4da3ff;margin-bottom:40px;}

.grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:30px;}

.card{
background:#111122;
padding:30px;
border-radius:30px;
opacity:0.4;
pointer-events:none;
border:1px solid #2a2a2a;
}

.card.active{opacity:1;pointer-events:auto;}

button.lesson{
padding:15px 25px;
border:none;
border-radius:15px;
background:linear-gradient(90deg,#4da3ff,#7c4dff);
color:white;
cursor:pointer;
margin-top:10px;
}

#studyPage{
display:none;
max-width:900px;
margin:30px auto;
padding:25px;
background:#111122;
border-radius:20px;
line-height:1.7;
}

.quiz{display:none;max-width:900px;margin:auto;padding:40px;}

.question{
background:#111122;
padding:15px;
margin-bottom:15px;
border-radius:15px;
}

.result{text-align:center;font-size:20px;margin-top:15px;}

#finalScreen{display:none;text-align:center;padding:60px;}
</style>
</head>

<body>

<header>
<div class="logo">ScienceFlow</div>

<nav>
    <a href="{{ route('site.index') }}">Home</a>
    <a href="{{ route('site.profile') }}">Profile</a>
    <a href="{{ route('site.worlds') }}">Worlds</a>
    <a href="{{ route('site.lumi') }}">Lumi</a>
</nav>

<div class="buttons">
<button class="login">Login</button>
<button class="signup">Start</button>
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

<div class="card" id="card4">
<h3>🌍 Earth Science</h3>
<button class="lesson" onclick="openStudy(4)">Study Lesson</button>
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

<script>

let current = 1;

const lessons = {
1:{title:"Space Physics",text:"Space physics studies gravity, stars, galaxies and black holes in the universe."},
2:{title:"Atomic Structure",text:"Everything is made of atoms with protons, neutrons and electrons."},
3:{title:"Chemical Reactions",text:"Reactions transform substances into new ones through chemical changes."},
4:{title:"Earth Science",text:"Earth science studies climate, volcanoes, oceans and tectonic plates."}
};

const quizzes = {
1:[
["Gravity does what?","Pulls objects","Pushes objects","a"],
["Stars produce...","Light","Dark","a"],
["Galaxy contains...","Stars","Cars","a"],
["Black holes are...","Strong gravity","Empty space","a"],
["Orbit depends on...","Gravity","Wind","a"]
],
2:[
["Atom contains...","Particles","Cells","a"],
["Proton is...","Positive","Negative","a"],
["Electron is...","Negative","Positive","a"],
["Nucleus has...","Protons","Air","a"],
["Atoms form...","Molecules","Stars","a"]
],
3:[
["Reaction creates...","New substance","Same substance","a"],
["Burning is...","Reaction","Freeze","a"],
["Rust is caused by...","Oxygen","Fire","a"],
["Cooking changes...","Structure","Color only","a"],
["Reactions are important for...","Life","Rocks","a"]
],
4:[
["Earth has...","Tectonic plates","Wings","a"],
["Climate is...","Weather over time","One day","a"],
["Volcano releases...","Magma","Water","a"],
["Oceans cover...","Most Earth","Small part","a"],
["Earth is...","Changing","Still","a"]
]
};

function openStudy(id){
current=id;
document.getElementById("studyTitle").innerText=lessons[id].title;
document.getElementById("studyText").innerText=lessons[id].text;
document.getElementById("studyPage").style.display="block";
document.getElementById("quiz").style.display="none";
document.getElementById("finalScreen").style.display="none";
}

function startQuiz(){
document.getElementById("studyPage").style.display="none";
document.getElementById("quiz").style.display="block";
loadQuiz(current);
}

function loadQuiz(id){
let form=document.getElementById("quizForm");
form.innerHTML="";
quizzes[id].forEach((q,i)=>{
form.innerHTML+=`
<div class="question">
<p>${i+1}. ${q[0]}</p>
<label><input type="radio" name="q${i}" value="a"> ${q[1]}</label><br>
<label><input type="radio" name="q${i}" value="b"> ${q[2]}</label>
</div>`;
});
}

function submitQuiz(){

let score=0;
let total=quizzes[current].length;

for(let i=0;i<total;i++){
let q=document.querySelector('input[name="q'+i+'"]:checked');
if(q && q.value===quizzes[current][i][3]) score++;
}

let result=document.getElementById("result");

if(score>=4){

result.innerHTML="✅ Passed! "+score+"/"+total;

let next=document.getElementById("card"+(current+1));

setTimeout(()=>{
document.getElementById("quiz").style.display="none";
result.innerHTML="";

if(next){
next.classList.add("active");
}else{
document.getElementById("finalScreen").style.display="block";
}
},1200);

}else{

result.innerHTML="❌ Failed! Score: "+score+"/"+total+
"<br><button onclick='retry()'>Try Again</button>";
}

}

function retry(){
document.getElementById("quizForm").reset();
document.getElementById("result").innerHTML="";
}

</script>

</body>
</html>