@foreach($clientes as $cliente)
    <p>{{ $cliente['nome'] }}</p>
    <form action="{{ route('users.delete', $cliente['id']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir</button>
    </form>
@endforeach
