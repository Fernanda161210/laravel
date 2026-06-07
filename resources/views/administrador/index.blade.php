<div>

    <form action="{{ route('administrador.add') }}" method="post">
        @csrf

        <label>Nome</label><br>
        <input type="text" name="nome" id="nome" value="{{ old('nome') }}">

        <br><br>

        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}">

        <br><br>

        <label>Telefone</label><br>
        <input type="text" name="telefone" value="{{ old('telefone') }}">

        <br><br>

        <label>CPF</label><br>
        <input type="text" name="cpf" value="{{ old('cpf') }}">

        <br><br>

        <label>Usuário</label><br>
        <input type="text" name="usuario" value="{{ old('usuario') }}">

        <br><br>

        <label>Senha</label><br>
        <input type="password" name="senha">

        <br><br>

        <label>Status</label><br>
        <input type="text" name="status" value="{{ old('status') }}">

        <br><br>

        <button type="submit">Salvar</button>

        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset

        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

    </form>

    <br><br>

    <table border="1" cellpadding="10">

        <tr>
            <td>Nome</td>
            <td>Email</td>
            <td>Telefone</td>
            <td>CPF</td>
            <td>Usuário</td>
            <td>Status</td>
            <td colspan="2">Ações</td>
        </tr>

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
                            <button type="submit">Remover</button>
                        </form>
                    </td>

                    <td>
                        <form action="{{ route('administrador.atualizar', ['id' => $administrador->id]) }}" method="GET">
                            <button type="submit">Atualizar</button>
                        </form>
                    </td>

                </tr>

            @endforeach

        @endisset

    </table>

</div>