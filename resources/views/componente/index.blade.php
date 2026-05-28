<div>
    <form action="{{ route('componente.add') }}" method="post">
        @csrf

        <div>
            <label>Nome</label><br>
            <input type="text" name="nome">
        </div>

        <br>

        <div>
            <label>Hora Inicio</label><br>
            <input type="datetime-local" name="hora_inicio">
        </div>

        <br>

        <div>
            <label>Hora Fim</label><br>
            <input type="datetime-local" name="hora_fim">
        </div>

        <br>

        <button type="submit">Salvar</button>

        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset
    </form>

    <table border="1">
        <tr>
            <td>Nome do Componente</td>
            <td colspan="2">Ações</td>
        </tr>
        @isset($componente)
                @foreach($componentes as $componente)
                    <tr>
                        <td>
                            <h3>{{ $componente->nome }}</h3>
                        </td>
                        <td>
                        <form action="{{ route('componente.remove', ['id' => $componente->id]) }}" method="GET">
                                <button type="submit">Remover</button>
                            </form>
                        </td>
                        <td>
                            <button type="submit">Atualizar</button>
                        </td>
                    </tr>
                @endforeach
        @endisset
    </table>

    <br>

   
</div>