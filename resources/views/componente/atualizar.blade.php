<div>

    <form action="{{ route('componente.save') }}" method="post">
        @csrf

        <input type="hidden" name="id" value="{{ $componente->id }}">

        <label>Nome</label><br>
        <input type="text" name="nome" value="{{ $componente->nome }}">

        <br><br>

        <label>Hora Inicio</label><br>
        <input type="datetime-local" name="hora_inicio">

        <br><br>

        <label>Hora Fim</label><br>
        <input type="datetime-local" name="hora_fim">

        <br><br>

        <button type="submit">Salvar</button>

        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset

    </form>

</div>