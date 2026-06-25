
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
    max-width:1200px;
    margin:auto;
}

.card{
    background:#fff;
    padding:30px;
    border-radius:12px;
    box-shadow:0 4px 20px rgba(0,0,0,0.08);
    margin-bottom:30px;
}

.titulo{
    font-size:28px;
    font-weight:600;
    color:#333;
    margin-bottom:25px;
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
    margin-bottom:8px;
    color:#444;
    font-weight:600;
}

input{
    width:100%;
    height:45px;
    border:1px solid #dcdcdc;
    border-radius:8px;
    padding:0 15px;
    font-size:14px;
    transition:0.3s;
}

input:focus{
    outline:none;
    border-color:#6c63ff;
    box-shadow:0 0 0 3px rgba(108,99,255,.15);
}

.btn{
    border:none;
    border-radius:8px;
    padding:12px 20px;
    cursor:pointer;
    font-weight:600;
    transition:0.3s;
}

.btn-salvar{
    margin-top:25px;
    background:#6c63ff;
    color:white;
}

.btn-salvar:hover{
    background:#564de0;
}

.btn-danger{
    background:#dc3545;
    color:white;
}

.btn-danger:hover{
    background:#bb2d3b;
}

.btn-warning{
    background:#fd7e14;
    color:white;
}

.btn-warning:hover{
    background:#e86c0a;
}

table{
    width:100%;
    border-collapse:collapse;
    background:#fff;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 4px 20px rgba(0,0,0,0.08);
}

thead{
    background:#6c63ff;
    color:white;
}

th,
td{
    padding:15px;
    text-align:left;
}

tbody tr{
    border-bottom:1px solid #eee;
}

tbody tr:hover{
    background:#f8f9ff;
}

.success{
    margin-top:20px;
    padding:15px;
    background:#d1fae5;
    color:#065f46;
    border-radius:8px;
}

.errors{
    margin-top:20px;
    padding:15px;
    background:#ffe5e5;
    color:#b42318;
    border-radius:8px;
    list-style:none;
}

.actions{
    display:flex;
    gap:10px;
}
</style>

<div class="container">

    <div class="card">

        <h2 class="titulo">Cadastro de Administrador</h2>

        <form action="{{ route('administrador.add') }}" method="post">
            @csrf

            <div class="form-grid">

                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="nome" value="{{ old('nome') }}">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label>Telefone</label>
                    <input type="text" name="telefone" value="{{ old('telefone') }}">
                </div>

                <div class="form-group">
                    <label>CPF</label>
                    <input type="text" name="cpf" value="{{ old('cpf') }}">
                </div>

                <div class="form-group">
                    <label>Usuário</label>
                    <input type="text" name="usuario" value="{{ old('usuario') }}">
                </div>

                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="senha">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <input type="text" name="status" value="{{ old('status') }}">
                </div>

            </div>

            <button class="btn btn-salvar" type="submit">
                Salvar Administrador
            </button>

            @isset($success)
                <div class="success">
                    {{ $success }}
                </div>
            @endisset

            @if($errors->any())
                <ul class="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

        </form>

    </div>

    <table>

        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>CPF</th>
                <th>Usuário</th>
                <th>Status</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>

        <tbody>

            @isset($administradores)

                @foreach($administradores as $administrador)

                    <tr>

                        <td>{{ $administrador->nome }}</td>
                        <td>{{ $administrador->email }}</td>
                        <td>{{ $administrador->telefone }}</td>
                        <td>{{ $administrador->cpf }}</td>
                        <td>{{ $administrador->usuario }}</td>
                        <td>{{ $administrador->status }}</td>

                        <td>
                            <form action="{{ route('administrador.remove', ['id' => $administrador->id]) }}" method="GET">
                                <button class="btn btn-danger" type="submit">
                                    Remover
                                </button>
                            </form>
                        </td>

                        <td>
                            <form action="{{ route('administrador.atualizar', ['id' => $administrador->id]) }}" method="GET">
                                <button class="btn btn-warning" type="submit">
                                    Atualizar
                                </button>
                            </form>
                        </td>

                    </tr>

                @endforeach

            @endisset

        </tbody>

    </table>

</div>
```
