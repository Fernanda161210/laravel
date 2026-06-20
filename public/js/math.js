let current = 1;

const lessons = {
1:{
title:"Arithmetic",
text:"Arithmetic is the branch of mathematics that deals with numbers and basic operations. It includes addition, subtraction, multiplication and division. These operations are used in everyday life, such as calculating prices, measuring time, or splitting quantities. Understanding arithmetic is the foundation for all other areas of math."
},

2:{
title:"Geometry",
text:"Geometry is the study of shapes, sizes, angles and space. It helps us understand the properties of figures like triangles, squares, circles and 3D objects. Geometry is used in architecture, engineering, design and even in nature. Learning geometry improves spatial thinking and logical reasoning."
},

3:{
title:"Algebra",
text:"Algebra is a part of mathematics that uses letters and symbols to represent numbers. It helps solve problems where values are unknown. For example, equations like x + 2 = 5 help us find missing values. Algebra is essential for advanced math, science, coding and problem solving in general."
}
};

const quizzes = {
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

if(next){
next.classList.add("active");
}else{
document.getElementById("finalScreen").style.display = "block";
}
},1200);

}else{

result.innerHTML =
"❌ Failed! Score: " + score + "/" + total +
"<br><button onclick='retry()'>Try Again</button>";
}
}

function retry(){
document.getElementById("quizForm").reset();
document.getElementById("result").innerHTML = "";
}