let current = 1;

const lessons = {
1:{
title:"Space Physics",
text:"Space physics is the study of the universe beyond Earth. It includes planets, stars, galaxies, black holes and gravity. Gravity is the force that keeps planets in orbit around stars. Scientists use space physics to understand how the universe was formed and how it continues to evolve."
},

2:{
title:"Atomic Structure",
text:"Atomic structure explains that everything in the universe is made of atoms. Atoms contain protons (positive charge), neutrons (no charge), and electrons (negative charge). The center of the atom is called the nucleus. Understanding atoms is essential for chemistry, physics and technology."
},

3:{
title:"Chemical Reactions",
text:"Chemical reactions happen when substances transform into new substances. This can occur through burning, rusting, cooking or mixing chemicals. During a reaction, atoms rearrange to form new bonds. Chemical reactions are essential for life, industry and nature."
}
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
]
};

function openStudy(id){
current=id;

document.getElementById("studyTitle").innerText=lessons[id].title;
document.getElementById("studyText").innerText=lessons[id].text;

document.getElementById("studyPage").style.display="block";
document.getElementById("quiz").style.display="none";
document.getElementById("finalScreen").style.display="none";

// scroll automático
document.getElementById("studyPage").scrollIntoView({behavior:"smooth"});
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