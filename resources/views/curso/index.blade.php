<div>
    <form action="{{ route('curso.add') }}" method="post">
        @csrf

        <label>Nome</label>
        <input type="text" name="nome">

        <label>Periodo</label>
        <input type="text" name="periodo">

        <button type="submit">Salvar</button>

        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset
    </form>
     <table border="1">
        <tr>
            <td>Nome do Curso</td>
            <td colspan="2">Ações</td>
        </tr>
        @isset($cursos)
                @foreach($cursos as $curso)
                    <tr>
                        <td>
                            <h3>{{ $curso->nome}}</h3>
                        </td>
                        <td>
                        <form action="{{ route('curso.remove', ['id' => $curso->id]) }}" method="GET">
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

    <table border="1">
        <tr>
            <td>Periodo do Curso</td>
            <td colspan="2">Ações</td>
        </tr>
        @isset($cursos)
                @foreach($cursos as $curso)
                    <tr>
                        <td>
                            <h3>{{ $curso->periodo}}</h3>
                        </td>
                        <td>
                        <form action="{{ route('curso.remove', ['id' => $curso->id]) }}" method="GET">
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

    @isset($cursos)
        @foreach($cursos as $curso)
            <h3>{{ $curso->nome }} - {{ $curso->periodo }}</h3>
        @endforeach
    @endisset
</div>