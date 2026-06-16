<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SyntheraFlow - Lumi AI</title>

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
}

.bg1{
position:fixed;
width:500px;
height:500px;
background:#9b5cff22;
border-radius:50%;
filter:blur(120px);
top:-100px;
right:-100px;
z-index:-1;
animation:float 6s infinite ease-in-out;
}

.bg2{
position:fixed;
width:400px;
height:400px;
background:#00d4ff22;
border-radius:50%;
filter:blur(120px);
bottom:-100px;
left:-100px;
z-index:-1;
animation:float 8s infinite ease-in-out;
}

@keyframes float{
0%{transform:translateY(0);}
50%{transform:translateY(30px);}
100%{transform:translateY(0);}
}

header{
display:flex;
justify-content:space-between;
align-items:center;
padding:20px 50px;
border-bottom:1px solid #222;
background:#070711cc;
backdrop-filter:blur(10px);
position:sticky;
top:0;
z-index:100;
}

.logo{
font-size:35px;
font-weight:bold;
color:#9b5cff;
}

nav{
display:flex;
gap:30px;
flex-wrap:wrap;
}

nav a{
color:white;
text-decoration:none;
transition:.3s;
}

nav a:hover{
color:#9b5cff;
}

section{
padding:60px;
}

.lumi-container{
display:flex;
align-items:center;
justify-content:space-between;
gap:50px;
flex-wrap:wrap;
}

.lumi-avatar{
width:350px;
height:350px;
border-radius:50%;
background:linear-gradient(135deg,#9b5cff,#00d4ff);
display:flex;
align-items:center;
justify-content:center;
position:relative;
overflow:hidden;
box-shadow:
0 0 50px #9b5cff66,
0 0 100px #00d4ff33;
animation:lumiFloat 4s infinite ease-in-out;
}

@keyframes lumiFloat{
0%{transform:translateY(0);}
50%{transform:translateY(-18px);}
100%{transform:translateY(0);}
}

.lumi-img{
width:85%;
height:auto;
object-fit:contain;
}

.spark{
position:absolute;
font-size:30px;
animation:sparkle 2s infinite;
}

.spark:nth-child(2){
top:20px;
left:30px;
}

.spark:nth-child(3){
bottom:30px;
right:20px;
animation-delay:1s;
}

@keyframes sparkle{
0%{
opacity:0;
transform:translateY(10px) scale(.5);
}
50%{
opacity:1;
transform:translateY(-10px) scale(1.2);
}
100%{
opacity:0;
transform:translateY(-20px) scale(.5);
}
}

.lumi-info{
max-width:650px;
}

.lumi-info h1{
font-size:70px;
margin-bottom:20px;
}

.lumi-info p{
font-size:22px;
line-height:38px;
color:#ccc;
margin-bottom:20px;
}

.quick-questions{
display:flex;
flex-wrap:wrap;
gap:10px;
margin-top:20px;
margin-bottom:20px;
}

.quick-questions button{
background:#111122;
border:1px solid #333;
padding:12px 18px;
border-radius:20px;
cursor:pointer;
color:white;
transition:.3s;
}

.quick-questions button:hover{
border-color:#9b5cff;
background:#9b5cff22;
}

.chat-input{
width:100%;
padding:15px;
border:none;
border-radius:15px;
background:#111122;
color:white;
font-size:16px;
}

.chat-box{
background:#111122;
border:1px solid #222;
padding:20px;
border-radius:20px;
height:300px;
overflow-y:auto;
margin-top:20px;
}

footer{
padding:40px;
text-align:center;
border-top:1px solid #222;
color:#888;
margin-top:50px;
}

</style>

</head>

<body>

<div class="bg1"></div>
<div class="bg2"></div>
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

</header>

<section>

<div class="lumi-container">

<!-- AVATAR DA LUMI -->

<div class="lumi-avatar">

<img
src="{{ asset('images/lumi.png') }}"
class="lumi-img"
alt="Lumi AI">

<div class="spark">⭐</div>
<div class="spark">💫</div>

</div>

<!-- CONTEÚDO -->

<div class="lumi-info">

<h1>
Meet Lumi 🤖
</h1>

<p>
Lumi is your intelligent AI companion.
Ask questions, receive study tips and learn while having fun.
</p>

<!-- PERGUNTAS RÁPIDAS -->

<div class="quick-questions">

<button onclick="askQuestion('How are you?')">
😊 How are you?
</button>

<button onclick="askQuestion('Teach me math')">
📚 Teach me math
</button>

<button onclick="askQuestion('Tell me about science')">
🚀 Science
</button>

<button onclick="askQuestion('Give me a study tip')">
💡 Study Tip
</button>

<button onclick="askQuestion('Tell me a fun fact')">
🧠 Fun Fact
</button>

<button onclick="askQuestion('Motivate me')">
🔥 Motivate Me
</button>

</div>

<!-- INPUT -->

<input
type="text"
id="userInput"
class="chat-input"
placeholder="Talk with Lumi and press Enter...">

<!-- CHAT -->

<div id="chatBox" class="chat-box">

<p>
<strong>Lumi:</strong>
Hello! I'm Lumi 🤖
</p>

<p>
<strong>Lumi:</strong>
How can I help you today?
</p>

</div>

</div>

</div>

</section>

<footer>

© 2026 SyntheraFlow • Lumi AI Companion 🤖

</footer>
<script>

function askQuestion(question){

document.getElementById("userInput").value = question;

sendMessage();

}

function sendMessage(){

let input =
document.getElementById("userInput").value;

if(input.trim() === ""){
return;
}

let text = input.toLowerCase();

let response = "";

if(text.includes("hello") || text.includes("hi")){
response = "Hello! Nice to meet you 🌟";
}

else if(text.includes("how are you")){
response = "I'm feeling fantastic today! 😊";
}

else if(text.includes("your name")){
response = "My name is Lumi, your AI companion 🤖";
}

else if(text.includes("math")){
response = "Math becomes easier when you solve problems step by step 📚";
}

else if(text.includes("science")){
response = "Science helps us understand everything from atoms to galaxies 🚀";
}

else if(text.includes("history")){
response = "History allows us to learn from the past and build the future ⚔️";
}

else if(text.includes("study")){
response = "Study a little every day instead of everything at once 📖";
}

else if(text.includes("tip")){
response = "Use the Pomodoro technique: 25 minutes studying and 5 minutes resting 💡";
}

else if(text.includes("motivate")){
response = "Every small step today brings you closer to your dreams 🔥";
}

else if(text.includes("fun fact")){
response = "Did you know? Octopuses have three hearts 🐙";
}

else if(text.includes("planet")){
response = "Jupiter is the largest planet in our Solar System 🪐";
}

else if(text.includes("space")){
response = "Space is so vast that light from some stars takes millions of years to reach us ✨";
}

else if(text.includes("favorite color")){
response = "I love purple because it matches SyntheraFlow 💜";
}

else if(text.includes("friend")){
response = "Of course! I'm always here to help you learn 🤗";
}

else if(text.includes("school")){
response = "School is where knowledge grows and opportunities begin 🎓";
}

else if(text.includes("english")){
response = "Learning English opens doors to the world 🌎";
}

else if(text.includes("quiz")){
response = "Quizzes are a fun way to test your knowledge 🧠";
}

else if(text.includes("racemind")){
response = "RaceMind combines speed and intelligence into exciting challenges 🏎️";
}

else if(text.includes("world")){
response = "Knowledge Worlds are places where learning becomes an adventure 🌍";
}

else if(text.includes("bye")){
response = "Goodbye! Keep learning and come back soon 🌟";
}

else{
response = "Interesting! I'm still learning. Tell me more about that 🧠";
}

let chat =
document.getElementById("chatBox");

chat.innerHTML +=
"<p><strong>You:</strong> " + input + "</p>";

chat.innerHTML +=
"<p><strong>Lumi:</strong> " + response + "</p>";

chat.scrollTop = chat.scrollHeight;

document.getElementById("userInput").value = "";

}

document
.getElementById("userInput")
.addEventListener("keypress", function(e){

if(e.key === "Enter"){
sendMessage();
}

});

</script>

</body>
</html>