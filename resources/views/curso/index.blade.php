<div>

    <form action="{{ route('curso.add') }}" method="post">
        @csrf

        <label for="nome">Nome</label><br>
        <input type="text" name="nome" id="nome">

        <br><br>

        <label for="periodo">Periodo</label><br>
        <input type="text" name="periodo" id="periodo">

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
            <td>Periodo</td>
            <td colspan="2">Ações</td>
        </tr>

        @isset($cursos)

            @foreach($cursos as $curso)

                <tr>

                    <td>
                        {{ $curso->nome }}
                    </td>

                    <td>
                        {{ $curso->periodo }}
                    </td>

                    <td>
                        <form action="{{ route('curso.remove', ['id' => $curso->id]) }}" method="GET">
                            <button type="submit">
                                Remover
                            </button>
                        </form>
                    </td>

                    <td>
                        <form action="{{ route('curso.atualizar', ['id' => $curso->id]) }}" method="GET">
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