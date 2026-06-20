let current = 1;

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
}
};

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
]
};

function openStudy(id){
current = id;

document.getElementById("studyTitle").innerText = lessons[id].title;
document.getElementById("studyText").innerText = lessons[id].text;

document.getElementById("studyPage").style.display = "block";
document.getElementById("quiz").style.display = "none";
document.getElementById("finalScreen").style.display = "none";

document.getElementById("studyPage").scrollIntoView({behavior:"smooth"});
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

if(current < 3){
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