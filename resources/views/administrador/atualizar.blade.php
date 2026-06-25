<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>

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
</html>