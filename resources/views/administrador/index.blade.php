<div>

    <form action="{{ route('administrador.add') }}" method="post">
        @csrf

        <label>Nome</label><br>
        <input type="text" name="nome">

        <br><br>

        <label>Email</label><br>
        <input type="email" name="email">

        <br><br>

        <label>Telefone</label><br>
        <input type="text" name="telefone">

        <br><br>

        <label>CPF</label><br>
        <input type="text" name="cpf">

        <br><br>

        <label>Usuario</label><br>
        <input type="text" name="usuario">

        <br><br>

        <label>Senha</label><br>
        <input type="password" name="senha">

        <br><br>

        <label>Status</label><br>
        <input type="text" name="status">

        <br><br>

        <button type="submit">Salvar</button>

        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset
    </form>

    <br><br>

    <table border="1" cellpadding="10">

        <tr>
            <td>Nome</td>
            <td>Email</td>
            <td>Telefone</td>
            <td>CPF</td>
            <td>Usuario</td>
            <td>Status</td>
            <td colspan="2">Ações</td>
        </tr>

        @isset($administradores)

            @foreach($administradores as $administrador)

                <tr>

                    <td>
                        {{ $administrador->nome }}
                    </td>

                    <td>
                        {{ $administrador->email }}
                    </td>

                    <td>
                        {{ $administrador->telefone }}
                    </td>

                    <td>
                        {{ $administrador->cpf }}
                    </td>

                    <td>
                        {{ $administrador->usuario }}
                    </td>

                    <td>
                        {{ $administrador->status }}
                    </td>

                    <td>
                        <form action="{{ route('administrador.remove', ['id' => $administrador->id]) }}" method="GET">
                            <button type="submit">
                                Remover
                            </button>
                        </form>
                    </td>

                    <td>
                        <form action="{{ route('administrador.atualizar', ['id' => $administrador->id]) }}" method="GET">
                            <button type="submit">
                                Atualizar
                            </button>
                        </form>
                    </td>

                </tr>

            @endforeach

        @endisset

    </table>

</div>