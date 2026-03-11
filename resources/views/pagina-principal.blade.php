<!doctype html>
<html lang="pt-br">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Uni FGC</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

/* cores */

:root{
--roxo:#dcd0ff;
--roxo2:#f4f0ff;
--roxo3:#b8a4ff;
--texto:#333;
--bg:white;
}

body.dark{
--bg:#1d1b2a;
--texto:#f5f5f5;
--roxo:#7c6bcf;
--roxo2:#2a2542;
--roxo3:#9b8cff;
}

body{
font-family:Arial;
background:var(--roxo2);
color:var(--texto);
transition:.3s;
}

/* navbar */

.navbar{
background:var(--roxo);
box-shadow:0 5px 20px rgba(0,0,0,0.08);
}

.navbar-brand{
font-weight:bold;
font-size:22px;
}

/* hero */

.hero{
height:90vh;
display:flex;
align-items:center;
justify-content:center;
text-align:center;
color:white;

background-image:url("https://images.unsplash.com/photo-1523050854058-8df90110c9f1");
background-size:cover;
background-position:center;
background-attachment:fixed;
}

.hero h1{
font-size:60px;
font-weight:bold;
text-shadow:0 10px 30px rgba(0,0,0,0.3);
}

/* cards */

.card{
border:none;
border-radius:20px;
box-shadow:0 15px 30px rgba(0,0,0,0.1);
transition:.4s;
background:var(--bg);
}

.card:hover{
transform:translateY(-10px) scale(1.02);
}

/* estatisticas */

.stats{
background:var(--roxo);
padding:70px 0;
text-align:center;
}

.numero{
font-size:44px;
font-weight:bold;
}

/* animação scroll */

.animar{
opacity:0;
transform:translateY(40px);
transition:.8s;
}

.animar.ativo{
opacity:1;
transform:translateY(0);
}

/* footer */

footer{
margin-top:80px;
background:var(--roxo);
padding:30px;
text-align:center;
}

</style>

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg sticky-top">

<div class="container">

<a class="navbar-brand fw-bold">Uni FGC</a>

<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link" href="#home">Home</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#cursos">Cursos</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#estatisticas">Universidade</a>
</li>

<li class="nav-item">
<button onclick="modoDark()" class="btn btn-sm btn-dark ms-3">
🌙
</button>
</li>

</ul>

</div>

</div>

</nav>

<!-- HERO -->

<section class="hero" id="home">

<div class="animar">

<h1>Bem-vindo à Uni FGC</h1>

<p>Educação moderna para preparar você para o futuro.</p>

<a href="#cursos" class="btn btn-light mt-3">
Conheça nossos cursos
</a>

</div>

</section>

<!-- CURSOS -->

<section id="cursos" class="container py-5">

<h2 class="text-center mb-5 animar">
Cursos em destaque
</h2>

<div class="row g-4">

<div class="col-md-4 animar">

<div class="card p-4">

<h4>Desenvolvimento de Sistemas</h4>

<p>
Programação, desenvolvimento web e aplicativos.
</p>

</div>

</div>

<div class="col-md-4 animar">

<div class="card p-4">

<h4>Administração</h4>

<p>
Gestão empresarial, liderança e empreendedorismo.
</p>

</div>

</div>

<div class="col-md-4 animar">

<div class="card p-4">

<h4>Nutrição</h4>

<p>
Saúde alimentar e qualidade de vida.
</p>

</div>

</div>

</div>

</section>

<!-- ESTATISTICAS -->

<section class="stats" id="estatisticas">

<div class="container">

<div class="row">

<div class="col-md-3">
<div class="numero" id="n1">0</div>
<p>Alunos</p>
</div>

<div class="col-md-3">
<div class="numero" id="n2">0</div>
<p>Cursos</p>
</div>

<div class="col-md-3">
<div class="numero" id="n3">0</div>
<p>Professores</p>
</div>

<div class="col-md-3">
<div class="numero" id="n4">0</div>
<p>Anos de história</p>
</div>

</div>

</div>

</section>

<footer>

<p>© 2026 Uni FGC • Todos os direitos reservados</p>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<script>

/* dark mode */

function modoDark(){
document.body.classList.toggle("dark")
}

/* animação scroll */

const elementos=document.querySelectorAll(".animar")

const observer=new IntersectionObserver((entries)=>{
entries.forEach(entry=>{
if(entry.isIntersecting){
entry.target.classList.add("ativo")
}
})
})

elementos.forEach(el=>observer.observe(el))

/* estatisticas */

function contador(id,final){

let el=document.getElementById(id)
let i=0

let intervalo=setInterval(()=>{

i+=Math.ceil(final/50)

if(i>=final){
i=final
clearInterval(intervalo)
}

el.innerText=i

},40)

}

contador("n1",1500)
contador("n2",18)
contador("n3",95)
contador("n4",30)

</script>

</body>
</html>

CONTATO

<!doctype html>
<html lang="pt-br">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Contato - Uni FGC</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

/* cores */

:root{
--roxo:#dcd0ff;
--roxo2:#f4f0ff;
--roxo3:#b8a4ff;
--texto:#333;
--bg:white;
}

body.dark{
--bg:#1d1b2a;
--texto:#f5f5f5;
--roxo:#7c6bcf;
--roxo2:#2a2542;
--roxo3:#9b8cff;
}

body{
font-family:Arial;
background:var(--roxo2);
color:var(--texto);
transition:.3s;
}

/* navbar */

.navbar{
background:var(--roxo);
box-shadow:0 5px 20px rgba(0,0,0,0.08);
}

/* hero */

.hero{
padding:100px 20px;
text-align:center;
background:linear-gradient(135deg,#dcd0ff,#f4f0ff);
}

.hero h1{
font-size:48px;
font-weight:bold;
}

/* cards */

.card{
border:none;
border-radius:20px;
box-shadow:0 10px 25px rgba(0,0,0,0.1);
background:var(--bg);
}

/* formulário */

.form-control{
border-radius:10px;
}

button{
border-radius:10px;
}

/* animação */

.animar{
opacity:0;
transform:translateY(40px);
transition:.8s;
}

.animar.ativo{
opacity:1;
transform:translateY(0);
}

/* footer */

footer{
margin-top:80px;
background:var(--roxo);
padding:30px;
text-align:center;
}

</style>

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg sticky-top">

<div class="container">

<a class="navbar-brand fw-bold" href="index.html">
Uni FGC
</a>

<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link" href="index.html">Home</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('sobre')}}">Sobre</a>
</li>

<li class="nav-item">
<a class="nav-link" href="">Cursos</a>
</li>

<li class="nav-item">
<a class="nav-link active" href="{{ route('contato')}}">Contato</a>
</li>

<li class="nav-item">
<button onclick="modoDark()" class="btn btn-sm btn-dark ms-3">
🌙
</button>
</li>

</ul>

</div>

</div>

</nav>

<!-- HERO -->

<section class="hero">

<h1 class="animar">Entre em Contato</h1>

<p class="animar">
Estamos prontos para ajudar você a iniciar sua jornada acadêmica.
</p>

</section>