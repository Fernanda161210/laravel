<div>
    <form action="{{ route('curso.add') }}" method="post">
        @csrf
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome">

        <label for="periodo">Periodo</label>
        <input type="text" name="periodo" id="periodo">

        <button type="submit">Salvar</button>
    </form>

    @isset($success)
            <h1>{{ $success }}</h1>
        @endisset
    </form>

    @isset($cursos)
            @foreach($cursos as $curso)
                <h3>{{ $curso->nome }}</h3>
            @endforeach
    @endisset
</div>
