
@foreach($produtos as $item)
    <a href="{{ route('deletar', ['id' => $item->id]) }}">
        {{ $item->nome }}
    </a>
    <br />
@endforeach

