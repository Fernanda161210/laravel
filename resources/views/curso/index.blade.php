


<div>

    <form action="{{ route('curso.add') }}" method="post">
        @csrf

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="{{ old('nome') }}">

        <br><br>

        <label for="periodo">Período</label><br>
        <input type="text" name="periodo" id="periodo" value="{{ old('periodo') }}">

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
            <td>Período</td>
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