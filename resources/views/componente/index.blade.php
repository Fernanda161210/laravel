<div>

    <form action="{{ route('componente.add') }}" method="post">
        @csrf

        <label>Nome</label><br>
        <input type="text" name="nome" id="nome" value="{{ old('nome') }}">

        <br><br>

        <label>Hora Inicio</label><br>
        <input type="datetime-local" name="hora_inicio" value="{{ old('hora_inicio') }}">

        <br><br>

        <label>Hora Fim</label><br>
        <input type="datetime-local" name="hora_fim" value="{{ old('hora_fim') }}">

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
            <td>Hora Inicio</td>
            <td>Hora Fim</td>
            <td colspan="2">Ações</td>
        </tr>

        @isset($componentes)

            @foreach($componentes as $componente)

                <tr>

                    <td>
                        {{ $componente->nome }}
                    </td>

                    <td>
                        {{ $componente->hora_inicio }}
                    </td>

                    <td>
                        {{ $componente->hora_fim }}
                    </td>

                    <td>
                        <form action="{{ route('componente.remove', ['id' => $componente->id]) }}" method="GET">
                            <button type="submit">
                                Remover
                            </button>
                        </form>
                    </td>

                    <td>
                        <form action="{{ route('componente.atualizar', ['id' => $componente->id]) }}" method="GET">
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