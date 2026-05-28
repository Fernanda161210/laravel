<div>
    <form action="{{ route('administrador.add') }}" method="post">
        @csrf

        <div>
            <label>Nome</label><br>
            <input type="text" name="nome">
        </div>

        <br>

        <div>
            <label>Email</label><br>
            <input type="email" name="email">
        </div>

        <br>

        <div>
            <label>Telefone</label><br>
            <input type="text" name="telefone">
        </div>

        <br>

        <div>
            <label>CPF</label><br>
            <input type="text" name="cpf">
        </div>

        <br>

        <div>
            <label>Usuário</label><br>
            <input type="text" name="usuario">
        </div>

        <br>

        <div>
            <label>Senha</label><br>
            <input type="password" name="senha">
        </div>

        <br>

        <div>
            <label>Status</label><br>
            <input type="text" name="status">
        </div>

        <br>

        <button type="submit">Salvar</button>

        @isset($success)
            <h2>{{ $success }}</h2>
        @endisset
    </form>

    <br>

    @isset($administradores)
        @foreach($administradores as $administrador)
            <h3>
                {{ $administrador->nome }} -
                {{ $administrador->email }} -
                {{ $administrador->telefone }} -
                {{ $administrador->cpf }} -
                {{ $administrador->usuario }} -
                {{ $administrador->status }}
            </h3>
        @endforeach
    @endisset
</div>