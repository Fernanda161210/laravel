<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Math Galaxy</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:Arial;}

body{
background:#070711;
color:white;
background-image: radial-gradient(circle at top, #1a2a5a, #070711 60%);
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
border-bottom:1px solid #2a2a2a;
}

.logo{font-size:30px;font-weight:bold;color:#4da3ff;}

nav{display:flex;gap:25px;}
nav a{color:white;text-decoration:none;}
nav a:hover{color:#4da3ff;}

.buttons{display:flex;gap:15px;}

.login{background:#222;color:white;padding:10px 20px;border:none;border-radius:12px;}
.signup{background:linear-gradient(90deg,#4da3ff,#7c4dff);color:white;padding:10px 20px;border:none;border-radius:12px;}

section{padding:60px;}

.title{text-align:center;font-size:55px;color:#4da3ff;margin-bottom:40px;}

.grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:30px;}

.card{
background:#111122;
padding:30px;
border-radius:30px;
opacity:0.4;
pointer-events:none;
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

.question{background:#111122;padding:15px;margin-bottom:15px;border-radius:15px;}

.result{text-align:center;font-size:20px;margin-top:15px;}

#finalScreen{display:none;text-align:center;padding:60px;}
</style>
</head>

<body>

<header>
<div class="logo">MathFlow</div>

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
<h1 class="title">📘 Math Galaxy</h1>

<div class="grid">

<div class="card active" id="card1">
<h3>➗ Arithmetic</h3>
<button class="lesson" onclick="openStudy(1)">Study Lesson</button>
</div>

<div class="card" id="card2">
<h3>📐 Geometry</h3>
<button class="lesson" onclick="openStudy(2)">Study Lesson</button>
</div>

<div class="card" id="card3">
<h3>📊 Algebra</h3>
<button class="lesson" onclick="openStudy(3)">Study Lesson</button>
</div>

<div class="card" id="card4">
<h3>📈 Statistics</h3>
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
<h2>🧠 Math Exam</h2>
<form id="quizForm"></form>
<button class="lesson" onclick="submitQuiz()">Submit Exam</button>
<div id="result" class="result"></div>
</div>

<div id="finalScreen">
<h1>🎉 Math Master!</h1>
<p>You completed Math Galaxy.</p>
</div>

<script>

let current=1;

const lessons={
1:{title:"Arithmetic",text:"Basic operations: addition, subtraction, multiplication and division."},
2:{title:"Geometry",text:"Shapes, angles, and spatial relationships."},
3:{title:"Algebra",text:"Solving equations using unknown values."},
4:{title:"Statistics",text:"Data analysis, probability and patterns."}
};

const quizzes={
1:[
["2+2?","4","5","a"],
["5-3?","2","1","a"],
["3x3?","9","6","a"],
["10/2?","5","4","a"],
["1+1?","2","3","a"]
],
2:[
["Triangle sides?","3","4","a"],
["Square sides?","4","5","a"],
["Circle has?","No corners","Corners","a"],
["Angle unit?","Degrees","Liters","a"],
["Geometry studies?","Shapes","Cars","a"]
],
3:[
["x+2=5","3","2","a"],
["Algebra uses?","Letters","Numbers only","a"],
["2x=10","5","10","a"],
["Solve?","Unknowns","Food","a"],
["Symbol?","x","#","a"]
],
4:[
["Mean is?","Average","Sum","a"],
["Data is?","Information","Food","a"],
["Chance is?","Probability","Weight","a"],
["Statistics studies?","Data","Stars","a"],
["Charts show?","Data","Animals","a"]
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