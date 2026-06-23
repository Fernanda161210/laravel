let current = 1;
let unlocked = 1;

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
["If you have 12 apples and divide them equally into 3 groups, how many are in each group and what operation is used?","4","6","a"],
["A store gives 5 dollars off a 15 dollar item. What is the final price and which operation is applied?","10","11","a"],
["What is 7 × 6 and what does multiplication represent in terms of repeated addition?","42","36","a"],
["If you subtract 18 - 9, what concept does this represent in real life situations like spending money?","9","8","a"],
["Which expression correctly represents doubling a number starting from 3 × 2?","6","5","a"]
],

2:[
["A triangle always has how many sides and why is it considered a stable structure in engineering?","3","4","a"],
["Which shape has all sides equal and is commonly used in tiling and design patterns?","Square","Circle","a"],
["Why does a circle have infinite symmetry and no corners in geometric terms?","No corners","Many corners","a"],
["What is used to measure angles in geometry and why is it essential in construction?","Degrees","Meters","a"],
["Which term best describes the study of shapes, space and figures in mathematics?","Geometry","Algebra","a"]
],

3:[
["Solve x + 7 = 15. What is x and what step is used to isolate the variable?","8","7","a"],
["In 3x = 12, what does x represent and how do we find it?","4","3","a"],
["Why are variables used in algebra instead of fixed numbers only?","To represent unknown values","To make math harder","a"],
["What does solving an equation mainly involve in algebra?","Finding unknown values","Drawing shapes","a"],
["If x = 5, what is the value of 2x + 3 and what concept does this show?","13","10","a"]
]
};

function openStudy(id){

if(id > unlocked){
return;
}

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

setTimeout(()=>{

document.getElementById("quiz").style.display = "none";
result.innerHTML = "";

if(current === unlocked && current < 3){

let nextCard = document.getElementById("card" + (unlocked + 1));

unlocked = unlocked + 1;

if(nextCard){
nextCard.classList.remove("locked");
nextCard.classList.add("active");
}

}else if(current === 3){

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