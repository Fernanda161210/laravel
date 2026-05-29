<div>

    <form action="{{ route('curso.save') }}" method="post">
        @csrf

        <input type="hidden" name="id" value="{{ $curso->id }}">

        <label>Nome</label><br>
        <input type="text" name="nome" value="{{ $curso->nome }}">

        <br><br>

        <label>Periodo</label><br>
        <input type="text" name="periodo" value="{{ $curso->periodo }}">

        <br><br>

        <button type="submit">Salvar</button>

        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset

    </form>

</div>