```html
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body{
    background:#f4f6f9;
    padding:40px 20px;
}

.container{
    max-width:1000px;
    margin:auto;
}

.card{
    background:#fff;
    padding:35px;
    border-radius:15px;
    box-shadow:0 4px 20px rgba(0,0,0,0.08);
}

.titulo{
    font-size:28px;
    font-weight:600;
    color:#333;
    margin-bottom:30px;
    border-bottom:3px solid #6c63ff;
    padding-bottom:10px;
}

.form-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
    gap:20px;
}

.form-group{
    display:flex;
    flex-direction:column;
}

label{
    font-size:14px;
    font-weight:600;
    color:#444;
    margin-bottom:8px;
}

input{
    width:100%;
    height:48px;
    border:1px solid #ddd;
    border-radius:8px;
    padding:0 15px;
    font-size:14px;
    transition:.3s;
}

input:focus{
    outline:none;
    border-color:#6c63ff;
    box-shadow:0 0 0 3px rgba(108,99,255,.15);
}

.btn{
    border:none;
    border-radius:8px;
    padding:14px 24px;
    font-size:15px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}

.btn-salvar{
    background:#6c63ff;
    color:white;
    margin-top:25px;
}

.btn-salvar:hover{
    background:#564de0;
}

.success{
    margin-top:20px;
    padding:15px;
    background:#d1fae5;
    color:#065f46;
    border-radius:8px;
    font-weight:500;
}

@media(max-width:768px){

    body{
        padding:20px 10px;
    }

    .card{
        padding:20px;
    }

    .titulo{
        font-size:22px;
    }

    .form-grid{
        grid-template-columns:1fr;
    }
}
</style>

<div class="container">

    <div class="card">

        <h2 class="titulo">Atualizar Administrador</h2>

        <form action="{{ route('administrador.save') }}" method="post">
            @csrf

            <input type="hidden" name="id" value="{{ $administrador->id }}">

            <div class="form-grid">

                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="nome" value="{{ $administrador->nome }}">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $administrador->email }}">
                </div>

                <div class="form-group">
                    <label>Telefone</label>
                    <input type="text" name="telefone" value="{{ $administrador->telefone }}">
                </div>

                <div class="form-group">
                    <label>CPF</label>
                    <input type="text" name="cpf" value="{{ $administrador->cpf }}">
                </div>

                <div class="form-group">
                    <label>Usuário</label>
                    <input type="text" name="usuario" value="{{ $administrador->usuario }}">
                </div>

                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="senha">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <input type="text" name="status" value="{{ $administrador->status }}">
                </div>

            </div>

            <button class="btn btn-salvar" type="submit">
                Salvar Alterações
            </button>

            @isset($success)
                <div class="success">
                    {{ $success }}
                </div>
            @endisset

        </form>

    </div>

</div>
```
