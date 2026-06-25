
<div>

    <form action="{{ route('professor.save') }}" method="post">
        @csrf

        <input type="hidden" name="id" value="{{ $professor->id }}">

        <label>Nome</label><br>
        <input type="text" name="nome" value="{{ $professor->nome }}">

        <br><br>

        <label>Email</label><br>
        <input type="email" name="email" value="{{ $professor->email }}">

        <br><br>

        <label>Telefone</label><br>
        <input type="text" name="telefone" value="{{ $professor->telefone }}">

        <br><br>

        <button type="submit">Salvar</button>

        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset

    </form>

</div>