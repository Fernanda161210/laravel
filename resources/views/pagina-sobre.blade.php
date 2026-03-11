<!doctype html>
<html lang="pt-br">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Sobre - Uni FGC</title>

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
transition:.4s;
}

.card:hover{
transform:translateY(-8px);
}

/* equipe */

.equipe img{
width:120px;
height:120px;
border-radius:50%;
object-fit:cover;
margin-bottom:10px;
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
<a class="nav-link active" href="sobre.html">Sobre</a>
</li>

<li class="nav-item">
<a class="nav-link" href="index.html#cursos">Cursos</a>
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

<h1 class="animar">Sobre a Uni FGC</h1>

<p class="animar">
Formando profissionais preparados para transformar o futuro.
</p>

</section>

<!-- HISTORIA -->

<section class="container py-5">

<div class="row align-items-center">

<div class="col-md-6 animar">

<img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1"
class="img-fluid rounded">

</div>

<div class="col-md-6 animar">

<h2>Nossa História</h2>

<p>

A Uni FGC nasceu com a missão de oferecer ensino de qualidade
e preparar estudantes para os desafios do mercado moderno.

</p>

<p>

Com cursos nas áreas de tecnologia, gestão e saúde,
a instituição une inovação, prática e conhecimento
para formar profissionais preparados para o futuro.

</p>

</div>

</div>

</section>

<!-- MISSÃO VISÃO VALORES -->

<section class="container py-5">

<div class="row g-4">

<div class="col-md-4 animar">

<div class="card p-4 text-center">

<h4>Missão</h4>

<p>
Oferecer educação moderna e acessível que prepare
os alunos para carreiras de sucesso.
</p>

</div>

</div>

<div class="col-md-4 animar">

<div class="card p-4 text-center">

<h4>Visão</h4>

<p>
Ser referência em ensino inovador
e desenvolvimento profissional.
</p>

</div>

</div>

<div class="col-md-4 animar">

<div class="card p-4 text-center">

<h4>Valores</h4>

<p>
Ética, inovação, qualidade e compromisso
com o futuro dos nossos alunos.
</p>

</div>

</div>

</div>

</section>

<!-- EQUIPE -->

<section class="container py-5 equipe">

<h2 class="text-center mb-5 animar">
Nossa Equipe
</h2>

<div class="row text-center g-4">

<div class="col-md-4 animar">

<img src="https://randomuser.me/api/portraits/women/44.jpg">

<h5>Prof. Ana Costa</h5>

<p>Diretora Acadêmica</p>

</div>

<div class="col-md-4 animar">

<img src="https://randomuser.me/api/portraits/men/32.jpg">

<h5>Prof. Carlos Silva</h5>

<p>Coordenador de Tecnologia</p>

</div>

<div class="col-md-4 animar">

<img src="https://randomuser.me/api/portraits/women/68.jpg">

<h5>Prof. Juliana Mendes</h5>

<p>Coordenadora da Saúde</p>

</div>

</div>

</section>

<footer>

<p>© 2026 Uni FGC • Educação para o futuro</p>

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

</script>

</body>
</html>