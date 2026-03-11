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
<a class="nav-link" href="sobre.html">Sobre</a>
</li>

<li class="nav-item">
<a class="nav-link" href="index.html#cursos">Cursos</a>
</li>

<li class="nav-item">
<a class="nav-link active" href="contato.html">Contato</a>
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

<!-- CONTATO -->

<section class="container py-5">

<div class="row g-5">

<!-- Informações -->

<div class="col-md-5 animar">

<div class="card p-4">

<h4>Informações</h4>

<p><strong>📍 Endereço:</strong><br>
Av. Educação, 123 - Centro</p>

<p><strong>📞 Telefone:</strong><br>
(15) 99999-9999</p>

<p><strong>📧 Email:</strong><br>
[contato@unifgc.edu.br](mailto:contato@unifgc.edu.br)</p>

<p><strong>⏰ Horário:</strong><br>
Seg - Sex | 08h às 18h</p>

</div>

</div>

<!-- Formulário -->

<div class="col-md-7 animar">

<div class="card p-4">

<h4 class="mb-3">Envie uma mensagem</h4>

<form>

<div class="mb-3">
<input type="text" class="form-control" placeholder="Seu nome">
</div>

<div class="mb-3">
<input type="email" class="form-control" placeholder="Seu email">
</div>

<div class="mb-3">
<textarea class="form-control" rows="4" placeholder="Sua mensagem"></textarea>
</div>

<button class="btn btn-primary w-100">
Enviar mensagem
</button>

</form>

</div>

</div>

</div>

</section>

<!-- MAPA -->

<section class="container pb-5 animar">

<h3 class="text-center mb-4">Nossa Localização</h3>

<iframe
src="[https://maps.google.com/maps?q=tatui sp&t=&z=13&ie=UTF8&iwloc=&output=embed](https://maps.google.com/maps?q=tatui%20sp&t=&z=13&ie=UTF8&iwloc=&output=embed)"
width="100%"
height="350"
style="border-radius:20px;border:0;">
</iframe>

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