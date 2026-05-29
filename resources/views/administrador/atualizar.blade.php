<div>

    <form action="{{ route('administrador.save') }}" method="post">
        @csrf

        <input type="hidden" name="id" value="{{ $administrador->id }}">

        <label>Nome</label><br>
        <input type="text" name="nome" value="{{ $administrador->nome }}">

        <br><br>

        <label>Email</label><br>
        <input type="email" name="email" value="{{ $administrador->email }}">

        <br><br>

        <label>Telefone</label><br>
        <input type="text" name="telefone" value="{{ $administrador->telefone }}">

        <br><br>

        <label>CPF</label><br>
        <input type="text" name="cpf" value="{{ $administrador->cpf }}">

        <br><br>

        <label>Usuario</label><br>
        <input type="text" name="usuario" value="{{ $administrador->usuario }}">

        <br><br>

        <label>Senha</label><br>
        <input type="text" name="senha" value="{{ $administrador->senha }}">

        <br><br>

        <label>Status</label><br>
        <input type="text" name="status" value="{{ $administrador->status }}">

        <br><br>

        <button type="submit">Salvar</button>

        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset

    </form>

</div>