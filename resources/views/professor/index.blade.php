<div>
    <form action="{{ route('professor.add') }}" method="post">
        @csrf

        <label>Nome</label>
        <input type="text" name="nome">

        <label>Email</label>
        <input type="email" name="email">

        <label>Telefone</label>
        <input type="text" name="telefone">

        <button type="submit">Salvar</button>

        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset
    </form>

    @isset($professores)
        @foreach($professores as $professor)
            <h3>
                {{ $professor->nome }} -
                {{ $professor->email }} -
                {{ $professor->telefone }}
            </h3>
        @endforeach
    @endisset
</div>