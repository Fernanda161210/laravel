<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>History Empire</title>

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
background-image: radial-gradient(circle at top, #2a1a1a, #070711 60%);
}

/* NAVBAR SYNTHERAFLOW */
header{
display:flex;
justify-content:space-between;
align-items:center;
padding:20px 60px;
border-bottom:1px solid #2a2a2a;
background:#070711cc;
backdrop-filter:blur(10px);
position:sticky;
top:0;
z-index:1000;
flex-wrap:wrap;
gap:20px;
}

.logo{
font-size:30px;
font-weight:bold;
color:#9b5cff;
}

nav{
display:flex;
gap:25px;
flex-wrap:wrap;
}

nav a{
text-decoration:none;
color:white;
transition:0.3s;
}

nav a:hover{
color:#9b5cff;
}

.buttons{
display:flex;
gap:15px;
}

.login{
background:#222;
color:white;
padding:10px 20px;
border:none;
border-radius:12px;
cursor:pointer;
}

.signup{
background:linear-gradient(90deg,#9b5cff,#00d4ff);
color:white;
padding:10px 20px;
border:none;
border-radius:12px;
cursor:pointer;
}

button:hover{
transform:translateY(-2px);
}

/* MAIN */
section{
padding:60px;
}

.title{
font-size:55px;
margin-bottom:40px;
text-align:center;
color:#d4af37;
}

/* GRID */
.grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
gap:30px;
}

/* CARD */
.card{
background:#111122;
padding:30px;
border-radius:30px;
border:1px solid #2a2a2a;
opacity:0.4;
pointer-events:none;
transition:0.3s;
}

.card.active{
opacity:1;
pointer-events:auto;
}

.card:hover{
transform:translateY(-8px);
border:1px solid #d4af37;
}

button.lesson{
padding:15px 25px;
border:none;
border-radius:15px;
background:linear-gradient(90deg,#d4af37,#8b6b1f);
color:black;
cursor:pointer;
font-weight:bold;
margin-top:10px;
}

/* STUDY PAGE */
#studyPage{
display:none;
max-width:900px;
margin:30px auto;
padding:25px;
background:#111122;
border-radius:20px;
border:1px solid #333;
line-height:1.7;
}

/* QUIZ */
.quiz{
display:none;
max-width:900px;
margin:auto;
padding:40px;
}

.question{
background:#111122;
padding:15px;
margin-bottom:15px;
border-radius:15px;
}

.result{
text-align:center;
font-size:20px;
margin-top:15px;
}

/* FINAL */
#finalScreen{
display:none;
text-align:center;
padding:60px;
}

</style>

</head>

<body>

<!-- NAVBAR -->
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

<!-- MAIN -->
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

<div class="card" id="card4">
<h3>🪶 Royal Literature</h3>
<button class="lesson" onclick="openStudy(4)">Study Lesson</button>
</div>

</div>

</section>

<!-- STUDY -->
<div id="studyPage">
<h2 id="studyTitle"></h2>
<p id="studyText"></p>

<button class="lesson" onclick="startQuiz()">Start Quiz</button>
</div>

<!-- QUIZ -->
<div id="quiz" class="quiz">

<h2>📜 Royal Exam</h2>

<form id="quizForm"></form>

<button class="lesson" onclick="submitQuiz()">Submit Exam</button>

<div id="result" class="result"></div>

</div>

<!-- FINAL -->
<div id="finalScreen">
<h1>👑 Victory!</h1>
<p>
You have mastered all Royal Classes of the Kingdom.<br><br>

The Empire recognizes your knowledge and wisdom.<br>
New realms of history will arrive soon.
</p>
</div>

<script>

let current = 1;

/* LESSONS (melhoradas levemente) */
const lessons = {
1:{
title:"⚔️ Medieval Warfare",
text:"Medieval warfare was one of the most important parts of the Middle Ages. It involved knights, kings, and powerful kingdoms fighting for land, power, and protection. Knights were trained warriors who followed a strict code of honor called chivalry. They used heavy armor made of metal to protect themselves and fought mainly with swords, spears, and shields. Castles played a huge role in wars because they were strong defensive structures built to protect the king and the people inside. Battles were often long and strategic, involving not only brute force but also planning, formations, and siege tactics such as catapults and towers. Understanding medieval warfare helps us see how societies organized themselves around protection, loyalty, and power."
},

2:{
title:"🏰 Kingdom Geography",
text:"Kingdom geography studies the physical land that shaped how medieval civilizations developed. This includes rivers, mountains, forests, plains, and borders between different kingdoms. Rivers were extremely important because they provided water, food, transportation, and trade routes that connected different regions. Mountains often acted as natural protection barriers against invasions, while forests could hide armies or provide resources like wood and animals. The location of a kingdom influenced its economy, safety, and expansion. Geography also affected where cities were built, how armies moved, and how trade networks developed between regions. In medieval times, controlling good land often meant having more power and wealth."
},

3:{
title:"📜 Ancient History",
text:"Ancient history explores the earliest and most influential civilizations in human development, such as Egypt, Greece, Rome, Mesopotamia, and others. These civilizations created the foundations of modern society, including writing systems, laws, architecture, philosophy, and government structures. For example, Ancient Egypt is known for pyramids and pharaohs, while Ancient Greece contributed greatly to philosophy, democracy, and science. The Roman Empire built advanced roads, aqueducts, and legal systems that still influence modern law today. Studying ancient history helps us understand how human societies evolved, how ideas spread, and how early cultures shaped the modern world we live in."
},

4:{
title:"🪶 Royal Literature",
text:"Royal literature refers to the written works created during medieval and ancient royal courts. These works included poems, stories, songs, historical records, and religious texts. Most of these writings were carefully preserved by scribes, who were responsible for copying manuscripts by hand before the invention of printing. Literature in royal courts was not only for entertainment but also for preserving history, teaching moral lessons, and recording the achievements of kings and kingdoms. Many stories from this period reflect values like honor, bravery, loyalty, and wisdom. Royal literature helps us understand how people thought, believed, and communicated in earlier civilizations."
}
};

/* QUIZZES */
const quizzes = {
1:[
["Knights used...","Swords","Cars","a"],
["Castles were...","Defense","Ships","a"],
["Wars happened between...","Kingdoms","Planets","a"],
["Knights were...","Warriors","Farmers","a"],
["Main goal of war was...","Land","Music","a"]
],
2:[
["Geography studies...","Land","Space","a"],
["Rivers help...","Trade","Flying","a"],
["Mountains help...","Defense","Cooking","a"],
["Borders separate...","Kingdoms","Songs","a"],
["Geography includes...","Nature","Games","a"]
],
3:[
["Ancient history studies...","Civilizations","Robots","a"],
["Egypt built...","Pyramids","Cars","a"],
["Rome was a...","Empire","Island","a"],
["Greece contributed...","Philosophy","Games","a"],
["Ancient people lived in...","Cities","Space","a"]
],
4:[
["Literature includes...","Stories","Weapons","a"],
["Manuscripts were written by...","Scribes","Soldiers","a"],
["Literature records...","History","Weather","a"],
["Poems express...","Feelings","Noise","a"],
["Literature preserves...","Culture","Nothing","a"]
]
};

/* LOGIC */

function openStudy(id){
current = id;

document.getElementById("studyTitle").innerText = lessons[id].title;
document.getElementById("studyText").innerText = lessons[id].text;

document.getElementById("studyPage").style.display = "block";
document.getElementById("quiz").style.display = "none";
document.getElementById("finalScreen").style.display = "none";
}

function startQuiz(){
document.getElementById("studyPage").style.display = "none";
document.getElementById("quiz").style.display = "block";
loadQuiz(current);
}

function loadQuiz(id){
let form = document.getElementById("quizForm");
form.innerHTML = "";

quizzes[id].forEach((q,i)=>{
form.innerHTML += `
<div class="question">
<p>${i+1}. ${q[0]}</p>
<label><input type="radio" name="q${i}" value="a"> ${q[1]}</label><br>
<label><input type="radio" name="q${i}" value="b"> ${q[2]}</label>
</div>
`;
});
}

function submitQuiz(){

let score = 0;
let total = quizzes[current].length;

for(let i=0;i<total;i++){
let q = document.querySelector('input[name="q'+i+'"]:checked');
if(q && q.value === quizzes[current][i][3]){
score++;
}
}

let result = document.getElementById("result");

if(score >= 4){

result.innerHTML = "✅ Passed! " + score + "/" + total;

let next = document.getElementById("card"+(current+1));

setTimeout(()=>{

document.getElementById("quiz").style.display = "none";
result.innerHTML = "";

if(next){
next.classList.add("active");
}else{
showFinal();
}

},1200);

}else{

result.innerHTML = "❌ Failed! Score: " + score + "/" + total + "<br><button onclick='retry()'>Try Again</button>";
}
}

function retry(){
document.getElementById("quizForm").reset();
document.getElementById("result").innerHTML = "";
}

function showFinal(){
document.getElementById("studyPage").style.display = "none";
document.getElementById("quiz").style.display = "none";
document.getElementById("finalScreen").style.display = "block";
}

</script>

</body>
</html>