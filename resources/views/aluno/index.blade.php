<form action="{{ route('aluno.adicionar') }}" method="post">
 @csrf

 <label for="nome">Nome</label> 
 <input type="text" name="nome" id="">

 <label for="email">E-mail</label>
 <input type="email" name="email"id="" >

 <button type="submit">Salvar</button>
 @isset($sucesso)
 <h1>{{$ sucesso }}</h1>
@endisset

</form>