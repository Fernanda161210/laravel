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

    <br>

    @isset($componentes)
        @foreach($componentes as $componente)
            <h3>
                {{ $componente->nome }} -
                {{ $componente->hora_inicio }} -
                {{ $componente->hora_fim }}
            </h3>
        @endforeach
    @endisset
</div>