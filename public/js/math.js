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
["What is 2 + 2 in arithmetic and why is it used in everyday calculations like counting objects or money?","4","5","a"],
["If you subtract 5 - 3, what is the correct result and how does subtraction represent removing values?","2","1","a"],
["What is the result of multiplying 3 × 3 and how does multiplication relate to repeated addition?","9","6","a"],
["What is 10 divided by 2 and how does division help split quantities equally in real life situations?","5","4","a"],
["What is 1 + 1 and why is addition considered the most basic arithmetic operation used in daily life?","2","3","a"]
],

2:[
["A triangle has how many sides and why is this shape important in geometry and structures like bridges?","3","4","a"],
["A square has how many equal sides and how does this shape appear in architecture and design?","4","5","a"],
["What does a circle represent in geometry and why does it have no corners or edges?","No corners","Corners","a"],
["What unit is used to measure angles and why is angle measurement important in construction and design?","Degrees","Liters","a"],
["What does geometry study and how does it help us understand shapes in the real world?","Shapes","Cars","a"]
],

3:[
["In the equation x + 2 = 5, what is the value of x and how do we solve unknown variables in algebra?","3","2","a"],
["Why does algebra use letters like x instead of only numbers and how does it help solve problems?","Letters","Numbers only","a"],
["Solve 2x = 10 and explain how algebra helps find unknown values step by step.","5","10","a"],
["What does solving an equation mean in algebra and why is it useful in science and programming?","Unknowns","Food","a"],
["Why is the symbol x commonly used in algebra and what does it represent in equations?","x","#","a"]
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