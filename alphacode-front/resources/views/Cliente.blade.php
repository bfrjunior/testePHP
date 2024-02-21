@include('menu')



    <title>Lista de Clientes</title>

    <body>
    <div class="container">
        <h1>Lista de Clientes</h1>
        <table class="customer-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Nome Completo</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            @if(isset($data) && count($data) > 0)
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item['firstName'] }}</td>
                        <td>{{ $item['lastName'] }}</td>
                        <td>{{ $item['fullName'] }}</td>
                        <td>{{ $item['email'] }}</td>
                     
                        <td>
                            
                            <a href="{{ route('users.edit', ['id' => $item['id']]) }}" class="btn btn-primary">Editar</a>
                            
                             <form action="{{ route('users.delete', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if($currentPage > 1)
        <a href="{{ route('clientes.index', ['page' => $currentPage - 1]) }}">Página Anterior</a>
    @endif

    @if($currentPage < $lastPage)
        <a href="{{ route('clientes.index', ['page' => $currentPage + 1]) }}">Próxima Página</a>
    @endif
@else
    <p>Nenhum cliente encontrado.</p>
@endif
     
        
    </>
</body>
</html>

