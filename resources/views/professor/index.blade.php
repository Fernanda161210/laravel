<div>

    <form action="{{ route('professor.add') }}" method="post">
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
            <td colspan="2">Ações</td>
        </tr>

        @isset($professores)

            @foreach($professores as $professor)

                <tr>

                    <td>
                        {{ $professor->nome }}
                    </td>

                    <td>
                        {{ $professor->email }}
                    </td>

                    <td>
                        {{ $professor->telefone }}
                    </td>

                    <td>
                        <form action="{{ route('professor.remove', ['id' => $professor->id]) }}" method="GET">
                            <button type="submit">
                                Remover
                            </button>
                        </form>
                    </td>

                    <td>
                        <form action="{{ route('professor.atualizar', ['id' => $professor->id]) }}" method="GET">
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