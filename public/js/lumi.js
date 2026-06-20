function step(type){

let chat = document.getElementById("chatBox");
let msg = "";

if(type === "start"){
msg = "Go to Worlds → choose a subject → start learning.";
}

if(type === "worlds"){
msg = "Worlds are learning categories like Math and Science.";
}

if(type === "lessons"){
msg = "Lessons explain content step by step.";
}

if(type === "profile"){
msg = "Your profile shows your progress.";
}

if(type === "help"){
msg = "Follow: Worlds → Lessons → Quiz.";
}

chat.innerHTML += "<p><strong>Lumi:</strong> " + msg + "</p>";
chat.scrollTop = chat.scrollHeight;

}
